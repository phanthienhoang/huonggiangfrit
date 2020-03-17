<?php

namespace App\Http\Controllers;

use App\Category_product_tran;
use App\Product;
use App\Product_trans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTranslation($locale)
    {
        return Product_trans::where('locale', $locale)->get();
    }

    public function index()
    {
        if (App::getLocale() == "en") {
            $products  = $this->getTranslation('en');
        } else {
            $products  = $this->getTranslation('vi');
        }

        // if (session()->has('language')) {
        //     $language = session()->get('language');
        // } else {
        //     $language = App::getLocale();
        // }

        // $products = Product_trans::where('locale', $language)->get();

        return view('back_end.tables.product', compact('products'));
    }

    public function create()
    {
        return view('back_end.forms.products.create');
    }

    public function store(Request $request)
    {
        $this->validateAttribute();

        $product = Product::create(['online' => 1, 'category_id' => request('category_id')]);

        $attributes = $request->except(['category_id']);

        $attributes['images'] = 'data:image/png;base64,' . base64_encode(file_get_contents(request('images')));
        if ($attributes['locale'] == 'vi') {
            $product->productTranslates()->create($attributes);
            $attributes['locale'] = 'en';
            $attributes['name'] = 'please update english';
            $attributes['description'] = 'please update english';
            $attributes['content'] = 'please update english';
            $product->productTranslates()->create($attributes);
            $message = "Tạo mới thành công! xin hãy cập nhập ngôn ngữ tiếng anh";
        } else {
            $product->productTranslates()->create($attributes);
            $attributes['locale'] = 'vi';
            $attributes['name'] = 'cập nhập bài viết tiếng việt';
            $attributes['description'] = 'cập nhập bài viết tiếng việt';
            $attributes['content'] = 'cập nhập bài viết tiếng việt';
            $product->productTranslates()->create($attributes);
            $message = "create-success ! please update vietnam language";
        }

        // $product->translation(request('locale'))->update($attributes);

        Session::flash('create-success', $message);
        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product_trans::find($id);

        return view('back_end.forms.products.edit', compact('product'));
    }

    public function update($id)
    {
        $this->validateAttribute();

        $product = Product_trans::find($id);

        $attributes = request()->except('category_id');;

        if (request()->has('images')) {
            $attributes['images'] = 'data:image/png;base64,' . base64_encode(file_get_contents(request('images')));
        }

        $product->update($attributes);
        $message = "update thành công";

        Session::flash('create-success', $message);

        return redirect(route('admin.products.index'));
    }

    public function show($id)
    {
        $product = Product_trans::find($id);

        return view('back_end.showdetail.detailProduct', compact('product'));
    }

    public function destroy($id)
    {
        $productTrans = Product_trans::find($id);

        $product = Product::find($productTrans->product_id);
        $product->productTranslates()->delete();


        return redirect(route('admin.products.index'));
    }

    public function getCategory()
    {

        $locale = request('locale');

        $data = Category_product_tran::where('locale', $locale)->get();

        if (request()->ajax()) {
            return response()->json($data);
        }
    }

    public function getDeleted()
    {
        $deletedProduct = Product_trans::onlyTrashed()->where('locale', session()->get('language'))->get();


        return view('back_end.tables.deleted.product', compact('deletedProduct'));
    }

    public function restore($id)
    {
        $productTrans = Product_trans::onlyTrashed()->find($id);

        $product = Product::find($productTrans->product_id);
        $product->productTranslates()->restore();

        return redirect(route('admin.products.index'));
    }

    public function forceDelete($id)
    {
        $productTrans = Product_trans::onlyTrashed()->find($id);

        $product = Product::find($productTrans->product_id);
        $product->productTranslates()->forceDelete();


        return redirect(route('admin.products.index'));
    }

    public function validateAttribute()
    {
        return request()->validate([
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
            'features' => 'required',
            'line_graph' => 'required',
            'flattening_curve' => 'required',
            'content' => 'required',
            'description' => 'required',
            'images' => 'nullable|image',
            'locale' => 'required'
        ]);
    }
}

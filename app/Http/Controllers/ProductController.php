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
        //    dd($products[1]->product->category_product->category_product_tran->where('locale', Session::get('language'))->first()->name);
            
        } else {
            $products  = $this->getTranslation('vi');
        }

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
            $attributes['status'] = '0';
            $attributes['features'] = 'please update english';
            $attributes['apply'] = 'please update english';
            $product->productTranslates()->create($attributes);
            $message = "Tạo mới thành công! xin hãy cập nhập ngôn ngữ tiếng anh";
        } else {
            $product->productTranslates()->create($attributes);

            $attributes['locale'] = 'vi';
            $attributes['status'] = '0';
            $attributes['features'] = 'cập nhập bài viết tiếng việt';
            $attributes['apply'] = 'cập nhập bài viết tiếng việt';
            $product->productTranslates()->create($attributes);
            $message = "create-success ! please update vietnam language";
        }


        Session::flash('create-success', $message);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product_trans::find($id);
        
        return view('back_end.forms.products.edit', compact('product'));
    }

    public function update($id)
    {
        // $this->validateAttribute();

        $product = Product_trans::find($id);

        $attributes = request()->except('category_id');;

        if (request()->has('images')) {
            $attributes['images'] = 'data:image/png;base64,' . base64_encode(file_get_contents(request('images')));
        }

        $product->update($attributes);
        $message = "update thành công";

        Session::flash('create-success', $message);

        return redirect(route('products.index'));
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


        return redirect(route('products.index'));
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

        return redirect(route('products.index'));
    }

    public function forceDelete($id)
    {
        $productTrans = Product_trans::onlyTrashed()->find($id);

        $product = Product::find($productTrans->product_id);
        $product->productTranslates()->forceDelete();


        return redirect(route('products.index'));
    }

    public function validateAttribute()
    {
        return request()->validate([
            'name' => 'required',
            'code' => 'required',
            'status' => 'required',
            'features' => 'required',
            'apply' => 'required',
            'refer_frit' => 'required',
            'specifications' => 'required',
            'locale' => 'required',
            'images' => 'required|image',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Category_product_tran;
use App\Product;
use App\Product_trans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
            $attributes['name'] = 'null';
            $attributes['description'] = 'null';
            $attributes['content'] = 'null';
            $product->productTranslates()->create($attributes);
        } else {
            $product->productTranslates()->create($attributes);
            $attributes['locale'] = 'vi';
            $attributes['name'] = 'null';
            $attributes['description'] = 'null';
            $attributes['content'] = 'null';
            $product->productTranslates()->create($attributes);
        }

        // $product->translation(request('locale'))->update($attributes);


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
            // $image = 'data:image/png;base64,' . base64_encode(file_get_contents(request('images')));
            $attributes['images'] = 'data:image/png;base64,' . base64_encode(file_get_contents(request('images')));
        }

        $product->update($attributes);

        return redirect(route('admin.products.index'));
    }

    public function show($id)
    {
        $product = Product_trans::find($id);

        return view('back_end.showdetail.detailProduct', compact('product'));
    }

    public function destroy($id)
    {
        Product_trans::destroy($id);

        return redirect(route('admin.products.index'));
    }

    public function getCategory(){

        $locale = request('locale');

        $data = Category_product_tran::where('locale', $locale)->get();

        if(request()->ajax()){
            return response()->json($data);
        }
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

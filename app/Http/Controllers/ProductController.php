<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_trans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (session()->has('language')) {
            $language = session()->get('language');
        } else {
            $language = App::getLocale();
        }

        $products = Product_trans::where('locale', $language)->get();

        return view('back_end.tables.product', compact('products'));
    }

    public function create()
    {
        return view('back_end.forms.products.create');
    }

    public function store()
    {
        $attributes = $this->validateAttribute();

        $product = Product::create(['online' => 1, 'category_id' => request('category_id')]);
        if (request()->has('images')) {
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents(request('images')));
            $attributes = array_replace($this->validateAttribute(), ['images' => $image]);
        }

        $product->translation(request('locale'))->update($attributes);


        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product_trans::find($id);

        return view('back_end.forms.products.edit', compact('product'));
    }

    public function update($id)
    {
        $attributes = $this->validateAttribute();

        $product = Product_trans::find($id);

        if (request()->has('images')) {
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents(request('images')));
            $attributes = array_replace($this->validateAttribute(), ['images' => $image]);
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

    public function validateAttribute()
    {
        return request()->validate([
            'name' => 'required',
            'content' => 'required',
            'description' => 'required',
            'images' => 'nullable',
            'locale' => 'required'
        ]);
    }
}

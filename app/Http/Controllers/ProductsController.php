<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_trans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('back_end.tables.product');
    }

    public function create()
    {
        return view('back_end.forms.products.create');
    }

    public function store()
    {
        $this->validateAttribute();

        $product = Product::create(['online' => 1, 'category_id' => 1]);

        $product->translation(request('locale'))->update($this->validateAttribute());

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = Product_trans::find($id);

        // return $product;

        return view('back_end.forms.products.edit', compact('product'));
    }

    public function update($id)
    {
        $product = Product_trans::find($id);

        $product->update($this->validateAttribute());

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

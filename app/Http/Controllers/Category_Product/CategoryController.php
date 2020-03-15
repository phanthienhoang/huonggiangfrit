<?php

namespace App\Http\Controllers\Category_Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category_product;
use App\Category_product_tran;
use App\Language;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if(session()->has('language')){
            $language = session()->get('language');
        } else {
            $language = App::getLocale();
        }

        $categoryProducts = Category_product_tran::where('locale', $language)->get();

        return view('back_end.tables.category_product', compact('categoryProducts'));
    }



    /**
     * Show the form for creating a new resource.,
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.forms.category_product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validateAttribute();

        $categoryProduct = Category_product::create(['online' => 1]);

        if (request()->has('images')) {
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents(request('images')));
            $attributes = array_replace($this->validateAttribute(), ['images' => $image]);
        }

        $categoryProduct->translation(request('locale'))->update($attributes);


        return redirect()->route('admin.category-products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoryProduct = Category_product_tran::findOrFail($id);
        return view('back_end.showdetail.detailCategoryProduct', compact('categoryProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryProduct = Category_product_tran::findOrFail($id);
        return view('back_end.forms.category_product.edit', compact(['categoryProduct']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $attributes = $this->validateAttribute();

        $categoryProduct = Category_product_tran::find($id);

        if (request()->has('images')) {
            $image = 'data:image/png;base64,' . base64_encode(file_get_contents(request('images')));
            $attributes = array_replace($this->validateAttribute(), ['images' => $image]);
        }

        $categoryProduct->update($attributes);

        return redirect()->route('admin.category-products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category_product_tran::destroy($id);

        return redirect(route('admin.category-products.index'));
    }

    public function validateAttribute()
    {
        return request()->validate([
            'name' => 'required',
            'contents' => 'required',
            'description' => 'required',
            'images' => 'nullable',
            'locale' => 'required'
        ]);
    }
}

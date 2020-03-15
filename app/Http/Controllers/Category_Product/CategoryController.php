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
        $category_product = new Category_product;
        $input = $request->input('online');
        $category_product->online=$input;
        $category_product->save();

        $last_id =$category_product->id;
        

        $atribute = $request->all();

        if ($request->hasFile('images')) {
            $image=base64_encode(file_get_contents($request->file("images")));
            $atribute['images']="data:image/jpg;base64,".$image;
        }

        $atribute['category_id']=$last_id;
        if($atribute['locale']=='vi'){
            Category_product_tran::create($atribute);
            $atribute['locale']='en';
            $atribute['status']=0;
            $atribute['name']='null';
            $atribute['description']='null';
            $atribute['contents']='null';
            Category_product_tran::create($atribute);
        }else{
            Category_product_tran::create($atribute);
            $atribute['locale']='vi';
            $atribute['status']=0;
            $atribute['name']='null';
            $atribute['description']='null';
            $atribute['contents']='null';
            Category_product_tran::create($atribute);

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


        $product_trans = Category_product_tran::find($id);

        $product_trans->update($atribute);

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
  $product_trans = Category_product_tran::find($id);
        $id_delete = $product_trans['category_id'];
        // dd($id_delete);

        $cate_product = Category_product::find($id_delete);
        // dd($cate_product);
        $cate_product->delete();
        return redirect()->route('admin.category');
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

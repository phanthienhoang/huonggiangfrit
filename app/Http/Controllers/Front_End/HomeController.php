<?php

namespace App\Http\Controllers\Front_End;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category_product_tran;
use App\Product_trans;
use App\Product;
use App;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexAbout()
    {
        return view('front_end.about');
    }


    public function showCategory(Category_product_tran $category_product_tran)
    {
        if (App::getLocale() == "vi")

            return view('front_end.productlist', [
                'cate_gory' => $category_product_tran->load(['product_trans' => function ($pro) {
                    $pro->where('locale', '=', 'vi');
                }])
            ]);


        return view('front_end.productlist', [
                'cate_gory' => $category_product_tran->load(['product_trans' => function ($pro) {
                    $pro->where('locale', '=', 'en');
                }])
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeLanguage($language)
    {
        session(['language' => $language]);
        // App::setLocale('vi');
        return redirect()->back();
    }
}

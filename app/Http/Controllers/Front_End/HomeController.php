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
        if (App::getLocale() == "vi") {
            $product_trans = Product_trans::where([
                ['locale', '=', 'vi'],
                ['status', '=', '1'],
            ])->orderBy('created_at', 'desc')->take(3)->get();

        } else {
            $product_trans = Product_trans::where([
                ['locale', '=', 'en'],
                ['status', '=', '1'],
            ])->orderBy('created_at', 'desc')->take(3)->get();
        }
        return view('front_end.about', compact('product_trans'));
    }


    public function showCategory(Category_product_tran $category_product_tran)
    {
        // dd($category_product_tran);
        if (App::getLocale() == "vi")
            return view('front_end.productlist', [
                'category_product_tran' => $category_product_tran,
                'cate_gory' => $category_product_tran->load(['product_trans' => function ($pro) {
                    $pro->where([
                        ['locale', '=', 'vi'],
                        ['status', '=', '1'],
                    ]);
                }])
            ]);

        return view('front_end.productlist', [
            'category_product_tran' => $category_product_tran,
            'cate_gory' => $category_product_tran->load(['product_trans' => function ($pro) {
                $pro->where([
                    ['locale', '=', 'en'],
                    ['status', '=', '1'],
                ]);
            }])
        ]);
    }

    public function readMore(Product_trans $product_trans)
    {
        // dd($product_trans);

        if (App::getLocale() == "vi") {
            $category_product_trans = $product_trans->product->category_product_trans[0];
            $cate_gory = $category_product_trans->load(['product_trans' => function ($pro) {
                $pro->where([
                    ['locale', '=', 'vi'],
                    ['status', '=', '1'],
                ]);
            }]);
        } else {
            $category_product_trans = $product_trans->product->category_product_trans[1];
            $cate_gory = $category_product_trans->load(['product_trans' => function ($pro) {
                $pro->where([
                    ['locale', '=', 'en'],
                    ['status', '=', '1'],
                ]);
            }]);
        }
        return view('front_end.product-detail', compact('product_trans', 'cate_gory'));
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atribute = Product_trans::find($id);
        return view('front_end.productlist', compact('atribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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

    public function changeLanguageFront($language)
    {
        session(['language' => $language]);
        // App::setLocale('vi');
        return redirect('/');
    }
}

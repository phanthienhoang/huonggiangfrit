<?php

namespace App\Http\Controllers\Category_Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category_product;
use App\Category_product_tran;
use App\Language;
use App;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function getTranslation($locale)
    {
        return Category_product_tran::where('locale',$locale)->get();
    }


    public function index()
    {   


        // App::setLocale('vi');
        // $englishtext = $this->getTranslation('en');
        // $vietnamtext = $this->getTranslation('vi');
        // dd(App::getLocale());
        // dd($this->langualge);
        if (App::getLocale() == "en") {
            $kq = $this->getTranslation('en');
        } else {
            $kq = $this->getTranslation('vi');
        }

        // dd(App::getLocale());
        // dd($englishtext);
        return view('back_end.tables.category_product',compact(['kq']));
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
}

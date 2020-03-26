<?php

namespace App\Http\Controllers\Front_end;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Hire_tran;
use App;

use App\New_tran;

class HingringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getTranslation($locale)
    {
        return Hire_tran::where([
            ['locale','=', $locale],
            ['status', '=', '1'],
        ])->orderBy('updated_at', 'desc')->take(1)->get();
    }


    public function viewHires(){
        if (App::getLocale() == "en") {
            $hires  = $this->getTranslation('en');
        } else {
            $hires  = $this->getTranslation('vi');
        }
        return view('front_end.hiring',compact(['hires']));
    }

    public function showNew($id)
    {
        $new_tran = New_tran::find($id);
        return view('front_end.showNewList',compact('new_tran'));
    }


    public function viewNews()
    {
        if (App::getLocale() == "en") {
            $new_trans  = New_tran::where([
                ['locale','=', "en"],
                ['status', '=', '1'],
            ])->paginate(4);
        } else {
            $new_trans  = New_tran::where([
                ['locale','=', "vi"],
                ['status', '=', '1'],
            ])->paginate(4);
        }
        return view('front_end.newlist',compact(['new_trans']));
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

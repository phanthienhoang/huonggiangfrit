<?php

namespace App\Http\Controllers;

use App\Hire;
use App\Hire_tran;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Session;

class HireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getTranslation($locale)
    {
        return Hire_tran::where('locale',$locale)->get();
    }

    public function index()
    {
        if (App::getLocale() == "en") {
            $hires  = $this->getTranslation('en');
        } else {
            $hires  = $this->getTranslation('vi');
        }
        return view('back_end.hires.index',compact(['hires']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('back_end.forms.hires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateAttribute();

        $hire = new Hire();
        $hire->save();
        $last_id =$hire->id;


        $atribute = $request->all();
        $atribute['hire_id']=$last_id;
        if($atribute['locale']=='vi'){
            Hire_tran::create($atribute);
            $atribute['locale']='en';
            $atribute['status']=0;
            $atribute['content']='hãy cập nhập tiếng anh cho tôi';
            Hire_tran::create($atribute);
            $message = "Tạo mới thành công! xin hãy cập nhập ngôn ngữ tiếng anh";
        }else{
            Hire_tran::create($atribute);
            $atribute['locale']='vi';
            $atribute['status']=0;
            $atribute['content']='hãy cập nhập tiếng anh cho tôi';
            Hire_tran::create($atribute);
            $message = "create-success ! please update vietnam language";
        }

        Session::flash('create-success',$message);
        return redirect()->route('tuyendung.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function show(Hire $hire)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $atribute = Hire_tran::find($id);

        return view('back_end.forms.hires.edit',compact('atribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $atribute = $request->all();
        $product = Hire_tran::find($id);
        $product->update($atribute);
        $message = "update thành công";

        Session::flash('create-success',$message);

        return redirect()->route('tuyendung.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hire  $hire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Hire_tran::find($id);
        $product->delete();
        
        return redirect(route('tuyendung.index'));
    }

    public function validateAttribute()
    {
        return request()->validate([
            'title' => 'required',
            'content' => 'required',
            'status' =>'required',
            'locale' => 'required'
        ]);
    }
}

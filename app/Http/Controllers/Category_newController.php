<?php

namespace App\Http\Controllers;

use App\Category_new;
use App\Category_new_tran;
use App\New_tran;
use Illuminate\Http\Request;
use App\Language;
use App;
use Illuminate\Support\Str;

class Category_newController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTranslation($locale)
    {
        return Category_new_tran::where('locale',$locale)->get();
    }
    public function index()
    {

        if (App::getLocale() == "en") {
            $kq = $this->getTranslation('en');
        } else {
            $kq = $this->getTranslation('vi');
        }
        return view('back_end.tables.category_new', compact('kq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.forms.category_new.create_category_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_new = new Category_new();
        $category_new->online = 1;
        $category_new->save();
        if (\request('locale') == 'en') {


            $atribute['slug'] = $slug;
            $category_new_tran1 = new Category_new_tran();
            $category_new_tran1->locale = 'vi';
            $category_new_tran1->status = 0;
            $category_new_tran1->category_id = $category_new->id;
            $category_new_tran1->save();

            $category_new_tran = new Category_new_tran();
            $category_new_tran->name = \request('name');
            $category_new_tran->locale = 'en';
            $category_new_tran->slug = Str::slug($request['name']);
            $category_new_tran->category_id = $category_new->id;
            $category_new_tran->save();

        } else {
            $category_new_tran = new Category_new_tran();
            $category_new_tran->name = \request('name');
            $category_new_tran->locale = 'vi';
            $category_new_tran->slug = Str::slug($request['name']);
            $category_new_tran->category_id = $category_new->id;
            $category_new_tran->save();


            $category_new_tran1 = new Category_new_tran();
            $category_new_tran1->locale = 'en';
            $category_new_tran1->status = 0;
            $category_new_tran1->category_id = $category_new->id;
            $category_new_tran1->save();
        }

        return redirect()->route('category_new.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category_new_tran = Category_new_tran::find($id);
        $category_new_tran_en = Category_new_tran::find($id+1);
        return view('back_end.forms.category_new.view',compact('category_new_tran','category_new_tran_en'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_new_tran = Category_new_tran::find($id);
        return view('back_end.forms.category_new.edit_category_new', compact('category_new_tran'));
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
        $category_new_tran = Category_new_tran::find($id);
        $category_new_tran->name = \request('name');
        $category_new_tran->slug = Str::slug($request['name']);
        $category_new_tran->save();


        return redirect()->route('category_new.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_new_tran = Category_new_tran::find($id);
        $category_new = Category_new::find($category_new_tran->category_id);
        $cate_new_tran = Category_new_tran::find($id + 1);

        $category_new_tran->delete();
        $category_new->delete();
        $cate_new_tran->delete();


        return redirect()->route('category_new.index');
    }

    public function validateAttribute()
    {
        return request()->validate([
            'name' => 'required',
            'content' => 'required',
            'description' => 'required',
            'locale' => 'required'
        ]);
    }

    public function getTranslation_deleted_at($locale)
    {
        return Category_new_tran::onlyTrashed()->where('locale',$locale)->get();
    }

    public function show_deletad_at()
    {
        if (App::getLocale() == "en") {
            $kq = $this->getTranslation_deleted_at('en');
        } else {
            $kq = $this->getTranslation_deleted_at('vi');
        }
        return view('back_end.forms.category_new.deleted_at',compact('kq'));
    }


    public function restore($id)
    {
        $kq = Category_new_tran::withTrashed()->find($id);
        $kq1 = Category_new_tran::withTrashed()->find($id+1);
        $kq2 = Category_new::withTrashed()->find($kq->category_id);


        $kq->restore();
        $kq1->restore();
        $kq2->restore();

        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $kq = Category_new_tran::withTrashed()->find($id);
        $kq1 = Category_new_tran::withTrashed()->find($id+1);
        $kq->forceDelete();
        $kq1->forceDelete();
        return redirect()->route('category_new.index');
    }

    public function view_deleted_at($id)
    {
        $category_new_tran = Category_new_tran::withTrashed()->find($id);
        $category_new_tran_en = Category_new_tran::withTrashed()->find($id+1);
        return view('back_end.forms.category_new.view',compact('category_new_tran','category_new_tran_en'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Category_new;
use App\Category_new_tran;
use Illuminate\Http\Request;

class Category_newController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_news = Category_new::all();
        return view('back_end.tables.category_new', compact('category_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_end.forms.create_category_new');
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
        $category_new_tran = new Category_new_tran();

        $category_new->name = \request('name');
        $category_new->save();

        $category_new_tran->name = $category_new->name;
        $category_new_tran->locale = 'vn';
        $category_new_tran->category_id = $category_new->id;
        $category_new_tran->save();

        $category_new_tran = new Category_new_tran();
        $category_new_tran->name = \request('nameEn');
        $category_new_tran->locale = 'en';
        $category_new_tran->category_id = $category_new->id;
        $category_new_tran->save();

        return redirect()->route('admin.category_new.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_new = Category_new::find($id);
        $category_new_trans = Category_new_tran::all();
        foreach ($category_new_trans as $category_new_tran) {
            if ($category_new->id = $category_new_tran->category_id) {
                if ($category_new_tran->locale == 'en') {
                    $category_new_tran;
                }
            }
        }
        return view('back_end.forms.edit_category_new', compact('category_new', 'category_new_tran'));
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
        $category_new = Category_new::find($id);
        $category_new->name = \request('name');
        $category_new->online = \request('online');
        $category_new->save();

        $category_new_trans = Category_new_tran::all();
        foreach ($category_new_trans as $category_new_tran) {
            if ($category_new->id === $category_new_tran->category_id) {
                if ($category_new_tran->locale == 'en') {
                    $category_new_tran->name = \request('nameEn');
                    $category_new_tran->save();
                }else
                {
                    $category_new_tran->name = $category_new->name;
                    $category_new_tran->save();
                }
            }
        }
        return redirect()->route('admin.category_new.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_new = Category_new::find($id);
        $category_new->delete();
        $category_new_trans = Category_new_tran::all();
        foreach ($category_new_trans as $category_new_tran) {
            if ($category_new_tran->category_id == $category_new->id){
                $category_new_tran->delete();
            }
        }
        return redirect()->route('admin.category_new.index');
    }
}

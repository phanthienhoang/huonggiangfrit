<?php

namespace App\Http\Controllers;
use App;
use App\New_tran;
use App\News;

use Illuminate\Http\Request;

class NewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTranslation($locale)
    {
        return New_tran::where('locale',$locale)->get();
    }


    public function getTranslation_deleted_at($locale)
    {
        return New_tran::onlyTrashed()->where('locale',$locale)->get();
    }


    public function index()
    {
        if (App::getLocale() == "en") {
            $kq = $this->getTranslation('en');
        } else {
            $kq = $this->getTranslation('vi');
        }
        return view('back_end.tables.new', compact('kq'));
    }

    public function create()
    {
        return view('back_end.forms.news.create');
    }

    public function store(Request $request)
    {
        $new = new News();
        $new->save();
        $last_id = $new->id;
        $atribute = $request->all();
        $image = base64_encode(file_get_contents($request->file("images")));
        $atribute['image'] = "data:image/jpg;base64," . $image;
        $atribute['new_id'] = $last_id;
        if ($atribute['locale'] == 'vi') {
            New_tran::create($atribute);
            $atribute['locale'] = 'en';
            $atribute['description'] = 'update tiếng anh cho tôi';
            $atribute['content'] = 'update tiếng anh cho tôi';
            New_tran::create($atribute);
        } else {
            New_tran::create($atribute);
            $atribute['locale'] = 'vi';
            $atribute['description'] = 'cập nhập tiếng việt cho tôi';
            $atribute['content'] = 'null';
            New_tran::create($atribute);
        }

        return redirect()->route('new.index');

    }

    public function edit($id)
    {
        $new_tran = New_tran::find($id);
        return view('back_end.forms.news.edit', compact('new_tran'));
    }

    public function update(Request $request, $id)
    {
        $atribute = $request->all();
        if ($request->hasFile('images')) {
            $image = base64_encode(file_get_contents($request->file("images")));
            $atribute['image'] = "data:image/jpg;base64," . $image;
        }

        $new_tran = New_tran::find($id);
        $new_tran->update($atribute);
//        dd($new_tran);

        return redirect(route('new.index'));
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

    public function destroy($id)
    {
        $new_tran = New_tran::find($id);
        $id_delete=$new_tran['new_id'];
        $new = News::find($id_delete);

        $new->delete();
        return redirect()->back();
    }
    public function show($id)
    {
        $new_tran = New_tran::findOrFail($id);
        return view('back_end.forms.news.view',compact('new_tran'));
    }

    public function show_deletad_at()
    {
        if (App::getLocale() == "en") {
            $kq = $this->getTranslation_deleted_at('en');
        } else {
            $kq = $this->getTranslation_deleted_at('vi');
        }

        return view('back_end.forms.news.deleted_at',compact('kq'));
    }

    public function restore($id)
    {
        $kq = New_tran::withTrashed()->find($id);
        $kq1 = New_tran::withTrashed()->find(($kq->id)+1);
        $kq->restore();
        $kq1->restore();

        return redirect()->route('new.index');
    }

    public function forceDelete($id)
    {
        $kq = New_tran::withTrashed()->find($id);
        $kq1 = New_tran::withTrashed()->find($id+1);
        $kq->forceDelete();
        $kq1->forceDelete();
        return redirect()->route('new.index');
    }
    public function view_deleted_at($id)
    {
        $new_tran = New_tran::withTrashed()->find($id);
        return view('back_end.forms.news.view',compact('new_tran'));
    }
}

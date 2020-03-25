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
                ['locale','=', 'vi'],
                ['status', '=', '1'],
            ])->orderBy('created_at', 'desc')->take(3)->get();
        } else {
            $product_trans = Product_trans::where([
                ['locale','=', 'en'],
                ['status', '=', '1'],
            ])->orderBy('created_at', 'desc')->take(3)->get();
        }
        return view('front_end.about',compact('product_trans'));
    }


    public function showCategory(Category_product_tran $category_product_tran)
    {
        if (App::getLocale() == "vi")
            return view('front_end.productlist', [
                'category_product_tran' => $category_product_tran,
                'cate_gory' => $category_product_tran->load(['product_trans' => function ($pro) {
                    $pro->where([
                        ['locale','=', 'vi'],
                        ['status', '=', '1'],
                    ]);
                }])
            ]);

        return view('front_end.productlist', [
                'category_product_tran' => $category_product_tran,
                'cate_gory' => $category_product_tran->load(['product_trans' => function ($pro) {
                    $pro->where([
                        ['locale','=', 'en'],
                        ['status', '=', '1'],
                    ]);
                }])
            ]);
    }


    public function showNew($id)
    {
        $category_new_tran = App\Category_new_tran::find($id);
        $name = $category_new_tran->name;
        $news = App\News::where('category_id', $category_new_tran->category_id)->get();
        $news1 = App\News::all();
        if (App::getLocale() == "vi") {
            $new_trans = App\New_tran::where('locale', 'vi')->get();
            $category_new_tran1 = App\Category_new_tran::where('locale','vi')->get();

        } else {
            $new_trans = App\New_tran::where('locale', 'en')->get();
            $category_new_tran1 = App\Category_new_tran::where('locale','en')->get();
        }
        return view('front_end.newlist', compact('new_trans', 'name', 'news','category_new_tran1','news1'));
    }

    public function showNewList($id)
    {
        $news1 = App\News::all();
        if (App::getLocale() == "vi") {
            $new_tran = App\New_tran::find($id);
            $image = $new_tran->image;$name1 = $new_tran->name;$descrip = $new_tran->description;$content = $new_tran->content;
            $category_new_tran1 = App\Category_new_tran::where('locale','vi')->get();
            $new_trans1 = App\New_tran::where('locale', 'vi')->get();
            foreach (App\Category_new_tran::all() as $category_new_tran)
                    if ($category_new_tran->category_id == App\News::find($new_tran->new_id)->category_id &&
                    $category_new_tran->locale == 'vi')
                    {$name = $category_new_tran->name;}
        } else {
            $new_tran = App\New_tran::find($id);
            $image = $new_tran->image;$name1 = $new_tran->name;$descrip = $new_tran->description;$content = $new_tran->content;
            $new_trans1 = App\New_tran::where('locale', 'en')->get();
            $category_new_tran1 = App\Category_new_tran::where('locale','en')->get();
            foreach (App\Category_new_tran::all() as $category_new_tran)

                    if ($category_new_tran->category_id == App\News::find($new_tran->new_id)->category_id
                        && $category_new_tran->locale == 'en')
                    {$name = $category_new_tran->name;

                    }
        }
        return view('front_end.showNewList', compact('new_tran', 'name','news1','new_trans1','category_new_tran1','image','name1','descrip','content'));
    }
    public function show_home()
    {

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

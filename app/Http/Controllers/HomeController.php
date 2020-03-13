<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('back_end.dashboard');
    }

    public function changeLanguage($language)
    {
        session(['language' => $language]);
        // App::setLocale('vi');
        return redirect()->back();
    }
}

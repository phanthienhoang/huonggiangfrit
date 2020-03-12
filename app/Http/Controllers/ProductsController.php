<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('back_end.tables.product');
    }

    public function create(){
        return view('back_end.forms.product');
    }
}
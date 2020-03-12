<?php

namespace App\Http\Controllers;

use App\Shareholder;
use Illuminate\Http\Request;

class ShareHoldersController extends Controller
{
    public function index()
    {
        $shareholders = Shareholder::all();

        return view('back_end.shareholders.shareholder', compact('shareholders'));
    }

    public function create()
    {
        return view('back_end.shareholders.create');
    }
}

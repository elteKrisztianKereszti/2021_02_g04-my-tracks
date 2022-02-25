<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransposerController extends Controller
{
    public function index()
    {
        return view('transposers/index');
    }
}

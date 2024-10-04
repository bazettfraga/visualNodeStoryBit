<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return 'First test!';
    }

    public function show($i)
    {
        return view('page', ['value' => $i]);
    }
}
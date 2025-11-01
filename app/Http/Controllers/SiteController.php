<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('site.home', []);
    }
}

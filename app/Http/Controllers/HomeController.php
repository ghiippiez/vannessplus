<?php

namespace VannessPlus\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');

    }
    public function calendar()
    {
        return view('calendar');
        
    }
    public function upload()
    {
        return view('upload');
        
    }
    public function create()
    {
        return view('create');
        
    }
 
    public function folder()
    {
        return view('folder');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Floor;
use Illuminate\Support\Facades\Auth;


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
        $floors = Floor::where('user_id', Auth::id())->get();


        
        return view('floors.index', compact('floors'));

    }
        // return view('home');



}

<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Profile;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_profile = Profile::where('id_user',auth()->user()->id)->get()->all();
        return view('home',compact('data_profile'));
    }
}

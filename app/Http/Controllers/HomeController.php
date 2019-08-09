<?php

namespace App\Http\Controllers;

use DB;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $result = DB::table('users')
            ->join('designations', 'designations.id', '=', 'designation_id')
            ->where('users.id', auth()->user()->designation_id)
            ->first();
        return view('dashboard', ['result' => $result]);
    }
}

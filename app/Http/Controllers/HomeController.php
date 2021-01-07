<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\guia;
use App\Models\gandola;

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

        $count_users = user::count();
        $count_guias = guia::count();
        $count_gandolas = gandola::count();

        return view('home', compact('count_users', 'count_guias', 'count_gandolas'));
    }
}

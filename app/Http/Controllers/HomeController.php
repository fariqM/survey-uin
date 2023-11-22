<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Survey;

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
        $survey = Survey::where('name', 'Form Survei Mitra Tridharma')->first();
        return view('home', compact('survey'));
    }
}

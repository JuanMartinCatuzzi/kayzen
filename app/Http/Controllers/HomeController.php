<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Modelo;

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
        return view('home');
    }
    public function inicio()
    {
      $marcas = Brand::all();
      $modelos = Modelo::all();
      //dd($modelos, $marcas);
        return view('home')->with('marcas', $marcas)->with('modelos', $modelos);
    }
}

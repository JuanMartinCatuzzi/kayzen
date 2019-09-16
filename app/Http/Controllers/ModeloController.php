<?php

namespace App\Http\Controllers;

use App\Modelo;
use App\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validation = $request->validate([
        'name'=> 'required | unique:brands,name',
        'description'=> 'required',
        'brand'=> 'required',
        'car_img'=>'required | image | mimes:jpeg,png,jpg | max:2048'
      ]);
      // dd($request);
      $marcas = Brand::all();
      $modelos = Modelo::all();
       $modelo = new Modelo;
       $modelo->name = $request->name;
       $modelo->description = $request->description;

       foreach ($marcas as $marca) {
         if ($request->brand == $marca->name) {
           $modelo->brand_id = $marca->id;
         }
       }

       $imagen = $request->file('car_img');
       $imagen_nombre = $request->name;
       $extension=$imagen->getClientOriginalExtension();
        // dd($extension);


       $request->car_img->storeAs('public/img', $imagen_nombre.'.'.$extension);
       $modelo->imagen = $imagen_nombre.'.'.$extension;



      $modelo->save();
      return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelo $modelo, $id)
    {
        $marcas = Brand::all();
        $modelo = Modelo::find($id);
        return view('editar-auto')->with('modelo', $modelo)->with('marcas', $marcas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelo $modelo, $id)
    {
      $marcas = Brand::all();
      $auto = Modelo::find($id);
      $auto->name = $request->name;
      $auto->description = $request->description;
      foreach ($marcas as $marca) {
        if ($request->brand == $marca->name) {
          $modelo->brand_id = $marca->id;
        }
      }
      Storage::delete($modelo->imagen);
      $imagen = $request->file('car_img');
      $imagen_nombre = $request->name;
      $extension=$imagen->getClientOriginalExtension();
       // dd($extension);


      $request->car_img->storeAs('public/img', $imagen_nombre.'.'.$extension);
      $auto->imagen = $imagen_nombre.'.'.$extension;
      $auto->save();
      return redirect('/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modelo $modelo, $id)
    {
        $auto = Modelo::find($id);
        // dd($auto->imagen);
         // dd($modelo->imagen);
        DB::table('modelos')->where('id', '=', $id)->delete();
        Storage::delete('public/img'.$auto->imagen);
        return redirect('/home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarantula;
use App\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class TarantulasController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('permission', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $shopping_cart = '';
        $mod = $request->mod ? $request->mod : 0;
        $tarantulas = Tarantula::all();
        return view('tarantulas.index', ['tarantulas' => $tarantulas, 'mod' => $mod]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tarantula = new Tarantula();
        return view('tarantulas.create', ['tarantula' => $tarantula]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($files=$request->file('image')){
            $name = $request->scientific_name.'.'.$files->getClientOriginalExtension();
            
            if($files->move(public_path('image/tarantulas'),$name)){

                $data = [
                    'common_name' => $request->common_name,
                    'scientific_name' => $request->scientific_name,
                    'size' => $request->size,
                    'price' => $request->price,
                    'gender' => $request->gender,
                    'classification' => $request->classification,
                    'image_url' => 'image/tarantulas/'.$name
                ];

                if(Tarantula::create($data)){
                    return redirect()->route('tarantulas.index')
                        ->with('success', 'Registro guardado correctamente');
                }else{
                    return view('tarantulas.create');
                }
            
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarantula = Tarantula::find($id);
        return view('tarantulas.show', ['tarantula' => $tarantula]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tarantula = Tarantula::find($id);
        return view('tarantulas.edit', ['tarantula' => $tarantula]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tarantula = Tarantula::find($id);

        if($files=$request->file('image')){
            if(file_exists(public_path($tarantula->image_url)))
                unlink(public_path($tarantula->image_url));

            $name = $request->scientific_name.'.'.$files->getClientOriginalExtension();
            if($files->move(public_path('image/tarantulas'),$name)){
                $tarantula->image_url = 'image/tarantulas/'.$name;
            }
        }

        $tarantula->common_name = $request->common_name;
        $tarantula->scientific_name = $request->scientific_name;
        $tarantula->size = $request->size;
        $tarantula->price = $request->price;
        $tarantula->gender = $request->gender;
        $tarantula->classification = $request->classification;

        if($tarantula->save()){
            return redirect()->route('tarantulas.index')
                        ->with('success', 'Registro actualizado correctamente');
        }else{
            return view('tarantulas.edit', ['tarantula' => $tarantula]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarantula = Tarantula::find($id);
        if(file_exists(public_path($tarantula->image_url)))
                unlink(public_path($tarantula->image_url));

        Tarantula::destroy($id);
        return redirect()->route('tarantulas.index')
                        ->with('success', 'Registro eliminado correctamente');
    }
}

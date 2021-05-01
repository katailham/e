<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie; 

class CategorieController extends Controller
{
    public function index() 
    { 
        $data =Categorie::paginate(10); 
        $tampil['data'] = $data; 
        return view("categorie.index", $tampil); 
    } 
    public function create() 
    { 
        return view("categorie.create"); 
    } 
    
    public function store(Request $request) 
    { 
            $this->validate($request, [ 
            'name' => 'required', 
            'description' => 'required' 
        ]); 
        $data = Categorie::create($request->all()); 
        return redirect()->route("categorie.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
    }
    public function show($kela) 
    { 
    // 
    } 
    
    public function edit($kela) 
    { 
        $data = Categorie::findOrFail($kela); 
            return view("categorie.edit", $data); 
        } 
    public function update(Request $request, $kela) 
    { 
    //validasi inputan 
        $this->validate($request, [ 
            'name' => 'required', 
            'description' => 'required' 
    ]); 
        $data = Categorie::findOrFail($kela); 
        $data->name = $request->name; 
        $data->description = $request->description; 
        $data->save(); 
        return redirect()->route("categorie.index")->with( 
            "success", 
            "Data berhasil diubah." 
        ); 
    } 
    
    public function destroy($kela) 
    { 
        $data = Categorie::findOrFail($kela); 
        $data->delete(); 
    } 
}

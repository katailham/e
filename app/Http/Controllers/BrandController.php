<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand; 

class BrandController extends Controller
{
    public function index() 
    { 
        $data =Brand::paginate(10); 
        $tampil['data'] = $data; 
        return view("brand.index", $tampil); 
    } 
    public function create() 
    { 
        return view("brand.create"); 
    } 
    
    public function store(Request $request) 
    { 
            $this->validate($request, [ 
            'name' => 'required', 
            'description' => 'required' 
        ]); 
        $data = Brand::create($request->all()); 
        return redirect()->route("brand.index")->with( 
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
        $data = Brand::findOrFail($kela); 
            return view("brand.edit", $data); 
        } 
    public function update(Request $request, $kela) 
    { 
    //validasi inputan 
        $this->validate($request, [ 
            'name' => 'required', 
            'description' => 'required' 
    ]); 
        $data = Brand::findOrFail($kela); 
        $data->name = $request->name; 
        $data->description = $request->description; 
        $data->save(); 
        return redirect()->route("brand.index")->with( 
            "success", 
            "Data berhasil diubah." 
        ); 
    } 
    
    public function destroy($kela) 
    { 
        $data = Brand::findOrFail($kela); 
        $data->delete(); 
    } 
}

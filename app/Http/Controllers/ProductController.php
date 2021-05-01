<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Product; 
use App\Models\Brand; 
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;
use Hash; 

class ProductController extends Controller
{
    public function index() 
    { 
        $data =Product::paginate(10); 
        $categorie = Categorie::all();
        $brand = Brand::all();
        foreach ($data as $item) { 
            $item->brand = Brand::find($item->brands_id); 
            $item->categorie = Categorie::find($item->categories_id);  
        } 
        $tampil['data'] = $data; 

        return view("product.index", compact('data', 'categorie', 'brand'));
    } 

    public function create() 
    { 

        $data['brand'] = Brand::get(); 
        $data['categorie'] = Categorie::get(); 
        return view("product.create",$data); 
    } 

    public function store(Request $request) 
    { 
        $product = new Product;

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();

            $filename = 'photo_barang_'.time().'.'.$extension;

            $request->file('photo')->storeAs(
                'public/photo_barang', $filename
            );

            $product->photo = $filename;
        }

        $product->name = $request->get('name');
        $product->categories_id = $request->get('categories_id');
        $product->brands_id = $request->get('brands_id');
        $product->harga = $request->get('harga');
        $product->qty = $request->get('qty');
        
        $product->save();
        return redirect()->route("product.index")->with( 
            "success", 
            "Data berhasil disimpan." 
        ); 
 } 
    public function show($product) 
    { 
    // 
    } 

    public function edit($product) 
    { 
        $data = Product::findOrFail($product); 
        $data->brand = Brand::get(); 
        $data->categorie = categorie::get(); 

        return view("product.edit", $data); 
    } 
    public function update(Request $request, $product) 
    { 
        $product = Product::findOrFail($product); 
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();

            $filename = 'photo_barang_'.time().'.'.$extension;

            $request->file('photo')->storeAs(
                'public/photo_barang', $filename
            );

            Storage::delete('public/photo_barang/'.$request->get('old_photo'));

            $product->photo = $filename;
        }
        $product->name = $request->get('name');
        $product->categories_id = $request->get('categories_id');
        $product->brands_id = $request->get('brands_id');
        $product->harga = $request->get('harga');
        $product->qty = $request->get('qty');

        

        $product->save();
        
        return redirect()->route("product.index")->with( 
        "success", 
        "Data berhasil diubah." 
    ); 
    } 
    
    public function destroy($product) 
    { 
        $dataProduct = Product::findOrFail($product); 
        $dataProduct->delete(); 
    } 

    public function laporanmasuk() 
    { 
        $data = Product::paginate(10); 
        foreach ($data as $item) { 
            $item->product = Product::find($item->id); 
            $item->brand = Brand::find($item->id); 
            $item->Categorie = categorie::find($item->id); 
        } 
        $tampil['data'] = $data; 
        return view("product.laporanmasuk", $tampil);
    } 
}

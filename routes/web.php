<?php

use Illuminate\Http\Request;
use App\Models\Product;

Route::get('products',function(){
    return view('products.index');
})->name('products.index'); //Nombre de la ruta para usarla en html

Route::get('products/create',function(){
    return view('products.create');
})->name('products.create');

Route::post('products',function(Request $request){    
    $newProduct = new Product;
    //campo de la bd = campo del formulario
    $newProduct->description = $request->input('description');
    $newProduct->price = $request->input('price');
    $newProduct->save(); // guardar productos
     
    //redireccionar a otra ruta
    return redirect()->route('products.index');

})->name('products.store');//almacenar registros
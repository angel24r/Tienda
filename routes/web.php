<?php

use Illuminate\Http\Request;

Route::get('products',function(){
    return view('products.index');
})->name('products.index');

Route::get('products/create',function(){
    return view('products.create');
})->name('products.create');

Route::post('products',function(Request $request){
    return $request->all();
})->name('products.store');//almacenar registros
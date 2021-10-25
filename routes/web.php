<?php

Route::get('products',function(){
    return view('products.index');
})->name('products.index');

Route::get('products/create',function(){
    return view('products.create');
})->name('products.create');//almacenar registros
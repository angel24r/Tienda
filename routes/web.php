<?php

use Illuminate\Http\Request;
use App\Models\Product;

Route::middleware('auth')->group(function(){

    Route::get('products',function(){
        $products = Product::orderBy('created_at','desc')->get();
        
        return view('products.index', compact('products'));
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
        //redireccionar a otra ruta with(nombrevariable,mensaje)
        return redirect()->route('products.index')->with('info','Producto creado exitosamente');
    })->name('products.store');//almacenar registros
    
    Route::delete('products/{id}',function($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('info','Producto eliminado exitosamente');
    })->name('products.destroy');
    
    Route::get('products/{id}/edit',function($id){
        $product = Product::findOrFail($id);
    
        return view('products.edit', compact('product'));
    })->name('products.edit');
    
    Route::put('/products/{id}', function(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
        return redirect()->route('products.index')->with('info','Producto actualizado exitosamente');
    })->name('products.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

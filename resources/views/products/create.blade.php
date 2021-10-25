@extends('layouts.main')    
@section('contenido')
    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Crear Producto                        
                    </div>
                    <div class="card-body">
                        <!-- en el action se pone la ruta del post y se elige el metodo-->
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="number" class="form-control" name="price">
                            </div>
                            <button type="submit" class="btn btn-primary"> Guardar</button>
                            <!-- Ruta a la que redireccionara-->
                            <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
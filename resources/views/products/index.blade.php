<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container"><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Productos
                        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo producto</a>
                    </div>
                    <div class="card-body">
                        <!--if es una funcion de blade, seleccionamos el nombre de la variable del with
                        si existe lo muestra-->
                        @if(session('info'))
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Accion</th>
                            </thead>                           
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{ $product->description}}
                                    </td>
                                    <td>
                                        {{ $product->price}}
                                    </td>
                                    <td>
                                        <a href="javascript: document.getElementById('delete-{{ $product->id }}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
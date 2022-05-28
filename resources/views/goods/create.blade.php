<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        crear articulos
                        <a href="" class="btn btn-success btn-sm float-right">Agregar</a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('goods.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Codigo</label>
                                <input type="number" class="form-control" name="codigo">
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo:</label>
                                <select name="tipo" id="tipo" class="form-select" aria-label="Default select example">
                                    <option selected>Seleccione el tipo de articulo:</option>
                                    <option value="escritorio">utiles de escritorio</option>
                                    <option value="limpieza">limpieza</option>
                                    <option value="herramienta">herramientas</option>
                                    <option value="red">red</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Marca</label>
                                <input type="text" class="form-control" name="marca">
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion</label>
                                <input type="text" class="form-control" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="number" class="form-control" name="stock">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{route('goods.index')}}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
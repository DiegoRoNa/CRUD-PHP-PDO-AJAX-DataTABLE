
<!DOCTYPE html>
<html lang="es">
<head>
    
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="css/estilos.css">

    <title>CRUD</title>
  </head>
  <body>
    <div class="container fondo">
        <h1 class="text-center">CRUD con PHP, PDO, AJAX y DataTables</h1>

        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                    <button type="button" id="botonCrear" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario">
                        <i class="bi bi-plus-circle-fill"></i> Crear
                    </button>
                </div>
            </div>
        </div>

        <br>
        <br>

        <div class="table-responsive">
            <table id="datos_usuario" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Imagen</th>
                        <th>Fecha de creación</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" action="" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-md-right" for="nombre">Ingresa el nombre</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="nombre" id="nombre" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-md-right" for="apellidos">Ingresa los apellidos</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="apellidos" id="apellidos" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-md-right" for="telefono">Ingresa el teléfono</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="telefono" id="telefono" required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-md-right" for="email">Ingresa el email</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                            </div>
                            <br>

                            <label class="col-form-label text-md-right" for="imagen_usuario">Selecciona una imagen</label>
                            <input type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">
                            <br>
                            <span id="imagen_subida"></span>
                        </div>

                        <div class="modal-footer">
                            <input type="hidden" name="id_usuario" id="id_usuario">
                            <input type="hidden" name="operacion" id="operacion">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <input type="submit" name="action" id="action" class="btn btn-success" value="Guardar">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script type="text/javascript" src="main.js"></script>
   
  </body>
</html>
<?php 

function subir_imagen(){
    if (isset($_FILES['imagen_usuario'])) {
        
        $extension = explode('.', $_FILES['imagen_usuario']['name']);
        $nuevo_nombre = rand().'.'.$extension[1];
        $ubicacion = './img/'.$nuevo_nombre;
        move_uploaded_file($_FILES['imagen_usuario']['tmp_name'], $ubicacion);
        return $nuevo_nombre;
    }
}

function obtener_nombre_imagen($id){
    include 'conexion.php';

    $sql = "SELECT imagen FROM usuarios WHERE id = $id;";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    $imagenes = $stmt->fetchAll();
    foreach($imagenes as $imagen){
        return $imagen['imagen'];
    }
}

function obtener_registros(){
    include 'conexion.php';

    $sql = "SELECT * FROM usuarios;";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();

    $registros = $stmt->fetchAll();

    return $stmt->rowCount();
}

?>

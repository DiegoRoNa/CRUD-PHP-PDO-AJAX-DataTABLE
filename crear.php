<?php 

require_once 'conexion.php';
require_once 'funciones.php';

if ($_POST["operacion"] == "Crear") {
    $imagen = '';
    if ($_FILES["imagen_usuario"]["name"] != '') {
        $imagen = subir_imagen();
    }
    $stmt = $conexion->prepare("INSERT INTO usuarios(nombre, apellidos, telefono, email, imagen)VALUES(:nombre, :apellidos, :telefono, :email, :imagen)");

    $resultado = $stmt->execute(
        array(
            ':nombre'    => $_POST["nombre"],
            ':apellidos'    => $_POST["apellidos"],
            ':telefono'    => $_POST["telefono"],
            ':email'    => $_POST["email"],
            ':imagen'    => $imagen
        )
    );

    if (!empty($resultado)) {
        echo 'Registro creado';
    }
}



if ($_POST["operacion"] == "Editar") {
    $imagen = '';
    if ($_FILES["imagen_usuario"]["name"] != '') {
        $imagen = subir_imagen();
    }else{
        $imagen = $_POST["imagen_usuario_oculta"];
    }


    $stmt = $conexion->prepare("UPDATE usuarios SET nombre=:nombre, apellidos=:apellidos, telefono=:telefono, email=:email, imagen=:imagen WHERE id = :id");

    $resultado = $stmt->execute(
        array(
            ':nombre'    => $_POST["nombre"],
            ':apellidos'    => $_POST["apellidos"],
            ':telefono'    => $_POST["telefono"],
            ':email'    => $_POST["email"],
            ':imagen'    => $imagen,
            ':id'    => $_POST["id_usuario"]
        )
    );

    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Módulo de inserción</h1>
        <hr>
        <form action="" method="post">
            Ingrese Nombre <br>
            <input type="text" name="txtNom"> <br>
            Ingrese Apelllidos <br>
            <input type="text" name="txtApe"> <br>
            Ingrese dni <br>
            <input type="text" name="txtDni"> <br>
            Ingrese Celular <br>
            <input type="text" name="txtCel"> <br>
            Ingrese Direccion <br>
            <input type="text" name="txtDir"> <br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
<?php
    require 'conexion.php';
    if($_POST){
        $nom=$_POST['txtNom'];
        $des=$_POST['txtApe'];
        $dni=$_POST['txtDni'];
        $cel=$_POST['txtCel'];
        $dir=$_POST['txtDir'];
        $sql="INSERT INTO CLIENTE (NOMBRE, APELLIDOS, DNI, CELULAR, DIRECCION) VALUES (:MON, :APE, :DNI, :CEL, :DIR);";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":MON",$nom);
        $ps->bindParam(":APE",$des);
        $ps->bindParam(":DNI",$dni);
        $ps->bindParam(":CEL",$cel);
        $ps->bindParam(":DIR",$dir);
        $ps->execute();
        header('Location: cargarclientes.php');
    }
?>
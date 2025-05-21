<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            require 'conexion.php';
            $idcli=$_GET['idcli'];
            $sql='select * from cliente where idcliente=:idcli';
            $ps=$cn->prepare($sql);
            $ps->bindParam(':idcli', $idcli);
            $ps->execute();
            $fila=$ps->fetch(); 
        ?>
        <h1>Módulo de Modificación</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="txtIdcli" value="<?=$fila[0]?>">
            Ingrese Nombre <br>
            <input type="text" name="txtNom" value="<?=$fila[1]?>"> <br>
            Ingrese Apellidos <br>
            <input type="text" name="txtApe" value="<?=$fila[2]?>"> <br>
            Ingrese dni <br>
            <input type="text" name="txtDni" value="<?=$fila[3]?>"> <br>
            Ingrese Celular <br>
            <input type="text" name="txtCel" value="<?=$fila[4]?>"> <br>
            Ingrese Direccion <br>
            <input type="text" name="txtDir" value="<?=$fila[5]?>"> <br>
            <input type="submit" value="Modificar">
        </form>
    </div>
</body>
</html>
<?php
    if($_POST){
        $idcli=$_POST['txtIdcli'];
        $nom=$_POST['txtNom'];
        $des=$_POST['txtApe'];
        $dni=$_POST['txtDni'];
        $cel=$_POST['txtCel'];
        $dir=$_POST['txtDir'];
        $sql="update cliente set nombre=:nom, apellidos=:ape, dni=:dni, celular=:cel, direccion=:dir where idcliente=:idcli";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":nom",$nom);
        $ps->bindParam(":ape",$des);
        $ps->bindParam(":dni",$dni);
        $ps->bindParam(":cel",$cel);
        $ps->bindParam(":dir",$dir);
        $ps->bindParam(":idcli",$idcli);
        $ps->execute();
        header('Location: cargarclientes.php');
    }
?>
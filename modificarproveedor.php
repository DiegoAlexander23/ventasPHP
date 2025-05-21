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
            $idpro=$_GET['idpro'];
            $sql='select * from proveedor where idproveedor=:idpro';
            $ps=$cn->prepare($sql);
            $ps->bindParam(':idpro', $idpro);
            $ps->execute();
            $fila=$ps->fetch(); 
        ?>
        <h1>Módulo de Modificación</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="txtIdPro" value="<?=$fila[0]?>">
            Ingrese Nombre <br>
            <input type="text" name="txtNom" value="<?=$fila[1]?>"> <br>
            Ingrese Ruc <br>
            <input type="text" name="txtRuc" value="<?=$fila[2]?>"> <br>
            <input type="submit" value="Modificar">
        </form>
    </div>
</body>
</html>
<?php
    if($_POST){
        $idpro=$_POST['txtIdPro'];
        $nom=$_POST['txtNom'];
        $ruc=$_POST['txtRuc'];
        $sql="update proveedor set nombre=:nom, ruc=:ruc where idproveedor=:idpro";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":nom",$nom);
        $ps->bindParam(":ruc",$ruc);
        $ps->bindParam(":idpro",$idpro);
        $ps->execute();
        header('Location: cargarproveedores.php');
    }
?>
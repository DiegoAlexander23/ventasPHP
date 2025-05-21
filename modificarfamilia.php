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
            $idfam=$_GET['idfam'];
            $sql='select * from familia where idfamilia=:idfam';
            $ps=$cn->prepare($sql);
            $ps->bindParam(':idfam', $idfam);
            $ps->execute();
            $fila=$ps->fetch(); 
        ?>
        <h1>Módulo de Modificación</h1>
        <hr>
        <form action="" method="post">
            <input type="hidden" name="txtIdFam" value="<?=$fila[0]?>">
            Ingrese Nombre <br>
            <input type="text" name="txtNom" value="<?=$fila[1]?>"> <br>
            Ingrese Descripción <br>
            <input type="text" name="txtDes" value="<?=$fila[2]?>"> <br>
            <input type="submit" value="Modificar">
        </form>
    </div>
</body>
</html>
<?php
    if($_POST){
        $idfam=$_POST['txtIdFam'];
        $nom=$_POST['txtNom'];
        $des=$_POST['txtDes'];
        $sql="update familia set nombre=:nom, descripcion=:des where idfamilia=:idfam";
        $ps=$cn->prepare($sql);
        $ps->bindParam(":nom",$nom);
        $ps->bindParam(":des",$des);
        $ps->bindParam(":idfam",$idfam);
        $ps->execute();
        header('Location: cargarfamilias.php');
    }
?>
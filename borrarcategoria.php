<?php
    require 'conexion.php';
    $idcat=$_GET['idcat'];
    $sql="delete from categoria where idcategoria=:idcat";
    $ps=$cn->prepare($sql);
    $ps->bindParam(":idcat",$idcat);
    $ps->execute();
    header('Location: cargarcategorias.php');
?>
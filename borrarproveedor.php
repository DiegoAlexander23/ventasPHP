<?php
    require 'conexion.php';
    $idpro=$_GET['idpro'];
    $sql="delete from proveedor where idproveedor=:idpro";
    $ps=$cn->prepare($sql);
    $ps->bindParam(":idpro",$idpro);
    $ps->execute();
    header('Location: cargarproveedores.php');
?>
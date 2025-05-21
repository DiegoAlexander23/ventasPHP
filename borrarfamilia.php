<?php
    require 'conexion.php';
    $idfam=$_GET['idfam'];
    $sql="delete from familia where idfamilia=:idfam";
    $ps=$cn->prepare($sql);
    $ps->bindParam(":idfam",$idfam);
    $ps->execute();
    header('Location: cargarfamilias.php');
?>
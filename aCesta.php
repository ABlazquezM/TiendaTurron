<?php

    $conexion = mysqli_connect("localhost","root","","TiendaTurTur") or die("La conexión ha fallado");
    $conexion -> set_charset("utf8");

   
    $consulta = "call TiendaTurTur.aCesta('".$_POST['nombre']."','".$_POST['precio']."')";

    mysqli_query($conexion,$consulta);

    mysqli_close($conexion);

    header("refresh:0;index.php");





?>
<?php

    $conexion = mysqli_connect("localhost","root","","TiendaTurTur") or die("La conexión ha fallado");
    $conexion -> set_charset("utf8");

   
    $consulta = "call vaciarCesta();";

    mysqli_query($conexion,$consulta);

    mysqli_close($conexion);

    header("refresh:0;index.php");





?>
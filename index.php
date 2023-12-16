<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<head>
    <title>Mi página con cabecera</title>
    <style>
        /* Estilos para el cuerpo de la página */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilos para la cabecera */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        header p {
            margin: 0;
            font-size: 14px;
        }

        /* Estilos para el div de la tienda de turrones */
        .tienda-turron {
            background-image: url("fondo.jpg");
            background-size: cover;
            padding: 50px;
            text-align: center;
            filter: grayscale(100%);
        }

        .tienda-turron h2 {
            margin: 0;
            font-size: 50px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 1);
            -webkit-text-stroke: 2px black;
            -webkit-text-fill-color: whitesmoke;
        }

        .tienda-turron p {
            font-size: 18px;
            color: #666;
        }


        .contenido {
            width: 85%;
            margin: 0 auto;
            font-family: 'Montserrat', sans-serif;
            /*centra las cosas*/
        }

        .col-7 {
            width: 70%;
            float: left;
            /* Permite que los elementos se coloquen en línea horizontal */
        }

        .col-3 {
            width: 30%;
            float: left;
        }


        .cuadrado {
            align-items: center;
            justify-content: center;
            width: 250px;
            height: 150px;
            border: 1px solid #000;
            margin: 10px;
            display: inline-block;
            vertical-align: top;
            background-color: yellow;
            justify-content: center;
            align-items: center;
            text-align: center;

        }



        .nombre {
            font-weight: bold;
            color: ;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 1);
            margin-top: 10px;
        }

        .precio {
            color: blue;
            margin-top: 10px;

        }
        .boton button {
            background-color: #FA8072;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        


        .cuadrado:nth-child(2n+1) {
            background-color: #dcdcdc;
        }

        .cuadrado:nth-child(2n) {
            background-color: #f8f8f8;
        }

        .row {
            clear: both;
        }

        .cestaTitulo {
            background-color: #FFDAB9;
            padding: 9px;
            margin-bottom: 20px;
            margin-top: 10px;
            border-radius: 5px;
            width: 64%;
            height: auto;
            text-align: center;

        }

        .Cesta {
            background-color: #f2f2f2;
            padding: 9px;
            margin-bottom: 20px;
            border-radius: 5px;
            width: 40%;
            height: auto;
            text-align: center;
            margin-left: 50px;
        }

        .botonnn{
            margin-left: 57px;
        }
        .botonn {
            margin-left: 67px;

        }

        .vaciar-cesta-btn {
            font-family: 'Montserrat', sans-serif;
            background-color: #FFEFD5;
            /* Cambia el color aquí */
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .vaciar-cesta-btn:hover {
            background-color: #f2f2f2;
        }

        .campos{
            margin-top: 10px;
        }

        .hacerPedido-btn {
            font-family: 'Montserrat', sans-serif;
            background-color:#FA8072;
            margin-bottom: 5px;
            margin-top: 10px;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .hacerPedido-btn:hover {
            background-color: #FFDAB9;
        }

    </style>
</head>

<body>
    <div clas="container">
        <div class="row">
            <header>
                <h1>¡Haz tu pedido!</h1>
                <p>Envío gratuíto a partir de 35€</p>
            </header>

            <div class="tienda-turron">
                <h2>La tiendecita de Turrón</h2>
                <p>Encontrarás todo lo necesario para tu mascota</p>
            </div>
        </div>
        <div class="row">
            <div class="contenido">
                <div class="col-7">

                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "TiendaTurTur") or die("La conexión ha fallado");
                    $conexion->set_charset("utf8");

                    $consulta = "SELECT * FROM articulos";
                    $resultado = mysqli_query($conexion, $consulta);

                    if ($resultado->num_rows > 0) {
                        $contador = 0; // Contador para controlar las filas
                    
                        // Recorre los registros y muestra los divs
                        while ($registro = $resultado->fetch_assoc()) {
                            if ($contador % 3 == 0) {
                                // Comienza una nueva fila
                                echo "<div class='row'>";
                            }

                            // Crea un div cuadrado para cada registro
                            echo "<div class='cuadrado'>";
                            echo '<form action="aCesta.php" method="post" enctype="multipart/form-data">';
                            echo '<div class="nombre">';
                            echo '<label for="nombre">' . $registro["nombre"] . '</label>';
                            echo '<input type="text" id="nombre" name="nombre" value="' . $registro["nombre"] . '" style="display: none">';
                            echo '</div>';

                            echo '<div class="precio">';
                            echo '<label for="precio">' . $registro["precio"] . '</label>';
                            echo '<input type="text" id="precio" name="precio" value="' . $registro["precio"] . '" style="display: none">';
                            echo '</div>';

                            echo '<div class="boton">';
                            echo '<button type="submit">Añadir</button>';
                            echo '</div>';

                            echo '</form>';
                            echo "</div>";

                            if ($contador % 3 == 2) {
                                // Cierra la fila
                                echo "</div>";
                            }

                            $contador++;
                        }

                        // Si el último div no completó una fila, cierra la fila aquí
                        if ($contador % 3 != 0) {
                            echo "</div>";
                        }
                    } else {
                        echo "No se encontraron registros en la tabla 'articulos'.";
                    }
                    ?>


                </div>
                <div class="col-3">
                   
                
                <div class="cestaTitulo">CESTA</div>

<div class="row">
    <?php

    $conexion = mysqli_connect("localhost", "root", "", "TiendaTurTur") or die("La conexión ha fallado");
    $conexion->set_charset("utf8");


    $consulta = "SELECT * FROM cesta";
    $resultado = mysqli_query($conexion, $consulta);


    while ($registro = mysqli_fetch_assoc($resultado)) {

        echo '<form action="eliminarAticulo.php" method="post">';
        echo '<div class="Cesta">';
        echo '<label for="nombre">' . $registro["nombre"] . '</label>';
        echo '<input type="text" id="nombre" name="nombre" value="' . $registro["nombre"] . '" style="display: none">';
        echo '<input type="text" id=cod" name="cod" value="' . $registro["codigo"] . '" style="display: none">';
        echo '<button type="submit" class="eliminar">Eliminar</button>';
        echo '</div>';
        echo '</form>';
    }


    $conexion->close();
    ?>
</div>



<?php
$conexion = mysqli_connect("localhost", "root", "", "TiendaTurTur") or die("La conexión ha fallado");

$consulta = "SELECT ROUND(SUM(precio),2) AS total FROM cesta";
$consulta2 ="SELECT COUNT(*) FROM cesta";
$resultado = mysqli_query($conexion, $consulta);
$resultado2= mysqli_query($conexion, $consulta2);
$envio = 3.5;

$total = 0;
if ($registro = mysqli_fetch_array($resultado)) {
    $total = $registro[0];
}

$numArt = 0;
if ($registro = mysqli_fetch_array($resultado2)) {
    $numArt = $registro[0];
}

if ($total>35){
    $envio = 0;
}

mysqli_close($conexion);
?>

<div class="total">
    Total:
    <span>
    <?php echo $total; ?> </span>
    €
</div>

<div class="total">
    Numero de articulos:
    <span>
    <?php echo $numArt; ?> </span>
    
</div>

<form action="pedido.php" method="post">
<div class="campos">
                <label for="dir">Introduce dirección de envio:</label>
                <textarea type="text" id="dir" name="dir"  required></textarea>
            </div>
<div class="botonnn">
    
    
        <button type="submit" class="hacerPedido-btn">Realizar pedido</button>
        <input type="text" id="precio" name="precio" value="<?php echo $total; ?>"  style="display: none">
        <input type="text" id="cant" name="cant" value="<?php echo $numArt; ?>"  style="display: none">
    </form>
</div>

<p>Gatos de envío: <?php echo $envio; ?> €</p>

<div class="botonn">
    <form action="vaciarCesta.php" method="post">
        <button type="submit" class="vaciar-cesta-btn">Vaciar Cesta</button>
    </form>
</div>



                </div>
            </div>

        </div>

    </div>

</body>

</html>
<!-- 

Programa: Pokedex - Buscador de Pokemones de 
primera generacion en su estado base.

Creado por: JOVEN JIMENEZ ANGEL CRISTIAN
SISTEMAS DE INFORMACION | 1758 

-->

<?php

// Creamos nuevas variables para poder escribir 
// ahi nuestras credenciales de MySQL/MariaDB/PHPMyAdmin

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pokedex";

// Creamos la conexion en base a los datos ingresados
$conexion_sql = new mysqli($servername, $username, $password, $dbname);

// Checamos con este if si sale algun error de conexion.
// Si es asi, se imprime el error de conexion.
if ($conexion_sql->connect_error) {
    die("Error de conexión: " . $conexion_sql->connect_error);
}
?>
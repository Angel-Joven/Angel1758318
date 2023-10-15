<!-- 

Programa: Pokedex - Buscador de Pokemones de 
primera generacion en su estado base.

Creado por: JOVEN JIMENEZ ANGEL CRISTIAN
SISTEMAS DE INFORMACION | 1758 

-->

<!-- 

Aqui estara toda la logica de funcionamiento
del formulario de la Pokedex.

-->


<?php

// Incluimos nuestro 'head.php' y nuestro archivo
// 'conexion.php' 

include 'php/conexion.php';
include 'php/head.php';

// Creamos nuevas variables para almacenar la informacion
// ingresada por el usuario en el formulario

$nombre = $_POST['nombre'];
$tipoElemental1 = $_POST['tipoElemental1'];
$tipoElemental2 = $_POST['tipoElemental2'];
$habitat = $_POST['habitat'];
$color = $_POST['color'];

// Verificamos que exista el boton con el nombre 'verLista'
// Si existe, entonces ejecuta una consulta sql en donde
// va a mostrar todas las columnas existentes de la tabla
// 'primerageneracion_base'

if (isset($_POST['verLista'])) {
    $sql = "SELECT * FROM primerageneracion_base";
    $resultadoConsulta = $conexion_sql->query($sql);
}

// Verificamos que exista el boton con el nombre 'enviar'
// Si existe, entonces ejecuta una consulta sql de acuerdo
// a lo que ingreso el usuario en el formulario.

// Buscara en la tabla 'primerageneracion_base' dicha informacion
// ingresada por el usuario y le va a devolver toda la fila (o filas)
// la informacion de acuerdo al pokemon (o pokemones) que necesita
// saber el usuario.

if (isset($_POST['enviar'])){

    $sql = "SELECT * FROM primerageneracion_base WHERE";

    if (!empty($nombre)) {

        // Esta consulta solamente mostraba al usuario informacion 
        // siempre y cuando el ingresara el nombre completo del pokemon.

        // Esto fue descartado, ahora el usuario puede obtener la informacion
        // sin necesidad de escribir el nombre completo del pokemon.

        // $sql .= " Nombre = '$nombre' AND";

        $sql .= " Nombre LIKE '$nombre%' AND";
    }
    
    if (!empty($tipoElemental1)) {

        // Esta consulta solamente mostraba al usuario informacion 
        // siempre y cuando el ingresara el tipo elemental 1 completo del pokemon.

        // Esto fue descartado, ahora el usuario puede obtener la informacion
        // sin necesidad de escribir el tipo elemental 1 completo del pokemon.

        // $sql .= " TipoElemental1 = '$tipoElemental1' AND";

        $sql .= " TipoElemental1 LIKE '$tipoElemental1%' AND";
    }
    
    if (!empty($tipoElemental2)) {

        // Esta consulta solamente mostraba al usuario informacion 
        // siempre y cuando el ingresara el tipo elemental 2 completo del pokemon.

        // Esto fue descartado, ahora el usuario puede obtener la informacion
        // sin necesidad de escribir el tipo elemental 2 completo del pokemon.

        // $sql .= " TipoElemental2 = '$tipoElemental2' AND";

        $sql .= " TipoElemental2 LIKE '$tipoElemental2%' AND";
    }
    
    if (!empty($habitat)) {

        // Esta consulta solamente mostraba al usuario informacion 
        // siempre y cuando el ingresara el nombre del habitat completo del pokemon.

        // Esto fue descartado, ahora el usuario puede obtener la informacion
        // sin necesidad de escribir el nombre del habitat completo del pokemon.

        // $sql .= " Habitat = '$habitat' AND";

        $sql .= " Habitat LIKE '$habitat%' AND";
    }
    
    if (!empty($color)) {

        // Esta consulta solamente mostraba al usuario informacion 
        // siempre y cuando el ingresara el nombre del color completo del pokemon.

        // Esto fue descartado, ahora el usuario puede obtener la informacion
        // sin necesidad de escribir el nombre del color completo del pokemon.

        // $sql .= " ColorPokemon = '$color' AND";

        $sql .= " ColorPokemon LIKE '$color%' AND";
    }

    // En este ultimo if, si el usuario no ingresa 
    // informacion en todas las celdas del formulario,
    // se hara una consulta sql a una ID que no existe,
    // esto con el fin de mostrar al usuario que no se
    // encontraron resultados debido a que no ingreso
    // informacion en dichas celdas.

    if (empty($nombre) and empty($tipoElemental1) and empty($tipoElemental2) and empty($habitat) and empty($color)) {
        $sql = "SELECT * FROM primerageneracion_base WHERE ID = 9999999";
    }

    // Teniamos la concatenacion del 'AND' en nuestras consultas.
    // Esto se hacia porque el usuario podria ingresar informacion en varias celdas,
    // por lo que se tenia que concatenar con un 'AND' nuestra consulta sql.

    // Ahora que el usuario ya no va a ingresar mas informacion
    // en las demas celdas del formulario o que las celdas ya estaban llenas
    // de informacion, se procede a eliminar esta concatenacion.

    $sql = rtrim($sql, " AND");

}

// Ordenamos la informacion en base al nombre del
// pokemon en forma ascendente
$sql .= " ORDER BY Nombre ASC";

// Aqui es donde se va a ejecutar la consulta sql
$resultadoConsulta = $conexion_sql->query($sql);

// Con ayuda de un 'echo', creamos nuestro body de
// nuestra pagina web.

// En el segundo 'echo', le mostramos al usuario la 
// informacion que ingreso en las celdas del formulario.

// En el tercer 'echo', es mas de mostrar al usuario o avisarle
// que con base a la informacion que ingreso en las celdas del formulario,
// su resultado de la busqueda sera la siguiente.

echo "<body>
        <section>
            <div>
                <h1>Pokedex</h1>
                <h1>Buscador de Pokemones de primera generacion en su estado base</h1>
                <hr>
                <h1>Resultado de la Busqueda</h1>
            </div>
        </section>";

echo "<section>
        <div>
            <p>Usted ingreso lo siguiente:
            <br>
            <br>
            <strong>Nombre:</strong> $nombre
            <br>
            <strong>Primer tipo elemental:</strong> $tipoElemental1
            <br>
            <strong>Segundo tipo elemental:</strong> $tipoElemental2
            <br>
            <strong>Habitat:</strong> $habitat
            <br>
            <strong>Color del Pokemon:</strong> $color
            <br>
            </p>
        </div>
    </section>";

echo "<section>
    <div>
        <p>Por lo que el resultado de su busqueda es:</p>
        <br>
    </div>
</section>";


// Antes de mostrarle al usuario el resultado de la consulta sql,
// nos aseguramos si dicha consulta proporciona mas de 0 filas, es decir,
// que nos proporcione al menos 1 resultado valido.

// Si esto es verdadero, entonces empieza a construir con ayuda de un 'echo'
// nuestra tabla. 

// Si esto es falso, entonces le mostrara al usuario que no se encontraron
// resultados

if ($resultadoConsulta->num_rows > 0) {
    echo "<section>
        <div>
            <table border='0px'>
                <thead>
                    <tr>
                        <th>Imagen del Pokemon</th>
                        <th>Nombre del Pokemon</th>
                        <th>Primer tipo elemental</th>
                        <th>Segundo tipo elemental</th>
                        <th>Habitat</th>
                        <th>Color del Pokemon</th>
                    </tr>
                </thead>";

    // Con ayuda de un 'while', va a iterar/mostrar todos los
    // resultados existentes de nuestra consulta sql.

    // Mientras hace esto, con ayuda de una api que busque en Github 
    // (https://github.com/PokeAPI/pokeapi/blob/master/data/v2/csv/pokemon.csv)

    // y que esta desplegada en internet,
    // (https://pokeapi.co/)

    // se obtienen las imagenes de los pokemones en base al nombre que le guardamos
    // dentro de nuestra base de datos en la tabla 'primerageneracion_base'.

    // Guardamos en una variable nueva el nombre de dichos pokemones obtenidos
    // de la tabla 'primerageneracion_base' con ayuda de la informacion proporcionada del usuario,
    // despues en otra variable le asignamos la url de la API y le concatenamos el nombre de los 
    // pokemones previamente obtenidos. 

    // Hacemos una solicitud a dicha url con el fin de obtener el .json y lo leemos.
    // Buscamos entre los elementos del json lo siguiente:

    // 'sprites' -> 'other' -> 'official-artwork' -> 'front_default'

    // Es ahi donde se guarda una URL en donde contiene la imagen del pokemon.
    // Iteramos esto de acuerdo a los nombres que nos arrojara la consulta sql.

    while ($celdaInfo = $resultadoConsulta->fetch_assoc()) {

        // Esta variable buscaba la imagen guardada localmente en base
        // al nombre (o nombres) del pokemon proporcionado de nuestra consulta sql.
        // $imagenNombre = strtolower($celdaInfo["Nombre"]) . ".png";

        $imagenNombre_Pokeapi = strtolower($celdaInfo["Nombre"]);
        $imagenURL_Pokeapi = "https://pokeapi.co/api/v2/pokemon/$imagenNombre_Pokeapi";

        // Solicitud a la API para obtener el json
        $infoPokeapi = file_get_contents($imagenURL_Pokeapi);

        // Leemos el json
        $obtenerInfo_Pokeapi = json_decode($infoPokeapi, true);

        // Obtenemos la url de la imagen del Pokemon
        $imagenURL_Pokeapi = $obtenerInfo_Pokeapi['sprites']['other']['official-artwork']['front_default'];

        // Debug: Ver si se esta obtienendo la url correcta de 
        // la api para descargar la imagen
        // echo $imagenURL_Pokeapi;

        // Creamos el contenido de nuestra tabla, mostrando el resultado de la consulta sql

        echo "<tbody>
                <tr>";
        
        // Esto mostraba la imagen guardada localmente dentro del contenido de nuestra tabla
        // echo '<td><img src="img/pokemon_primeragen_base/' . $imagenURL . '" alt="' . $celdaInfo["Nombre"] . '"height="100px"></td>';

        // Construimos el cuerpo de la tabla con ayuda de varios 'echo'
        // Tambien hacemos que el primer caracter de las palabras empiecen con la letra mayuscula.

        echo '<td><img src="' . $imagenURL_Pokeapi . '" alt="' . $celdaInfo["Nombre"] . '" height="100px"></td>';
        echo "<td>" . ucfirst($celdaInfo['Nombre']) . "</td>";
        echo "<td>" . ucfirst($celdaInfo['TipoElemental1']) . "</td>";
        echo "<td>" . ucfirst($celdaInfo['TipoElemental2']) . "</td>";
        echo "<td>" . ucfirst($celdaInfo['Habitat']) . "</td>";
        echo "<td>" . ucfirst($celdaInfo['ColorPokemon']) . "</td>";
        echo "</tr>
            </tbody>";
    }

    // Etiquetas de cierre fuera del while

    echo "</table>
        </div>
        </section>";

} else {

    // Si esto es falso, entonces le mostrara al usuario que no se encontraron
    // resultados

    echo "<section>
            <div>
                <p><strong>No se encontraron resultados</strong></p>
            </div>
        </section>";
}

// Cerramos la conexion de nuestra base de datos.
$conexion_sql->close();

// Finalmente, incluimos un echo afuera del if - else,
// el cual contendra un boton que funcionara para regresar
// a la pagina principal. Asi tambien incluimos nuestro 'footer.php'.

echo "<br>
      <section>
        <div>
            <button><a href=index.php>Regresa a la pagina principal</a></button>
        </div>
      </section>
    </body>";

include 'php/footer.php';

?>
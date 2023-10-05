<!-- 

Formulario creado por: JOVEN JIMENEZ ANGEL CRISTIAN
PROGRAMACION WEB 2 | 1758 

-->

<?php

/*

Aqui estara toda la logica de funcionamiento
del formulario.

Incluimos nuestro 'head.php'.

Creamos con ayuda de un echo el body de 
nuestra pagina web.

Colocamos un if - else en donde comprobamos si
las variables o IDs existen y contienen informacion.

Si es verdadero, entonces muestra al usuario la informacion 
que ingreso en el formulario.

Si es falso, entonces le va a mostrar al usuario un mensaje de 
error diciendole que los datos estan incompletos.

Finalmente, incluimos un echo afuera del if - else,
el cual contendra un boton que funcionara para regresar
de nuevo al formulario. Asi tambien incluimos nuestro 'footer.php'.

*/


include 'php/head.php';

echo "<body>
    <section>
    <div>
        <h1>Formulario en PHP</h1>
        <hr>
        <h1>Resultado del Formulario</h1>
    </div>
    </section>";

if (isset($_GET['nombre']) && isset($_GET['edad']) && isset($_GET['correo']) && isset($_GET['contrasena'])) {
    $nombre = $_GET['nombre'];
    $edad = $_GET['edad'];
    $correo = $_GET['correo'];
    $contrasena = $_GET['contrasena'];

    echo "<section>
            <div>
            <p>Mi nombre es: $nombre
            <br>
            <p>Mi edad es: $edad
            <br>
            <p>Mi correo es: $correo
            <br>
            <p>Mi contraseña es: $contrasena</p>
            </div>
          </section>";

} else {
    echo "<section>
            <div>
                <p><strong>Error: Datos incompletos</strong></p>
            </div>
          </section>";
}

echo "<section>
        <div>
            <button><a href=index.php>Regresar al Formulario</a></button>
        </div>
      </section>
    </body>";

include 'php/footer.php';

?>
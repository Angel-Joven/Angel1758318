<!-- 

Formulario creado por: JOVEN JIMENEZ ANGEL CRISTIAN
PROGRAMACION WEB 2 | 1758 

-->

<!-- 

Creamos nuestro body en un php con la finalidad de
poder usarlo las veces que queramos siempre y cuando se
importe este php y dependiendo de nuestras necesidades.

Este body contiene un formulario en donde el usuario
podra ingresar informacion dependiendo de lo que se
le indique. Contiene 4 celdas:

1. Nombre
2. Edad
3. Correo
4. Contraseña

Cada celda tiene su tipo de dato a ingresar, un id unico 
y un nombre de celda. Ademas, las celdas tienen que llenarse
de informacion (no se puede dejar ninguna vacia) y contienen
un 'label' o titulo para cada celda indicando que informacion
debe de ingresar el usuario.

Al momento de que el usuario de clic en el boton "Enviar", lo
va a enviar a otra pagina php llamada 'formulario.php' en donde
se le va a mostrar la informacion que ingreso el usuario.

Se usa el metodo 'get' para poder visualizar la información codificada 
del usuario en el header (en la URL).

-->

<body>
    <section>
        <div>
            <h1>Formulario en PHP</h1>
            <hr>
        </div>
        <div>
            <form action="formulario.php" method="get">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required><br>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required><br>

            <button>Enviar</button>

            </form>
        </div>
    </section>
</body>
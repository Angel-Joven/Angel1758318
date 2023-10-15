<!-- 

Programa: Pokedex - Buscador de Pokemones de 
primera generacion en su estado base.

Creado por: JOVEN JIMENEZ ANGEL CRISTIAN
SISTEMAS DE INFORMACION | 1758 

-->

<!-- 

Creamos nuestro body en un php con la finalidad de
poder usarlo las veces que queramos siempre y cuando se
importe este php y dependiendo de nuestras necesidades.

Este body contiene un formulario en donde el usuario
podra ingresar informacion dependiendo de lo que se
le indique. Contiene 5 celdas:

1. Nombre del Pokemon
2. Primer tipo elemental
3. Segundo tipo elemental
4. Habitat
5. Color del Pokemon

Cada celda tiene su tipo de dato a ingresar, un id unico,
un nombre de celda y un 'label' o titulo para cada celda 
indicando que informacion debe de ingresar el usuario.

No es necesario ingresar informacion en todas las celdas,
sin embargo, al menos una celda debe de contener informacion
para su procesamiento.

Al momento de que el usuario de clic en el boton "Enviar", lo
va a enviar a otra pagina php llamada 'buscarPokemon.php' en donde
se le va a mostrar la informacion que ingreso el usuario.

Se usa el metodo 'post' para no poder visualizar la información 
del usuario en el header (en la URL).

Al momento de que el usuario de clic en el boton "Limpiar Campos",
todas las celdas se van a limpiar, eliminando el texto que se haya
ingresado en alguna celda. Esto es con el fin de que el usuario tenga
la facilidad de eliminar informacion de las celdas mas facilmente 
en un solo clic

Al momento de que el usuario de clic en el boton 
"Ver toda la lista de Pokemones", le va a mostrar todos los pokemones
existentes de nuestra base de datos.

-->

<body>
    <section>
        <div>
            <h1>Pokedex</h1>
            <h1>Buscador de Pokemones de primera generacion en su estado base</h1>
            <hr>
        </div>
        <div>
            <form action="buscarPokemon.php" method="post">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"><br>

            <label for="tipoElemental1">Primer Tipo Elemental:</label>
            <input type="text" id="tipoElemental1" name="tipoElemental1"><br>

            <label for="tipoElemental2">Segundo Tipo Elemental:</label>
            <input type="text" id="tipoElemental2" name="tipoElemental2"><br>

            <label for="habitat">Habitat:</label>
            <input type="text" id="habitat" name="habitat"><br>

            <label for="color">Color del Pokemon:</label>
            <input type="text" id="color" name="color"><br>
            <br>
            <button type="submit" name="enviar">Enviar</button>
            <br>
            <br>
            <button type="reset">Limpiar Campos</button>
            <button type="submit" name="verLista">Ver toda la lista de Pokemones</button>
            </form>
        </div>
    </section>
</body>
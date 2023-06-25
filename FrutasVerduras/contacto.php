<html>
    <link href="styleInicio.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <head>
        <title>Contacto</title>
    </head>

    <body>

        <?php
        include("header.php"); // Incluye el archivo que contiene los detalles del encabezado.
        include("conexion.php"); // Incluye el archivo que contiene los detalles de la conexión a la base de datos.

        if (isset($_POST['submit'])) { // Verifica si el botón de envío del formulario de registro ha sido presionado.
            $nombre = $_POST['nombre']; // Almacena el valor del campo de nombre en la variable $name.
            $nseguimiento = $_POST['nseguimiento']; // Almacena el valor del campo de apellido en la variable $apellido.
            $email = $_POST['email']; // Almacena el valor del campo de correo electrónico en la variable $email.
            $descripcion = $_POST['descripcion']; // Almacena el valor del campo de contraseña en la variable $contraseña.

            if ($nombre == "" || $nseguimiento == "" || $email == "" || $descripcion == "") { // Verifica si algún campo está vacío.
                echo "Todos los campos deben de estar completos."; // Imprime un mensaje de error si algún campo está vacío.
                echo "<br/>";
                echo "<a href='contacto.php'>Volver</a>";
            } else {
                $query = "INSERT INTO contacto (nombre, nseguimiento, email, descripcion) VALUES ('$nombre', '$nseguimiento', '$email', '$descripcion')";
                $result = mysqli_query($conexion, $query) or die("No se pudo completar el formulario.");
                echo "<br>";
                echo "Formulario completado con éxito"; // Imprime un mensaje de éxito si la consulta se ha ejecutado correctamente.
            }
        } else {
            ?>
        
        <h1>Formulario Contacto</h1>
            <!-- Formulario registro -->
            <div class="login">
                <form class="px-4 py-3" name="form1" method="post" action="">                    
                    <div class="mb-3">
                        <label for="exampleDropdownFormNombre" class="form-label">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDropdownFormNseguimiento" class="form-label">Número de referencia:</label>
                        <input type="text" name="nseguimiento" class="form-control" placeholder="Número de referencia de pedido">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDropdownFormEmail" class="form-label">Correo electrónico:</label>
                        <input type="mail" name="email" class="form-control" placeholder="Correo">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDropdownFormDescripcion" class="form-label">Descripción:</label><br>
                        <textarea name="descripcion" rows="5" cols="215" placeholder="Descripción del problema"></textarea>   
                    </div>
                    <div class="form-goup mb-2">
                        <label for="captcha">Ingrese el captcha:</label>
                        <input type="text" name="captcha" id="captcha" required>
                    </div>
                    <div class="captcha-container"><img src="captcha.php" alt="captcha image" class="captcha-image"></div>
                    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>

            <?php
        }
        ?>
            
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>    
        
        <!-- Footer -->
        <div id="footer">
            Página creada por: <a href="mailto:ivan.dafauce@tajamar365.com" 
                                  target="blanck" title="Ivan Dafauce">Ivan Dafauce</a> 
                                  y <a href="mailto:manuel.perezbenavent@tajamar365.com" 
                                  target="blanck" title="Manuel Perez" >Manuel Pérez</a>
                                  
        </div>

    </body>
</html>
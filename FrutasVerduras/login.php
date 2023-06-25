<?php
session_start(); // Inicia la sesión

 include("conexion.php");
 include ('header.php');

// Verifica si el usuario ya está autenticado, en cuyo caso redirige a la página nueva
if (isset($_SESSION['usuario'])) {
    header("Location: catalogo.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $query = "SELECT * FROM registro WHERE email = '$nombre' AND contraseña = '$contraseña'";
    $result = mysqli_query($conexion, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['usuario'] = $nombre;
        header("Location: catalogo.php");
        exit();
    } else {
        $mensajeError = "Credenciales inválidas. Inténtalo de nuevo.";
    }
}
?>

<html>
    <head>
        <title>Login</title>
        <link href="styleInicio.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
              rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        
    </head>
    <body>      

        <?php if (isset($mensajeError)): ?>
            <p><?php echo $mensajeError; ?></p>
        <?php endif; ?>
            
        <h1>Inicio de sesión</h1>
        <!-- Formulario login -->    
        <form class="px-4 py-3" name="form2" method="post" action="">
            <div class="mb-3">
                <label for="exampleDropdownFormNombre" class="form-label">Correo Electronico:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Correo Electronico">
            </div>
            <div class="mb-3">
                <label for="exampleDropdownFormContrasseña" class="form-label">Contraseña:</label>
                <input type="password" name="contraseña" class="form-control" placeholder="Contraseña">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Iniciar sesión</button>         
        </form>
        
        <!-- Footer -->
        <div id="footer">
            Página creada por: <a href="mailto:ivan.dafauce@tajamar365.com" 
                                  target="blanck" title="Ivan Dafauce">Ivan Dafauce</a> 
                                  y <a href="mailto:manuel.perezbenavent@tajamar365.com" 
                                  target="blanck" title="Manuel Perez" >Manuel Pérez</a>
                                  
        </div>

    </body>
</html>

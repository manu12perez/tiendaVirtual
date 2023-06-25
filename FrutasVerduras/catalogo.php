<?php
session_start();
include("conexion.php");
include('header_1.php');

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// Cierra la sesión al hacer clic en el botón "Cerrar sesión"
if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Consulta SQL para recuperar los productos de la tabla "producto"
$query = "SELECT * FROM producto";
$result = mysqli_query($conexion, $query);

// Verifica si el usuario ha agregado productos al carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Agrega el producto al carrito al hacer clic en el botón "Agregar al carrito"
if (isset($_POST['add'])) {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];

    // Verifica si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id] += $cantidad;
    } else {
        $_SESSION['carrito'][$producto_id] = $cantidad;
    }
}

// Función de búsqueda
function buscarProductos($productos, $searchTerm) {
    $resultados = array();

    foreach ($productos as $producto) {
        // Buscar por nombre del producto o descripción (si es fruta o verdura)
        if (stripos($producto['nombre'], $searchTerm) !== false ||
            stripos($producto['descripcion'], $searchTerm) !== false) {
            $resultados[] = $producto;
        }
    }

    return $resultados;
}

// Realizar la búsqueda si se ha proporcionado un término de búsqueda
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $productos = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $productos[] = $row;
    }

    $resultados = buscarProductos($productos, $searchTerm);
} else {
    $resultados = array();
}
?>

<html>
<head>
    <title>Productos</title>
    <link href="styleInicio.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <style>
        .productos-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .producto {
            width: 30%;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 10px;
            display: flex;
            flex-direction: column;
        }

        .producto img {
            flex-grow: 1;
            max-height: 100%;
            object-fit: contain;
        }

        .producto-info {
            margin-top: 10px;
            height: 120px;
        }

        .producto-nombre {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .producto-descripcion {
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .producto-precio {
            margin-top: 5px;
        }

        .agregar-carrito {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Bienvenido, <?php echo $usuario; ?></h1>
    <h2>Productos disponibles</h2>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="catalogo.php">
        <input type="text" name="search" placeholder="Buscar por nombre o descripción">
        <input type="submit" value="Buscar">
    </form>

    <div class="productos-container">
        <?php
        // Mostrar los resultados de la búsqueda
        if (!empty($resultados)) {
            foreach ($resultados as $producto) {
                ?>
                <div class="producto">
                    <img src="<?php echo $producto['imagen']; ?>" alt="Imagen del producto">
                    <div class="producto-info">
                        <div class="producto-nombre"><?php echo $producto['nombre']; ?></div>
                        <div class="producto-descripcion"><?php echo $producto['descripcion']; ?></div>
                        <div class="producto-precio">Precio: <?php echo $producto['precio']; ?></div>
                        <form method="post" action="">
                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                            <label>Cantidad:</label>
                            <input type="number" name="cantidad" value="1" min="1">
                            <button type="submit" name="add" class="btn btn-primary agregar-carrito">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
                <?php
            }
        } else {
            // Mostrar todos los productos si no se ha realizado una búsqueda
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="producto">
                    <img src="<?php echo $row['imagen']; ?>" alt="Imagen del producto">
                    <div class="producto-info">
                        <div class="producto-nombre"><?php echo $row['nombre']; ?></div>
                        <div class="producto-descripcion"><?php echo $row['descripcion']; ?></div>
                        <div class="producto-precio">Precio: <?php echo $row['precio']; ?></div>
                        <form method="post" action="">
                            <input type="hidden" name="producto_id" value="<?php echo $row['id']; ?>">
                            <label>Cantidad:</label>
                            <input type="number" name="cantidad" value="1" min="1">
                            <button type="submit" name="add" class="btn btn-primary agregar-carrito">Agregar al carrito</button>
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>

    <form method="post" action="">
        <button type="submit" name="cerrar_sesion" class="btn btn-secondary">Cerrar sesión</button>
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

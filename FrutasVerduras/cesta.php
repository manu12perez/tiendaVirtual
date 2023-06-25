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

// Verifica si se ha enviado el ID del producto para eliminar
if (isset($_POST['eliminar_producto'])) {
    $producto_id = $_POST['eliminar_producto'];

    // Verifica si el producto existe en el carrito
    if (isset($_SESSION['carrito'][$producto_id])) {
        unset($_SESSION['carrito'][$producto_id]);
    }
}

// Verifica si el carrito está vacío
if (empty($_SESSION['carrito'])) {
    echo "<h2>No hay productos en el carrito</h2>";
} else {
    // Obtiene los productos del carrito
    $carrito = $_SESSION['carrito'];

    // Obtiene los IDs de los productos en el carrito
    $producto_ids = array_keys($carrito);

    // Consulta SQL para recuperar los detalles de los productos del carrito
    $query = "SELECT * FROM producto WHERE id IN (" . implode(",", $producto_ids) . ")";
    $result = mysqli_query($conexion, $query);

    // Variable para almacenar el total de los productos seleccionados
    $total = 0;
    ?>

    <html>
    <head>
        <title>Carrito de compras</title>
        <link href="styleInicio.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
        <style>
            .carrito-container {
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

            .eliminar-producto {
                margin-top: 10px;
            }

            .total {
                font-weight: bold;
                font-size: 24px;
                margin-top: 20px;
                text-align: right;
            }

            .cerrar-sesion {
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
    <h1>Bienvenido, <?php echo $usuario; ?></h1>
    <h2>Carrito de compras</h2>

    <div class="carrito-container">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $producto_id = $row['id'];
            $producto_nombre = $row['nombre'];
            $producto_descripcion = $row['descripcion'];
            $producto_precio = $row['precio'];
            $producto_cantidad = $carrito[$producto_id];

            // Calcula el precio total por producto
            $subtotal = $producto_precio * $producto_cantidad;

            // Actualiza el total de los productos seleccionados
            $total += $subtotal;
            ?>
            <div class="producto">
                <img src="<?php echo $row['imagen']; ?>" alt="Imagen del producto">
                <div class="producto-info">
                    <div class="producto-nombre"><?php echo $producto_nombre; ?></div>
                    <div class="producto-descripcion"><?php echo $producto_descripcion; ?></div>
                    <div class="producto-precio">Precio: <?php echo $producto_precio; ?></div>
                    <div class="producto-cantidad">Cantidad: <?php echo $producto_cantidad; ?></div>
                    <div class="producto-subtotal">Subtotal: <?php echo $subtotal; ?></div>
                    <form method="post" action="">
                        <input type="hidden" name="eliminar_producto" value="<?php echo $producto_id; ?>">
                        <button type="submit" class="btn btn-danger eliminar-producto">Eliminar del carrito</button>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <div class="total">Total: <?php echo $total; ?></div>

    <form method="post" action="pago.php">
        <button type="submit" class="btn btn-primary">Realiza pago</button>
    </form>

    <form method="post" action="">
        <button type="submit" name="cerrar_sesion" class="btn btn-secondary cerrar-sesion">Cerrar sesión</button>
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
<?php
}
?>

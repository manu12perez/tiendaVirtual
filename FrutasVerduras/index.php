<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi Pagina Web</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
              rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
              crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <style>
        /* Estilos personalizados */
        body {
            background-image: url(images/huerto.png); /* Ruta de la imagen de fondo */
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            
        }
        
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para el contenido principal */
            padding: 20px;
            margin-top: 50px;
            border-radius: 10px;
        }
        
        h1 {
            text-align: center;
        }
        
        .logo {
            max-width: 300px;
            height: auto;
            margin: 0 auto;
        }
        
       
    </style>

    </head>
    <body>
        <?php
        include ('header.php');
        include("conexion.php");
        ?>
        <?php
        if (isset($_COOKIE['contador'])){
                   //VEMOS SI LA COOKIE EXISTE
                   //ISSET VERIFICA SI LA VARIABLE COOKIE CONTADOR ESTÁ DEFINIDA

                   setcookie('contador', $_COOKIE['contador']+1, time()+ 60);
                   //echo "Numero de visistas: " . $_COOKIE['contador'];  
               } else {
                   //EN CASO DE QUE LA COOKIE NO EXITA
                   setcookie('contador', 1, time() + 60);
                   //echo "Bienvenido por primera vez a nuestra página";
               }
        ?>
        <?php
                if(isset($_SESSION['valid'])) {			
                        include("conexion.php");					
                        $result = mysqli_query($mysqli, "SELECT * FROM registro");
                ?>


        <?php
                //IMPLEMENTAMOS CÓDIGO PARA LA ELIMINACIÓN DE LAS COOKIES POR SI LO REQUERIMOS
                //setcookie('contador', $_COOKIE['contador'], time()-3600);
                //echo "Cookie borradas"
        
        ?>
        <?php	
	} else {
		
	}
	?>
       
        <div class="container mt-5">
            <h1 class="text-center mb-4">Tienda Virtual de Frutas y Verduras Ecológicas</h1>
            <div class="text-center mb-4">
                <img src="images/perdaf.png" class="logo" alt="Logo de la empresa">
            </div>
            <p>Bienvenido/a a nuestra tienda virtual de frutas y verduras ecológicas. Nos enorgullece ofrecer productos frescos y de alta calidad, cultivados de manera sostenible y respetuosa con el medio ambiente.</p>
            <p>En nuestra tienda, encontrarás una amplia variedad de frutas y verduras cultivadas sin el uso de pesticidas ni productos químicos dañinos. Nuestro compromiso con la agricultura ecológica garantiza que los alimentos que consumes sean saludables y beneficiosos tanto para ti como para el planeta.</p>
            <p>Trabajamos en estrecha colaboración con agricultores locales que comparten nuestra pasión por la agricultura sostenible. Juntos, nos esforzamos por promover prácticas agrícolas responsables y contribuir al bienestar de nuestras comunidades.</p>
            <p>Explora nuestra amplia selección de frutas y verduras frescas, desde deliciosas manzanas orgánicas hasta jugosos tomates cultivados sin pesticidas. Nuestro catálogo está cuidadosamente seleccionado para ofrecerte productos de la más alta calidad y frescura.</p>
            <p>Realiza tu pedido en línea y disfruta de la comodidad de recibir tus frutas y verduras ecológicas directamente en tu puerta. Nuestro equipo se asegurará de que tus productos lleguen en perfecto estado y listos para que los disfrutes.</p>
            <p>¡Gracias por apoyar la agricultura ecológica y elegir nuestros productos! Estamos comprometidos a brindarte una experiencia de compra excepcional y productos de la mejor calidad.</p>
        </div>
        
        <!-- Footer -->
        <div id="footer">
            Página creada por: <a href="mailto:ivan.dafauce@tajamar365.com" 
                                  target="blanck" title="Ivan Dafauce">Ivan Dafauce</a> 
                                  y <a href="mailto:manuel.perezbenavent@tajamar365.com" 
                                  target="blanck" title="Manuel Perez" >Manuel Pérez</a>
                                  
        </div>

    </body>
</html>

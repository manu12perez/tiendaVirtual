<?php

session_start();

//$captcha = "";: crea una variable $captcha vacía que se utilizará para almacenar el valor del captcha generado.
$captcha = "";
/* $possibleChars = "0123456789";: crea una cadena de caracteres posibles que se utilizarán para generar el valor del captcha. 
 * En este caso, solo se utilizan números del 0 al 9.
 */
$possibleChars = "0123456789";
/* for ($i = 0; $i < 4; $i++) { ... }: crea un bucle que se ejecuta 4 veces para generar una cadena de 4 caracteres para el captcha. 
 * Dentro del bucle, se agrega un carácter aleatorio de la cadena $possibleChars a la variable $captcha.
 */
for ($i = 0; $i < 4; $i++) {
    $captcha .= $possibleChars[rand(0, strlen($possibleChars) - 1)];
}

//$_SESSION["captcha"] = $captcha;: almacena el valor del captcha generado en una variable de sesión llamada "captcha".
$_SESSION["captcha"] = $captcha;

/* $image = imagecreatetruecolor(80, 30);: crea una nueva imagen de 80 píxeles de ancho y 30 píxeles de alto utilizando la función 
 * imagecreatetruecolor().
 */
$image = imagecreatetruecolor(80, 30);
//$bgColor = imagecolorallocate($image, 255, 255, 255);: asigna un color de fondo blanco a la imagen utilizando la función imagecolorallocate().

$bgColor = imagecolorallocate($image, 255, 255, 255);

//$textColor = imagecolorallocate($image, 0, 0, 0);: asigna un color de texto negro a la imagen utilizando la función imagecolorallocate().
$textColor = imagecolorallocate($image, 0, 0, 0);

/* imagefilledrectangle($image, 0, 0, 80, 30, $bgColor);: dibuja un rectángulo relleno de color de fondo blanco en toda la imagen utilizando 
 * la función imagefilledrectangle(). */
imagefilledrectangle($image, 0, 0, 80, 30, $bgColor);

/* imagestring($image, 5, 15, 5, $captcha, $textColor);: agrega el valor del captcha generado a la imagen utilizando la función imagestring(). 
 * El texto se coloca en el punto (15, 5) en la imagen con un tamaño de fuente de 5 píxeles.
 */
imagestring($image, 5, 15, 5, $captcha, $textColor);

//header("Content-Type: image/png");: establece la cabecera de respuesta HTTP para que el tipo de contenido devuelto sea una imagen PNG.
header("Content-Type: image/png");

//imagepng($image);: envía la imagen al navegador como un archivo PNG utilizando la función imagepng().
imagepng($image);

//imagedestroy($image);: libera la memoria utilizada por la imagen utilizando la función imagedestroy().
imagedestroy($image);
?>




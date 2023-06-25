<?php
session_start();
include("conexion.php");
include('header_1.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pasarela de Pagos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

    h1 {
      color: #333333;
      text-align: center;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #666666;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #cccccc;
      box-sizing: border-box;
    }

    .payment-methods {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .payment-methods img {
      height: 30px;
      margin-right: 10px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #ffffff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Pasarela de Pagos</h1>

  <form action="procesar_pago.php" method="post">
    <div class="payment-methods">
        <img src="images/visa.png" alt="Visa">
      <img src="images/paypal.png" alt="PayPal">
      <img src="images/card.png" alt="MasterCard">
    </div>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="tarjeta">Número de tarjeta:</label>
    <input type="text" id="tarjeta" name="tarjeta" required>

    <label for="fecha">Fecha de vencimiento:</label>
    <input type="text" id="fecha" name="fecha" required>

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required>

    <input type="submit" value="Pagar">
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

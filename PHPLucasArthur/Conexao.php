
<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "12345678";
    $banco = "BDteste2";
    $comando = new PDO("mysql:host=$servidor; dbname=$banco", $usuario, $senha);
?>
   
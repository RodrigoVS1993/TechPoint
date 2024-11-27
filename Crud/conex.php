<?php 
define("HOST", "127.0.0.1");
define("USUARIO","root");
define ("SENHA", "Rvs.150493");
define ("DB", "techpoint");

$conex = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ("Não foi possivel conectar");
?>


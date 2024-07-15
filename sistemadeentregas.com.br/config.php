<?php
//Configura conexão com o banco
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'controledeentregas.com');

//Estabelece conexão
$conn = new mysqli(HOST, USER, PASS, BASE);

if ($conn->connect_error) {
    die('falha ao conectar'. $conn->connect_error);
} else {
    echo '';
}

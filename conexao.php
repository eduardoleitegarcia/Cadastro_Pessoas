<?php

$servername = "dev-web_db.trator.w2o_1";
$username = "root";
$password = "root";
$dbname = "projetoEduardo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

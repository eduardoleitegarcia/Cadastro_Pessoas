<?php
include_once 'conexao.php';

$id = $_GET['id'];

if (!empty($id)) {
    $resultadoPessoa = "DELETE FROM Pessoa WHERE idPessoa = $id";
    if ($conn->query($resultadoPessoa) === TRUE) {
        header("Location: arquivoIndex.php");
    }else{
        echo "erro ao deletar!";
    }
}
$conn->close();

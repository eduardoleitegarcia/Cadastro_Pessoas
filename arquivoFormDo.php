<?php

include_once("conexao.php");

$id = $_GET['id'];
$nome = $_GET["nome"];
$idade = $_GET["idade"];
$email = $_GET["email"];
$celular = $_GET["celular"];
$sexo = $_GET["sexo"];

if ($id == null || $id == 0) {

  $resultadoPessoa = "INSERT INTO Pessoa (nomePessoa, idadePessoa, emailPessoa, celularPessoa, sexoPessoa) VALUES ('$nome', '$idade', '$email', '$celular', '$sexo')";

  if ($conn->query($resultadoPessoa) === TRUE) {
    header("Location: arquivoIndex.php");
  } else {

    echo "erro ao inserir!";
  }
} else {

  $resultPessoa = "UPDATE Pessoa SET nomePessoa='$nome', idadePessoa='$idade', emailPessoa='$email', celularPessoa='$celular', sexoPessoa='$sexo' WHERE idPessoa=$id";

  if ($conn->query($resultPessoa) === TRUE) {

    header("Location: arquivoIndex.php");
  } else {
    echo "erro ao editar!";
  }
}

$conn->close();





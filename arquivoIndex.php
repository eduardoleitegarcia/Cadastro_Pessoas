<?php
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="css/estilos.css" />
    <meta charset="UTF-8" />
    <title>Listagem</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>

</head>

<body>

    <div class="paginaListagem">

        <div class="cabecalhoListagem">
            <img class="profileListagem" src="css/profile-man.png">
            <h2 class="tituloListagem"> Listagem de pessoas</h2>
        </div>

        <div class="divBtnNovoCadastro">
            <a href="arquivoForm.php"><button class="btnNovoCadastro">
                    <font face='Calibri'>Novo Cadastro
                </button></a>
        </div><br>

        <div class="divBusca">
            <input type="text" name="busca" id="busca" placeholder="Pesquisar por nome..." />
        </div>

        <div class='divTabela'>

            <?php
            $tabela .= "<table id='tabela' class='tableListagemPessoas' border='2' BORDER RULES=rows>";
            $tabela .= "<tr align='center' style='background-color:rgb(130, 208, 241)'>";
            $tabela .= "<td><b><font face='Calibri' size=4>Id</b></td>";
            $tabela .= "<td><b><font face='Calibri' size=4>Nome</b></td>";
            $tabela .= "<td><b><font face='Calibri' size=4>Idade</b></td>";
            $tabela .= "<td><b><font face='Calibri' size=4>Email</b></td>";
            $tabela .= "<td><b><font face='Calibri' size=4>Celular</b></td>";
            $tabela .= "<td><b><font face='Calibri' size=4>Sexo</b></td>";
            $tabela .= "<td><b><font face='Calibri' size=4>Ação</b></td></tr>";



            $resultPessoas  = "SELECT idPessoa, nomePessoa, idadePessoa, emailPessoa, celularPessoa, sexoPessoa FROM Pessoa";
            $resultadoPessoas = $conn->query($resultPessoas);



            if ($resultadoPessoas->num_rows > 0) {
                while ($row = $resultadoPessoas->fetch_array()) {
                    $id = $row['idPessoa'];
                    $nome = $row['nomePessoa'];
                    $idade = $row['idadePessoa'];
                    $email = $row['emailPessoa'];
                    $celular = $row['celularPessoa'];


                    if ($row['sexoPessoa'] == 1) {
                        $sexo = "Masculino";
                    } elseif ($row['sexoPessoa'] == 0) {
                        $sexo = "Feminino";
                    }
                    $tabela .= "<Tbody>";
                    $tabela .= "<tr style:'line-height:1' align='center'>";

                    $tabela .= "<td><font face='Calibri' size=3>$id</td>";
                    $tabela .= "<td><font face='Calibri' size=3>$nome</td>";
                    $tabela .= "<td><font face='Calibri' size=3>$idade</td>";
                    $tabela .= "<td><font face='Calibri' size=3>$email</td>";
                    $tabela .= "<td><font face='Calibri' size=3>$celular</td>";
                    $tabela .= "<td><font face='Calibri' size=3>$sexo</td>";

                    $tabela .= "<td align='center' class='links'><a href='arquivoForm.php?id=$id' class='editarLink'></a>";
                    $tabela .= "<a onclick='chamarArquivo($id)' class='excluirLink'></a></td>";
                    $tabela .= "</tr>";
                }
            }

            $tabela .= "<tr style:'line-height:1' align='right' style='background-color:rgb(130, 208, 241)'>";

            $tabela .= "<td colspan='7'>";
            $tabela .= "<b class='registrosPagina'><font size=2>Foram encontrados um total de " . $resultadoPessoas->num_rows . " registros.<b></td>";
            $tabela .=  "</tr>";
            $tabela .=  "</Tbody>";
            $tabela .= "</table>";

            echo $tabela;

            echo "</div>";


            ?>

        </div>
    </div>
</body>

</html>

<script>
    function chamarArquivo(id) {
        if (confirm("Deseja realemente excluir este registro ?")) {
            location = 'arquivoDelete.php?id=' + id
        }
    }
</script>
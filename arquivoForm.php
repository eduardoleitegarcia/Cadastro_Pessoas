<?php
include_once("conexao.php");

?>

<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="css/estilos.css" />
    <meta charset="UTF-8" />
    <title>Cadastro</title>


</head>

<body>

<?php

    $id = $_GET['id'];

    if (!is_null($id)) {
        $result_pessoa  = "SELECT idPessoa, nomePessoa, idadePessoa, emailPessoa, celularPessoa, sexoPessoa FROM Pessoa WHERE idPessoa= $id";
        $resultado_pessoa = mysqli_query($conn, $result_pessoa);
        $row_pessoa = mysqli_fetch_array($resultado_pessoa);

        $nome = $row_pessoa["nomePessoa"];
        $idade = $row_pessoa["idadePessoa"];
        $email = $row_pessoa["emailPessoa"];
        $celular = $row_pessoa["celularPessoa"];
        $sexo = $row_pessoa["sexoPessoa"];

        if ($row_pessoa['sexoPessoa'] == 1) {
            $masc = 'checked';
        } elseif ($row_pessoa['sexoPessoa'] == 0) {
            $fem = 'checked';
        }
    }
    ?>


    <form method="get" action="arquivoFormDo.php">
        <div class="campo">

            <div class="cabecalho">
                <img class="profile" src="css/profile-man.png">
                <h2 class="tituloCadastro"> Cadastro de Pessoas</h2>
            </div>


            <div class=camposDiv>
                <div class="divcampos">
                    <label class="nomeLbl">Nome</label>
                    <input type="text" class="nomeInput" value="<?php echo $nome ?>" name="nome" placeholder="Informe seu nome" required />
                </div>


                <div class="divcampos">
                    <label class="idadeLbl">Idade</label><br>
                    <input type="number" class="idadeInput" value="<?php echo $idade ?>" name="idade" placeholder="Informe sua idade" required /><br><br><br>
                </div>
            </div>

            <div class=camposDiv>
                <div class="divcampos">
                    <label class="emailLbl">E-mail</label>
                    <input type="email" class="emailInput" value="<?php echo $email ?>" name="email" placeholder="Informe seu e-mail" required />
                </div>

                <div class="divcampos">
                    <label class="celularLbl">Celular</label><br>
                    <input type="text" class="celularInput" value="<?php echo $celular ?>" name="celular" placeholder="Informe seu celular" /><br><br><br>
                </div>
            </div>


            <div class="divRadio">
                <label class=" sexoLbl">Sexo</label><br>
                <input type="radio" class="masculinoRadio" <?php echo $masc; ?> name="sexo" value="1" required /><label class="masculinoLbl">
                    Masculino</label></input>
                <input type="radio" class="femininoRadio" <?php echo $fem; ?> name="sexo" value="0" /> <label class="femininoLbl">
                    Feminino</label></input>
            </div>

            <input type="hidden" name="id" value="<?php echo  $id; ?>" />

            <br><br><br>

            <div class="botao">
                <input type="submit" class="btnCadastro" value="Cadastrar" />
            </div>

        </div>
    </form>
</body>

</html>
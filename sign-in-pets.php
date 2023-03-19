<?php
include("conexao.php");
include("protecao.php");
?>
<style>
    .box {
        width: 600px;
        margin: 0 auto;
        margin-top: 100px;
        background-color: white;
        padding: 30px;
        border-radius: 20px;
    }

    #submit-os {
        margin: 0 auto;
        display: flex;
        width: fit-content;
        justify-content: center
    }
</style>
<div class="box">
    <div class="row">
        <div class="col-md-10">
            <h4>Cadastrar Pets
            </h4>
        </div>
        <div class="col-md-3">
            <a id="list-button" class="btn btn-outline-success" href="?page=list-pets">Listar Pets</a>
        </div>
    </div>
    <br>
    <form method="POST" class="row g-3" action="">
        <div class="col-md-6">
            Nome
            <input name="nome" type="text" class="form-control" id="inputName">
        </div>
        <div class="col-md-6">
            Dono
            <input disabled name="dono" type="text" class="form-control" id="inputSobrenome" placeholder="<?php if (!isset($_SESSION)) {
                session_start();
            }
            echo $_SESSION['email']; ?>">
        </div>
        <div class="col-12">
            Endereço
            <input name="endereco" type="text" class="form-control" id="inputEndereco" placeholder="">
        </div>
        <div class="col-md-6">
            Telefone
            <input name="telefone" type="text" class="form-control" id="inputCidade">
        </div>
        <div class="col-md-3">
            Classificação
            <select required name="classe" id="inputState" class="form-select">
                <option selected>Selecionar...</option>
                <option value="Cachorro">Cachorro</option>
                <option value="Gato">Gato</option>
                <option value="Ave">Ave</option>
                <option value="Peixe">Peixe</option>
                <option value="Réptil">Réptil</option>
            </select>
        </div>

        <div class="col-md-3">
            Genero
            <div class="form-check">
                <input name="genero" value="Macho" class="form-check-input" type="radio" name="flexRadioDefault"
                    id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">Macho</label>
            </div>
            <div class="form-check">
                <input name="genero" value="Femea" class="form-check-input" type="radio" name="flexRadioDefault"
                    id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">Fêmea</label>
            </div>
        </div>
        <input id="submit-os" type="submit" class="btn btn-success"><br>
    </form>
</div>
</div>
<?php

if (!isset($_POST["nome"])) {

} else {

    $nome = $_POST["nome"];
    $dono = $_SESSION['email'];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $classe = $_POST["classe"];
    @$genero = $_POST["genero"];

    if (strlen($_POST["nome"]) == 0) {
        die;
    } elseif (strlen($_POST["classe"]) == 0) {
        die;
    } elseif (strlen(@$_POST["genero"]) == 0) {
        die;
    } else {

        $result = mysqli_query(
            $conexao,
            "INSERT INTO pets 
        (nome, dono, endereco, telefone, classe, genero) 
        VALUES 
        ('$nome', '$dono', '$endereco', '$telefone', '$classe', '$genero')"
        );
    }
}
?>
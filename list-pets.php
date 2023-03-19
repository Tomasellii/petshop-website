<?php
//inicia a sessao caso nao estiver iniciada
if (!isset($_SESSION)) {
    session_start();
}

//inclui os arquivos de conexao e protecao
include('protecao.php');
include("conexao.php");
?>
<style>
    .box {
        width: 700px;
        margin: 0 auto;
        background-color: white;
        margin-top: 100px;
        border-radius: 20px;
        padding: 20px;
    }

    p {
        color: grey;
    }
</style>
<div class="box">
    <div class="row">
        <div class="col-md-10">
            <h4>Meus Pets</h4>
        </div>
        <div class="col-md-3">
            <a id="list-button" class="btn btn-outline-success" href="?page=sign-in-pets">Cadastrar pet</a>
        </div>
    </div>
    <br>
    <table class="table table-hover">
        <?php

        //seleciona os pets do dono da sessao
        $sql_code = "SELECT * FROM pets WHERE dono ='" . $_SESSION['email'] . "'";
        $sql_query = $conexao->query($sql_code);
        if ($sql_query->num_rows == 0) {
            echo ("Nenhum resultado encontrado.");
        } else {
            ?>
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Classificacao</th>
                </tr>
            </thead>
            <?php
            while ($dados = $sql_query->fetch_assoc()) {
                ?>
                <tbody>
                    <tr>
                        <td>
                            <?php echo $dados['nome']; ?>
                        </td>
                        <td>
                            <?php if (empty($dados['endereco'])) {
                                echo ("<p>Vazio</p>");
                            } else {
                                echo $dados['endereco'];
                            } ?>
                        </td>
                        <td>
                            <?php if (empty($dados['telefone'])) {
                                echo ("<p>Vazio</p>");
                            } else {
                                echo $dados['telefone'];
                            } ?>
                        </td>
                        <td>
                            <?php echo $dados['genero']; ?>
                        </td>
                        <td>
                            <?php echo $dados['classe']; ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>
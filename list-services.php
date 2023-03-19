<?php
include('protecao.php');
include("conexao.php");

if (!isset($_SESSION)) {
    session_start();
}
?>
<style>
    .box {
        width: 1000px;
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
            <h4>Listar serviços</h4>
        </div>
        <div class="col-md-3">
            <a id="list-button" class="btn btn-outline-success" href="?page=services">Solicitar serviços</a>
        </div>
    </div>
    <table class="table table-hover">
    <br>
        <?php
        $sql_code = "SELECT * FROM servicos WHERE id_os ='" . $_SESSION['email'] . "'";
        $sql_query = $conexao->query($sql_code);
        if ($sql_query->num_rows == 0) {
            echo ("Nenhum resultado encontrado.");
        } else {
            ?><thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">ID</th>
                        <th scope="col">Pet</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Transporte</th>
                    </tr>
                </thead>
           <?php while ($dados = $sql_query->fetch_assoc()) {
                ?>
                
                <tbody>
                    <tr>
                        <td>
                            <?php echo $dados['datas']; ?>
                        </td>
                        <td>
                            <?php echo $dados['id']; ?>
                        </td>
                        <td>
                            <?php echo $dados['pet']; ?>
                        </td>
                        <td>
                            <?php echo $dados['servico']; ?>
                        </td>
                        <td>
                            <?php echo $dados['transporte']; ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>
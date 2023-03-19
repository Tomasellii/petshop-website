<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js"></script>
<?php
include("conexao.php");
?>
<style>
    .box {
        width: 300px;
        margin: 0 auto;
        margin-top: 300px;
    }
</style>
<div class="box">
    <?php
    if (isset($_POST["email"]) || isset($_POST["senha"])) {
        if (strlen($_POST["email"]) == 0) {
            echo "Preecha seu email.";
        } else if (strlen($_POST["senha"]) == 0) {
            echo "Preencha sua senha.";
        } else {
            $email = $conexao->real_escape_string($_POST["email"]);
            $senha = $conexao->real_escape_string($_POST["senha"]);
            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
            $sql_query = $conexao->query($sql_code) or die("Falha na execução");
            $quantidade = $sql_query->num_rows;
            if ($quantidade == 1) {
                $usuario = $sql_query->fetch_assoc();
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['nome'] = $usuario['nome'];
                header("Location: painel.php");
            } else {
                print '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Opa!</strong> A senha ou email podem estar errado.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            }
        }
    }
    ?>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="n" class="form-label">Logar:</label>
            <input name="email" type="email" class="form-control" id="n" placeholder="E-mail">
        </div>
        <div class="mb-3">
            <label for="p" class="form-label"></label>
            <input name="senha" type="password" class="form-control" id="p" placeholder="Senha">
        </div>
        <div class="mb-3">
            <input name="submit" type="submit" class="btn btn-primary" value="Entrar">
            <input type="reset" class="btn btn-primary" value="Limpar">
        </div>
    </form>
    <a href="sign-in.php">Não possui conta?</a>
</div>
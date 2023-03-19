<?php
include("conexao.php");
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.bundle.min.js"></script>
<style>
  .box {
    width: 600px;
    margin: 0 auto;
    margin-top: 300px;
  }

  span {
    font-size: 10px;
    color: grey;
  }
</style>
<div class="box">
  <?php
  if (!isset($_POST['email'])) {
  } else {
    $v_email = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '" . $_POST['email'] . "'");
    if (mysqli_num_rows($v_email)) {
      print('<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eita!</strong> tu quer cadastrar o email novamente?
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>');
    }
  }
  ?>
  <form method="POST" class="row g-3">
    <div class="col-md-6">
      <label for="inputName" class="form-label">Nome <br> <span>*Obrigatorio</span></label>
      <input name="nome" type="text" class="form-control" id="inputName" required>
    </div>
    <div class="col-md-6">
      <label for="inputSobrenome" class="form-label">Sobrenome <br> <span>*Obrigatorio</span></label>
      <input name="sobrenome" type="text" class="form-control" id="inputSobrenome" required>
    </div>
    <div class="col-12">
      <label for="inputEmail" class="form-label">Email <br> <span>*Obrigatorio</span></label>
      <input name="email" type="email" class="form-control" id="inputEmail" required>
    </div>
    <div class="col-6">
      <label for="inputSenha" class="form-label">Senha <br> <span>*Obrigatorio</span></label>
      <input name="senha" type="password" class="form-control" id="inputSenha" required>
    </div>
    <div class="col-6">
      <label for="inputSenha" class="form-label">Repita a Senha <br> <span>*Obrigatorio</span></label>
      <input name="senha1" type="password" class="form-control" id="inputSenha1" required>
    </div>
    <div class="col-md-6">
      <label for="inputCidade" class="form-label">Cidade <br> <span>*Obrigatorio</span></label>
      <input name="cidade" type="text" class="form-control" id="inputCidade" required>
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Estado <br> <span>*Obrigatorio</span></label>
      <select name="estado" id="inputState" class="form-select" required>
        <option selected>Selecionar...</option>
        <option value="AC">Acre</option>
        <option value="AL">Alagoas</option>
        <option value="AP">Amapá</option>
        <option value="AM">Amazonas</option>
        <option value="BA">Bahia</option>
        <option value="CE">Ceará</option>
        <option value="DF">Distrito Federal</option>
        <option value="ES ">Espírito Santo</option>
        <option value="GO">Goiás</option>
        <option value="MA">Maranhão</option>
        <option value="MG">Mato Grosso</option>
        <option value="MS">Mato Grosso do Sul</option>
        <option value="MG">Minas Gerais</option>
        <option value="PA">Pará</option>
        <option value="PB">Paraíba</option>
        <option value="PR">Paraná</option>
        <option value="PE">Pernambuco</option>
        <option value="PI">Piauí</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="RN">Rio Grandrande do Norte</option>
        <option value="RS">Rio Grande do Sul</option>
        <option value="RO">Rondônia</option>
        <option value="RR">Roraima</option>
        <option value="SC">Santa Catarina</option>
        <option value="SP">São Paulo</option>
        <option value="SE">Sergipe</option>
        <option value="TO">Tocantins</option>
      </select>
    </div>
    <div class="col-md-3">
      <label for="inputZip" class="form-label">CEP <br> <span>*Obrigatorio</span></label>
      <input name="cep" type="number" class="form-control" id="inputZip" required>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
  </form>
  <a href="login.php">Entrar na minha conta</a><br>
</div>
<?php
include("conexao.php");
if (empty($_POST['nome']) || empty($_POST['senha']) || empty($_POST['senha'])) {
} else {
  if ($_POST['senha'] != $_POST['senha1']) {
    die(print "<script>alert('As senhas nao sao iguais');</script>");
  } else {
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];
    $result = mysqli_query(
    $conexao,
    "INSERT INTO usuarios 
    (nome, sobrenome, senha, email, cidade, estado, cep) 
    VALUES ('$nome', '$sobrenome', '$senha', '$email', '$cidade', '$estado', '$cep')"
    );
    header("Location: index.php");
  }
}
?>
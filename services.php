<?php
include("conexao.php");
include("protecao.php");
?>
<style>
  .box {
    display: block;
    width: 650px;
    height: 670px;
    margin: 0 auto;
    margin-top: 100px;
    padding: 30px;
    border-radius: 20px
  }

  .box h4 {
    margin-bottom: 10px;
  }

  .form-check {
    margin-bottom: 5px;
  }

  #btn-os {
    margin: 0 auto;
    display: flex;
    margin-top: 30px;
    justify-content: center
  }

  #list-button {
    margin: 0 auto;
    display: flex;
    justify-content: center;
    width: fit-content;
  }
</style>
<?php

?>
<div class="box">
    <div class="row">
        <div class="col-md-10">
            <h4>Solicitar serviços</h4>
        </div>
        <div class="col-md-3">
            <a id="list-button" class="btn btn-outline-success" href="?page=list-services">Listar serviços</a>
        </div>
    </div>
    <br>
  <form action="" method="POST">
    Escolha o seu pet:
    <select name="pet" class="form-control">
      <option>Selecionar</option>
      <?php
      $dono = $_SESSION['email'];
      ?>
      <?php
      $sql_ver = mysqli_query($conexao, "SELECT * FROM pets WHERE dono ='" . $dono . "'");

      $quantidade = $sql_ver->num_rows;

        if (mysqli_num_rows($sql_ver) > 0) {

          while ($linha = mysqli_fetch_assoc($sql_ver)) {
            print("<option value='");
            echo ($linha["nome"]);
            print("'>");
            echo $linha["nome"];
            print("</option>");

  
          }
        } else {
          echo "Não há resultados para exibir.";
        }
      
      ?>
    </select>
    <br>
    Escolha o dia:
    <input name="data" placeholder="Select date" type="date" id="example" class="form-control">
    <br>
    <div class="row">
      <div class="col-6">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="ckOp[]" value="banho e tosa" id="defaultCheck1">
          Banho e tosa
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="ckOp[]" value=" hospedagem" id="defaultCheck1">
          Hospedagem
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="ckOp[]" value=" adestramento" id="defaultCheck1">
          Adestramento
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="ckOp[]" value=" consulta veterinaria"
            id="defaultCheck1">
          Consulta veterinária
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="ckOp[]" value=" atendimento emergencial"
            id="defaultCheck1">
          Atendimento emergencial
        </div>
      </div>
      <div class="col-6">
        <div class="form-check">
          <input name="transporte" value="levar ate pet shop" class="form-check-input" type="radio"
            name="flexRadioDefault" id="flexRadioDefault1">
          Levar até Pet Shop
        </div>
        <div class="form-check">
          <input name="transporte" value="buscar na minha casa" class="form-check-input" type="radio"
            name="flexRadioDefault" id="flexRadioDefault1">
          Buscar na minha casa

        </div>
      </div>
    </div>
    <br>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Observações:</label>
      <textarea name="obs" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <button name="submit-os" id="btn-os" type="submit" class="btn btn-success">Solicitar serviço</button>

</div>
</form>
<?php
if (!isset($_REQUEST['submit-os'])) {
} else {
  $obs = $_POST['obs'];
  $datas = $_POST['data'];
  $id_os = $_SESSION['email'];
  @$transporte = $_POST['transporte'];
  $pet = $_POST['pet'];
  
  $op = null;
  if (isset($_POST['ckOp']))
    $op = $_POST['ckOp'];
  if ($op !== null)
    $servicos = implode(",", $op);
  if (isset($servicos)) {

    $result = mysqli_query($conexao, "INSERT INTO servicos (datas, id_os, servico, pet, transporte, obs) VALUES ('$datas', '$id_os', '$servicos', '$pet', '$transporte', '$obs')");

    @$pet = $_POST['pet'];
    @$transporte = $_POST['transporte'];
    $filename = "os/os_" . $pet . "_" . $_SESSION['email'] . ".txt";
    $file = fopen($filename, "w");
    fwrite($file, "pet: " . $pet . "\n");
    fwrite($file, "servicos: " . $servicos . "\n");
    fwrite($file, "transporte: " . $transporte . "\n");
    fclose($file);
  } else {
  }
}
?>
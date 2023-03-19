<?php
include("conexao.php");
include("protecao.php");
?>
<style>
  .row {
    margin-top: 50px;
    width: 100%;
  }

  #menu {
    background-color: white;
    height: 550px;
    width: 100%;
    margin: 0 auto;
    margin: 50px;
    padding: 20px;
    border-radius: 20px;
  }

  #produtos {
    background-color: white;
    height: 700px;
    width: 60%;
    padding: 20px;
    margin: 0 auto;
    margin-top: 50px;
    border-radius: 20px;
  }

  .lista {
    margin-top: 20px;
    border-top: 1px solid lightgrey;
    padding-top: 20px;
  }

  .frete {
    margin-top: 20px;
    border-top: 1px solid lightgrey;
    padding-top: 20px;
  }

  .filtro {
    margin-top: 20px;
    border-top: 1px solid lightgrey;
    border-bottom: 1px solid lightgrey;
    padding-top: 20px;
    padding-bottom: 20px;
  }

  .btns {
    width: fit-content;
    margin: 0 auto;
    margin-top: 20px;
  }
</style>
<div class="row">
  <div class="col-2">
    <div class="col-sm" id="menu">
      <h4>Filtros</h4><br>
      <form method="get" action="result.php" class="d-flex" role="search">
        <input name="busca" class="form-control me-2" type="search" placeh older="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      <form action="" method="">
        <div class="lista">
          <div class="form-check">
            <input name="categoria[]" value="alimento" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Alimentos
            </label>
          </div>
          <div class="form-check">
            <input name="categoria[]" value="brinquedo" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Brinquedos
            </label>
          </div>
          <div class="form-check">
            <input name="categoria[]" value="higiene" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Higiene
            </label>
          </div>
          <div class="form-check">
            <input name="categoria[]" value="acessorio" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Acessórios
            </label>
          </div>
        </div>
        <div class="frete">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Frete grátis</label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault">Retira na loja</label>
          </div>
        </div>
        <div class="filtro">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">Menor preço</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">Maior preço</label>
          </div>
        </div>
        <div class="btns">
          <input type="submit" class="btn btn-primary">
          <input name="submit-filter" type="reset" class="btn btn-outline-primary">
      </form>
    </div>
  </div>
</div>
<div class="col-10">
  <div class="col-sm" id="produtos">
    <h4>Produtos</h4>
    <?php
    $_REQUEST['busca'] = "";
    if (isset($_REQUEST['busca'])) {
      $busca = $_REQUEST['busca'];
      if (!isset($busca)) {
      } else {
        $sql_code = "SELECT * 
        FROM produtos 
        WHERE nome 
        LIKE '%$busca%'";
        $sql_query = $conexao->query($sql_code) or die($conexao->error);
        if ($sql_query->num_rows == 0) {
          echo ("Nenhum resultado encontrado.");
        } else { ?>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Unidade</th>
                <th scope="col">Valor</th>
                <th scope="col">Categoria</th>
                <th scope="col">Entrega</th>
              </tr>
            </thead>
            <?php while ($dados = $sql_query->fetch_assoc()) {
              ?>
              <tbody>
                <tr>
                  <td>
                    <?php echo $dados['nome']; ?>
                  </td>
                  <td>
                    <?php echo $dados['unidade']; ?>
                  </td>
                  <td>
                    <?php echo $dados['valor']; ?>
                  </td>
                  <td>
                    <?php echo $dados['categoria']; ?>
                  </td>
                  <td>
                    <?php echo $dados['entrega']; ?>
                  </td>
                </tr>
              </tbody>
            <?php }
        }
      }
    }
    ?>
    </table>

  </div>
</div>
</div>
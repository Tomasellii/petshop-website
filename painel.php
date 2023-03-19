<?php
if ($_SERVER['PHP_SELF'] == "/Unisinos/resultado.php") {
}
include('protecao.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Painel</title>
</head>

<body>
  <script src="js/bootstrap.bundle.min.js"></script>
  <?php
  ?>
  <style>
    body {
      background-image: url('imagens/background.jpg');
      background-position: top;
      background-size: 100%;
    }

    .btn-group {
      margin-right: ;
    }

    .box {
      margin-top: 60px;
      background-color: white;
      width: fit-content;
    }

    .container-fluid a {
      margin-left: 20px;
      margin-right: 0px;
    }

    span {
      color: red;
    }

  </style>
  <nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container-fluid">
      <a class="navbar-brand" href="painel.php">Início</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php if ($_SERVER['PHP_SELF'] == "/Unisinos/painel.php") {
              echo ("?page=list-services");
            } else {
              echo ("painel.php?page=services");
            } ?>">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php if ($_SERVER['PHP_SELF'] == "/Unisinos/painel.php") {
              echo ("?page=list-pets");
            } else {
              echo ("painel.php?page=list-pets");
            } ?>">Pet's</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?php if ($_SERVER['PHP_SELF'] == "/Unisinos/painel.php") {
              echo ("?page=products");
            } else {
              echo ("painel.php?page=products");
            } ?>">Produtos</a>
          </li>
        </ul>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
          <?php
          if (!isset($_SESSION)) {
            session_start();
          }
          echo $_SESSION['nome'];
          ?>
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="?page=editar">Editar Perfil</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="logout.php">
              <span>Sair</span>
            </a></li>
        </ul>
      </div>
  </nav>
  <?php
  include("conexao.php");

  switch (@$_REQUEST["page"]) {

    case "products":
      include("products.php");
      break;
    case "services":
      include("services.php");
      break;
    case "logout":
      include("logout.php");
      break;
    case "list-pets":
      include("list-pets.php");
      break;
    case "sign-in-pets":
      include("sign-in-pets.php");
      break;
    case ("list-services"):
      include("list-services.php");
      break;
    default;
  }
  ?>
</body>

</html>
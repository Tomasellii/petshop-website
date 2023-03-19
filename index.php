<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Inicio</title>
</head>
<body>
  <script src="js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: url('imagens/background.jpg');
      background-position: top;
      background-size: 100%;
    }
    .box {
      margin: 0 auto;
      background-color: Seashell;
      width: fit-content;
      height: max-content;
      padding: 20px
    }
    .container-fluid a {
      margin-left: 20px;
      margin-right: -10px;
    }
  </style>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Início</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="">Contato</a>
          </li>
        </ul>
        <a href="login.php" class="btn btn-outline-primary">Entrar</a>
        <a href="sign-in.php" class="btn btn-primary">Criar Conta</a>
      </div>
    </div>
  </nav>
  <?php
  //switch para incluir as paginas
  switch (@$_REQUEST["page"]) {
    case "sobre":
      include("sobre.php");
      break;
    case "contato":
      include("contato.php");
      break;
    default;
  }
  ?>
</body>
</html>
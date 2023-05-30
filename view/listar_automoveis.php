<?php

include_once '../database/database_functions.php';
use Database\DatabaseFunctions;

if (isset($_GET['automovel_nome'])) {
  $html = DatabaseFunctions::searchAutomovel($_GET['automovel_nome']);
} else {
  $html = DatabaseFunctions::listAutomoveis();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="/atividade_proposta_webline/assets/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="/atividade_proposta_webline/css/style.css">

  <title>Buscar Automóveis</title>
</head>

<body>
  <main id="main-listar">
    <button id="btn-voltar" onclick="location.href=`home`">Voltar</button>

    <form id="form-pesquisar" action="listar" method="GET">
      <p>Pesquisar Automóvel</p>
      <label for="automovel_nome">
        Nome <br />
        <input id="nome" type="text" name="automovel_nome" id="automovel_nome">
      </label>

      <br />
      <input id="btn-pesquisar" type="submit" value="Pesquisar">
    </form>
    <?= $html ?>
  </main>
</body>

</html>
<?php

include_once '../database/database_functions.php';

use Database\DatabaseFunctions;

$selectInput = DatabaseFunctions::selectMontadoras();

?>

<!DOCTYPE html>
<html lang="pt-BR" id="html-index">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="/atividade_proposta_webline/assets/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="/atividade_proposta_webline/css/style.css">

  <title>Cadastro de Automóveis</title>
</head>

<body id="body-index">
  <main>
    <form id="form-inserir" action="inserir" method="POST">
      <label for="nome">
        Nome<strong>*</strong>
        <br />
        <input type="text" name="nome" id="nome" placeholder="Ex: Corolla" required>
      </label>

      <br />

      <label for="placa">
        Placa<strong>*</strong>
        <br />
        <input type="text" name="placa" id="placa" placeholder="Ex: ABC1234" minlength="7" maxlength="7" required>
      </label>

      <br />

      <label for="chassi">
        Chassi<strong>*</strong>
        <br />
        <input type="text" name="chassi" id="chassi" placeholder="Ex: 9BRBLWHEXG0107721" minlength="17" maxlength="17"
          required>
      </label>

      <br />

      <label for="montadora">
        Montadora<strong>*</strong>
        <br />
        <?= $selectInput ?>
      </label>

      <br />

      <input id="btn-cadastrar" type="submit" value="Cadastrar">
    </form>

    <button id="btn-listar" onclick="location.href=`listar`">Listar Automóveis</button>
  </main>
</body>

</html>
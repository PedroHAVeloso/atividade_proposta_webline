<?php

include_once '../database/database_functions.php';

use Database\DatabaseFunctions;

$selectInput = DatabaseFunctions::selectMontadoras();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Automóveis</title>
</head>

<body>
  <main>
    <form action="inserir_automovel.php" method="POST">
      <label for="nome">
        Nome*
        <input type="text" name="nome" id="nome" placeholder="Ex: Corolla" required>
      </label>

      <label for="placa">
        Placa*
        <input type="text" name="placa" id="placa" placeholder="Ex: ABC1234" minlength="7" maxlength="7" required>
      </label>

      <label for="chassi">
        Chassi*
        <input type="text" name="chassi" id="chassi" placeholder="Ex: 9BRBLWHEXG0107721" minlength="17" maxlength="17"
          required>
      </label>

      <label for="montadora">
        Montadora*
        <?= $selectInput ?>
      </label>

      <input type="submit" value="Cadastrar">
    </form>

    <button onclick="location.href=`listar_automoveis.php`">Listar Automóveis</button>
  </main>
</body>

</html>
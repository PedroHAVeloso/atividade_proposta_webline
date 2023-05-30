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
  <title>Buscar Automóveis</title>
</head>

<body>
  <main>
    <form action="listar_automoveis.php" method="GET">
      <p>Pesquisar Automóvel</p>
      <label for="automovel_nome">
        Nome
        <input type="text" name="automovel_nome" id="automovel_nome">
      </label>

      <input type="submit" value="Pesquisar">
    </form>
    <?= $html ?>
  </main>
</body>

</html>
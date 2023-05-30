<?php

use Database\DatabaseFunctions;

include_once '../database/database_functions.php';

$message = DatabaseFunctions::insertAutomovel();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="refresh" content="3; url=index.php" />

  <title>Automóvel Inserido</title>
</head>

<body>
  <main>
    <?= $message ?>
  </main>
</body>

</html>
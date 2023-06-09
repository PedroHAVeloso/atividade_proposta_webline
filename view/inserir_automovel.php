<?php

use Database\DatabaseFunctions;

include_once '../database/database_functions.php';

$message = DatabaseFunctions::insertAutomovel();

?>

<!DOCTYPE html>
<html lang="pt-BR" id="html-index">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="refresh" content="3; url=home" />

  <link rel="shortcut icon" href="/atividade_proposta_webline/assets/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="/atividade_proposta_webline/css/style.css">

  <title>Automóvel Inserido</title>
</head>

<body id="body-index">
  <main>
    <?= $message ?>
  </main>
</body>

</html>
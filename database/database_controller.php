<?php

namespace Database;

use PDO;
use Exception;

include_once '../utils/env.php';
use Utils\Env;


/**
 * Controlador do banco de dados.
 */
class DatabaseController
{

  /**
   * Realiza conexão com o banco.
   * Retorna o PDO de conexão em caso de sucesso.
   * Retorna nulo em caso de erro.
   * 
   * @return \PDO|null 
   */
  public static function connect()
  {
    try {
      $env = new Env();

      $connection = new PDO(
          $env::$DB_DRIVE
        . ':dbname=' . $env::$DB_NAME
        . ';host=' . $env::$DB_HOST,
          $env::$DB_USER,
          $env::$DB_PASS
      );

      return $connection;
    } catch (Exception $exc) {
      return null;
    }
  }

  /**
   * Destrói o objeto PDO de conexão.
   * 
   * @param PDO $connection
   * @return null
   */
  public static function close(PDO &$connection)
  {
    $connection = null;
    return $connection;
  }
}
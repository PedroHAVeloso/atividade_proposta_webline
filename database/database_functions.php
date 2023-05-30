<?php

namespace Database;

include_once '../database/database_controller.php';
use Database\DatabaseController;

use Exception;

class DatabaseFunctions
{

  /**
   * Insere automóveis na tabela de automóveis.
   * Caso sucesso na inserção, retorna uma string informando.
   * Caso erro, retorna uma string com o erro.
   * 
   * @return string
   */
  public static function insertAutomovel()
  {
    try {
      $nome = $_POST['nome'];
      $placa = $_POST['placa'];
      $chassi = $_POST['chassi'];
      $montadora = $_POST['montadora'];

      $connection = DatabaseController::connect();

      $script = "
        INSERT INTO automoveis(
          nome, placa, chassi, montadora
        ) VALUES 
          ( '$nome', 
            '$placa', 
            '$chassi', 
            (SELECT codigo FROM montadora WHERE nome = '$montadora')
        );
      ";

      $query = $connection->prepare($script);

      $query->execute();

      return '<h1>Automóvel cadastrado.</h1>';
    } catch (Exception $exc) {
      return
        '<h1>Ocorreu um erro ao inserir o automóvel. Informe ao administrador.</h1>' .
        '<p>' . $exc->getMessage() . '</p>';
    } finally {
      DatabaseController::close($connection);
    }
  }

  /**
   * Lista todos os automóveis armazenados no banco.
   * Caso sucesso, retorna uma string com o HTML da tabela.
   * Caso erro, retorna uma string com o erro.
   * 
   * @return string
   */
  public static function listAutomoveis()
  {
    try {
      $connection = DatabaseController::connect();

      $script = "
        SELECT automoveis.nome, automoveis.placa, automoveis.chassi, montadora.nome as 'montadora'
        FROM automoveis INNER JOIN montadora 
        WHERE automoveis.montadora = montadora.codigo;
      ";

      $query = $connection->prepare($script);

      $query->execute();

      $table = "
        <table>
          <tr>
            <th class='table-th'>Nome</th>
            <th class='table-th'>Placa</th>
            <th class='table-th'>Chassi</th>
            <th class='table-th'>Montadora</th>
          </tr>";

      while ($row = $query->fetch()) {
        $table .= "
        <tr>
          <td class='table-td'>$row[nome]</td>
          <td class='table-td'>$row[placa]</td>
          <td class='table-td'>$row[chassi]</td>
          <td class='table-td'>$row[montadora]</td>
        </tr>
        ";
      }

      $table .= "</table>";

      return $table;
    } catch (Exception $exc) {
      return
        '<h1>Ocorreu um erro ao listar os automóveis. Informe ao administrador.</h1>' .
        '<p>' . $exc->getMessage() . '</p>';
    } finally {
      DatabaseController::close($connection);
    }
  }

  /**
   * Pesquisa um automóvel especificado pelo nome.
   * Caso sucesso, retorna uma string com o HTML da tabela.
   * Caso erro, retorna uma string com o erro.
   * 
   * @return string
   */
  public static function searchAutomovel($automovel_nome)
  {
    try {
      $connection = DatabaseController::connect();

      $script = "
        SELECT automoveis.nome, automoveis.placa, automoveis.chassi, montadora.nome as 'montadora'
        FROM automoveis
        INNER JOIN montadora 
        ON automoveis.montadora = montadora.codigo
        WHERE automoveis.nome = '$automovel_nome';
      ";

      $query = $connection->prepare($script);

      $query->execute();

      if ($query->rowCount() > 0) {
        $table = "
        <table>
          <tr>
            <th class='table-th'>Nome</th>
            <th class='table-th'>Placa</th>
            <th class='table-th'>Chassi</th>
            <th class='table-th'>Montadora</th>
          </tr>";

        while ($row = $query->fetch()) {
          $table .= "
        <tr>
          <td class='table-td'>$row[nome]</td>
          <td class='table-td'>$row[placa]</td>
          <td class='table-td'>$row[chassi]</td>
          <td class='table-td'>$row[montadora]</td>
        </tr>
        ";
        }

        $table .= "</table>";
      } else {
        $table = "
          <h1>Nenhum automóvel encontrado.</h1>
        ";
      }

      return $table;
    } catch (Exception $exc) {
      return
        '<h1>Ocorreu um erro ao buscar o automóvel. Informe ao administrador.</h1>' .
        '<p>' . $exc->getMessage() . '</p>';
    } finally {
      DatabaseController::close($connection);
    }
  }

  /**
   * Lista todos as montadoras armazenados no banco.
   * Caso sucesso, retorna uma string com o HTML do input select.
   * Caso erro, retorna uma string com o erro.
   * 
   * @return string
   */
  public static function selectMontadoras()
  {
    try {
      $connection = DatabaseController::connect();

      $selectInput = "<select name='montadora' id='montadora' required>";

      $script = 'SELECT nome FROM montadora;';

      $query = $connection->prepare($script);

      $query->execute();

      while ($row = $query->fetch()) {
        $selectInput .= "<option value='$row[nome]'>$row[nome]</option>";
      }

      $selectInput .= "</select>";

      return $selectInput;
    } catch (Exception $exc) {
      return
        '<h1>Ocorreu um erro ao listar as montadoras. Informe ao administrador.</h1>' .
        '<p>' . $exc->getMessage() . '</p>';
    } finally {
      DatabaseController::close($connection);
    }
  }
}
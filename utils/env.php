<?php

namespace Utils;

/**
 * Utilização das variáveis de ambiente.
 */
class Env
{
  public static $DB_DRIVE;
  public static $DB_HOST;
  public static $DB_NAME;
  public static $DB_USER;
  public static $DB_PASS;


  function __construct()
  {
    $env = parse_ini_file('../.env');

    self::$DB_DRIVE = $env['DB_DRIVE'];
    self::$DB_HOST = $env['DB_HOST'];
    self::$DB_NAME = $env['DB_NAME'];
    self::$DB_USER = $env['DB_USER'];
    self::$DB_PASS = $env['DB_PASS'];
  }

}
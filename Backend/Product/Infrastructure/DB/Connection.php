<?php

declare(strict_types=1);

namespace Backend\Product\Infrastructure\DB;

use Exception;
use PDO;

class Connection
{
  private $password = "160003450";
  private $user = "postgres";
  private $dbName = "test-ddd";
  private $ip = "127.0.0.1";
  private $port = "5432";

  public function conexion(): PDO
  {
    try {
      $pdo = new PDO("pgsql:host={$this->ip};port={$this->port};dbname={$this->dbName}", $this->user, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (Exception $e) {
        echo "Ocurrió un error con la base de datos: " . $e->getMessage();
    }
  }
}

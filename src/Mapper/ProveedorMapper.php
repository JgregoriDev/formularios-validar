<?php

declare(strict_types=1);

namespace App\Mapper;

use App\Registry;
use \PDO;
use App\Entity\Proveedor;

class ProveedorMapper
{
  protected PDO $pdo;


  public function __construct()
  {
    $this->pdo = Registry::getPDO();
  }

  public function find(int $id): ?Proveedor
  {
    $stmt = $this->pdo->prepare("SELECT * FROM proveedor WHERE CODPROVEEDOR=:id");
    $stmt->execute(["id" => $id]);
    $row = $stmt->fetch();

    $stmt->closeCursor();

    if (!is_array($row)) {
      return null;
    }

    if (!isset($row['CODPROVEEDOR'])) {
      return null;
    }
    $object = Proveedor::fromArray($row);
    return $object;
  }

  public function findAll(): array
  {
    $array = [];
    $selectAllStmt = $this->pdo->prepare(
      "SELECT * FROM proveedor"
    );
    $selectAllStmt->execute();
    $array = [];
    // var_dump($selectAllStmt->fetchAll());
    while ($row = $selectAllStmt->fetch())
      $array[] = Proveedor::fromArray($row);

    return $array;
  }

  public function createObject(array $raw): Proveedor
  {
    $obj = Proveedor::fromArray($raw);
    return $obj;
  }

  public function insert(Proveedor $obj)
  {
    // var_dump($obj);
    //unset($values["nombreMarca"]);
    $insertStmt = $this->pdo->prepare(
      "INSERT INTO proveedor(CODPROVEEDOR, RAZONSOCIAL,NIF) VALUES
         (:codProveedor,:razonSocial,:nif)"
    );

    $codProveedor = $obj->getCodProveedor();
    $razonSocial = $obj->getRazonSocial();
    $nif = $obj->getNif();
    $insertStmt->execute([
      ':codProveedor' => $codProveedor,
      ':razonSocial' => $razonSocial,
      ':nif' => $nif,
      // ':esManoObra' => $manoObra,
      // ':re' => $re,
    ]);
    
    // $id = $this->pdo->lastInsertId();
    // $obj->setCodMarca((int)$id);

  }

  public function update(Proveedor $obj, int $aux)
  {
    $values = $obj->toArray($obj);
    var_dump($aux);
    $updateStmt = $this->pdo->prepare(
      "UPDATE proveedor 
              set
              CODPROVEEDOR = :codProveedor,
              RAZONSOCIAL=:razonSocial,
              NIF=:nif
              WHERE CODPROVEEDOR = :codProveedorAux"
    );
    $codProveedor = $obj->getCodProveedor();
    $razonSocial = $obj->getRazonSocial();
    $nif = $obj->getNif();
    // $manoObra = $obj->getEsmanoObra();
    // $re = $obj->getRe();
    // $codEAN = $obj->getInicioCodean();
    $updateStmt->execute([
      ':codProveedor' => $codProveedor,
      ':codProveedorAux' => $aux,
      ':razonSocial' => $razonSocial,
      ':nif' => $nif
    ]);
  }
  public function delete(Proveedor $proveedor)
  {
    var_dump($proveedor);
    $sql = "DELETE FROM `proveedor` WHERE CODPROVEEDOR=:codProveedor";
    $statement = $this->pdo->prepare($sql);
    $codProveedor = $proveedor->getCodProveedor();
    $statement->execute([":codProveedor"=> $codProveedor]);
    var_dump($statement->rowCount());
  }
}

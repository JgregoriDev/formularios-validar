<?php

namespace App\Mapper;

use App\Registry;
use App\Entity\Subfamilia;
use PDO;

class SubfamiliaMapper
{
  protected PDO $pdo;


  public function __construct()
  {
    $this->pdo = Registry::getPDO();
  }

  public function find(int $id, int $id2): ?Subfamilia
  {
    $stmt = $this->pdo->prepare("SELECT  s.CODFAMILIA, f.NOMBRE as NOMBREFAMILIA,
    s.CODSUBFAMILIA, s.NOMBRE AS NOMBRESUBFAMILIA 
    FROM subfamilia s
    INNER JOIN familia f ON s.CODFAMILIA=f.CODFAMILIA 
     WHERE s.CODFAMILIA=:id AND s.CODSUBFAMILIA=:id2");
    $stmt->execute(["id" => $id, "id2" => $id2]);
    $row = $stmt->fetch();

    $stmt->closeCursor();

    if (!is_array($row)) {
      return null;
    }
    if (!isset($row['CODFAMILIA'])) {
      return null;
    }

    $object = Subfamilia::fromArray($row);
    return $object;
  }

  public function findAll(): array
  {
    $array = [];
    $selectAllStmt = $this->pdo->prepare(
      "SELECT subfamilia.CODFAMILIA, familia.NOMBRE as NOMBREFAMILIA,
       subfamilia.CODSUBFAMILIA, subfamilia.NOMBRE AS NOMBRESUBFAMILIA,
       subfamilia.IMAGEN  as IMAGEN
       FROM subfamilia INNER JOIN familia ON subfamilia.CODFAMILIA=familia.CODFAMILIA LIMIT 1,10;"
    );
    $selectAllStmt->execute();
    $array = [];
    // var_dump($selectAllStmt->fetchAll());
    while ($row = $selectAllStmt->fetch()) {
      $array[] = Subfamilia::fromArray($row);
    }

    return $array;
  }

  public function createObject(array $raw): Subfamilia
  {
    $obj = Subfamilia::fromArray($raw);
    return $obj;
  }

  public function insert(Subfamilia $obj)
  {

    //unset($values["nombreMarca"]);
    $insertStmt = $this->pdo->prepare(
      "INSERT INTO subfamilia(CODFAMILIA, CODSUBFAMILIA,NOMBRE) VALUES
         (:codFamilia,:codSubfamilia,:nombreSubfamilia)"
    );

    $codFamilia = $obj->getCodFamilia();
    $codSubfamilia = $obj->getCodSubfamilia();
    $nombreFamilia = $obj->getNombre();
    $image = $obj->getImage()??'';

    $insertStmt->execute([
      ':codFamilia' => $codFamilia,
      ':codSubfamilia' => $codSubfamilia,
      ':nombreSubfamilia' => $nombreFamilia
      //':imagen' => $image
    ]);
    if ($insertStmt->rowCount() > 0)
      return true;
    return false;
    // $id = $this->pdo->lastInsertId();
    // $obj->setCodMarca((int)$id);

  }

  public function update(Subfamilia $obj,int $id, int $id2)
  {
    $values = $obj->toArray($obj);
    var_dump($id,$id2);
    $updateStmt = $this->pdo->prepare(
      "UPDATE subfamilia 
              set
              CODFAMILIA=:codFamilia,
              CODSUBFAMILIA=:codSubfamilia,
              NOMBRE=:nombreSubfamilia
              WHERE CODSUBFAMILIA = :codSubfamiliaAux
              AND CODFAMILIA=:codFamiliaAux" 
    );
    $codFamilia = $obj->getCodFamilia();
    $codSubfamilia = $obj->getCodSubfamilia();
    $nombreFamilia = $obj->getNombre();

    $updateStmt->execute([
      ':codFamilia' =>   $codFamilia,
      ':codSubfamilia' =>   $codSubfamilia,
      ':codFamiliaAux' =>   $id,
      ':codSubfamiliaAux' =>   $id2,
      ':nombreSubfamilia' =>   $nombreFamilia
    ]);
    if($updateStmt->rowCount()>0)
      return true;
    return false;
  }
  public function delete(Subfamilia $subf)
  {
    $sql = "DELETE FROM `subfamilia` WHERE CODFAMILIA=:codFamilia AND CODSUBFAMILIA=:codSubfamilia";
    $statement = $this->pdo->prepare($sql);
    $codFamilia = $subf->getCodFamilia();
    $codSubfamilia = $subf->getCodSubfamilia();
    $imagen = $subf->getCodSubfamilia();
    $statement->bindParam(":codFamilia", $codFamilia);
    $statement->bindParam(":codSubfamilia", $codSubfamilia);
    $statement->execute();
    if ($statement->rowCount() > 0) {
      return true;
    }
    return false;
  }
}

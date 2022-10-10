<?php

namespace App\Mapper;

use App\Registry;
use App\Entity\Familia;
use PDO;

class FamiliaMapper
{
  protected PDO $pdo;


  public function __construct()
  {
    $this->pdo = Registry::getPDO();
  }

  public function find(int $id): ?Familia
  {
    $stmt = $this->pdo->prepare("SELECT * FROM familia WHERE CODFAMILIA=:id");
    $stmt->execute(["id" => $id]);
    $row = $stmt->fetch();

    $stmt->closeCursor();

    if (!is_array($row)) {
      return null;
    }
    if (!isset($row['CODFAMILIA'])) {
      return null;
    }
    $object = Familia::fromArray($row);
    return $object;
  }

  public function findAll(): array
  {
    $array = [];
    $selectAllStmt = $this->pdo->prepare(
      "SELECT * FROM familia"
    );
    $selectAllStmt->execute();
    $array = [];

    while ($row = $selectAllStmt->fetch())
      $array[] = Familia::fromArray($row);

    return $array;
  }

  public function createObject(array $raw): Familia
  {
    $obj = Familia::fromArray($raw);
    return $obj;
  }

  public function insert(Familia $obj)
  {
    // var_dump($obj);
    //unset($values["nombreMarca"]);
    $insertStmt = $this->pdo->prepare(
      "INSERT INTO familia(CODFAMILIA, NOMBRE,MARGEN,IVAPERCENT, ESMANOOBRA, INICIOCODEAN, RE, IMAGEN) VALUES
         (:codFamilia,:nombreFamilia,:margen,:ivaPercent,:esManoObra,:inicioCodean,:RE,:Imagen)"
    );
    // :esAnimales
    // ESANIMALES
    $codFamilia = $obj->getCodFamilia();
    $nombreFamilia = $obj->getNombreFamilia();
    $margen = $obj->getMargen();
    $ivaPercent = $obj->getIvaPercent();
    $manoObra = $obj->getEsmanoObra();
    $re = $obj->getRe();
    $imagen = $obj->getImage();
    $esAnimales = $obj->getEsAnimales() ?? 0;
    $codEAN = $obj->getInicioCodean();
    $insertStmt->execute([
      ':codFamilia' => $codFamilia,
      ':nombreFamilia' => $nombreFamilia,
      ':margen' => $margen,
      ':ivaPercent' => $ivaPercent,
      ':esManoObra' => $manoObra,
      ':RE' => $re,
      ':inicioCodean' => $codEAN,
      ':Imagen' => $imagen,
      // ':esAnimales' => $esAnimales,
      // ':esManoObra' => $manoObra,
      // ':re' => $re,
    ]);
    if ($insertStmt->rowCount() > 0)
      return true;
    return false;
    // $id = $this->pdo->lastInsertId();
    // $obj->setCodMarca((int)$id);

  }

  public function update(Familia $obj, int $id)
  {
    $values = $obj->toArray($obj);
    $sql = "
    UPDATE `familia`
     SET `CODFAMILIA`=:codFamilia,
     `NOMBRE`=:nombreFamilia,
     `MARGEN`=:margen,
      WHERE CODFAMILIA`=".$id.";";
      // `IVAPERCENT`=:ivaPercent,
      // `INICIOCODEAN`=:inicioCodean,
      // `RE`=:re,
    $updateStmt = $this->pdo->prepare($sql);
    var_dump($sql);
    $codFamilia = $obj->getCodFamilia();
    $codFamiliaAux = $obj->getCodFamilia();
    $nombreFamilia = $obj->getNombreFamilia();
    $margen = $obj->getMargen();
    $ivaPercent = $obj->getIvaPercent();
    $manoObra = $obj->getEsmanoObra();
    $re = $obj->getRe();
    $esAnimales = $obj->getEsAnimales();
    $codEAN = $obj->getInicioCodean();
    var_dump($id);
    $updateStmt->execute([
      ':codFamilia' => $codFamilia,
      ':nombreFamilia' => $nombreFamilia,
      ':margen' => $margen
    ]);
    // ':ivaPercent' => $ivaPercent,
    //   ':inicioCodean' => $codEAN,
    //   ':codFamiliaAux' => $id,
    //   ':re' => $re,
    if ($updateStmt->rowCount() > 0)
      return true;
    return false;
  }
  public function delete(Familia $m)
  {
    $sql = "DELETE FROM `familia` WHERE CODFAMILIA=:codFamilia";
    $statement = $this->pdo->prepare($sql);
    $codFamilia = $m->getCodFamilia();
    $statement->bindParam(":codFamilia", $codFamilia);
    $statement->execute();
    if ($statement->rowCount() > 0)
      return true;
    return false;
  }
}

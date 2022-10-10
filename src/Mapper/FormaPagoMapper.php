<?php

namespace App\Mapper;

use App\Entity\FormaPago;
use App\Registry;
use PDO;

class FormaPagoMapper
{
  protected PDO $pdo;


  public function __construct()
  {
    $this->pdo = Registry::getPDO();
  }

  public function find(int $id): ?FormaPago
  {
    $stmt = $this->pdo->prepare("SELECT * FROM fp WHERE CODFP=:id");
    $stmt->execute(["id" => $id]);
    $row = $stmt->fetch();

    $stmt->closeCursor();

    if (!is_array($row)) {
      return null;
    }
    if (!isset($row['CODFP'])) {
      return null;
    }
    $object = FormaPago::fromArray($row);
    return $object;
  }

  public function findAll(): array
  {
    $array = [];
    $selectAllStmt = $this->pdo->prepare(
      "SELECT * FROM fp"
    );
    $selectAllStmt->execute();
    $array = $selectAllStmt->fetchAll();
    while ($row = $selectAllStmt->fetch())
      $array[] = FormaPago::fromArray($row);
    return $array;
  }

  public function insert(FormaPago $obj): bool
  {

    $insertStmt = $this->pdo->prepare(
      "INSERT INTO fp(CODFP, NOMBRE, NPLAZOS,DISTANCIA,CODEEMPRESA) 
          VALUES (:codFP, :nombre, :nplazos,:distancia,:codempresa)"
    );

    $codFP = $obj->getCodFp();
    $nombreFP = $obj->getNombre();
    $distancia = $obj->getDistancia();
    $plazos = $obj->getNumPlazos();
    $codEmpresa = $obj->getCodEmpresa();

    $insertStmt->execute([
      ':codFP' => $codFP,
      ':nombre' => $nombreFP,
      ':nplazos' => $plazos,
      ':distancia' => $distancia,
      ':codempresa' => $codEmpresa
    ]);
    if ($insertStmt->rowCount() > 0)
      return true;
    return false;
    // $id = $this->pdo->lastInsertId();
    // $obj->setCodMarca((int)$id);
  }

  public function update(FormaPago $obj, $auxID)
  {
    $values = $obj->toArray($obj);

    // "UPDATE fp 
    //         set
    //         CODFP = :codFP
    //         NOMBRE=:nombre, 
    //         NPLAZOS=:nplazos,
    //         DISTANCIA=:distancia,
    //           WHERE CODFP = :codFPAux"
    $updateStmt = $this->pdo->prepare(
      "UPDATE `fp` SET `CODFP`=:codFP,
      `NOMBRE`=:nombre,
      `NPLAZOS`=:nplazos,
      `DISTANCIA`=:distancia
       WHERE `CODFP`=:codFPAux"
    );

    $codFP = $obj->getCodFp();
    $nombreFP = $obj->getNombre();
    $distancia = $obj->getDistancia();
    $plazos = $obj->getNumPlazos();
    //$codEmpresa = $obj->getCodEmpresa();

    $updateStmt->execute([
      ':codFP' => $codFP,
      ':codFPAux' => $auxID,
      ':nombre' => $nombreFP,
      ':nplazos' => $plazos,
      ':distancia' => $distancia
    ]);
    if ($updateStmt->rowCount() > 0)
      return true;
    return false;
  }

  public function delete(FormaPago $fp): bool
  {
    $sql = "DELETE FROM `fp` WHERE CODFP=:codFp";
    $statement = $this->pdo->prepare($sql);
    $codFP = $fp->getCodFp();
    $statement->bindParam(":codFp", $codFP);
    $statement->execute();
    if ($statement->rowCount() > 0)
      return true;
    return false;
  }
}

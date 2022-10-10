<?php

namespace App\Mapper;

use App\Registry;
use App\Entity\Marca;
use PDO;

class MarcaMapper
{
  protected PDO $pdo;


  public function __construct()
  {
    $this->pdo = Registry::getPDO();
  }

  public function find(int $id): ?Marca
  {
    $stmt = $this->pdo->prepare("SELECT * FROM marca WHERE CODMARCA=:id");
    $stmt->execute(["id" => $id]);
    $row = $stmt->fetch();

    $stmt->closeCursor();

    if (!is_array($row)) {
      return null;
    }
    if (!isset($row['CODMARCA'])) {
      return null;
    }

    $object = Marca::fromArray($row);
    return $object;
  }

  public function findAll(): array
  {
    $array = [];
    $selectAllStmt = $this->pdo->prepare(
      "SELECT * FROM marca"
    );
    $selectAllStmt->execute();
    $array = [];
    // $rows = $selectAllStmt->fetchAll();
    // while ($row = $selectAllStmt->fetch())
    // $array[] = Marca::fromArray($row);
    while ($row = $selectAllStmt->fetch())
      $array[] = Marca::fromArray($row);

    //var_dump($array);
    return $array;
  }

  public function createObject(array $raw): Marca
  {
    $obj = Marca::fromArray($raw);
    return $obj;
  }

  public function insert(Marca $obj): bool
  {

    //unset($values["nombreMarca"]);
    $insertStmt = $this->pdo->prepare(
      "INSERT INTO marca(CODMARCA, NOMBREMARCA, RUTALOGO) 
          VALUES (:codMarca, :nombreMarca, :rutaLogo)"
    );

    $codMarca = (int)$obj->getCodMarca();
    $nombreMarca = $obj->getNombreMarca();
    $rutaLogo = $obj->getRutaLogo();

    $insertStmt->execute([
      ':codMarca' => $codMarca,
      ':nombreMarca' => $nombreMarca,
      ':rutaLogo' => $rutaLogo
    ]);
    // $id = $this->pdo->lastInsertId();
    // $obj->setCodMarca((int)$id);
    if ($insertStmt->rowCount() > 0)
      return true;
    return false;
  }

  public function update(Marca $obj, int $idAux)
  {
    $values = $obj->toArray($obj);

    $updateStmt = $this->pdo->prepare(
      "UPDATE marca 
                    set
                    CODMARCA=:codMarca,
                    NOMBREMARCA=:nombreMarca,
                    RUTALOGO=:rutaLogo
                    WHERE CODMARCA = :codMarcaAux"
    );
    $codMarca = $obj->getCodMarca();
    $nombreMarca = $obj->getNombreMarca();
    $rutaLogo = $obj->getRutaLogo() ?? "";
    $idHelper=$idAux;
    $updateStmt->execute([
      ':codMarca' => $codMarca,
      ':codMarcaAux' => $idHelper,
      ':nombreMarca' => $nombreMarca,
      ':rutaLogo' => $rutaLogo
    ]);
    if ($updateStmt->rowCount() > 0)
      return true;
    return false;
  }
  public function delete(Marca $marca): bool
  {
    $sql = "DELETE FROM `marca` WHERE CODMARCA=:codMarca";
    $statement = $this->pdo->prepare($sql);
    $codMarca = $marca->getCodMarca();
    $statement->bindParam(":codMarca", $codMarca);
    $statement->execute();
    if ($statement->rowCount() > 0)
      return true;
    return false;
  }
}

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
      "INSERT INTO proveedor(
        CODPROVEEDOR, RAZONSOCIAL,NIF,DOMICILIO,CODPOSTAL,POBLACION,PROVINCIA,
      EMAIL, WWW, TFNO1, TFNO2, FAX, CUENTA, CUENTAPAGO, 
      TIPOGASTO, IVAPERCENT, AB, CODFP, CODPAIS_OFICIAL, NIFPAISRESIDENCIA,
      CLAVEIDENPAISRESIDENCIA, CONTAB_INTRACOM, TIENE_RE, ESINVERSIONSUJETOPASIVO, PAIS) VALUES
         (:codProveedor,:razonSocial,:nif,:domicilio,:codPostal,:poblacion,:provincia,
         :email,:www, :tfno1, :tfno2, :fax, :cuenta, :cuentaPago, 
         :tipoGasto, :ivaPercent, :ab, :codFP, :codPaisOficial,:nifPaisResidencia,
         :claveIdEnPaisResidencia,:contabintracom,:tieneRe,:esInversionSujetoPasivo,:Pais)"
    );
  
    $codProveedor = $obj->getCodProveedor();
    $razonSocial = $obj->getRazonSocial() ?? '';
    $nif = $obj->getNif() ?? '';
    $domicilio = $obj->getDomicilio() ?? '';
    $codPostal = $obj->getCodigoPostal() ?? '';
    $poblacion = $obj->getPoblacion() ?? '';
    $provincia = $obj->getProvincia() ?? '';
    $email = $obj->getEmail() ?? '';
    $www = $obj->getWww() ?? '';
    $tlfno1 = $obj->getTlfn1() ?? '';
    $tlfno2 = $obj->getTlfn2() ?? '';
    $fax = $obj->getFax() ?? '';
    $cuenta = $obj->getCuenta() ?? '';
    $cuentaPago = $obj->getCuentaPago() ?? '';
    $iva=$obj->getIvaPercent();
    $ab=$obj->getAb();
    $codFP=$obj->getCodFP();
    $codPaisOficial=$obj->getCodPaisOficial()??'';
    $nifPaisResidencia=$obj->getNifPaisRecidencia()??'';
    $tipoGasto=$obj->getTipoGasto()??'';
    $tieneRe=$obj->getTieneRE()??'';
    $esInversion=$obj->getEsInversion();
    $pais=$obj->getPais();
    var_dump($obj);
    $insertStmt->execute([
      ":codProveedor"=>$codProveedor,
      ":razonSocial"=>$razonSocial,
      ":nif"=>$nif,
      ":domicilio"=>$domicilio,
      ":codPostal"=>$codPostal,
      ":poblacion"=>$poblacion,
      ":provincia"=>$provincia,
      ":email"=>$email,
      ":www"=>$www,
      ":tfno1"=>$tlfno1,
      ":tfno2"=>$tlfno2,
      ":fax"=>$fax,
      ":cuenta"=>$cuenta,
      ":cuentaPago"=>$cuentaPago, 
      ":tipoGasto"=>1,
      ":ivaPercent"=>22,
      ":ab"=>$ab, 
      ":codFP"=>328, 
      ":codPaisOficial"=>$codPaisOficial,
      ":nifPaisResidencia"=>$nifPaisResidencia,
      ":claveIdEnPaisResidencia"=>0,
      ":contabintracom"=>1,
      ":tieneRe"=>2,
      ":esInversionSujetoPasivo"=>$esInversion,
      ":Pais"=>$pais
    ]);
    echo $insertStmt->rowCount();
    // $id = $this->pdo->lastInsertId();
    // $obj->setCodMarca((int)$id);
    if ($insertStmt->rowCount() > 0)
      return true;
    return false;
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
    $statement->execute([":codProveedor" => $codProveedor]);
    var_dump($statement->rowCount());
  }
}

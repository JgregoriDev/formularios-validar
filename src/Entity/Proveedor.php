<?php

declare(strict_types=1);

namespace App\Entity;

use Webmozart\Assert\Assert;
use Webmozart\Assert\InvalidArgumentException;

class Proveedor
{
  private int $codProveedor;
  private String $razonSocial;
  private String $nif;
  private String $domicilio;
  private String $poblacion;
  private String $provincia;
  private String $email;
  private String $www;
  private String $tlfn1;
  private String $tlfn2;
  private String $fax;
  private String $mobil;
  private String $cuenta;
  private int $tipoGasto;
  private float $ivaPercent;
  private int $ab;
  private int $codFP;
  private String $codPaisOficial;
  private String $nifPaisRecidencia;
  private String $Tiene_RE;
  private int $esUnversion;
  private String $Pais;

  public function __construct(int $codProveedor = 0, String $razonSocial, String $nif)
  {
    $this->codProveedor = 0;
    $this->razonSocial = 0;
    $this->nif = '';
    $this->domicilio = '';
    $this->poblacion = '';
    $this->www = '';
    $this->tlfn1 = '';
    $this->tlfn2 = '';
    $this->mobil = '';
    $this->cuenta = '';
    $this->tipoGasto = 0;
    $this->ivaPercent = 0;
    $this->ab = 0;
    $this->codFP = 0;
    $this->codPaisOficial = 0;
    $this->nifPaisRecidencia = 0;
    $this->Tiene_RE = 0;
    $this->esUnversion = 0;
    $this->Pais = '';
  }
  public static function fromArray(array $data): Proveedor
  {
    if (empty($data["CODPROVEEDOR"]))
      $id = null;
    else
      $id = (int)$data["CODPROVEEDOR"];
    return new Proveedor(
      $id,
      $data["RAZONSOCIAL"],
      $data["NIF"]
    );
  }

  public function toArray(): array
  {
    return [
      // "CODMARCA" => $this->getCodMarca(),
      // "NOMBREMARCA" => $this->getNombreMarca(),
      // "RUTALOGO" => $this->getRutaLogo()
    ];
  }

  /**
   * Get the value of codProveedor
   *
   * @return int
   */
  public function getCodProveedor(): int
  {
    return $this->codProveedor;
  }

  /**
   * Set the value of codProveedor
   *
   * @param int $codProveedor
   *
   * @return self
   */
  public function setCodProveedor(int $codProveedor): self
  {
    Assert::integer($codProveedor, "El valor del código de proveedor debe ser numérico");
    Assert::greaterThan($codProveedor, 0, 'El valor de proveedor debe ser mayor de 0');
    $this->codProveedor = $codProveedor;

    return $this;
  }

  /**
   * Get the value of razonSocial
   *
   * @return String
   */
  public function getRazonSocial(): String
  {
    return $this->razonSocial;
  }

  /**
   * Set the value of razonSocial
   *
   * @param String $razonSocial
   *
   * @return self
   */
  public function setRazonSocial(String $razonSocial): self
  {

    Assert::maxLength($razonSocial, 50, "La longitud máxima del campo razón social deben ser 50 caracteres");
    $this->razonSocial = $razonSocial;

    return $this;
  }

  /**
   * Get the value of nif
   *
   * @return String
   */
  public function getNif(): String
  {
    return $this->nif;
  }

  /**
   * Set the value of nif
   *
   * @param String $nif
   *
   * @return self
   */
  public function setNif(String $nif): self
  {
    Assert::length($nif, 9, "La longitud esperada del campo nif deben ser 9 caracteres");
    $this->nif = $nif;

    return $this;
  }

  /**
   * Get the value of domicilio
   *
   * @return String
   */
  public function getDomicilio(): String
  {
    return $this->domicilio;
  }

  /**
   * Set the value of domicilio
   *
   * @param String $domicilio
   *
   * @return self
   */
  public function setDomicilio(String $domicilio): self
  {
    Assert::maxLength($domicilio, 50, "La longitud máxima del campo domicilio deben ser 50 caracteres");
    $this->domicilio = $domicilio;

    return $this;
  }

  /**
   * Get the value of poblacion
   *
   * @return String
   */
  public function getPoblacion(): String
  {
    return $this->poblacion;
  }

  /**
   * Set the value of poblacion
   *
   * @param String $poblacion
   *
   * @return self
   */
  public function setPoblacion(String $poblacion): self
  {
    Assert::maxLength($poblacion, 50, "La longitud máxima del campo domicilio deben ser 50 caracteres");
    $this->poblacion = $poblacion;

    return $this;
  }

  /**
   * Get the value of provincia
   *
   * @return String
   */
  public function getProvincia(): String
  {
    return $this->provincia;
  }

  /**
   * Set the value of provincia
   *
   * @param String $provincia
   *
   * @return self
   */
  public function setProvincia(String $provincia): self
  {
    Assert::maxLength($provincia, 50, "La longitud máxima del campo provincia deben ser 50 caracteres");
    $this->provincia = $provincia;

    return $this;
  }

  /**
   * Get the value of email
   *
   * @return String
   */
  public function getEmail(): String
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @param String $email
   *
   * @return self
   */
  public function setEmail(String $email): self
  {
    Assert::email($email, "El campo email no es valido");
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of www
   *
   * @return String
   */
  public function getWww(): String
  {

    return $this->www;
  }

  /**
   * Set the value of www
   *
   * @param String $www
   *
   * 
   * @throws InvalidArgumentException
   * @return self
   */
  public function setWww(String $www): self
  {
    if (filter_var($www, FILTER_VALIDATE_URL) === false) {
      throw new InvalidArgumentException("No es un enlace valido");
    }
    $this->www = $www;

    return $this;
  }

  /**
   * Get the value of tlfn1
   *
   * @return String
   */
  public function getTlfn1(): String
  {
    return $this->tlfn1;
  }

  /**
   * Set the value of tlfn1
   *
   * @param String $tlfn1
   *
   * @return self
   */
  public function setTlfn1(String $tlfn1): self
  {
    Assert::maxLength($tlfn1, 11, "");
    $this->tlfn1 = $tlfn1;

    return $this;
  }

  /**
   * Get the value of tlfn2
   *
   * @return String
   */
  public function getTlfn2(): String
  {
    return $this->tlfn2;
  }

  /**
   * Set the value of tlfn2
   *
   * @param String $tlfn2
   *
   * @return self
   */
  public function setTlfn2(String $tlfn2): self
  {
    Assert::maxLength($tlfn2, 11, "");
    $this->tlfn2 = $tlfn2;

    return $this;
  }

  /**
   * Get the value of fax
   *
   * @return String
   */
  public function getFax(): String
  {
    return $this->fax;
  }

  /**
   * Set the value of fax
   *
   * @param String $fax
   *
   * @return self
   */
  public function setFax(String $fax): self
  {
    Assert::maxLength($fax, 11, "");
    $this->fax = $fax;

    return $this;
  }

  /**
   * Get the value of mobil
   *
   * @return String
   */
  public function getMobil(): String
  {

    return $this->mobil;
  }

  /**
   * Set the value of mobil
   *
   * @param String $mobil
   *
   * @return self
   */
  public function setMobil(String $mobil): self
  {
    Assert::maxLength($mobil, 11, "");
    $this->mobil = $mobil;

    return $this;
  }

  /**
   * Get the value of cuenta
   *
   * @return String
   */
  public function getCuenta(): String
  {
    return $this->cuenta;
  }

  /**
   * Set the value of cuenta
   *
   * @param String $cuenta
   *
   * @return self
   */
  public function setCuenta(String $cuenta): self
  {
    Assert::maxLength($cuenta, 9, "");
    $this->cuenta = $cuenta;

    return $this;
  }

  /**
   * Get the value of tipoGasto
   *
   * @return int
   */
  public function getTipoGasto(): int
  {

    return $this->tipoGasto;
  }

  /**
   * Set the value of tipoGasto
   *
   * @param int $tipoGasto
   *
   * @return self
   */
  public function setTipoGasto(int $tipoGasto): self
  {

    $this->tipoGasto = $tipoGasto;

    return $this;
  }

  /**
   * Get the value of ivaPercent
   *
   * @return float
   */
  public function getIvaPercent(): float
  {
    return $this->ivaPercent;
  }

  /**
   * Set the value of ivaPercent
   *
   * @param float $ivaPercent
   *
   * @return self
   */
  public function setIvaPercent(float $ivaPercent): self
  {
    $this->ivaPercent = $ivaPercent;

    return $this;
  }

  /**
   * Get the value of ab
   *
   * @return String
   */
  public function getAb(): int
  {
    return $this->ab;
  }

  /**
   * Set the value of ab
   *
   * @param String $ab
   *
   * @return self
   */
  public function setAb(int $ab): self
  {
    $this->ab = $ab;

    return $this;
  }

  /**
   * Get the value of codFP
   *
   * @return int
   */
  public function getCodFP(): int
  {
    return $this->codFP;
  }

  /**
   * Set the value of codFP
   *
   * @param int $codFP
   *
   * @return self
   */
  public function setCodFP(int $codFP): self
  {
    $this->codFP = $codFP;

    return $this;
  }

  /**
   * Get the value of codPaisOficial
   *
   * @return String
   */
  public function getCodPaisOficial(): String
  {
    return $this->codPaisOficial;
  }

  /**
   * Set the value of codPaisOficial
   *
   * @param String $codPaisOficial
   *
   * @return self
   */
  public function setCodPaisOficial(String $codPaisOficial): self
  {
    Assert::lenght($codPaisOficial, 2, "");
    $this->codPaisOficial = $codPaisOficial;

    return $this;
  }

  /**
   * Get the value of nifPaisRecidencia
   *
   * @return String
   */
  public function getNifPaisRecidencia(): String
  {
    return $this->nifPaisRecidencia;
  }

  /**
   * Set the value of nifPaisRecidencia
   *
   * @param String $nifPaisRecidencia
   *
   * @return self
   */
  public function setNifPaisRecidencia(String $nifPaisRecidencia): self
  {
    Assert::maxLength($nifPaisRecidencia,9,"");
    $this->nifPaisRecidencia = $nifPaisRecidencia;

    return $this;
  }

  /**
   * Get the value of Tiene_RE
   *
   * @return String
   */
  public function getTieneRE(): String
  {
    return $this->Tiene_RE;
  }

  /**
   * Set the value of Tiene_RE
   *
   * @param String $Tiene_RE
   *
   * @return self
   */
  public function setTieneRE(String $Tiene_RE): self
  {
    $this->Tiene_RE = $Tiene_RE;

    return $this;
  }

  /**
   * Get the value of esUnversion
   *
   * @return int
   */
  public function getEsUnversion(): int
  {
    return $this->esUnversion;
  }

  /**
   * Set the value of esUnversion
   *
   * @param int $esUnversion
   *
   * @return self
   */
  public function setEsUnversion(int $esUnversion): self
  {
    $this->esUnversion = $esUnversion;

    return $this;
  }

  /**
   * Get the value of Pais
   *
   * @return String
   */
  public function getPais(): String
  {
    return $this->Pais;
  }

  /**
   * Set the value of Pais
   *
   * @param String $Pais
   *
   * @return self
   */
  public function setPais(String $Pais): self
  {
    Assert::maxLength($Pais,50,"");
    $this->Pais = $Pais;

    return $this;
  }
}

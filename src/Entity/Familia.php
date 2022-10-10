<?php

namespace App\Entity;

use Webmozart\Assert\Assert;

class Familia
{
  private int $codFamilia;
  private String $nombreFamilia;
  private float $margen;
  private float $ivaPercent;
  private float $re;
  private String $image;
  private String $esAnimales;
  private int $esmanoObra;
  private String $inicioCodean;

  public function __construct(
    int $codFamilia = 0,
    String $nombreFamilia = '',
    float $margen = 0,
    float $ivaPercent = 0,
    float $re = 0,
    String $image = '',
    String $esAnimales = '',
    int $esmanoObra = 0,
    String $inicioCodean = ''
  ) {
    $this->re = $re;
    $this->codFamilia = $codFamilia;
    $this->nombreFamilia = $nombreFamilia;
    $this->margen = $margen;
    $this->ivaPercent = $ivaPercent;
    $this->image = $image;
    $this->esAnimales = $esAnimales;
    $this->esmanoObra = $esmanoObra;
    $this->inicioCodean = $inicioCodean;
  }
  /**
   * Get the value of codFamilia
   *
   * @return int
   */
  public function getCodFamilia(): int
  {
    return $this->codFamilia;
  }

  /**
   * Set the value of codFamilia
   *
   * @param int $codFamilia
   *
   * @return self
   */
  public function setCodFamilia(int $codFamilia): self
  {
    Assert::integer($codFamilia, "El valor del campo código de la familia ha de ser numérico");
    Assert::greaterThan($codFamilia, 0, 'El valor del campo código de la familia puede ser un valor positivo');
    $this->codFamilia = $codFamilia;


    return $this;
  }

  /**
   * Get the value of nombreFamilia
   *
   * @return String
   */
  public function getNombreFamilia(): String
  {
    return $this->nombreFamilia;
  }

  /**
   * Set the value of nombreFamilia
   *
   * @param String $nombreFamilia
   *
   * @return self
   */
  public function setNombreFamilia(String $nombreFamilia): self
  {
    Assert::maxLength($nombreFamilia, 40, "Error el nombre de la familia contiene más de 40 caracteres");
    $this->nombreFamilia = $nombreFamilia;

    return $this;
  }

  /**
   * Get the value of margen
   *
   * @return float
   */
  public function getMargen(): float
  {

    return $this->margen;
  }

  /**
   * Set the value of margen
   *
   * @param float $margen
   *
   * @return self
   */
  public function setMargen(float $margen): self
  {
    Assert::float($margen, "El campo margen que ser un float");
    $this->margen = $margen;

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
    Assert::float($ivaPercent, "El campo IVA que ser un float");
    $this->ivaPercent = $ivaPercent;

    return $this;
  }

  /**
   * Get the value of re
   *
   * @return float
   */
  public function getRe(): float
  {
    return $this->re;
  }

  /**
   * Set the value of re
   *
   * @param float $re
   *
   * @return self
   */
  public function setRe(float $re): self
  {
    $this->re = $re;

    return $this;
  }

  /**
   * Get the value of image
   *
   * @return String
   */
  public function getImage(): String
  {
    return $this->image;
  }

  /**
   * Set the value of image
   *
   * @param String $image
   *
   * @return self
   */
  public function setImage(String $image): self
  {
    $this->image = $image;

    return $this;
  }

  /**
   * Get the value of es
   *
   * @return String
   */
  public function getEsAnimales(): String
  {
    return $this->esAnimales;
  }

  /**
   * Set the value of es
   *
   * @param String $es
   *
   * @return self
   */
  public function setEsAnimales(String $esAnimales): self
  {
    $this->esAnimales = $esAnimales;

    return $this;
  }

  /**
   * Get the value of esmanoObra
   *
   * @return bool
   */
  public function getEsmanoObra(): bool
  {
    return $this->esmanoObra;
  }

  /**
   * Set the value of esmanoObra
   *
   * @param bool $esmanoObra
   *
   * @return self
   */
  public function setEsmanoObra(bool $esmanoObra): self
  {
    $this->esmanoObra = $esmanoObra;

    return $this;
  }

  /**
   * Get the value of inicioCodean
   *
   * @return string
   */
  public function getInicioCodean(): string
  {
    return $this->inicioCodean;
  }

  /**
   * Set the value of inicioCodean
   *
   * @param string $inicioCodean
   *
   * @return self
   */
  public function setInicioCodean(string $inicioCodean): self
  {
    Assert::length($inicioCodean, 2, $message = 'El camp inicio codean tiene que tener 2 caracteres de manera obligatoria');
    $this->inicioCodean = $inicioCodean;

    return $this;
  }
  public static function fromArray(array $data): Familia
  {


    if (empty($data["CODFAMILIA"]))
      $id = null;
    else
      $id = (int)$data["CODFAMILIA"];
    // __construct($codFamilia, $nombreFamilia, $es, $margen, $ivaPercent, $re, $esmanoObra, $inicioCodean)
    return new Familia(
      $id,
      $data["NOMBRE"] ?? '',
      (float) $data["MARGEN"] ?? 0,
      (float) $data["IVAPERCENT"] ?? 0,
      $data["RE"] ?? 0,
      $data["IMAGEN"] ?? 1,
      $data["ESANIMALES"] ?? '',
      $data["ESMANOOBRA"] ?? 0,
      $data["INICIOCODEAN"] ?? '',
    );

    // $data["ESANIMALES"],
    // $data["MARGEN"],
    // $data["IVAPERCENT"],
    // $data["RE"],
    // $data["ESMANOOBRA"],
    // $data["INICIOCODEAN"]
  }

  public function toArray(): array
  {
    return [
      "CODFAMILIA" => $this->getCodFamilia(),
      "NOMBRE" => $this->getNombreFamilia(),
      "MARGEN" => $this->getMargen(),
      "IVAPERCENT" => $this->getIvaPercent(),

    ];
    // "INICIOCODEAN" => $this->getInicioCodean(),
    // "RE" => $this->getRe()
    // "IMAGEN" => $this->getImage()
  }
}

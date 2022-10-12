<?php

namespace App\Entity;
use Webmozart\Assert\Assert;
class Subfamilia
{
  private int $codFamilia;
  private int $codSubfamilia;
  private String $image;
  private String $nombre; 
  private String $nombreFamilia;

  public function __construct(
    int $codFamilia=0,
    int $codSubfamilia=0,
    String $nombre='',
    String $nombreFamilia='',
    String $image=''
  ) {
    $this->codFamilia=$codFamilia;
    $this->codSubfamilia=$codSubfamilia;
    $this->image=$image;
    $this->nombre=$nombre;
    $this->nombreFamilia=$nombreFamilia;
  }


  public static function fromArray(array $data): Subfamilia
  {


    if (empty($data["CODFAMILIA"]))
      $id = null;
    else
      $id = (int)$data["CODFAMILIA"];
    // __construct($codFamilia, $nombreFamilia, $es, $margen, $ivaPercent, $re, $esmanoObra, $inicioCodean)
    return new Subfamilia(
      $id,
      $data["CODSUBFAMILIA"],
      $data["NOMBRESUBFAMILIA"],
      $data["NOMBREFAMILIA"],
      $data["IMAGEN"]??''
      
    );
  }

  public function toArray(): array
  {
    return [
      "CODFAMILIA" => $this->getCodFamilia(),
      "CODSUBFAMILIA" => $this->getCodSubfamilia(),
      "NOMBREFAMILIA" => $this->getNombre(),
      "NOMBRESUBFAMILIA" => $this->getNombreFamilia()
      // "IMAGEN" => $this->getImage()
    ];
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
    $this->codFamilia = $codFamilia;

    return $this;
  }

  /**
   * Get the value of codSubfamilia
   *
   * @return int
   */
  public function getCodSubfamilia(): int
  {
    return $this->codSubfamilia;
  }

  /**
   * Set the value of codSubfamilia
   *
   * @param int $codSubfamilia
   *
   * @return self
   */
  public function setCodSubfamilia(int $codSubfamilia): self
  {
    $this->codSubfamilia = $codSubfamilia;

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
   * Get the value of nombre
   *
   * @return String
   */
  public function getNombre(): String
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   *
   * @param String $nombre
   *
   * @return self
   */
  public function setNombre(String $nombre): self
  {
    $this->nombre = $nombre;

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
    $this->nombreFamilia = $nombreFamilia;

    return $this;
  }
}

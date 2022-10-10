<?php

namespace App\Entity;

use Webmozart\Assert\Assert;

class FormaPago
{
  private int $codFp;
  private String $nombre;
  private int $numPlazos;
  private int $distancia;
  private int $codEmpresa;

  public function __construct(
    int $codFp = 0,
    String $nombre = '',
    int $numPlazos = 0,
    int $distancia = 0,
    int $codEmpresa = 0
  ) {
    $this->codFp = $codFp;
    $this->nombre = $nombre;
    $this->numPlazos = $numPlazos;
    $this->distancia = $distancia;
    $this->codEmpresa = $codEmpresa;
  }
  /**
   * Get the value of codEmpresa
   *
   * @return int
   */
  public function getCodEmpresa(): int
  {
    return $this->codEmpresa;
  }

  /**
   * Set the value of codEmpresa
   *
   * @param int $codEmpresa
   *
   * @return self
   */
  public function setCodEmpresa(int $codEmpresa): self
  {
    Assert::integer($codEmpresa, "El valor del campo código empresa ha de ser numérico");
    Assert::greaterThan($codEmpresa, 0, 'El código marca puede ser un valor positivo');

    $this->codEmpresa = $codEmpresa;
    return $this;
  }

  /**
   * Get the value of distancia
   *
   * @return int
   */
  public function getDistancia(): int
  {
    return $this->distancia;
  }

  /**
   * Set the value of distancia
   *
   * @param int $distancia
   *
   * @return self
   */
  public function setDistancia(int $distancia): self
  {
    Assert::integer($distancia, "El valor del campo distáncia ha de ser numérico");
    Assert::greaterThan($distancia, 0, 'El valor del campo distáncia puede ser un valor positivo');
    $this->distancia = $distancia;

    return $this;
  }

  /**
   * Get the value of numPlazos
   *
   * @return int
   */
  public function getNumPlazos(): int
  {
    return $this->numPlazos;
  }

  /**
   * Set the value of numPlazos
   *
   * @param int $numPlazos
   *
   * @return self
   */
  public function setNumPlazos(int $numPlazos): self
  {
    $this->numPlazos = $numPlazos;

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
   * Get the value of codFp
   *
   * @return int
   */
  public function getCodFp(): int
  {
    return $this->codFp;
  }

  /**
   * Set the value of codFp
   *
   * @param int $codFp
   *
   * @return self
   */
  public function setCodFp(int $codFp): self
  {
    Assert::integer($codFp, "El valor del campo código forma de pago ha de ser numérico");
    Assert::greaterThan($codFp, 0, 'El valor del campo código forma de pago puede ser un valor positivo');
    $this->codFp = $codFp;

    return $this;
  }
  public static function fromArray(array $data): FormaPago
  {

    if (empty($data["CODFP"]))
      $id = null;
    else
      $id = (int)$data["CODFP"];
    return new FormaPago(
      $id,
      $data["NOMBRE"],
      $data["NPLAZOS"],
      $data["DISTANCIA"],
      $data["CODEEMPRESA"]
    );
  }

  public function toArray(): array
  {
    return [
      "CODFP" => $this->getCodFp(),
      "NOMBRE" => $this->getNombre(),
      "NPLAZOS" => $this->getNumPlazos(),
      "DISTANCIA" => $this->getDistancia(),
      "CODEEMPRESA" => $this->getCodEmpresa(),
    ];
  }
}

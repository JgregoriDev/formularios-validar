<?php

declare(strict_types=1);

namespace App\Entity;



class Marca
{

  private int $codMarca;
  private String $nombreMarca;
  private String $rutaLogo;
  public function __construct(
    int $codMarca = 0,
    String $nombreMarca = '',
    String $rutaLogo = ''
  ) {
    $this->codMarca = $codMarca;
    $this->nombreMarca = $nombreMarca;
    $this->rutaLogo = $rutaLogo;
  }

  /**
   * Get the value of codmarca
   *
   * @return int
   */
  public function getCodmarca(): int
  {
    return $this->codMarca;
  }

  /**
   * Set the value of codmarca
   *
   * @param int $codmarca
   *
   * @return self
   */
  public function setCodmarca(int $codMarca): self
  {
    $this->codMarca = $codMarca;

    return $this;
  }

  /**
   * Get the value of nombreMarca
   *
   * @return String
   */
  public function getNombreMarca(): String
  {
    return $this->nombreMarca;
  }

  /**
   * Set the value of nombreMarca
   *
   * @param String $nombreMarca
   *
   * @return self
   */
  public function setNombreMarca(String $nombreMarca): self
  {
    $this->nombreMarca = $nombreMarca;

    return $this;
  }

  /**
   * Get the value of rutaLogo
   *
   * @return String
   */
  public function getRutaLogo(): String
  {
    return $this->rutaLogo;
  }

  /**
   * Set the value of rutaLogo
   *
   * @param String $rutaLogo
   *
   * @return self
   */
  public function setRutaLogo(String $rutaLogo): self
  {
    $this->rutaLogo = $rutaLogo;

    return $this;
  }

  public static function fromArray(array $data): Marca
  {
    if (empty($data["CODMARCA"]))
      $id = null;
    else
      $id = (int)$data["CODMARCA"];
    return new Marca(
      $id,
      $data["NOMBREMARCA"],
      $data["RUTALOGO"]
    );
  }

  public function toArray(): array
  {
    return [
      "CODMARCA" => $this->getCodMarca(),
      "NOMBREMARCA" => $this->getNombreMarca(),
      "RUTALOGO" => $this->getRutaLogo()
    ];
  }
}

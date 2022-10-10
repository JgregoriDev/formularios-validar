<?php

namespace App\Entity;

class Article
{
  private ?int $codArticle = 0;
  private ?String $codean = '';
  private ?int $codFamilia = 0;
  private ?String $codProveedor = '';
  private ?int $referenciaProveedor = 0;
  private ?String $referenciaMarca = '';
  private ?String $descripcion = '';
  private ?float $auxMargen = 0;
  private ?float $pvd = 0;
  private ?float $margen = 0;
  private ?float $base = 0;
  private ?int $existenciasDisponibles = 0;
  private ?float $iva = 0;
  private ?float $pvp = 0;
  private ?float $pvp2 = 0;
  private ?float $pvpOfertaMostrador = 0;
  private ?float $codMarca = 0;
  private ?float $codigo = 0;
  private ?int $esManoObra = 0;
  private ?int $udsUltimaEntrada = 0;
  private ?int $base2 = 0;
  private ?int $favorito = 0;
  private ?int $posibleb = 0;
  private ?String $imagen;
  private ?int $nordenMostrar = 0;
  private ?int $instrastat = 0;
  private ?int $udMedida = 0;
  private ?int $peso = 0;
  private ?int $req_eq = 0;
  private ?int $codCat = 0;
  private ?int $codSubCat = 0;
  private ?int $idWoocommerce = 0;
  private ?String $caracTecnicas = '';
  private ?int $codSubfamilia = 0;
  public function __construct(
    $codArticle = 0,
    $codEan = '',
    $codFamilia = 0,
    $codProveedor = 0,
    $referenciaProveedor = 0,
    $referenciaMarca = '',
    $descripcion = '',
    $auxMargen = 0,
    $pvd = 0,
    $margen = 0,
    $base = 0,
    $favorito = 0,
    $posibleb = 0,
    $codArtGranel = 0,
    $udsArtGranel = 0,
    $imagen = '',
    $nordenMostrar = 0,
    $instratat = 0,
    $udMedida = 0,
    $peso = 0,
    $req_eq = 0,
    $codCat = 0,
    $codSubCat = 0,
    $idWoocommerce = 0,
    $caracTecnicas = ''
  ) {
    $this->setCodArticle($codArticle)
      ->setCodean($codEan)->setCodFamilia($codFamilia)
      ->setCodProveedor($codProveedor)
      ->setReferenciaProveedor($referenciaProveedor)
      ->setReferenciaMarca($referenciaMarca)
      ->setDescripcion($descripcion)->setAuxMargen($auxMargen)
      ->setMargen($margen)
      ->setBase($base)
      ->setFavorito($favorito)
      ->setPosibleb($posibleb)
      ->setCodArtGranel($codArtGranel)
      ->setUdsArtGranel($udsArtGranel)
      ->setImagen($imagen)
      ->setNordenMostrar($nordenMostrar)
      ->setInstrastat(0)
      ->setUdMedida($udMedida)
      ->setPeso($peso)
      ->setReqEq($req_eq)
      ->setCodCat($codCat)
      ->setCodSubCat($codSubCat)
      ->setIdWoocommerce($idWoocommerce);
  }

  /**
   * Get the value of descripcion
   *
   * @return String
   */
  public function getDescripcion(): String
  {
    return $this->descripcion;
  }

  /**
   * Set the value of descripcion
   *
   * @param String $descripcion
   *
   * @return self
   */
  public function setDescripcion(String $descripcion): self
  {
    $this->descripcion = $descripcion;

    return $this;
  }

  /**
   * Get the value of referenciaMarca
   *
   * @return String
   */
  public function getReferenciaMarca(): String
  {
    return $this->referenciaMarca;
  }

  /**
   * Set the value of referenciaMarca
   *
   * @param String $referenciaMarca
   *
   * @return self
   */
  public function setReferenciaMarca(String $referenciaMarca): self
  {
    $this->referenciaMarca = $referenciaMarca;

    return $this;
  }

  /**
   * Get the value of codArticle
   *
   * @return int
   */
  public function getCodArticle(): int
  {
    return $this->codArticle;
  }

  /**
   * Set the value of codArticle
   *
   * @param int $codArticle
   *
   * @return self
   */
  public function setCodArticle(int $codArticle): self
  {
    $this->codArticle = $codArticle;

    return $this;
  }

  /**
   * Get the value of codean
   *
   * @return String
   */
  public function getCodean(): String
  {
    return $this->codean;
  }

  /**
   * Set the value of codean
   *
   * @param String $codean
   *
   * @return self
   */
  public function setCodean(String $codean): self
  {
    $this->codean = $codean;

    return $this;
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
    $this->codProveedor = $codProveedor;

    return $this;
  }

  /**
   * Get the value of referenciaProveedor
   *
   * @return int
   */
  public function getReferenciaProveedor(): int
  {
    return $this->referenciaProveedor;
  }

  /**
   * Set the value of referenciaProveedor
   *
   * @param int $referenciaProveedor
   *
   * @return self
   */
  public function setReferenciaProveedor(int $referenciaProveedor): self
  {
    $this->referenciaProveedor = $referenciaProveedor;

    return $this;
  }

  /**
   * Get the value of udsArtGranel
   *
   * @return String
   */
  public function getUdsArtGranel(): String
  {
    return $this->udsArtGranel;
  }

  /**
   * Set the value of udsArtGranel
   *
   * @param String $udsArtGranel
   *
   * @return self
   */
  public function setUdsArtGranel(String $udsArtGranel): self
  {
    $this->udsArtGranel = $udsArtGranel;

    return $this;
  }

  /**
   * Get the value of auxMargen
   *
   * @return float
   */
  public function getAuxMargen(): float
  {
    return $this->auxMargen;
  }

  /**
   * Set the value of auxMargen
   *
   * @param float $auxMargen
   *
   * @return self
   */
  public function setAuxMargen(float $auxMargen): self
  {
    $this->auxMargen = $auxMargen;

    return $this;
  }

  /**
   * Get the value of pvd
   *
   * @return float
   */
  public function getPvd(): float
  {
    return $this->pvd;
  }

  /**
   * Set the value of pvd
   *
   * @param float $pvd
   *
   * @return self
   */
  public function setPvd(float $pvd): self
  {
    $this->pvd = $pvd;

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
    $this->margen = $margen;

    return $this;
  }

  /**
   * Get the value of base
   *
   * @return float
   */
  public function getBase(): float
  {
    return $this->base;
  }

  /**
   * Set the value of base
   *
   * @param float $base
   *
   * @return self
   */
  public function setBase(float $base): self
  {
    $this->base = $base;

    return $this;
  }

  /**
   * Get the value of existenciasDisponibles
   *
   * @return int
   */
  public function getExistenciasDisponibles(): int
  {
    return $this->existenciasDisponibles;
  }

  /**
   * Set the value of existenciasDisponibles
   *
   * @param int $existenciasDisponibles
   *
   * @return self
   */
  public function setExistenciasDisponibles(int $existenciasDisponibles): self
  {
    $this->existenciasDisponibles = $existenciasDisponibles;

    return $this;
  }

  /**
   * Get the value of pvp
   *
   * @return float
   */
  public function getPvp(): float
  {
    return $this->pvp;
  }

  /**
   * Set the value of pvp
   *
   * @param float $pvp
   *
   * @return self
   */
  public function setPvp(float $pvp): self
  {
    $this->pvp = $pvp;

    return $this;
  }

  /**
   * Get the value of pvp2
   *
   * @return float
   */
  public function getPvp2(): float
  {
    return $this->pvp2;
  }

  /**
   * Set the value of pvp2
   *
   * @param float $pvp2
   *
   * @return self
   */
  public function setPvp2(float $pvp2): self
  {
    $this->pvp2 = $pvp2;

    return $this;
  }

  /**
   * Get the value of codMarca
   *
   * @return float
   */
  public function getCodMarca(): float
  {
    return $this->codMarca;
  }

  /**
   * Set the value of codMarca
   *
   * @param float $codMarca
   *
   * @return self
   */
  public function setCodMarca(float $codMarca): self
  {
    $this->codMarca = $codMarca;

    return $this;
  }

  /**
   * Get the value of codigo
   *
   * @return float
   */
  public function getCodigo(): float
  {
    return $this->codigo;
  }

  /**
   * Set the value of codigo
   *
   * @param float $codigo
   *
   * @return self
   */
  public function setCodigo(float $codigo): self
  {
    $this->codigo = $codigo;

    return $this;
  }

  /**
   * Get the value of esManoObra
   *
   * @return int
   */
  public function getEsManoObra(): int
  {
    return $this->esManoObra;
  }

  /**
   * Set the value of esManoObra
   *
   * @param int $esManoObra
   *
   * @return self
   */
  public function setEsManoObra(int $esManoObra): self
  {
    $this->esManoObra = $esManoObra;

    return $this;
  }

  /**
   * Get the value of udsUltimaEntrada
   *
   * @return int
   */
  public function getUdsUltimaEntrada(): int
  {
    return $this->udsUltimaEntrada;
  }

  /**
   * Set the value of udsUltimaEntrada
   *
   * @param int $udsUltimaEntrada
   *
   * @return self
   */
  public function setUdsUltimaEntrada(int $udsUltimaEntrada): self
  {
    $this->udsUltimaEntrada = $udsUltimaEntrada;

    return $this;
  }

  /**
   * Get the value of base2
   *
   * @return int
   */
  public function getBase2(): int
  {
    return $this->base2;
  }

  /**
   * Set the value of base2
   *
   * @param int $base2
   *
   * @return self
   */
  public function setBase2(int $base2): self
  {
    $this->base2 = $base2;

    return $this;
  }

  /**
   * Get the value of favorito
   *
   * @return int
   */
  public function getFavorito(): int
  {
    return $this->favorito;
  }

  /**
   * Set the value of favorito
   *
   * @param int $favorito
   *
   * @return self
   */
  public function setFavorito(int $favorito): self
  {
    $this->favorito = $favorito;

    return $this;
  }

  /**
   * Get the value of posibleb
   *
   * @return int
   */
  public function getPosibleb(): int
  {
    return $this->posibleb;
  }

  /**
   * Set the value of posibleb
   *
   * @param int $posibleb
   *
   * @return self
   */
  public function setPosibleb(int $posibleb): self
  {
    $this->posibleb = $posibleb;

    return $this;
  }

  /**
   * Get the value of codArtGranel
   *
   * @return String
   */
  public function getCodArtGranel(): String
  {
    return $this->codArtGranel;
  }

  /**
   * Set the value of codArtGranel
   *
   * @param String $codArtGranel
   *
   * @return self
   */
  public function setCodArtGranel(String $codArtGranel): self
  {
    $this->codArtGranel = $codArtGranel;

    return $this;
  }

  /**
   * Get the value of imagen
   *
   * @return String
   */
  public function getImagen(): String
  {
    return $this->imagen;
  }

  /**
   * Set the value of imagen
   *
   * @param String $imagen
   *
   * @return self
   */
  public function setImagen(String $imagen): self
  {
    $this->imagen = $imagen;

    return $this;
  }

  /**
   * Get the value of nordenMostrar
   *
   * @return int
   */
  public function getNordenMostrar(): int
  {
    return $this->nordenMostrar;
  }

  /**
   * Set the value of nordenMostrar
   *
   * @param int $nordenMostrar
   *
   * @return self
   */
  public function setNordenMostrar(int $nordenMostrar): self
  {
    $this->nordenMostrar = $nordenMostrar;

    return $this;
  }

  /**
   * Get the value of instrastat
   *
   * @return int
   */
  public function getInstrastat(): int
  {
    return $this->instrastat;
  }

  /**
   * Set the value of instrastat
   *
   * @param int $instrastat
   *
   * @return self
   */
  public function setInstrastat(int $instrastat): self
  {
    $this->instrastat = $instrastat;

    return $this;
  }

  /**
   * Get the value of udMedida
   *
   * @return int
   */
  public function getUdMedida(): int
  {
    return $this->udMedida;
  }

  /**
   * Set the value of udMedida
   *
   * @param int $udMedida
   *
   * @return self
   */
  public function setUdMedida(int $udMedida): self
  {
    $this->udMedida = $udMedida;

    return $this;
  }

  /**
   * Get the value of codCat
   *
   * @return int
   */
  public function getCodCat(): int
  {
    return $this->codCat;
  }

  /**
   * Set the value of codCat
   *
   * @param int $codCat
   *
   * @return self
   */
  public function setCodCat(int $codCat): self
  {
    $this->codCat = $codCat;

    return $this;
  }

  /**
   * Get the value of req_eq
   *
   * @return int
   */
  public function getReqEq(): int
  {
    return $this->req_eq;
  }

  /**
   * Set the value of req_eq
   *
   * @param int $req_eq
   *
   * @return self
   */
  public function setReqEq(int $req_eq): self
  {
    $this->req_eq = $req_eq;

    return $this;
  }

  /**
   * Get the value of peso
   *
   * @return int
   */
  public function getPeso(): int
  {
    return $this->peso;
  }

  /**
   * Set the value of peso
   *
   * @param int $peso
   *
   * @return self
   */
  public function setPeso(int $peso): self
  {
    $this->peso = $peso;

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
   * Get the value of idWoocommerce
   *
   * @return int
   */
  public function getIdWoocommerce(): int
  {
    return $this->idWoocommerce;
  }

  /**
   * Set the value of idWoocommerce
   *
   * @param int $idWoocommerce
   *
   * @return self
   */
  public function setIdWoocommerce(int $idWoocommerce): self
  {
    $this->idWoocommerce = $idWoocommerce;

    return $this;
  }

  /**
   * Get the value of codSubCat
   *
   * @return int
   */
  public function getCodSubCat(): int
  {
    return $this->codSubCat;
  }

  /**
   * Set the value of codSubCat
   *
   * @param int $codSubCat
   *
   * @return self
   */
  public function setCodSubCat(int $codSubCat): self
  {
    $this->codSubCat = $codSubCat;

    return $this;
  }
  public static function fromArray(array $data): Article
  {

    if (empty($data["CODARTICULO"]))
      $id = null;
    else
      $id = (int)$data["CODARTICULO"];
    $codEan = $data['CODIGOEAN'] ?? '';
    $codFamilia = $data['CODFAMILIA'] ?? 0;
    $codProveedor = $data['CODPROVEEDOR'] ?? 0;
    $referenciaProveedor = $data['REFERENCIAPROVEEDOR'] ?? 0;
    $referenciaMarca = $data['REFERENCIAMARCA'] ?? '';
    $descripcion = $data['DESCRIPCION'] ?? 0;
    $auxMargen = $data['AUX_MARGEN'] ?? 0;
    $pvp = $data['PVP'] ?? 0;
    $margen = $data['MARGEN'] ?? 0;
    $base = $data['BASE'] ?? 0;
    $favorito = $data['FAVORITO'] ?? 0;
    $posibleb = $data['POSIBLEB'] ?? 0;
    $codArtGran = $data['CODART_GRANEL'] ?? 0;
    $udsArtGranel = $data['UD_X_UDGRANNEL'] ?? 0;
    $imagen = $data['IMAGEN'] ?? 0;
    $nordenMostrar = $data['NORDEN_MOSTRAR'] ?? 0;
    $instratat = $data['INTRASTAT'] ?? 0;
    $udMedida = $data['UMEDIDA'] ?? 0;
    $peso = $data['PESO'] ?? 0;
    $req_eq = $data['REQ_EQ'] ?? 0;
    $codCat = $data['CODCATEGORIA'] ?? 0;
    $codSubcat = $data['CODSUBCATEGORIA'] ?? 0;
    $idWoocomerca = $data['IDWOOCOMMERCE'] ?? 0;
    $caracTecnicas = $data['CARACTECNICAS'] ?? 0;
    $art = new Article($id, $codEan, $codFamilia, $codProveedor, $referenciaProveedor, $referenciaMarca, $descripcion, $auxMargen, $pvp, $margen, $base, $favorito, $posibleb, $codArtGran, $udsArtGranel, $imagen, $nordenMostrar, $instratat, $udMedida, $peso, $req_eq, $codCat, $codSubcat, $idWoocomerca, $caracTecnicas);

    return $art;
  }

  public function toArray(): array
  {
    return [
      "CODARTICULO" => $this->getCodArticle(),
      "CODFAMILIA" => $this->getCodFamilia(),
      "CODMARCA" => $this->getCodMarca(),
      "CODPROVEEDOR" => $this->getCodProveedor(),
      "CODSUBFAMILIA" => $this->getCodSubfamilia(),
      "CODIGOEAN" => $this->getCodean(),
      "REFERENCIAPROVEEDOR" => $this->getReferenciaProveedor(),
      "REFERENCIAMARCA" => $this->getReferenciaMarca(),
      "DESCRIPCION" => $this->getDescripcion(),
      "AUX_MARGEN" => $this->getAuxMargen(),
      "BASE" => $this->getBase(),
      "EXISTENCIASDISPONIBLE" => $this->getExistenciasDisponibles(),
      "PVP" => $this->getPvp(),
      "PVP2" => $this->getPvp2(),
      "ESMANOOBRA" => $this->getEsManoObra(),
      "UDS_ULTIMAENTRADA" => $this->getUdsUltimaEntrada(),
      "BASE2" => $this->getBase2(),
      "FAVORITO" => $this->getFavorito(),
      "POSIBLEB" => $this->getPosibleb(),
      "CODART_GRANEL" => $this->getCodArtGranel(),
      "UD_X_UDGRANNEL" => $this->getUdsArtGranel(),
      "IVAPERCENT" => $this->getImagen(),
      "NORDEN_MOSTRAR" => $this->getImagen(),
      "IMAGEN" => $this->getImagen(),
      "INTRASTAT" => $this->getImagen(),
      "UMEDIDA" => $this->getImagen(),
      "PESO" => $this->getImagen(),
      "REQ_EQ" => $this->getImagen(),
      "CODCATEGORIA" => $this->getCodCat(),
      "CODSUBCATEGORIA" => $this->getCodSubCat(),
      "IDWOOCOMMERCE" => $this->getIdWoocommerce(),
      "CARACTECNICAS" => $this->getCaracTecnicas()
    ];
  }

  /**
   * Get the value of pvpOfertaMostrador
   *
   * @return float
   */
  public function getPvpOfertaMostrador(): float
  {
    return $this->pvpOfertaMostrador;
  }

  /**
   * Set the value of pvpOfertaMostrador
   *
   * @param float $pvpOfertaMostrador
   *
   * @return self
   */
  public function setPvpOfertaMostrador(float $pvpOfertaMostrador): self
  {
    $this->pvpOfertaMostrador = $pvpOfertaMostrador;

    return $this;
  }

  /**
   * Get the value of iva
   *
   * @return float
   */
  public function getIva(): float
  {
    return $this->iva;
  }

  /**
   * Set the value of iva
   *
   * @param float $iva
   *
   * @return self
   */
  public function setIva(float $iva): self
  {
    $this->iva = $iva;

    return $this;
  }

  /**
   * Get the value of caracTecnicas
   *
   * @return String
   */
  public function getCaracTecnicas(): String
  {
    return $this->caracTecnicas;
  }

  /**
   * Set the value of caracTecnicas
   *
   * @param String $caracTecnicas
   *
   * @return self
   */
  public function setCaracTecnicas(String $caracTecnicas): self
  {
    $this->caracTecnicas = $caracTecnicas;

    return $this;
  }
}

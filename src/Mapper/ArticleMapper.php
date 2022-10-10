<?php

namespace App\Mapper;

use App\Registry;
use App\Entity\Article;
use PDO;

class ArticleMapper
{
  protected PDO $pdo;


  public function __construct()
  {
    $this->pdo = Registry::getPDO();
  }

  public function find(int $id): ?Article
  {
    $stmt = $this->pdo->prepare("SELECT * FROM articulo WHERE CODARTICULO=:id");
    $stmt->execute(["id" => $id]);
    $row = $stmt->fetch();

    $stmt->closeCursor();

    if (!is_array($row)) {
      return null;
    }
    if (!isset($row['CODFAMILIA'])) {
      return null;
    }
    $object = Article::fromArray($row);
    return $object;
  }

  public function findAll(): array
  {
    $array = [];
    $selectAllStmt = $this->pdo->prepare(
      "SELECT * FROM articulo"
    );
    $selectAllStmt->execute();
    $array = [];
    $array = $selectAllStmt->fetchAll();
    // var_dump($array);
    // while ($row = $selectAllStmt->fetch())
    //   $array[] = Article::fromArray($row);
    // var_dump($array);
    return $array;
  }

  public function createObject(array $raw): Article
  {
    $obj = Article::fromArray($raw);
    return $obj;
  }

  public function insert(Article $obj)
  {
    var_dump($obj);
    // $insertStmt = $this->pdo->prepare(
    //   "INSERT INTO familia(CODARTICULO, CODMARCA,CODPROVEEDOR,CODSUBFAMILIA,Codigo,CODIGOEAN,REFERENCIAPROVEEDOR,
    //   REFERENCIAMARCA,DESCRIPCION,AUX_MARGEN,MARGEN,BASE,EXISTENCIASDISPONIBLE,PVP_OFERTA_MOSTRADOR,PVP,PVP2
    //   ESMANOOBRA, UDS_ULTIMAENTRADA, BASE2,FAVORITO,POSIBLEB, CODART_GRANEL, UD_X_UDGRANNEL, IMAGEN, IVAPERCENT, NORDEN_MOSTRAR,
    //   INTRASTAT, UMEDIDA, PESO, REQ_EQ, CODCATEGORIA, CODSUBCATEGORIA, IDWOOCOMMERCE, CARACTECNICAS) VALUES
    //   (:codArticulo, :codMarca, :codProveedor, :codSubfamilia, :codigo,
    //   :refenreciaMarca, :descripcion, :auxMargen, :margenbase, :existenciasDisponibles,
    //   :pvpOfertaMostrador, :pvp, :pvp2, :esManoObra, :uMedida,
    //   :peso, :udsUltEntrada, :base2, :favorito,:posibleb,
    //   :codArticuloGranel,:udPorGrannel,:imagen,:ivaPercent,:nordenMostra,
    //   :intrastat,:uMedida,:peso:reqEq,:codCategoria,:codSubcategoria,
    //   :idWoocomerce,:caracTecnicas)"
    // );
    $insertStmt = $this->pdo->prepare(
      "INSERT INTO familia(CODARTICULO, CODMARCA,CODPROVEEDOR,CODSUBFAMILIA,Codigo,CODIGOEAN,REFERENCIAPROVEEDOR,
      REFERENCIAMARCA,DESCRIPCION,AUX_MARGEN,MARGEN,BASE,EXISTENCIASDISPONIBLE,PVP_OFERTA_MOSTRADOR,PVP,PVP2
      ESMANOOBRA, UDS_ULTIMAENTRADA, BASE2,FAVORITO,POSIBLEB, CODART_GRANEL, UD_X_UDGRANNEL, IMAGEN, IVAPERCENT, NORDEN_MOSTRAR,
      INTRASTAT, UMEDIDA, PESO, REQ_EQ, CODCATEGORIA, CODSUBCATEGORIA, IDWOOCOMMERCE, CARACTECNICAS) VALUES
      (:codArticulo, :codMarca, :codProveedor, :codSubfamilia, :codigo,
      :refenreciaMarca, :descripcion, :auxMargen, :margenbase, :existenciasDisponibles,
      :pvpOfertaMostrador, :pvp, :pvp2, :esManoObra, :uMedida,
      :peso, :udsUltEntrada, :base2, :favorito,:posibleb,
      :codArticuloGranel,:udPorGrannel,:imagen,:ivaPercent,:nordenMostra,
      :intrastat,:uMedida,:peso:reqEq,:codCategoria,:codSubcategoria,
      :idWoocomerce,:caracTecnicas)"
    );
    $codArticulo = $obj->getCodArticle() ?? 0;
    $codMarca = $obj->getCodMarca() ?? 0;
    $codProveedor = $obj->getCodProveedor() ?? 0;
    $codigo = $obj->getCodigo() ?? 0;
    $codigoEan = $obj->getCodean() ?? '0';
    $referenciaProveedor = $obj->getReferenciaProveedor() ?? 0;
    $refenreciaMarca = $obj->getReferenciaMarca() ?? '';
    $descripcion = $obj->getDescripcion() ?? 0;
    $auxMargen = $obj->getAuxMargen() ?? 0;
    $margenBase = $obj->getMargen() ?? 0;
    $existenciasDisponibles = $obj->getExistenciasDisponibles() ?? 0;
    $pvp = $obj->getPvp() ?? 0;
    $pvp2 = $obj->getPvp2() ?? 0;
    $refMarca = $obj->getReferenciaMarca() ?? '';
    $pvpOfertaMostrador = $obj->getPvpOfertaMostrador() ?? 0;
    $esManoObra = $obj->getEsManoObra() ?? 0;
    $uMedida = $obj->getUdMedida() ?? 0;
    $peso = $obj->getPeso() ?? 0;
    $udsUltEntrada = $obj->getUdsUltimaEntrada() ?? 0;
    $base2 = $obj->getBase() ?? 0;
    $favorito = $obj->getFavorito() ?? 0;
    $posibleb = $obj->getPosibleb() ?? 0;
    $codArticuloGranel = $obj->getCodArtGranel() ?? 0;
    $imagen = $obj->getImagen() ?? '';
    $imagen = $obj->getEsManoObra() ?? 0;
    $ivaPercent = $obj->getIva() ?? 0;
    $nordenMostra = $obj->getNordenMostrar() ?? 0;
    $udPorGrannel = $obj->getUdMedida() ?? 0;
    $imagen = $obj->getImagen() ?? '';
    $ivaPercent = $obj->getIva() ?? 0;
    $nordenMostar = $obj->getNordenMostrar() ?? 0;
    $intrastat = $obj->getInstrastat() ?? 0;
    $uMedida = $obj->getUdMedida() ?? 0;
    $peso = $obj->getPeso() ?? 0;
    $req_eq = $obj->getReqEq() ?? 0;
    $codCat = $obj->getCodCat() ?? 0;
    $codSubCat = $obj->getCodSubCat();
    $idWoocommerce = $obj->getIdWoocommerce() ?? 0;
    $caracTecnicas = $obj->getCaracTecnicas() ?? 0;
    var_dump($codArticulo);
    $insertStmt->execute([
      ":codArticulo" => $codArticulo,
      ":codMarca" => $codMarca,
      ":codProveedor" => $codProveedor,
      ":codigo" => $codigo,
      ":codigoEan" => $codigoEan,
      ":referenciaProveedor" => $referenciaProveedor,
      ":descripcion" => $descripcion,
      ":auxMargen" => $auxMargen,
      ":margenbase" => 0,
      ":existenciasDisponibles" => $existenciasDisponibles,
      ":pvpOfertaMostrador" => $pvpOfertaMostrador,
      ":pvp" => $pvp,
      ":pvp2" => $pvp2,
      ":refenreciaMarca" => $refenreciaMarca,
      ":esManoObra" => $esManoObra,
      ":uMedida" => $uMedida,
      ":peso" => $peso,
      ":udsUltEntrada" => $udsUltEntrada,
      ":base2" => $base2,
      ":favorito" => $favorito,
      ":posibleb" => $posibleb,
      ":codArticuloGranel" => $codArticuloGranel,
      ":udPorGrannel" => $udPorGrannel,
      ":imagen" => $imagen,
      ":ivaPercent" => $ivaPercent,
      ":nordenMostra" => $nordenMostra,
      ":intrastat" => $intrastat,
      ":uMedida" => $uMedida,
      ":peso" => $peso,
      ":reqEq" => $req_eq,
      ":codCategoria" => $codCat,
      ":codSubcategoria" => $codSubCat,
      ":idWoocomerce" => $idWoocommerce,
      ":caracTecnicas" => $caracTecnicas
    ]);

    // $id = $this->pdo->lastInsertId();
    // $obj->setCodMarca((int)$id);

  }

  public function update(Article $obj)
  {
    $values = $obj->toArray($obj);

    $updateStmt = $this->pdo->prepare(
      "UPDATE familia 
              set
              CODFAMILIA = :codFamilia,
              NOMBRE=:nombreFamilia,
              MARGEN=:margen,
              IVAPERCENT=:ivaPercent
              -- ESMANOOBRA=:esManoObra,
              -- RE=:re
              WHERE CODFAMILIA = :codFamilia"
    );
    $codFamilia = $obj->getCodFamilia();
    $nombreFamilia = $obj->getNombreFamilia();
    $margen = $obj->getMargen();
    $ivaPercent = $obj->getIvaPercent();
    // $manoObra = $obj->getEsmanoObra();
    // $re = $obj->getRe();
    // $codEAN = $obj->getInicioCodean();
    $updateStmt->execute([
      ':codFamilia' => $codFamilia,
      ':nombreFamilia' => $nombreFamilia,
      ':margen' => $margen,
      ':ivaPercent' => $ivaPercent,
      // ':esManoObra' => $manoObra,
      // ':re' => $re,
    ]);
  }
  public function delete(Article $m)
  {
    $sql = "DELETE FROM `articulo` WHERE CODARTICULO=:codArticulo";
    $statement = $this->pdo->prepare($sql);
    $codArticle = $m->getCodArticle();
    $statement->bindParam(":codArticulo", $codArticle);
    $statement->execute();
  }
}

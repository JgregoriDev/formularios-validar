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

    $sql =  "INSERT INTO  articulo (CODARTICULO, CODFAMILIA, CODMARCA, CODPROVEEDOR,
     DESCRIPCION,CODIGOEAN,REFERENCIAPROVEEDOR,
     REFERENCIAMARCA,AUX_MARGEN,MARGEN,
     BASE, EXISTENCIASDISPONIBLE, PVP_OFERTA_MOSTRADOR, 
     PVP, PVP2, ESMANOOBRA, UDS_ULTIMAENTRADA
     ) VALUES
      (:codArticulo, :codFamilia, :codMarca, 
      :codProveedor, :descripcion,:codEan,:refProveedor,
      :refMarca,:auxMargen,:margen,
      :base,:existenciaDisponibles,:pvpMostrador,
      :pvp, :pvp2, :esManoObra, :unsdUltEntrada
      )";

    $insertStmt = $this->pdo->prepare($sql);
    $codArticulo = $obj->getCodArticle() ?? 0;
    $codFamilia = $obj->getCodFamilia() ?? 0;
    $codMarca = $obj->getCodMarca() ?? 0;
    $codProveedor = $obj->getCodProveedor() ?? 0;
    // var_dump($codProveedor);
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
    $insertStmt->execute([
      ":codArticulo" => $codArticulo,
      ":codFamilia" => $codFamilia,
      ":codMarca" => $codMarca,
      ":codProveedor" => $codProveedor,
      ":descripcion" => $descripcion,
      ":codEan" => $codigoEan,
      ":refProveedor" => $referenciaProveedor,
      ":refMarca"=>$refMarca, 
      ":auxMargen"=>$auxMargen, 
      ":margen"=>$margenBase,
      ":auxMargen"=>$auxMargen,
      ":margen"=>$margenBase,
      ":base"=>$base2,
      ":existenciaDisponibles"=>$existenciasDisponibles,
      ":pvpMostrador"=>$pvpOfertaMostrador,
      ":pvp"=>$pvp,
      ":pvp2"=>$pvp2,
      ":esManoObra"=>$esManoObra,
      ":unsdUltEntrada"=>$udsUltEntrada,
    ]);
    // $insertStmt->execute([
    //   ":codArticulo" => $codArticulo,

    //   ":codMarca" => $codMarca,
    //   ":codProveedor" => $codProveedor,
    //   ":codigo" => $codigo,
    //   ":codigoEan" => $codigoEan,
    //   ":referenciaProveedor" => $referenciaProveedor,
    //   ":descripcion" => $descripcion,
    //   ":auxMargen" => $auxMargen,
    //   ":margenbase" => 0,
    //   ":existenciasDisponibles" => $existenciasDisponibles,
    //   ":pvpOfertaMostrador" => $pvpOfertaMostrador,
    //   ":pvp" => $pvp,
    //   ":pvp2" => $pvp2,
    //   ":refenreciaMarca" => $refenreciaMarca,
    //   ":esManoObra" => $esManoObra,
    //   ":uMedida" => $uMedida,
    //   ":peso" => $peso,
    //   ":udsUltEntrada" => $udsUltEntrada,
    //   ":base2" => $base2,
    //   ":favorito" => $favorito,
    //   ":posibleb" => $posibleb,
    //   ":codArticuloGranel" => $codArticuloGranel,
    //   ":udPorGrannel" => $udPorGrannel,
    //   ":imagen" => $imagen,
    //   ":ivaPercent" => $ivaPercent,
    //   ":nordenMostra" => $nordenMostra,
    //   ":intrastat" => $intrastat,
    //   ":uMedida" => $uMedida,
    //   ":peso" => $peso,
    //   ":reqEq" => $req_eq,
    //   ":codCategoria" => $codCat,
    //   ":codSubcategoria" => $codSubCat,
    //   ":idWoocomerce" => $idWoocommerce,
    //   ":caracTecnicas" => $caracTecnicas
    // ]);
    var_dump($insertStmt->rowCount());
    if ($insertStmt->rowCount() > 0)
      return true;
    return false;
  }

  public function update(Article $obj)
  {
    $values = $obj->toArray($obj);
    $updateStmt = $this->pdo->prepare(
      "UPDATE articulo 
              set
              CODARTICULO=:codArticulo,
              CODMARCA=:codMarca,
              CODPROVEEDOR=:codProveedor,
              CODSUBFAMILIA=:codSubfamilia,
              Codigo=:codigo,
              CODIGOEAN=:codEan,
              REFERENCIAPROVEEDOR=:referenciaProveedor,
              REFERENCIAMARCA=:refenreciaMarca,
              DESCRIPCION=:descripcion,
              AUX_MARGEN=:auxMargen,
              MARGEN=:margenbase,
              BASE=:base,
              EXISTENCIASDISPONIBLE=:existenciasDisponibles,
              PVP_OFERTA_MOSTRADOR=:pvpOfertaMostrador,
              PVP=:pvp,
              PVP2=:pvp2,
              ESMANOOBRA=:esManoObra,
              UDS_ULTIMAENTRADA=:udsUltEntrada,
              BASE2=:base2,
              FAVORITO=:favorito,
              POSIBLEB=:posibleb,
              CODART_GRANEL=:codArticuloGranel,
              UD_X_UDGRANNEL=:udPorGrannel,
              IMAGEN=:imagen,
              IVAPERCENT=:ivaPercent, 
              NORDEN_MOSTRAR=:,
              INTRASTAT=:intrastat,
              UMEDIDA=:uMedida,
              PESO=:peso,
              REQ_EQ=:reqEq,
              CODCATEGORIA=:codCategoria,
              CODSUBCATEGORIA=:codSubcategoria,
              IDWOOCOMMERCE=:idWoocomerce,
              CARACTECNICAS=:caracTecnicas
              WHERE CODFAMILIA=:codFamilia"
    );
    $codFamilia = $obj->getCodFamilia();

    $margen = $obj->getMargen();
    $base = $obj->getBase();
    $base2 = $obj->getBase2();
    $caractTecnicas = $obj->getCaracTecnicas();
    $codArtGrannel = $obj->getCodArtGranel();
    $codArticle = $obj->getCodArticle();
    $codCategoria = $obj->getCodCat();
    $codean = $obj->getCodean();
    $codigo = $obj->getCodigo();
    $codMarca = $obj->getCodMarca();
    $codProveedor = $obj->getCodProveedor();
    $codSubCat = $obj->getCodSubCat();
    $codSubfamilia = $obj->getCodSubfamilia();
    $descripcion = $obj->getDescripcion();
    $esManoObra = $obj->getEsManoObra();
    $existenciasDisponibles = $obj->getExistenciasDisponibles();
    $favorito = $obj->getFavorito();
    $idWoocomerce = $obj->getIdWoocommerce();
    $imagen = $obj->getImagen();
    $intrastat = $obj->getInstrastat();
    $iva = $obj->getIva();
    $margen = $obj->getMargen();
    $nordenMostrar = $obj->getNordenMostrar();
    $peso = $obj->getPeso();
    $posibleb = $obj->getPosibleb();
    $pvd = $obj->getPvd();
    $pvp = $obj->getPvp();
    $pvp2 = $obj->getPvp2();
    $pvpOfertaMostrador = $obj->getPvpOfertaMostrador();
    $refMarca = $obj->getReferenciaMarca();
    $referenciaProveedor = $obj->getReferenciaProveedor();
    $reqEq = $obj->getReqEq();
    $udMedida = $obj->getUdMedida();
    $udsArtGrannel = $obj->getUdsArtGranel();
    $udsUltimaEntrada = $obj->getUdsUltimaEntrada();
    $updateStmt->execute([
      ":codArticulo" => $codArticle,
      ":codMarca" => $codMarca,
      ":codProveedor" => $codProveedor,
      ":codSubfamilia" => $codSubfamilia,
      ":codigo" => $codigo,
      ":refenreciaMarca" => $refMarca,
      ":descripcion" => $descripcion,
      ":auxMargen" => $auxMargen,
      ":margenbase" => $margen,
      ":existenciasDisponibles" => $existenciasDisponibles,
      ":pvpOfertaMostrador" => $pvpOfertaMostrador,
      ":pvp" => $pvp,
      ":pvp2" => $pvp2,
      ":esManoObra" => $esManoObra,
      ":udsUltEntrada" => $udsUltimaEntrada,
      ":base2" => $base2,
      ":favorito" => $favorito,
      ":posibleb" => $posibleb,
      ":codArticuloGranel" => $codArtGrannel,
      ":udPorGrannel" => $udPorGrannel,
      ":imagen" => $imagen,
      ":ivaPercent" => $iva,
      ":intrastat" => $instrastat,
      ":uMedida" => $udMedida,
      ":peso" => $peso,
      ":reqEq" => $reqEq,
      ":codCategoria" => $codCategoria,
      ":codSubcategoria" => $codSubCat,
      ":idWoocomerce" => $idWoocomerce,
      ":caracTecnicas" => $caractTecnicas,
      ":codFamilia" => $codFamilia
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

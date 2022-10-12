<?php

declare(strict_types=1);

namespace App\Controller;

use App\Mapper\ArticleMapper;
use App\Entity\Article;
use App\Exceptions\EntityNotFoundException;
use App\FlashMessage;
use Webmozart\Assert\InvalidArgumentException;
use App\Mapper\FamiliaMapper;
use App\Mapper\MarcaMapper;
use App\Mapper\ProveedorMapper;
use App\Mapper\SubfamiliaMapper;
use App\Repository\ArticleRepository;
use App\Repository\FamiliaRepository;
use App\Repository\MarcaRepository;
use App\Repository\ProveedorRepository;
use App\Repository\SubfamiliaRepository;
use App\Request;
use App\Response;
use PDOException;

class ArticlesController
{
  private ArticleRepository $articleRepository;
  private Request $request;
  public function __construct()
  {
    $articleMapper = new ArticleMapper();
    $this->request = new Request();
    $this->articleRepository = new ArticleRepository($articleMapper);
  }

  public function llistarArticles()
  {
    $errors = [];
    try {
      $articles = $this->articleRepository->findAll();
    } catch (PDOException $e) {
      $errors[] = $e->getMessage();
    }
    $response = new Response();
    $response->setView("index");
    $titulo = $response->setTitulo("Listado de artículos")->getTitulo();
    $response->setLayout("admin");
    $response->setView("article/article.list");
    $response->setData(compact("articles", "errors", "titulo"));


    return $response;
  }

  public function inicio()
  {
    $response = new Response();
    $response->setView("index");
    $titulo = $response->setTitulo("Inicio")->getTitulo();
    $response->setLayout("admin");
    //$response->setView("article/article.list");
    $response->setData(compact("titulo"));


    return $response;
  }

  public function conseguirArticle(int $id)
  {
    $errors = [];
    try {
      $article = $this->articleRepository->find($id);
    } catch (PDOException $e) {
      $errors[] = $e->getMessage();
    }
    $marques = $this->conseguirMarques();
    $families = $this->conseguirFamilies();
    $subfamilies = $this->conseguirSubfamilies();
    $proveedors = $this->conseguirProveedors();
    $response = new Response();
    if ($this->request->isPost()) {
    }
    $response->setView("index");
    $titulo = $response->setTitulo("Obtener artículo")->getTitulo();
    $response->setLayout("admin");
    $response->setView("article/article.form");
    $response->setData(compact("article", "marques", "families", "proveedors", "subfamilies", "errors", "titulo"));


    return $response;
  }
  public function validateArticle(Article $article): Article
  {
    try {
      $article->setCodArticle((int)$this->request->getPOST("codArticulo"));
    } catch (InvalidArgumentException $e) {
      $errors[] = $e->getMessage();
      FlashMessage::set("errorcodArticulo", "" . $e->getMessage());
    }
    try {
      $article->setCodProveedor((int)$this->request->getPOST("codArticulo"));
    } catch (InvalidArgumentException $e) {
      $errors[] = $e->getMessage();
      FlashMessage::set("errorcodArticulo", "" . $e->getMessage());
    }
    try {
      $article->setCodFamilia((int)$this->request->getPOST("codFamilia"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorcodFamilia", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setCodSubfamilia((int)$this->request->getPOST("codSubfamilia"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorcodSubfamilia", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setCodMarca((int)$this->request->getPOST("codMarca"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorcodMarca", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }

    try {
      $article->setCodean($this->request->getPOST("codEan"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorcodEan", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setReferenciaMarca($this->request->getPOST("refMarca"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorrefMarca", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    // try {
    //   --$article->setAuxMarca($this->request->getPOST("auxMarca"));
    // } catch (InvalidArgumentException $e) {
    //   FlashMessage::set("errorauxMarca","".$e->getMessage());
    //  $errors[]=$e->getMessage();
    // }
    try {
      $article->setPvp((float)$this->request->getPOST("pvp"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorpvp", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setPvp2((float)$this->request->getPOST("pvp2"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorpvp2", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setPvpOfertaMostrador((float)$this->request->getPOST("pvpOfertaMostrador"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorpvpOfertaMostrador", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setUdsUltimaEntrada((int)$this->request->getPOST("udsUltEntrada"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorudsUltEntrada", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setBase((float)$this->request->getPOST("Base"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorBase", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setFavorito((int)$this->request->getPOST("Favorito"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorFavorito", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setUdsArtGranel($this->request->getPOST("undGrannel"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorundGrannel", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setImagen($this->request->getPOST("imagen"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorimagen", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setIva((float)$this->request->getPOST("iva"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("erroriva", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setNordenMostrar((int)$this->request->getPOST("numOrdMostrar"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errornumOrdMostrar", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setUdMedida((int)$this->request->getPOST("unidadMedida"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorunidadMedida", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setPeso((int)$this->request->getPOST("peso"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorpeso", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setReqEq((int)$this->request->getPOST("reqEq"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorreqEq", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setCodCat((int)$this->request->getPOST("codCategoria"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorcodCategoria", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $article->setCodSubCat((int)$this->request->getPOST("CodigoSubcategoria"));
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errorcodArticulo", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $descropcion = $this->request->getPOST("textoDescripcion") ?? "";
      $article->setDescripcion($descropcion);
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errortextoDescripcion", "" . $e->getMessage());
      $errors[] = $e->getMessage();
    }
    try {
      $caract = $this->request->getPOST("textoCaracteristicasTecnicas") ?? "";
      $article->setCaracTecnicas($caract);
    } catch (InvalidArgumentException $e) {
      FlashMessage::set("errortextoCaracteristicasTecnicas", "" . $e->getMessage());
    }
    return $article;
  }
  public function insertarArticle()
  {
    $errors = [];
    $article = new Article();
    $marques = $this->conseguirMarques();
    $families = $this->conseguirFamilies();
    $subfamilies = $this->conseguirSubfamilies();
    $proveedors = $this->conseguirProveedors();
    $response = new Response();
    if ($this->request->isPost()) {

      $articleValidat = $this->validateArticle($article);

      if (count($errors) === 0) {
        $isInserted = false;
        try {
          $isInserted = $this->articleRepository->save($articleValidat);
        } catch (PdoException $e) {
          FlashMessage::set("resultadoInsatisfactorio", "Error insertando el art&iacute;culo");
        }
        $isInserted ? FlashMessage::set("resultadoSatisfactorio", "se ha insertado el art&oacute;culo de manera correcta") : "";
      }
    }
    $response->setView("index");
    $titulo = $response->setTitulo("Insertar articulo")->getTitulo();
    $response->setLayout("admin");
    $response->setView("article/article.form");
    $response->setData(compact("article", "marques", "families", "proveedors", "subfamilies", "errors", "titulo"));
    return $response;
  }

  public function borrarArticle(int $id)
  {
    $errors = [];
    try {
      $article = $this->conseguirArticlePerID($id);
    } catch (EntityNotFoundException $e) {
      $errors[] = $e->getMessage();
    }
    if ($this->request->isPost()) {
      $isDeleted = false;
      if (isset($article))
        try {
          $isDeleted = $this->articleRepository->delete($article);
          //code...
        } catch (PDOException $th) {
          FlashMessage::set("errortextoDescripcion", "" . $e->getMessage());
        }
      $isDeleted ? FlashMessage::set("resultadoSatisfactorio", "Se ha borrado de manera satisfactoria el articulo") : "";
    }
    $response = new Response();
    $response->setView("index");
    $titulo = $response->setTitulo("Borrar articulos")->getTitulo();
    $response->setLayout("admin");
    $response->setView("article/article.delete");
    $response->setData(compact("article", "errors", "titulo"));
    return $response;
  }

  public function conseguirArticlePerID(int $id): Article
  {
    $article = $this->articleRepository->find($id);
    if ($article === null)
      throw new EntityNotFoundException("Artículo con id $id no encontrado");
    return $article;
  }

  public function actualizarFamilia(int $id)
  {
    $errors = [];
    try {
      $article = $this->articleRepository->find($id);
    } catch (PDOException $e) {
      $errors[] = $e->getMessage();
    } catch (EntityNotFoundException $e) {
      $errors[] = $e->getMessage();
    }
    // var_dump($familia);


    if ($this->request->isPost()) {

      $articleValidat = $this->validateArticle($article);
      $isUpdated = false;
      try {
        $isUpdated = $this->articleRepository->update($articleValidat, (int)$id);
      } catch (PDOException $e) {
        FlashMessage::set("resultadoInsatisfactorio", "La familia no ha podido ser actualizada " . $e->getMessage());
      }
      $isUpdated ?
        FlashMessage::set("resultadoSatisfactorio", "Familia actualizada de manera satisfactoria")
        : "";
    }
    $response = new Response();
    $response->setView("familia/familia.form");
    $response->setLayout("admin");
    $response->setTitulo("Modificar familia con $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("familia", 'errors', 'titulo'));
    return $response;
  }

  public function conseguirFamilies()
  {
    $families = new FamiliaRepository(new FamiliaMapper());
    return $families->findAll();
  }

  public function conseguirSubfamilies()
  {
    $subfamilies = new SubfamiliaRepository(new SubfamiliaMapper());
    return $subfamilies->findAll();
  }

  public function conseguirProveedors()
  {
    $proveedors = new ProveedorRepository(new ProveedorMapper());
    return $proveedors->findAll();
  }
  public function conseguirMarques()
  {
    $marques = new MarcaRepository(new MarcaMapper());
    return $marques->findAll();
  }
}

<?php

declare(strict_types=1);

namespace App\Controller;

use App\Mapper\ArticleMapper;
use App\Entity\Article;
use App\Exceptions\EntityNotFoundException;
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
    $response->setData(compact( "titulo"));


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
      var_dump($_POST);
      // $article->setCodArticle((int)$_POST['codArticulo'])->setCodFamilia((int)$_POST['codFamilia']);
      // $isInserted=$this->articleRepository->save($article);
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
    $errors=[];
    try {
      $article=$this->conseguirArticlePerID($id);
    } catch (EntityNotFoundException $e) {
      $errors[]=$e->getMessage();
    }
    if($this->request->isPost()){
      if(isset($article))
        $this->articleRepository->delete($article);

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
    $article=$this->articleRepository->find($id);
    if($article===null)
      throw new EntityNotFoundException("Artículo con id $id no encontrado");
    return $article;
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

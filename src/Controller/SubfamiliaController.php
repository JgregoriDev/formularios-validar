<?php

declare(strict_types=1);

namespace App\Controller;

use App\Mapper\FamiliaMapper;
use App\Entity\Familia;
use App\Mapper\SubfamiliaMapper;
use App\Entity\Subfamilia;
use Webmozart\Assert\InvalidArgumentException;
use App\Exceptions\EntityNotFoundException;
use App\FlashMessage;
use App\Repository\FamiliaRepository;
use App\Repository\SubfamiliaRepository;
use FFI\Exception;
use App\Response;
use App\Request;
use PDOException;

class SubfamiliaController
{
  private SubfamiliaRepository $subfamiliaRepository;
  private FamiliaRepository $familiaRepository;
  private Request $request;

  public function __construct()
  {
    $this->request = new Request();
    $subfamiliaMapper = new SubfamiliaMapper();
    $familiaMapper = new FamiliaMapper();
    $this->subfamiliaRepository = new SubfamiliaRepository($subfamiliaMapper);
    $this->familiaRepository = new FamiliaRepository($familiaMapper);
  }

  public function llistarSubfamilies()
  {

    $subfamilias = $this->subfamiliaRepository->findAll();
    $response = new Response();
    $response->setView("subfamilia/subfamilia.list");
    $response->setLayout("admin");
    $response->setTitulo('Listado de subfamilias');
    $titulo = $response->getTitulo();
    $response->setData(compact("subfamilias", "titulo"));
    return $response;
  }

  public function conseguirSubfamilia(int $id, int $id2)
  {

    $subfamilia = $this->subfamiliaRepository->find($id, $id2);
    if ($subfamilia === null) {
      throw new EntityNotFoundException("La subfamilia con id $id no ha podido ser encontrada", 1);
    }
    $response = new Response();
    $response->setView("subfamilia/subfamilia.list");
    $response->setLayout("admin");
    $response->setTitulo("Subfamilia con cod. familia  $id y cod. subfamilia $id2");
    $titulo = $response->setTitulo("Listado de subfamilias")->getTitulo();
    $response->setData(compact("subfamilias", "titulo"));
    return $response;
  }

  public function insertarSubfamilia()
  {
    $familias = $this->familiaRepository->findAll();
    $subfamilia = new Subfamilia();
    if ($this->request->isPost()) {


      $subfamilia = new Subfamilia((int)$_POST['codFamilia'], (int)$_POST['codSubfamilia'], $_POST["nombreSubfamilia"], '');
      $isInserted = false;
      try {
        # code...
        $isInserted = $this->subfamiliaRepository->save($subfamilia);
      } catch (PDOException $e) {
        FlashMessage::set("resultadoInsatisfactorio", $e->getMessage());
      }
      $isInserted ?
        FlashMessage::set("resultadoSatisfactorio", "Subfamilia insertada de manera satisfactoria")
        : "";
    }
    $response = new Response();
    $response->setView("subfamilia/subfamilia.form");
    $response->setLayout("admin");
    $titulo = $response->setTitulo("Insertar Subfamilia")->getTitulo();
    $response->setData(compact("subfamilia", 'familias', 'titulo'));
    return $response;
  }
  public function borrarSubfamilia(int $id, int $id2)
  {
    $subfamilia = $this->subfamiliaRepository->find($id, $id2);

    if ($subfamilia === null) {
      throw new EntityNotFoundException("La familia con id $id no ha podido ser encontrada", 1);
    }
    if ($this->request->isPost()) {
      if (isset($_POST['familia']) && isset($_POST['subfamilia'])) {
        $isDeleted = false;
        try {
          $isDeleted = $this->subfamiliaRepository->delete($subfamilia);
        } catch (PDOException $e) {
          FlashMessage::set("resultadoInsatisfactorio", "La subfamilia no ha podido ser borrada $e->getMessage()");
        }


        $isDeleted ? FlashMessage::set("resultadoSatisfactorio", "Subfamilia borrada de manera satisfactoria")
          : "";
      }
    }
    $response = new Response();
    $response->setView("subfamilia/subfamilia.delete");
    $response->setLayout("admin");
    $response->setTitulo("Borrar Subfamilia con cod. familia  $id y cod. subfamilia $id2");
    $titulo = $response->getTitulo();
    $response->setData(compact("subfamilia", "titulo"));
    return $response;
  }


  public function actualizarSubfamilia(int $id, int $id2)
  {

    $subfamilia = $this->subfamiliaRepository->find($id, $id2);
    $familias = $this->familiaRepository->findAll();

    if ($subfamilia === null) {
      throw new EntityNotFoundException("La familia con id $id no ha podido ser encontrada", 1);
    }


    if ($this->request->isPost()) {
      var_dump($_POST);
      try {
        $subfamilia->setCodFamilia((int)$this->request->getPOST("codFamilia") ?? 0);
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNumPlazos", $e->getMessage());
      }
      try {
        $subfamilia->setCodSubfamilia((int)$this->request->getPOST("codSubfamilia"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNumPlazos", $e->getMessage());
      }
      try {
        $subfamilia->setNombre($this->request->getPOST("nombreSubfamilia"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNumPlazos", $e->getMessage());
      }
      try {
        $subfamilia->setImage($this->request->getPOST("image"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNumPlazos", $e->getMessage());
      }
      var_dump($subfamilia);
      $isUpdated = false;

      try {
        $isUpdated = $this->subfamiliaRepository->update($subfamilia, $id, $id2);
      } catch (PDOException $e) {
        FlashMessage::set("resultadoInsatisfactorio", "La subfamilia no ha podido ser actualizada " . $e->getMessage());
      } catch (Exception $e) {

        FlashMessage::set("resultadoInsatisfactorio", "La subfamilia no ha podido ser actualizada " . $e->getMessage());
      }
      var_dump($isUpdated);
      $isUpdated ?
        FlashMessage::set("resultadoSatisfactorio", "Familia borrada de manera satisfactoria")
        : "";
    }
    $response = new Response();
    $response->setView("subfamilia/subfamilia.form");
    $response->setLayout("admin");
    $response->setTitulo('Actualizar subfamilia');
    $titulo = $response->getTitulo();
    $response->setData(compact("subfamilia", "familias", "titulo"));
    return $response;
  }
}

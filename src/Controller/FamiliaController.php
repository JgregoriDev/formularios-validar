<?php

declare(strict_types=1);

namespace App\Controller;

use App\FlashMessage;
use App\Repository\FamiliaRepository;
use App\Mapper\FamiliaMapper;
use Webmozart\Assert\InvalidArgumentException;
use App\Entity\Familia;
use App\Exceptions\EntityNotFoundException;
use App\Helpers\Validar;
use App\Request;
use FFI\Exception;
use App\Response;
use PDOException;

class FamiliaController
{
  public FamiliaRepository $familiaRepository;
  public Request $request;
  public function __construct()
  {
    $this->request = new Request();
    $familiaMapper = new FamiliaMapper();
    $this->familiaRepository = new FamiliaRepository($familiaMapper);
  }
  public function trobarFamiliaPerID(int $id)
  {

    $familia = $this->familiaRepository->find($id);
    if ($familia === null) {
      throw new EntityNotFoundException();
    }
    return $familia;
  }
  public function llistarFamilies()
  {
    $errors = [];
    try {
      $familias = $this->familiaRepository->findAll();
    } catch (PDOException $e) {
      $errors[] = $e->getMessage();
    }


    $response = new Response();
    $response->setView("familia/familia.list");
    $response->setLayout("admin");
    $response->setTitulo('Listado de familias');
    $titulo = $response->getTitulo();
    $response->setData(compact("familias", "errors", "titulo"));
    return $response;
  }

  public function conseguirFamilia(int $id)
  {
    $familia = $this->familiaRepository->find($id);

    throw new EntityNotFoundException("La familia con id $id no ha podido ser encontrada", 1);

    var_dump($familia);
    $response = new Response();
    $response->setView("familia/familia.get");
    $response->setLayout("admin");
    $response->setTitulo("Familia con $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("familia"));
    return $response;
  }

  public function insertarFamilia()
  {
    $familia = new Familia();
    $errors = [];
    if ($this->request->isPost()) {

      try {
        $familia->setCodFamilia((int)$this->request->getPOST("codfamilia"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsCodFamilia", $e->getMessage());
      }
      try {
        $familia->setNombreFamilia($this->request->getPOST("nombre"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNombre", $e->getMessage());
      }
      try {
        $familia->setMargen((int)$this->request->getPOST("margen"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsMargen", $e->getMessage());
      }
      try {
        $familia->setIvaPercent((int)$this->request->getPOST("iva"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsIva", $e->getMessage());
      }
      try {
        $familia->setInicioCodean($this->request->getPOST("inicioCodean"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsInicioCodean", $e->getMessage());
      }

      try {
        $familia->setRe((float)$this->request->getPOST("re"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsRe", $e->getMessage());
      }
      try {
        $familia->setImage($this->request->getPOST("imagen"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsImagen", $e->getMessage());
      }
      try {
        $familia->setEsmanoObra(true);
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsManoObra", $e->getMessage());
      }
      $isInserted = false;
      if (count($errors) === 0)
        try {
          $isInserted = $this->familiaRepository->save($familia);
        } catch (PDOException $e) {
          FlashMessage::set('resultadoInsatisfactorio', 'No ha podido ser insertado ' . $e->getMessage());
        }

      $isInserted ? FlashMessage::set('resultadoSatisfactorio', 'Se ha insertado la familia de manera satisfactoria') :
        "";
    }
    header('Content-Type: text/html;charset=UTF-8');
    $response = new Response();
    $response->setView("familia/familia.form");
    $response->setLayout("admin");
    $response->setTitulo('Insertar familia');
    $titulo = $response->getTitulo();
    $response->setData(compact("familia", 'errors', "titulo"));
    return $response;
  }
  public function borrarFamilia(int $id)
  {


    $errors = [];
    $familia = '';
    $isDeleted = false;
    try {
      $familia = $this->trobarFamiliaPerID($id);
    } catch (PDOException $e) {
      $errors[] = $e->getMessage();
    } catch (EntityNotFoundException $e) {
      $errors[] = $e->getMessage();
    }
    if ($this->request->isPost()) {
      if (isset($_POST['familia'])) {
        $isDeleted = false;
        try {
          $isDeleted = $this->familiaRepository->delete($familia);
        } catch (PDOException $e) {
          FlashMessage::set("resultadoInsatisfactorio", "La familia no ha podido ser borrada" . $e->getMessage());
        }
        $isDeleted ?
          FlashMessage::set("resultadoSatisfactorio", "Familia borrada de manera satisfactoria")
          : FlashMessage::set("resultadoInsatisfactorio", "La familia no ha podido ser borrada");
      }
    }
    $response = new Response();
    $response->setView("familia/familia.delete");
    $response->setTitulo("Borrar familia con $id");
    $titulo = $response->getTitulo();
    $response->setLayout("admin");
    $response->setData(compact("familia", "titulo", "errors"));
    return $response;
  }


  public function actualizarFamilia(int $id)
  {
    $errors = [];
    try {
      $familia = $this->trobarFamiliaPerID($id);
    } catch (PDOException $e) {
      $errors[] = $e->getMessage();
    } catch (EntityNotFoundException $e) {
      $errors[] = $e->getMessage();
    }
    // var_dump($familia);


    if ($this->request->isPost()) {
      var_dump($_POST);
      $esmanoObra = 0;
      if (isset($_POST['manoObra'])) {
        $esmanoObra = 1;
      }

      try {
        $familia->setCodFamilia((int)$this->request->getPOST("codfamilia"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsCodFamilia", $e->getMessage());
      }
      try {
        $familia->setNombreFamilia($this->request->getPOST("nombre"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNombre", $e->getMessage());
      }
      try {
        $familia->setMargen((float)$this->request->getPOST("margen"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsMargen", $e->getMessage());
      }
      try {
        $familia->setIvaPercent((float)$this->request->getPOST("iva"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorIvaPercent", $e->getMessage());
      }
      try {
        $familia->setInicioCodean($this->request->getPOST("inicioCodean"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsInicioCodean", $e->getMessage());
      }

      try {
        $familia->setRe((float)$this->request->getPOST("re"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsRe", $e->getMessage());
      }
      try {
        $familia->setImage($this->request->getPOST("imagen"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsImagen", $e->getMessage());
      }
      try {
        $familia->setEsmanoObra(true);
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsManoObra", $e->getMessage());
      }
      var_dump($familia);
      $isUpdated = false;
      try {
        $isUpdated = $this->familiaRepository->update($familia, (int)$id);
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
}

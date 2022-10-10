<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MarcaRepository;
use App\Mapper\MarcaMapper;
use App\Entity\Marca;
use App\Exceptions\EntityNotFoundException;
use App\FlashMessage;
use Webmozart\Assert\InvalidArgumentException;
use App\Request;
use App\Response;
use FFI\Exception;
use PDOException;
use ArgumentCountError;
class MarcaController
{
  private MarcaRepository $marcaRepository;
  private Request $request;
  public function __construct()
  {
    $this->request = new Request();
    $marcaMapper = new MarcaMapper();
    $this->marcaRepository = new MarcaRepository($marcaMapper);
  }

  public function llistarMarques()
  {

    $errors = [];
    $marcas = [];
    try {
      # code...
      $marcas = $this->marcaRepository->findAll();
    } catch (PDOException $e) {
      $errors[] = $e->getMessage();
    }
  
    $response = new Response();
    $response->setView("marca/marca.list");
    $response->setLayout("admin");
    $response->setTitulo("Listar marcas");
    $titulo = $response->getTitulo();
    $response->setData(compact("marcas", 'errors', 'titulo'));
    return $response;
  }
  public function trobatPerIdLaMarca(int $id): Marca
  {
    $marca = $this->marcaRepository->find($id);
    if ($marca === null) throw new EntityNotFoundException("Error marca con $id no encontrada", 1);

    return $marca;
  }
  public function conseguirMarca(int $id)
  {
    $errors = [];
    try {
      $marca = $this->trobatPerIdLaMarca($id);
    } catch (PDOException $e) {
      FlashMessage::set("error","Error ".$e->getMessage());
    } 

    $response = new Response();
    $response->setView("marca/marca.form");
    $response->setLayout("admin");
    $response->setTitulo("Insertar marca");
    $titulo = $response->getTitulo();
    $response->setData(compact("marca", 'errors', 'titulo'));
    return $response;
  }
  public function insertarMarca()
  {
    //$marca = new Marca(0,'','');
    $marca=new Marca(0,'','');
    $errors = [];
    $enviar = '';
    $isInserted = false;
    if ($this->request->isPost()) {

      try {
        $marca->setCodMarca((int)$this->request->getPOST("codMarca"));
      } catch (InvalidArgumentException $e) {
        $error[] = $e->getMessage();
        FlashMessage::set("errorsCodMarca", $e->getMessage());
      }
      try {
        # code...
        $marca->setNombreMarca($this->request->getPOST("nombremarca"));
      } catch (InvalidArgumentException $e) {
        $error[] = $e->getMessage();
        FlashMessage::set("errorsNomMarca", $e->getMessage());
      }
      try {
        # code...
        $marca->setRutaLogo($this->request->getPOST("rutalogo"));
      } catch (InvalidArgumentException $e) {
        $error[] = $e->getMessage();
        FlashMessage::set("errorsRutaLogoMarca", $e->getMessage());
      }


      if (count($errors) === 0) {
        try {
          $isInserted = $this->marcaRepository->save($marca);
        } catch (PDOException $e) {
          FlashMessage::set("resultadoInsatisfactorio", "Error El valor no ha podido ser insertado: " . $e->getMessage());
        }
      }
      $isInserted ?
        FlashMessage::set("resultadoSatisfactorio", "La marca ha sido insertada de manera satisfactoria") :
        "";
    }
    $response = new Response();
    $response->setView("marca/marca.form");
    $response->setLayout("admin");
    $response->setTitulo("Insertar marca");
    $titulo = $response->getTitulo();
    $response->setData(compact("marca", 'titulo'));
    return $response;
  }
  public function borrarMarca(int $id)
  {
    $errors = [];
    try {
      $marca = $this->trobatPerIdLaMarca($id);
    } catch (PDOException $e) {
      $errors[] = $e->getMessage();
    } catch (EntityNotFoundException $e) {
      $errors[] = $e->getMessage();
    }

    if ($this->request->isPost() && $marca !== null) {
      try {
        $isDeleted = $this->marcaRepository->delete($marca);
      } catch (PDOException $e) {
        $errors[] = $e->getMessage();
      }

      $isDeleted ? FlashMessage::set("resultadoSatisfactorio", "La marca ha sido borrada de manera satisfactoria")
        : FlashMessage::set("resultadoInsatisfactorio", "La marca no ha podido ser borrada");
    }
    $response = new Response();
    $response->setView("marca/marca.delete");
    $response->setLayout("admin");
    $response->setTitulo("Borrar marca con $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("marca", 'errors', 'titulo'));
    return $response;
  }

  public function actualizarMarca(int $id)
  {
    $errors = [];
    try {
      $marca = $this->trobatPerIdLaMarca($id);
    } catch (PDOException $e) {
      $errors[] = $e->getMessage();
    } catch (EntityNotFoundException $e) {
      $errors[] = $e->getMessage();
    }


    $errors = [];
    if ($this->request->isPost()) {
      try {
        $marca->setCodMarca((int)$this->request->getPOST("codMarca"));
      } catch (InvalidArgumentException $e) {
        $error = 1;
        FlashMessage::set("errorsCodMarca", $e->getMessage());
      }
      try {
        # code...
        $marca->setNombreMarca($this->request->getPOST("nombremarca"));
      } catch (InvalidArgumentException $e) {
        $error = 1;
        FlashMessage::set("errorsNomMarca", $e->getMessage());
      }
      try {
        # code...
        $marca->setRutaLogo($this->request->getPOST("rutalogo"));
      } catch (InvalidArgumentException $e) {
        $error = 1;
        FlashMessage::set("errorsRutaLogoMarca", $e->getMessage());
      }

      $isUpdated = false;

      try {
        $idAuxiliar=$id;
        $isUpdated = $this->marcaRepository->update($marca,$idAuxiliar);
      } catch (PDOException $e) {
        FlashMessage::set("resultadoInsatisfactorio", "Error la marca  no ha podido ser actualizada:" . $e->getMessage());

        $errors[] = $e->getMessage();
      }catch(ArgumentCountError $e){
        FlashMessage::set("resultadoInsatisfactorio", "Error la marca  no ha podido ser actualizada:" . $e->getMessage());
        $errors[] = $e->getMessage();
      }
      if ($isUpdated) {
        FlashMessage::set("resultadoSatisfactorio", "El valor ha sido actualizado de manera satisfactoria");
      }
    }
    $response = new Response();
    $response->setView("marca/marca.form");
    $response->setLayout("admin");
    $response->setTitulo("Actualizar marca $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("marca", 'titulo'));
    return $response;
  }
}

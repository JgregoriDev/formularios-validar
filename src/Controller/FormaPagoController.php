<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\FamiliaRepository;
use App\Mapper\FormaPagoMapper;
use App\Entity\FormaPago;
use Webmozart\Assert\InvalidArgumentException;
use App\Exceptions\EntityNotFoundException;
use App\FlashMessage;
use App\Response;
use App\Repository\FormaPagoRepository;
use App\Request;
use FFI\Exception;
use PDOException;

class FormaPagoController
{
  public FormaPagoRepository $formaPagoRepository;
  public Request $request;
  public function __construct()
  {
    $this->request = new Request();
    $formaPagoMapper = new FormaPagoMapper();
    $this->formaPagoRepository = new FormaPagoRepository($formaPagoMapper);
  }

  public function llistarFormesPago()
  {
    $fps = $this->formaPagoRepository->findAll();
    $response = new Response();
    $response->setView("FormasPago/fp.list");
    $response->setLayout("admin");
    $titulo = $response->setTitulo("Listar formas de pago")->getTitulo();
    $response->setData(compact("fps", "titulo"));
    return $response;
  }

  public function conseguirFormaPago(int $id)
  {

    $fp = $this->formaPagoRepository->find($id);

    try {

      if ($fp === null) {
        throw new EntityNotFoundException("La familia con id $id no ha podido ser encontrada", 1);
      }
    } catch (EntityNotFoundException $e) {

      FlashMessage::set("errorsDistancia", "" . $e->getMessage());
    }
    $response = new Response();
    $response->setView("subfamilia/subfamilia.delete");
    $response->setLayout("admin");
    $response->setTitulo("Conseguir forma de pago con $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("fp", "titulo"));
    return $response;
  }

  public function insertarFormaPago()
  {
    $fp = new FormaPago();
    $errors = [];
    if ($this->request->isPost()) {
      try {
        $fp->setCodFp((int)$this->request->getPOST("codFP"));
      } catch (InvalidArgumentException $e) {
        FlashMessage::set("errorCodFp", $e->getMessage());
        $errors[] = $e->getMessage();
      }
      try {

        $fp->setNombre($this->request->getPOST("nombre"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNombre", $e->getMessage());
      }

      try {

        $fp->setNumPlazos((int)$this->request->getPOST("nplazos"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNumPlazos", $e->getMessage());
      }
      try {
        #
        $fp->setDistancia((int)$this->request->getPOST("distancia"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsDistancia", $e->getMessage());
      }
      try {
        # code...
        $fp->setCodEmpresa((int)$this->request->getPOST("comEmp"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsCodEmpresa", $e->getMessage());
      }
      if (count($errors) === 0) {
        try {
          $isInserted = $this->formaPagoRepository->save($fp);
          $isInserted ?
            FlashMessage::set('resultadoSatisfactorio', 'Se ha insertado de manera satisfactoria') :
            FlashMessage::set('resultadoInsatisfactorio', 'No ha podido ser insertado');
        } catch (PDOException $e) {
          $errors[] = $e->getMessage();
          FlashMessage::set("errorsNomMarca", $e->getMessage());
        }
      }
    }
    $response = new Response();
    $response->setView("FormasPago/fp.form");
    $response->setLayout("admin");
    $titulo = $response->setTitulo("Insertar forma de pago")->getTitulo();
    $titulo = $response->getTitulo();
    $response->setData(compact("fp", "titulo"));
    return $response;
  }
  public function borrarFormaPago(int $id)
  {
    $fp = $this->formaPagoRepository->find($id);
    try {

      if ($fp === null) {
        throw new EntityNotFoundException("La familia con id $id no ha podido ser encontrada", 1);
      }
    } catch (EntityNotFoundException $e) {
      FlashMessage::set('resultadoNoEncontrado', $e->getMessage());
    }
    if ($this->request->isPost() && $fp !== null) {
      try {
        $fp->setNombre($this->request->getPOST("nombre"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNombre", $e->getMessage());
      }

      try {
        $fp->setNumPlazos((int)$this->request->getPOST("nplazos"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNumPlazos", $e->getMessage());
      }
      try {
        $fp->setDistancia((int)$this->request->getPOST("distancia"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsDistancia", $e->getMessage());
      }
      try {
        $fp->setCodEmpresa((int)$this->request->getPOST("comEmp"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsCodEmpresa", $e->getMessage());
      }
      $isDeleted = $this->formaPagoRepository->delete($fp);
      $isDeleted ? FlashMessage::set("resultadoSatisfactorio", "Forma de pago borrada de manera satisfactoria")
        : FlashMessage::set("resultadoInsatisfactorio", "La forma de pago no ha podido ser borrada");
    }
    $response = new Response();
    $response->setView("FormasPago/fp.delete");
    $response->setLayout("admin");
    $response->setTitulo("Borrar forma de pago con id $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("fp", "titulo"));
    return $response;
  }


  public function actualizarFormaPago(int $id)
  {

    $fp = $this->formaPagoRepository->find($id);
    $errors = [];
    try {

      if ($fp === null) {
        throw new EntityNotFoundException("La familia con id $id no ha podido ser encontrada", 1);
      }
    } catch (EntityNotFoundException $e) {
      FlashMessage::set("errorEntityNotFound", "Error la forma de pago no ha podido ser encontrada $id");
    }
    if ($this->request->isPost()) {
      $auxID = $fp->getCodFp();
      try {
        $fp->setNombre($this->request->getPOST("nombre"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNombre", $e->getMessage());
      }

      try {
        $fp->setNumPlazos((int)$this->request->getPOST("nplazos"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsNumPlazos", $e->getMessage());
      }
      try {
        $fp->setDistancia((int)$this->request->getPOST("distancia"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsDistancia", $e->getMessage());
      }
      try {
        $fp->setCodEmpresa((int)$this->request->getPOST("comEmp"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("errorsCodEmpresa", $e->getMessage());
      }
      $isUpdated = false;
      if (count($errors) === 0) {

        try {
          $isUpdated = $this->formaPagoRepository->update($fp, $id);
        } catch (PDOException $e) {
          FlashMessage::set("resultadoInsatisfactorio", $e->getMessage());
        }
        $isUpdated ? FlashMessage::set("resultadoSatisfactorio", "Forma de pago borrada de manera satisfactoria")
          : "";
      }
    }

    $response = new Response();
    $response->setView("FormasPago/fp.form");
    $response->setLayout("admin");
    $response->setTitulo("Actualizar forma de pago con $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("fp", "titulo"));
    return $response;
  }
}

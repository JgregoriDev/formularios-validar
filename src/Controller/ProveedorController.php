<?php

declare(strict_types=1);

namespace App\Controller;

use App\Mapper\ProveedorMapper;
use App\Repository\ProveedorRepository;
use App\Entity\Proveedor;
use App\Exceptions\EntityNotFoundException;
use Webmozart\Assert\InvalidArgumentException;
use App\FlashMessage;
use App\Response;
use PDOException;
use App\Request;
use FFI\Exception;

class ProveedorController
{
  public ProveedorRepository $proveedorRepository;
  public Request $request;
  public function __construct()
  {
    $this->request = new Request();
    $proveedorMapper = new ProveedorMapper();
    $this->proveedorRepository = new ProveedorRepository($proveedorMapper);
  }

  public function listarProveedores()
  {
    $proveedores = $this->proveedorRepository->findAll();
    $response = new Response();
    $response->setView("proveedor/proveedor.list");
    $response->setLayout("admin");
    $response->setTitulo("Listar proveedores");
    $titulo = $response->getTitulo();
    $response->setData(compact("proveedores", "titulo"));
    return $response;
  }

  public function conseguirProveedor(int $id)
  {

    $fp = $this->proveedorRepository->find($id);

    try {

      if ($fp === null) {
        throw new EntityNotFoundException("La familia con id $id no ha podido ser encontrada", 1);
      }
    } catch (EntityNotFoundException $e) {
      FlashMessage::set("ErrorEntityNotFound", "Error el proveedor no existe.");
    }
    $response = new Response();
    $response->setView("subfamilia/subfamilia.delete");
    $response->setLayout("admin");
    $response->setTitulo("Conseguir forma de pago con $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("fp", "titulo"));
    return $response;
  }

  public function insertarProveedor()
  {
    $errors = [];
    $proveedor = new Proveedor();
    try {
      # code...
      $proveedor->setDomicilio("");
      
    } catch (InvalidArgumentException $e) {
      $errors[] = "$e->getMessage()";
    }
    $proveedor->setCuentaPago("");
    if ($this->request->isPost()) {
      
      try {
        $proveedor->setCodProveedor((int)$this->request->getPOST("codProveedor"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorCodProveedor", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setRazonSocial($this->request->getPOST("razonSocial"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorRazonSocial", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setNif($this->request->getPOST("nif"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrortNif", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setDomicilio($this->request->getPOST("domicilio"));
      } catch (InvalidArgumentException $e) {
        FlashMessage::set("ErrorDomicilio", "Error en el campo." . $e->getMessage());
        $errors[] = $e->getMessage();
      }
      try {
        $proveedor->setPoblacion($this->request->getPOST("poblacion"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorPoblacion", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setProvincia($this->request->getPOST("provincia"));
      } catch (InvalidArgumentException $e) {
        FlashMessage::set("ErrorProvincia", "Error en el campo." . $e->getMessage());
        $errors[] = $e->getMessage();
      }
      try {
        $proveedor->setEmail($this->request->getPOST("email"));
      } catch (InvalidArgumentException $e) {
        FlashMessage::set("ErrorEmail", "Error en el campo." . $e->getMessage());
        $errors[] = $e->getMessage();
      }
      try {
        $proveedor->setWww($this->request->getPOST("www"));
      } catch (InvalidArgumentException $e) {
        FlashMessage::set("ErrorWWW", "Error en el campo." . $e->getMessage());
        $errors[] = $e->getMessage();
      }
      try {
        $proveedor->setTlfn1($this->request->getPOST("tlfno1"));
      } catch (InvalidArgumentException $e) {
        FlashMessage::set("ErrorTlfn1", "Error en el campo." . $e->getMessage());
        $errors[] = $e->getMessage();
      }
      try {
        $proveedor->setTlfn2($this->request->getPOST("tlfno2"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorTlfn2", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setFax($this->request->getPOST("fax"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorFax", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setMobil($this->request->getPOST("movil"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorMobil", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setCuenta($this->request->getPOST("cuenta"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorCuenta", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setIvaPercent((float)$this->request->getPOST("iva"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorIvaPercent", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setAb((int)$this->request->getPOST("ab"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorAb", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setCodPaisOficial($this->request->getPOST("codPaisOficial"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorCodPaisOficial", "Error en el campo." . $e->getMessage());
      }
      try {
        $proveedor->setNifPaisRecidencia($this->request->getPOST("nifPaisResidencia"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorNifPaisRecidencia", "Error en el campo." . $e->getMessage());
      }
      // try {
      //   $proveedor->setEsUnversion($this->request->getPOST(""));
      // } catch (InvalidArgumentException $e) {
      // $errors[]=$e->getMessage();
      //   FlashMessage::set("ErrorEsUnversion", "Error en el campo.".$e->getMessage());
      // }
      try {
        $proveedor->setPais($this->request->getPOST("Pais"));
      } catch (InvalidArgumentException $e) {
        $errors[] = $e->getMessage();
        FlashMessage::set("ErrorPais", "Error en el campo." . $e->getMessage());
      }
      var_dump(count($errors));
      if (count($errors) === 0) {
        $isInserted = false;
        try {
          
          $isInserted = $this->proveedorRepository->save($proveedor);
        } catch (PDOException $e) {
          FlashMessage::set("resultadoInsatisfactorio", "Error el proveedor no ha podido ser insertado." . $e->getMessage());
        }
        $isInserted?FlashMessage::set("resultadoSatisfactorio", "El proveedor ha podido ser insertado correctamente."):
        "";
      }else{
        foreach ($errors as $error ) {
          echo $error;
        }
      }
    }
    $response = new Response();
    $response->setView("proveedor/proveedor.form");
    $response->setLayout("admin");
    $response->setTitulo("Insertar proveedor");
    $titulo = $response->getTitulo();
    $response->setData(compact("proveedor", "errors", "titulo"));
    return $response;
  }
  public function borrarProveedor(int $id)
  {
    $proveedor = $this->proveedorRepository->find($id);
    $errors = [];
    try {

      if ($proveedor === null) {
        throw new EntityNotFoundException("La familia con id $id no ha podido ser encontrada", 1);
      }
    } catch (EntityNotFoundException $e) {
      echo "<small class='text-danger'>e->getMessage()</small>";
    }
    if ($this->request->isPost()) {
      var_dump($_POST);
      $this->proveedorRepository->delete($proveedor);
    }
    $response = new Response();
    $response->setView("proveedor/proveedor.delete");
    $response->setLayout("admin");
    $response->setTitulo("Borrar forma de pago con id $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("proveedor", "titulo", "errors"));
    return $response;
  }


  public function actualizarProveedor(int $id)
  {

    $proveedor = $this->proveedorRepository->find($id);
    $errors = [];
    try {

      if ($proveedor === null) {
        throw new EntityNotFoundException("El proveedor con id $id no ha podido ser encontrado", 1);
      }
    } catch (EntityNotFoundException $e) {
      echo "<small class='text-danger'>$e->getMessage()</small>";
    }
    if ($this->request->isPost()) {

      $auxID = $proveedor->getCodProveedor();
      $proveedor->setCodProveedor((int)$this->request->getPOST("codProveedor"))
        ->setRazonSocial($this->request->getPOST("razonSocial"))
        ->setNif($this->request->getPOST("nif"));
      $this->proveedorRepository->update($proveedor, $auxID);
    }

    $response = new Response();
    $response->setView("proveedor/proveedor.form");
    $response->setLayout("admin");
    $response->setTitulo("Actualizar forma de pago con $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("proveedor", "errors", "titulo"));
    return $response;
  }
}

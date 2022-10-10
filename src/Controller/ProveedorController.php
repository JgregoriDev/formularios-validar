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
      echo "<small class='text-danger'>e->getMessage()</small>";
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
    $errors=[];
    $proveedor=new Proveedor("","");
    try {
      # code...
      $proveedor=new Proveedor(0,'','');
    } catch (InvalidArgumentException $e) {
        $errors[]= "$e->getMessage()";
    }
    $errors=[];
    if ($this->request->isPost()) {
      
      $this->proveedorRepository->save($proveedor);
    }
    $response = new Response();
    $response->setView("proveedor/proveedor.form");
    $response->setLayout("admin");
    $response->setTitulo("Insertar proveedor");
    $titulo = $response->getTitulo();
    $response->setData(compact("proveedor","errors", "titulo"));
    return $response;
  }
  public function borrarProveedor(int $id)
  {
    $proveedor = $this->proveedorRepository->find($id);
    $errors=[];
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
    $response->setData(compact("proveedor", "titulo","errors"));
    return $response;
  }


  public function actualizarProveedor(int $id)
  {

    $proveedor = $this->proveedorRepository->find($id);
    $errors=[];
    try {

      if ($proveedor === null) {
        throw new EntityNotFoundException("El proveedor con id $id no ha podido ser encontrado", 1);
      }
    } catch (EntityNotFoundException $e) {
      echo "<small class='text-danger'>$e->getMessage()</small>";
    }
    if ($this->request->isPost()) {
      
      $auxID=$proveedor->getCodProveedor();
      $proveedor->setCodProveedor((int)$this->request->getPOST("codProveedor"))
      ->setRazonSocial($this->request->getPOST("razonSocial"))
      ->setNif($this->request->getPOST("nif"));
      $this->proveedorRepository->update($proveedor,$auxID);
    }

    $response = new Response();
    $response->setView("proveedor/proveedor.form");
    $response->setLayout("admin");
    $response->setTitulo("Actualizar forma de pago con $id");
    $titulo = $response->getTitulo();
    $response->setData(compact("proveedor", "errors","titulo"));
    return $response;
  }
}

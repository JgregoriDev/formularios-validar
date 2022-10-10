<?php

use App\FlashMessage;
use App\Entity\Familia;
use App\Registry;

$errors = $data["errors"];
$proveedor = $data["proveedor"]
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_Proveedors", []) ?>">Proveedores</a></li>
          <li class="breadcrumb-item active" aria-current="page">Borrar proveedor</li>
        </ol>
      </nav>
      <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
          <label for="codProveedor" class="form-label">Código proveedor:</label>
          <input type="number" class="form-control" required id="codProveedor" value="<?= $proveedor->getCodProveedor() ?>" min="0" name="codProveedor">
        </div>
        <div class="mb-3">
          <label for="razonSocial" class="form-label">Razon social:</label>
          <input type="text" class="form-control" minlength="4" value="<?= $proveedor->getRazonSocial() ?>" maxlength="40" name="razonSocial" id="nombre">
        </div>
        <div class="mb-3">
          <label for="nif" class="form-label">Nif:</label>
          <input type="string" class="form-control" id="nif" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
        </div>
        <div class="mb-3">
          <label for="codPostal" class="form-label">Código postal:</label>
          <input type="string" class="form-control" id="codPostal" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
        </div>
        <div class="mb-3">
          <label for="poblacion" class="form-label">Población:</label>
          <input type="string" class="form-control" id="poblacion" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
        </div>
        <div class="mb-3">
          <label for="provincia" class="form-label">Provincia:</label>
          <input type="string" class="form-control" id="provincia" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail:</label>
          <input type="email" class="form-control" id="email" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
        </div>
        <div class="container-fluid mb-3">
          <div class="row">
            <div class="col-6 mb-3">
              <label for="tlfno1" class="form-label">telefono 1:</label>
              <input type="tel" class="form-control" id="tlfno1" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
            </div>
            <div class="col-6 mb-3">
              <label for="tlfno2" class="form-label">telefono 2:</label>
              <input type="tel" class="form-control" id="tlfno2" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
            </div>
            <div class="col-6 mb-3">
              <label for="fax" class="form-label">Fax:</label>
              <input type="tel" class="form-control" id="fax" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
            </div>
            <div class="col-6 mb-3">
              <label for="movil" class="form-label">Movil:</label>
              <input type="tel" class="form-control" id="movil" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
            </div>
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail:</label>
          <input type="email" class="form-control" id="email" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
        </div>
        <div class="mb-3">
          <label for="url" class="form-label">Enlace sitio:</label>
          <input type="url" class="form-control" id="url" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
        </div>
        <div class="mb-3">
          <label for="cuenta" class="form-label">Cuenta pago:</label>
          <select>
            <option value="" selected>Selecciona una opcion</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="cuenta" class="form-label">Cuenta:</label>
          <input type="text" class="form-control" id="cuenta" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="cuenta">
        </div>

        <div class="mb-3">
          <label for="Tipo  gasto" class="form-label">Iva percent:</label>
          <input type="text" class="form-control" id="Tipo gasto" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="cuenta">
        </div>
        <div class="mb-3">
          <label for="Tipo  gasto" class="form-label">Ab:</label>
          <input type="text" class="form-control" id="Tipo gasto" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="cuenta">
        </div>
        <div class="mb-3">
          <label for="Tipo  gasto" class="form-label">Codigo Pais oficial:</label>
          <input type="text" class="form-control" id="Tipo gasto" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="cuenta">
        </div>
        <div class="mb-3">
          <label for="Tipo  gasto" class="form-label">Codigo forma pago:</label>
          <select name="" id="">
            <option value="" selected>Selecciona una opcion</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="NifPaisResidencia" class="form-label">NifPaisResidencia:</label>
          <input type="text" class="form-control" id="Tipo gasto" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="cuenta">
        </div>
        <div class="mb-3">
          <label for="ClaveIdEnpaisResidencia" class="form-label">ClaveIdEnpaisResidencia:</label>
          <input type="text" class="form-control" id="Tipo gasto" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="cuenta">
        </div>

        <div class="mb-3">
          <label for="Tipo  gasto" class="form-label">Nif pais residencia:</label>
          <input type="text" class="form-control" id="ClaveIdEnpaisResidencia" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="cuenta">
        </div>
        <div class="mb-3">
          <label for="Tipo  gasto" class="form-label">Nif pais residencia:</label>
          <input type="text" class="form-control" id="CodCliAsociado" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="cuenta">
        </div>
        <div class="mb-3">
          <label for="Pais" class="form-label">Pais:</label>
          <input type="text" class="form-control" id="Pais" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="cuenta">
        </div>

        <div class="mb-3">
          <a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_subfamilies", [])  ?>" class="<?= FlashMessage::isNotNull("resultadoSatisfactorio") ? 'd-none' : 'd-inline btn btn-secondary m-2' ?>">
            <span>Volver a la lista</span>
          </a>
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </form>
    </div>
    <div class="col-2"></div>
  </div>
</div>
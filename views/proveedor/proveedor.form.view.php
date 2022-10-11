<?php

use App\FlashMessage;
use App\Entity\Familia;
use App\Registry;

$fps = $data["fps"];
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
          <li class="breadcrumb-item active" aria-current="page"><?= $data['titulo'] ?></li>
        </ol>
      </nav>
      <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
          <label for="codProveedor" class="form-label">Código proveedor:</label>
          <input type="number" class="form-control" required id="codProveedor" value="<?= $proveedor->getCodProveedor() ?>" min="0" name="codProveedor">
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="razonSocial" class="form-label">Razon social:</label>
          <input type="text" class="form-control" minlength="4" value="<?= $proveedor->getRazonSocial() ?>" maxlength="40" name="razonSocial" id="razonSocial">
          <?php if (FlashMessage::isNotNull("ErrorRazonSocial")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorRazonSocial") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="domicio" class="form-label">Domicilio:</label>
          <input type="text" name="domicilio" id="domicilio" class="form-control" minlength="4" value="<?= $proveedor->getDomicilio() ?>" maxlength="40">
          <?php if (FlashMessage::isNotNull("ErrorDomicilio")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorDomicilio") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="nif" class="form-label">Nif:</label>
          <input type="string" class="form-control" id="nif" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="nif">
          <?php if (FlashMessage::isNotNull("ErrortNif")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrortNif") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="codPostal" class="form-label">Código postal:</label>
          <input type="string" class="form-control" id="codPostal" value="<?= $proveedor->getCodigoPostal() ?>" minlength="5" maxlength="9" name="codPostal">
          <?php if (FlashMessage::isNotNull("ErrorCodigoPostal")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodigoPostal") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="poblacion" class="form-label">Población:</label>
          <input type="string" class="form-control" id="poblacion" value="<?= $proveedor->getPoblacion() ?>" minlength="9" maxlength="9" name="poblacion">
          <?php if (FlashMessage::isNotNull("ErrorPoblacion")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorPoblacion") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="provincia" class="form-label">Provincia:</label>
          <input type="string" class="form-control" id="provincia" value="<?= $proveedor->getProvincia() ?>" minlength="9" maxlength="9" name="provincia">
          <?php if (FlashMessage::isNotNull("ErrorProvincia")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorProvincia") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail:</label>
          <input type="email" class="form-control" id="email" value="<?= $proveedor->getEmail() ?>" minlength="3" name="email">
          <?php if (FlashMessage::isNotNull("ErrorEmail")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorEmail") ?></small>
          <?php endif ?>
        </div>
        <div class="container-fluid mb-3">
          <div class="row">
            <div class="col-6 mb-3">
              <label for="tlfno1" class="form-label">telefono 1:</label>
              <input type="tel" class="form-control" id="tlfno1" value="<?= $proveedor->getTlfn1() ?>" minlength="9" maxlength="9" name="tlfno1">
              <?php if (FlashMessage::isNotNull("ErrorTlfn1")) : ?>
                <small class="text-danger"><?= FlashMessage::get("ErrorTlfn1") ?></small>
              <?php endif ?>
            </div>
            <div class="col-6 mb-3">
              <label for="tlfno2" class="form-label">telefono 2:</label>
              <input type="tel" class="form-control" id="tlfno2" value="<?= $proveedor->getTlfn2() ?>" minlength="9" maxlength="9" name="tlfno2">
              <?php if (FlashMessage::isNotNull("ErrorTlfn2")) : ?>
                <small class="text-danger"><?= FlashMessage::get("ErrorTlfn2") ?></small>
              <?php endif ?>
            </div>
            <div class="col-6 mb-3">
              <label for="fax" class="form-label">Fax:</label>
              <input type="tel" class="form-control" id="fax" value="<?= $proveedor->getFax() ?>" minlength="9" maxlength="9" name="fax">
              <?php if (FlashMessage::isNotNull("ErrorFax")) : ?>
                <small class="text-danger"><?= FlashMessage::get("ErrorFax") ?></small>
              <?php endif ?>
            </div>
            <div class="col-6 mb-3">
              <label for="movil" class="form-label">Movil:</label>
              <input type="tel" class="form-control" id="movil" value="<?= $proveedor->getMobil() ?>" minlength="9" maxlength="9" name="movil">
              <?php if (FlashMessage::isNotNull("ErrorMobil")) : ?>
                <small class="text-danger"><?= FlashMessage::get("ErrorMobil") ?></small>
              <?php endif ?>
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="www" class="form-label">Enlace sitio:</label>
          <input type="url" class="form-control" id="www" value="<?= $proveedor->getWww() ?>" name="www">
          <?php if (FlashMessage::isNotNull("ErrorWWW")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorWWW") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="cuenta" class="form-label">Cuenta pago:</label>
          <select class="form-select" name="cuenta" id="cuenta">
            <option value="" selected>Selecciona una opcion</option>
          </select>
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="cuenta" class="form-label">Cuenta:</label>
          <input type="text" class="form-control" id="cuenta" value="<?= $proveedor->getCuenta() ?>" minlength="9" maxlength="9" name="cuenta">
          <?php if (FlashMessage::isNotNull("ErrorCuenta")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCuenta") ?></small>
          <?php endif ?>
        </div>

        <div class="mb-3">
          <label for="iva" class="form-label">Iva percent:</label>
          <input type="number" class="form-control" id="iva" value="<?= $proveedor->getIvaPercent() ?>" name="iva">
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="ab" class="form-label">Ab:</label>
          <input type="text" class="form-control" id="ab" value="<?= $proveedor->getAb() ?>" minlength="2" maxlength="9" name="ab">
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="Tipo  gasto" class="form-label">Codigo Pais oficial:</label>
          <input type="text" class="form-control" id="codPaisOficial" value="<?= $proveedor->getCodPaisOficial() ?>" minlength="2" maxlength="4" name="codPaisOficial">
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="Tipo  gasto" class="form-label">Codigo forma pago:</label>
          <select class="form-select" name="codFP" id="codFP">
            <option value="0" selected>Selecciona una opcion</option>
            <?php foreach ($fps as $fp) : ?>
              <option value="<?= $fp->getCodFp() ?>"><?= $fp->getCodFp() . "- " . $fp->getNombre() ?></option>
            <?php endforeach; ?>
          </select>
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="nifPaisResidencia" class="form-label">Nif Pais Residencia:</label>
          <input type="text" class="form-control" id="nifPaisResidencia" value="<?= $proveedor->getNifPaisRecidencia() ?>" minlength="9" maxlength="9" name="nifPaisResidencia">
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="ClaveIdEnpaisResidencia" class="form-label">Clave Id en pais Residencia:</label>
          <input type="text" class="form-control" id="ClaveIdEnpaisResidencia" value="<?= $proveedor->getCodPaisOficial() ?>" name="ClaveIdEnpaisResidencia">
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>

        <div class="mb-3">
          <label for="Nifpaisresidencia" class="form-label">Nif pais residencia:</label>
          <input type="text" class="form-control" id="Nifpaisresidencia" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="Nifpaisresidencia">
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>

        <div class="mb-3">
          <label for="Pais" class="form-label">Pais:</label>
          <input type="text" class="form-control" id="Pais" value="<?= $proveedor->getNif() ?>" minlength="9" maxlength="9" name="Pais">
          <?php if (FlashMessage::isNotNull("ErrorCodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("ErrorCodProveedor") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <?php if (FlashMessage::isNotNull("resultadoSatisfactorio")) : ?>
            <small class="text-success"><?= FlashMessage::get("resultadoSatisfactorio") ?></small>
          <?php endif ?>
          <?php if (FlashMessage::isNotNull("resultadoInsatisfactorio")) : ?>
            <small class="text-danger"><?= FlashMessage::get("resultadoInsatisfactorio") ?></small>
          <?php endif ?>
          </small>
        </div>
        <div class="mb-3">
          <a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_Proveedors", [])  ?>" class="<?= FlashMessage::isNotNull("resultadoSatisfactorio") ? 'd-none' : 'd-inline btn btn-secondary' ?>">
            <span>Volver a la lista</span>
          </a>
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </form>
    </div>
    <div class="col-2"></div>
  </div>
</div>
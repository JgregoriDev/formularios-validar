<?php

use App\Entity\Subfamilia;
use App\Registry;
use App\FlashMessage; ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-2"></div>
    <div class="col-8">
    
      <?php $fp = $data['fp'] ?>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_FormaPagos", []) ?>">Formas de pago</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $data["titulo"] ?></li>
        </ol>
      </nav>
      <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="mb-3">
          <label for="codFP" class="form-label">Código forma de pago</label>
          <input type="number" class="form-control" placeholder="#########" value="<?= $fp->getCodFp() <= 0 ? '' : $fp->getCodFp() ?>" name="codFP" id="codFP">
          <?php if (FlashMessage::isNotNull("errorCodFp")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorCodFp") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre:</label>
          <input type="text" class="form-control" placeholder="Campo texto" value="<?= $fp->getNombre() ?>" name="nombre" id="nombre">
          <?php if (FlashMessage::isNotNull("errorsNombre")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsNombre") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="nplazos" class="form-label">Numero plazos:</label>
          <input type="number" class="form-control" placeholder="#########" value="<?= $fp->getNumPlazos() <= 0 ? '' : $fp->getNumPlazos() ?>" name="nplazos" id="nplazos">
          <?php if (FlashMessage::isNotNull("errorsNumPlazos")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsNumPlazos") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="distancia" class="form-label">Distancia</label>
          <input type="number" class="form-control" placeholder="#########" value="<?= $fp->getDistancia() <= 0 ? '' : $fp->getDistancia() ?>" name="distancia" id="distancia">
          <?php if (FlashMessage::isNotNull("errorsDistancia")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsDistancia") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="comEmp" class="form-label">Cod empresa:</label>
          <input type="text" class="form-control" placeholder="#########" value="<?= $fp->getCodEmpresa() <= 0 ? '' : $fp->getCodEmpresa() ?>" name="comEmp" id="comEmp">
          <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <?php if (FlashMessage::isNotNull("resultadoSatisfactorio")) : ?>
            <small class="text-success"><?= FlashMessage::get("resultadoSatisfactorio") ?></small>
          <?php endif ?>
          <?php if (FlashMessage::isNotNull("resultadoInsatisfactorio")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <input type="submit" class="btn btn-success" value="Guardar">
      </form>
    </div>
    <div class="col-2"></div>
  </div>
</div>
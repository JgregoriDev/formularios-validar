<?php

use App\FlashMessage;
use App\Entity\Familia;
use App\Registry; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <?php $familia = $data["familia"] ?>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_families", []) ?>">Familias</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $data["titulo"] ?></li>
        </ol>
      </nav>
      <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
          <label for="id" class="form-label">C&oacute;digo familia:</label>
          <input type="number" class="form-control" required id="codFamilia" value="<?= $familia->getCodFamilia() === 0 ? "" : $familia->getCodFamilia() ?>" min="0" name="codfamilia">
          <?php if (FlashMessage::isNotNull("errorsCodFamilia")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodFamilia") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre:</label>
          <input type="text" class="form-control" minlength="4" value="<?= $familia->getNombreFamilia() ?>" maxlength="40" name="nombre" id="nombre">
          <?php if (FlashMessage::isNotNull("errorsNombre")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsNombre") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="id" class="form-label">Margen:</label>
          <input type="number" class="form-control" id="margen" value="<?= $familia->getMargen() === 0 ? "" : $familia->getMargen() ?>" min="0" name="margen">

          <?php if (FlashMessage::isNotNull("errorsMargen")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsMargen") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="id" class="form-label">IVA:</label>
          <input type="number" class="form-control" name="iva" id="iva" value="<?= $familia->getIvaPercent() === 0 ? "" : $familia->getIvaPercent() ?>">

          <?php if (FlashMessage::isNotNull("errorIvaPercent")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorIvaPercent") ?></small>
          <?php endif ?>
        </div>

        <div class="mb-3">
          <label for="id" class="form-label">Inicio codean:</label>
          <input type="text" class="form-control" id="inicioCodean" value="<?= $familia->getInicioCodean() === 0 ?
                                                                              "2" : $familia->getInicioCodean() ?>" min="0" name="inicioCodean">
          <?php if (FlashMessage::isNotNull("errorsInicioCodean")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsInicioCodean") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="id" class="form-label">RE:</label>
          <input type="number" class="form-control" id="re" value="<?= $familia->getRe() === 0 ? "" : $familia->getRe() ?>" name="re">
          <?php if (FlashMessage::isNotNull("errorsRe")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsRe") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="id" class="form-label">Im&aacute;gen:</label>
          <input type="file" class="form-control" id="imagen" name="imagen">
          <?php if (FlashMessage::isNotNull("errorsImage")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsImage") ?></small>
          <?php endif ?>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" value="" id="manoObra" name="manoObra">
          <label class="form-check-label" for="flexCheckDefault">
            Es Mano obra
          </label>
          <?php if (FlashMessage::isNotNull("errorsManoObra")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsRe") ?></small>
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
        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
    </div>
    <div class="col-2"></div>
  </div>
</div>
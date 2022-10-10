<?php

use App\Entity\marca;
use App\FlashMessage;
use App\Registry; ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-2"></div>
    <div class="col-8">
      <?php $marca = $data["marca"]; ?>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_marques", []) ?>">Marcas</a></li>
          <li class="breadcrumb-item active" aria-current="page">Insertar marca</li>
        </ol>
      </nav>

      <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="mb-3">
          <label for="codMarca" class="form-label">Código marga:</label>
          <input type="number" class="form-control" name="codMarca" value="<?= $marca->getCodmarca() === 0 ? '' : $marca->getCodmarca() ?>" id="codMarca">
          <?php if (FlashMessage::isNotNull("errorsCodMarca")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodMarca") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="nombremarca" class="form-label">Nombre marca:</label>
          <input type="text" class="form-control" name="nombremarca" value="<?= $marca->getNombreMarca() ?>" id="nombremarca">
          <?php if (FlashMessage::isNotNull("errorsCodMarca")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsNomMarca") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="rutalogo" class="form-label">Ruta logo</label>
          <input type="file" class="form-control" name="rutalogo" value="<?= $marca->getRutaLogo() ?>" id="rutalogo">
          <?php if (FlashMessage::isNotNull("errorsRutaLogoMarca")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsRutaLogoMarca") ?></small>
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
        <a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_marques", [])  ?>" class="<?= FlashMessage::isNotNull("resultadoSatisfactorio") === true ? 'd-inline btn btn-secondary mx-2' : 'd-none'  ?>">
          <span>Volver a la lista</span>
        </a>
        <input type="submit" class="btn btn-success" value="Guardar">
      </form>
    </div>
    <div class="col-2"></div>
  </div>
</div>
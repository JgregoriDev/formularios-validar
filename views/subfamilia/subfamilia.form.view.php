<?php

use App\FlashMessage;
use App\Entity\Subfamilia;
use App\Registry; ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-2"></div>
    <div class="col-8">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_subfamilies", []) ?>">Subfamilias</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $data["titulo"] ?></li>
        </ol>
      </nav>
      <?php $familias = $data['familias'];
      $subfamilia = $data["subfamilia"];
      ?>
      <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
          <label for="codFamilia" class="form-label">Familia</label>
          <select class="form-select" value="0" name="codFamilia" id="codFamilia">

            <?php foreach ($familias as $familia => $value) : ?>
              <option value="<?= $value->getCodFamilia() ?>" <?= $value->getCodFamilia() === $value->getCodFamilia() ? "selected" : "" ?>>
                <?= $value->getNombreFamilia() ?></option>
            <?php endforeach; ?>
            <option value="0" <?= $value->getCodFamilia() === 0 ? "selected disabled" : "" ?>>Selecciona una opción</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="codSubfamilia" class="form-label">Código subfamilia</label>
          <input type="number" class="form-control" value="<?= $subfamilia->getCodSubfamilia() === 0 ? '' : $subfamilia->getCodSubfamilia() ?>" value="<?= $subfamilia->getCodSubfamilia()  ?>" name=" codSubfamilia" id="codSubfamilia">
        </div>
        <div class="mb-3">
          <label for="nombreSubfamilia" class="form-label">Nombre subfamilia</label>
          <input type="text" class="form-control" value="<?= $subfamilia->getNombre() ?>" name=" nombreSubfamilia" id="nombreSubfamilia">
        </div>
        <div class="mb-3">
          <label for="nombreSubfamilia" class="form-label">Image:</label>
          <input type="file" class="form-control" value="<?= $subfamilia->getNombre() ?>" name=" image" id="image">
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
        <a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_subfamilies", [])  ?>" class="<?= FlashMessage::isNotNull("resultadoSatisfactorio") ? 'd-none' : 'd-inline btn btn-secondary m-2' ?>">
          <span>Volver a la lista</span>
        </a>
        <input type="submit" class="btn btn-success" value="Guardar">
      </form>
    </div>
    <div class="col-2"></div>
  </div>
</div>
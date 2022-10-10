<?php

use App\FlashMessage;
use App\Registry; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Familia</a></li>
          <li class="breadcrumb-item active" aria-current="page">Borrar familia</li>
        </ol>
      </nav>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">

            <h5 class="modal-title">Esta seguro de querer borrar la familia?</h5>
          </div>
          <div class="modal-body">
            <p>Familia con codigo familia <?= $data['familia']->getCodFamilia(); ?>
          </div>
          <div class="modal-footer">
            <a href="<?= Registry::get(Registry::ROUTER)->generate("conseguir_families", [])  ?>" class="btn btn-secondary mx-2">
              <i class="bi bi-arrow-left"></i>
              <span class="d-none d-lg-inline">Volver atrás</span>

            </a>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <input type="hidden" name="familia" value=" <?= $data['familia']->getCodFamilia(); ?>">
              <button type="submit" <?= FlashMessage::isNotNull("resultadoSatisfactorio") ? "disabled" : "" ?> class="btn btn-danger">
                <i class="bi bi-trash2"></i>
                <span class="d-none d-lg-inline">
                  Borrar familia
                </span>

              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <?php if (FlashMessage::isNotNull("resultadoSatisfactorio")) : ?>
          <small class="text-success"><?= FlashMessage::get("resultadoSatisfactorio") ?></small>
        <?php endif ?>
        <?php if (FlashMessage::isNotNull("resultadoInsatisfactorio")) : ?>
          <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
        <?php endif ?>
      </div>
    </div>
    <div class="col-2"></div>
  </div>
</div>
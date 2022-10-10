<?php

use App\FlashMessage;
use App\Registry; ?>
<?php $fp = $data['fp']; ?>
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
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Borrar forma de pago</h5>
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body">


            <p>Estas seguro de borrar la forma de pago <?= $fp->getCodFp() ?>?</p>

            <div class="modal-footer">
              <a href="<?= Registry::get(Registry::ROUTER)->generate("conseguir_FormaPagos", []) ?>" class="btn btn-secondary me-1">
                <i class="bi bi-arrow-left"></i>
                <span class="d-none d-lg-inline">
                  Volver atras
                </span>
              </a>

              <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <button type="submit" value="Borrar" <?= FlashMessage::isNotNull("resultadoSatisfactorio") ? 'disabled' : '' ?> name="Borrar" class="btn btn-danger">
                  <i class="bi bi-trash2"></i>

                  <span class="d-none d-lg-inline">
                    Borrar
                  </span>
                </button>
              </form>

            </div>
          </div>
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
    <div class="col-2"></div>
  </div>
</div>
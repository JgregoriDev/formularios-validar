<?php

use App\Registry; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <?php $article = $data['article'] ?>
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_articles", []) ?>">Artículo</a></li>
          <li class="breadcrumb-item active" aria-current="page">Borrar artículo</li>
        </ol>

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <h5 class="modal-title">Esta seguro de querer borrar el artículo?</h5>
            </div>
            <div class="modal-body">
              <div>

                Artículo con codigo artículo <?= $article->getCodArticle(); ?>
              </div>
              <div class="ps-3">
                <p> Código: <?= $article->getCodArticle() ?></p>
                <p>Descripción: <?= $article->getDescripcion() ?? '' ?></p>
              </div>
            </div>
            <div>

            </div>
            <div class="modal-footer">
              <a href="<?= Registry::get(Registry::ROUTER)->generate("conseguir_articles", [])  ?>" class="btn btn-secondary mx-2">
                <i class="bi bi-arrow-left"></i>
                <span class="d-none d-lg-inline">Volver atrás</span>
              </a>
              <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="familia" value=" <?= $article->getCodArticle(); ?>">
                <button type="submit" class="btn btn-danger">
                  <i class="bi bi-trash2"></i>
                  <span class="d-none d-lg-inline">
                    Borrar familia
                  </span>

                </button>
              </form>
            </div>
          </div>
        </div>

    </div>
    <div class="col-2"></div>
  </div>
</div>
<?php

use App\Registry; ?>
<?php $articles = $data['articles']; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-10">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Artículo</li>
        </ol>
      </nav>
      <div class="d-flex justify-content-end align-content-center mb-2">
        <a href="
        <?= Registry::get(\App\Registry::ROUTER)->generate(
          "insertar_article",
          []
        ) ?>
        " class="btn btn-success"><i class="bi bi-plus-square"></i>
          Insertar Artículo
        </a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="d-none d-md-table-cell">#</th>
            <th scope="col">C&oacute;digo Articulo</th>
            <th scope="col">Descripci&oacute;n</th>
            <th scope="col" class="text-center">Acciones</th>
          </tr>

        </thead>
        <tbody>
          <?php foreach ($articles as $key => $value) : ?>
            <tr id="<?= $value['CODARTICULO'] ?> <?= $key%2===0?"bg-light":"" ?>">

              <td class="d-none d-md-table-cell"><?= $key + 1 ?></td>
              <td><?= $value['CODARTICULO'] ?></td>
              <td><?= $value['DESCRIPCION']   ?></td>

              <td class="text-center">
                <a title="Borrar" class="btn btn-danger" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                  "borrar_article",
                                                                  ["id" =>  $value['CODARTICULO']]
                                                                ) ?>">
                  <i class="bi bi-trash2"></i>
                  <span class="d-none">Borrar</span>
                </a>
                <a title="Modificar" class="btn btn-warning text-white" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                "actualizar_article",
                                                                                ["id" =>  $value['CODARTICULO']]
                                                                              ) ?>">
                  <i class="bi bi-pencil-square"></i>
                  <span class="d-none">Editar</span>
                </a>
                <a title="Observar" class="btn btn-secondary text-white" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                                  "conseguir_article",
                                                                                                  ["id" =>  $value['CODARTICULO']]
                                                                                                ) ?>">
                  <i class="bi bi-eye"></i>
                  <span class="d-none">Observar</span>
                </a>

              </td>

            <?php endforeach; ?>
            </tr>


        </tbody>
        <tfoot></tfoot>
      </table>
    </div>
    <div class="col-2"></div>
  </div>
</div>
<?php

use App\Entity\Subfamilia;
use App\Registry; ?>
<!-- <?= $subfamilias = $data['subfamilias']; ?> -->
<div class="container-fluid">
  <div class="row">

    <div class="col-10">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Subfamilias</li>
        </ol>
      </nav>
      <div class="d-flex justify-content-end align-content-center mb-2">
        <a href="
        <?= Registry::get(\App\Registry::ROUTER)->generate(
          "insertar_subfamilia",
          []
        ) ?>
        " class="btn btn-success">
          <i class="bi bi-plus-square"></i>
          Insertar Subfamilia
        </a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="d-none d-md-table-cell">#</th>
            <th scope="col">Codigo Familia</th>
            <th scope="col" class="d-none d-md-table-cell">Nombre Familia</th>
            <th scope="col">Codigo subfamilia</th>
            <th scope="col">Nombre subfamilia</th>
            <th scope="col" class="text-center">Acciones</th>
          </tr>

        </thead>
        <tbody>
          <?php foreach ($data['subfamilias'] as $key => $value) : ?>
            <tr id="<?= $value->getCodFamilia()  ?>">

              <td class="d-none d-md-table-cell"><?= $key + 1 ?></td>
              <td><?= $value->getCodFamilia() ?></td>
              <td class="d-none d-md-table-cell"><?= $value->getNombre()   ?></td>
              <td><?= $value->getCodSubfamilia() ?></td>
              <td><?= $value->getNombreFamilia() ?></td>
              <td class="text-center">
                <a class="btn btn-danger my-2 my-md-0" href=<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                              "borrar_subfamilia",
                                                              [
                                                                "id" => $value->getCodFamilia(),
                                                                "id2" => $value->getCodSubfamilia()
                                                              ]
                                                            ) ?>>
                  <i class="bi bi-trash2"></i>
                  <span class="d-none">Borrar</span>
                </a>
                <a class="btn btn-warning text-white" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                              "actualizar_subfamilia",
                                                              [
                                                                "id" => $value->getCodFamilia(),
                                                                "id2" => $value->getCodSubfamilia()
                                                              ]
                                                            ) ?>">
                  <i class="bi bi-pencil-square"></i>
                  <span class="d-none">Modificar</span>
                </a>
                <a title="Modificar" class="btn btn-secondary text-white" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                  "conseguir_FormaPago",
                                                                                  [
                                                                                    "id" => $value->getCodFamilia(),
                                                                                    "id2" => $value->getCodSubfamilia()
                                                                                  ]
                                                                                ) ?>">
                  <i class="bi bi-eye"></i>
                  <span class="d-none">Observar</span>
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
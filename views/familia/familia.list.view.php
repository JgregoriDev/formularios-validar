<?php

use App\Entity\Subfamilia;
use App\Registry; ?>
<?php $familias = $data['familias'];
$errors = $data['errors']; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-10">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Familias</li>
        </ol>
      </nav>
      <div class="d-flex justify-content-end align-content-center mb-2">
        <a href="
        <?= Registry::get(\App\Registry::ROUTER)->generate(
          "insertar_familia",
          []
        ) ?>
        " class="btn btn-success"><i class="bi bi-plus-square"></i>
          Insertar Familia
        </a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="d-none d-md-table-cell">#</th>
            <th scope="col">Codigo Familia</th>
            <th scope="col">Nombre Familia</th>
            <th scope="col" class="d-none d-md-table-cell">IVA</th>
            <th scope="col" class="d-none d-md-table-cell">Margen</th>
            <th scope="col" class="text-center">Acciones</th>
          </tr>

        </thead>
        <tbody>
          <?php foreach ($familias as $key => $value) : ?>
            </tr>

            <td class="d-none d-md-table-cell"><?= $key + 1 ?></td>
            <td><?= $value->getCodFamilia() ?></td>
            <td><?= $value->getNombreFamilia()   ?></td>
            <td class="d-none d-md-table-cell"><?= $value->getIvaPercent() ?></td>
            <td class="d-none d-md-table-cell"><?= $value->getMargen() ?></td>
            <td class="text-center">
              <a class="btn btn-danger" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                "borrar_familia",
                                                ["id" => $value->getCodFamilia()]
                                              ) ?>">
                <i class="bi bi-trash2"></i>
                <span class="d-none">Borrar</span>
              </a>
              <a class="btn btn-warning text-white" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                            "actualizar_familia",
                                                            ["id" => $value->getCodFamilia()]
                                                          ) ?>">
                <i class="bi bi-pencil-square"></i>
                <span class="d-none">Modificiar</span>
                <a title="Observar" class="btn btn-secondary mx-1 text-white" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                      "conseguir_familia",
                                                                                      ["id" =>  $value->getCodFamilia()]
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
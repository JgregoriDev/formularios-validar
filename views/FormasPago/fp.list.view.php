<?php

use App\Entity\Subfamilia;
use App\Registry; ?>
<!-- <?= $fps = $data['fps']; ?> -->
<div class="container-fluid">
  <div class="row">
    <div class="col-10">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Formas de pago</li>
        </ol>
      </nav>
      <div class="d-flex justify-content-end align-content-center mb-2">
        <a href="
        <?= Registry::get(\App\Registry::ROUTER)->generate(
          "insertar_FormaPago",
          []
        ) ?>
        " class="btn btn-success">
          <i class="bi bi-plus-square"></i>
          Insertar forma de pago
        </a>
      </div>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="d-none d-md-table-cell">#</th>
            <th scope="col">Codigo FP</th>
            <th scope="col">Nombre Fp</th>
            <th scope="col" class="d-none d-md-table-cell">N plazos</th>
            <th scope="col" class="d-none d-md-table-cell">Distancia</th>
            <th scope="col" class="d-none d-md-table-cell">Codigo empresa</th>
            <th scope="col" class="text-center">Acciones</th>
          </tr>

        </thead>
        <tbody>
          <?php foreach ($fps as $key => $value) : ?>
            <tr id="<?= $value['CODFP'] ?>" class="<?= $key % 2 !== 0 ? "bg-light" : "" ?>">

              <td class="d-none d-md-table-cell"><?= $key + 1 ?></td>
              <td><?= $value['CODFP'] ?></td>
              <td><?= $value['NOMBRE']   ?></td>
              <td class="d-none d-md-table-cell"><?= $value['NPLAZOS'] ?></td>
              <td class="d-none d-md-table-cell"><?= $value['DISTANCIA'] ?></td>
              <td class="d-none d-md-table-cell"><?= $value['CODEEMPRESA'] ?></td>
              <td class="text-center">
                <a class="btn btn-danger  mb-2 mb-sm-0" href=<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                "borrar_FormaPago",
                                                                [
                                                                  "id" => $value['CODFP']
                                                                ]
                                                              ) ?>>
                  <i class="bi bi-trash2"></i>
                  <span class="d-none">Borrar</span>
                </a>
                <a class="btn btn-warning text-white  mb-2 mb-sm-0" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                            "actualizar_FormaPago",
                                                                            [
                                                                              "id" => $value['CODFP']
                                                                            ]
                                                                          ) ?>">
                  <i class="bi bi-pencil-square"></i>
                  <span class="d-none">Modificar</span>
                </a>
                <span class="d-none">Modificiar</span>
                <a title="Modificar" class="btn btn-secondary text-white" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                  "conseguir_FormaPago",
                                                                                  ["id" =>  $value['CODFP']]
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
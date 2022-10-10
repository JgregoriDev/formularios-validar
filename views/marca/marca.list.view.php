<?php

use App\Entity\Subfamilia;
use App\Registry; ?>
<?php $marcas = $data['marcas'];
$errors = $data['errors']; ?>
<div class="container-fluid">
  <div class="row">

    <div class="col-10">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Marca</li>
        </ol>
      </nav>
      <div class="d-flex justify-content-end align-content-center mb-2">
        <a title="Insertar marca" href="<?= Registry::get(\App\Registry::ROUTER)->generate("insertar_marca", []) ?>" class="btn btn-success">
          <i class="bi bi-plus-square"></i>
          Insertar marcas
        </a>
      </div>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" class="d-none d-md-table-cell">#</th>
            <th scope="col">Código marca</th>
            <th scope="col">Nombre</th>
            <th scope="col" class="d-none d-md-table-cell">Ruta logo</th>
            <th scope="col" class="text-center">Acciones</th>
          </tr>

        </thead>
        <tbody>
          <?php $auxID = 0 ?>
          <?php foreach ($marcas as $key => $value) : ?>
            <tr id="<?= $value->getCodMarca() ?>" class="<?= $key % 2 !== 0 ? "bg-light" : "" ?>">
              <td class="d-none d-md-table-cell"><?= $key + 1 ?></td>
              <td><?= $value->getCodMarca() ?></td>
              <td><?= $value->getNombreMarca() ?></td>
              <td class="d-none d-md-table-cell"><?= $value->getRutaLogo() ?></td>
              <td class="text-center">
                <a class="btn btn-danger mb-2 mb-sm-0" title="Borrar" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                              "borrar_marca",
                                                                              ["id" => $value->getCodMarca()]
                                                                            ) ?>">
                  <i class="bi bi-trash2"></i>
                  <span class="d-none">Borrar</span>
                </a>
                <a class="btn btn-warning text-white 2 mb-sm-0" title="Actualizar" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                            "actualizar_marca",
                                                                                            ["id" => $value->getCodMarca()]
                                                                                          ) ?>">
                  <i class="bi bi-pencil-square"></i>
                  <span class="d-none">Modificiar</span>
                </a>
                <a title="Modificar" class="btn btn-secondary text-white" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                  "conseguir_FormaPago",
                                                                                  ["id" =>  $value->getCodMarca()]
                                                                                ) ?>">
                  <i class="bi bi-eye"></i>
                  <span class="d-none">Observar</span>
                </a>
              </td>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
        <tfoot></tfoot>
      </table>
    </div>
    <div class="col-2"></div>
  </div>
</div>
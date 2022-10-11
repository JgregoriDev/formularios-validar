<?php

use App\Entity\Subfamilia;
use App\Registry; ?>
<?php $proveedores = $data['proveedores'] ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-10">
      <div class="d-flex  justify-content-end align-content-center mb-3">
        <a title="Insertar proveedor" href="<?= Registry::get(\App\Registry::ROUTER)->generate("insertar_Proveedor", []) ?>" class="btn btn-success">
          <i class="bi bi-plus-square"></i>
          Insertar proveedor
        </a>
      </div>
      <div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" class="d-none d-lg-table-cell">#</th>
              <th scope="col">Codigo proveedor</th>
              <th scope="col">Razon social</th>
              <th scope="col" class="d-none d-lg-table-cell">Nif</th>
              <th scope="col" class="text-center">Acciones</th>
            </tr>

          </thead>
          <tbody>
            <?php foreach ($proveedores as $key => $value) : ?>
              <tr class="<?= $value->getCodProveedor() ?>" class="<?= $key%2!==0?"bg-light":"" ?>">

                <td class="d-none d-lg-table-cell"><?= $key+1 ?></td>
                <td><?= $value->getCodProveedor() ?></td>
                <td><?= $value->getRazonSocial()   ?></td>
                <td class="d-none d-lg-table-cell"><?= $value->getNif() ?></td>
                <td class="text-center">
                  <a class="btn btn-danger mb-2 mb-sm-0" title="Borrar" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                "borrar_Proveedor",
                                                                                ["id" => $value->getCodProveedor()]
                                                                              ) ?>">
                    <i class="bi bi-trash2"></i>
                    <span class="d-none">Borrar</span>
                  </a>
                  <a class="btn btn-warning text-white" title="Actualizar" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                    "actualizar_Proveedor",
                                                                                    ["id" => $value->getCodProveedor()]
                                                                                  ) ?>">
                    <i class="bi bi-pencil-square"></i>
                    <span class="d-none">Modificiar</span>
                  </a>
                  <a title="Modificar" class="btn btn-secondary text-white" href="<?= Registry::get(\App\Registry::ROUTER)->generate(
                                                                                    "conseguir_FormaPago",
                                                                                    ["id" =>  $value->getCodProveedor()]
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
    </div>
    <div class="col-2"></div>
  </div>
</div>
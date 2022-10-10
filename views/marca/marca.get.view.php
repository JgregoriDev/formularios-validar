<?php ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_marques", []) ?>">Marcas</a></li>
          <li class="breadcrumb-item active" aria-current="page">Conseguir Marca</li>
        </ol>
      </nav>
    </div>
    <div class="col-2"></div>
  </div>
</div>
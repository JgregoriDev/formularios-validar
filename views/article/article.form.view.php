<?php

use App\Entity\Familia;
use App\Registry;

$article = $data['article'];
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_articles", []) ?>">Artículo</a></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $data["titulo"] ?></li>
        </ol>
      </nav>
      <?php
      $families = $data['families'];
      $subfamilies = $data['subfamilies'];
      $marques = $data['marques'];
      $proveedors = $data['proveedors'];

      ?>
      <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="mb-3">
          <label for="codArticulo" class="form-label">Código artículo:</label>
          <input type="number" class="form-control" value="<?= $article->getCodArticle() ?>" required id="codArticulo" value="" min="0" name="codArticulo">
        </div>
        <div class="mb-3">
          <label for="codFamilia" class="form-label">Código família:</label>
          <select required name="codFamilia" id="codFamilia" class="form-select  <?php count($families) === 0 ? 'border-danger' : '' ?>">
            <option value="" <?= $article->getCodFamilia() === 0 ? 'selected disabled' : '' ?> id="">Selecciona una opción</option>
            <?php if (count($families)  > 0) : ?>
              <?php foreach ($families as $familia) : ?>
                <option value="<?= $familia->getCodFamilia() ?>" id=""><?= $familia->getCodFamilia() . " - " . $familia->getNombreFamilia() ?></option>
              <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="codSubfamilia" class="form-label  <?php count($subfamilies) === 0 ? 'border-danger' : '' ?>">Código subfamilia:</label>
          <select name="codSubfamilia" id="codSubfamilia" class="form-select <?php count($subfamilies) === 0 ? 'border-danger' : '' ?>">
            <option value="" <?= !isset($article) ? 'selected disabled' : '' ?> id="">Selecciona una opción</option>
            <?php if (count($subfamilies) > 0) : ?>
              <?php foreach ($subfamilies as $subfamilia) : ?>
                <option value="<?= $subfamilia->getCodSubfamilia() ?>" id=""><?= $subfamilia->getCodSubfamilia() . " - " . $subfamilia->getNombre() ?></option>
              <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="codMarca" class="form-label <?php count($marques) === 0 ? 'border-danger' : '' ?>">Código marca:</label>
          <select name="codMarca" id="codMarca" class="form-select">
            <option value="" <?= !isset($article) ? 'selected disabled' : '' ?> id="">Selecciona una opción</option>
            <?php if (count($marques) > 0) : ?>

              <?php foreach ($marques as $marca) : ?>
                <option value="<?= $marca->getCodMarca() ?>" id=""><?= $marca->getCodMarca() . " - " . $marca->getNombreMarca() ?></option>
              <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="codProveedors" class="form-label <?php count($proveedors) === 0 ? 'border-danger' : '' ?>">Código proveedor:</label>
          <select name="codProveedors" id="codProveedors" class="form-select">
            <option value="" <?= !isset($article) ? 'selected disabled' : '' ?> id="">Selecciona una opción</option>
            <?php if (count($proveedors) > 0) : ?>

              <?php foreach ($proveedors as $proveedor) : ?>
                <option value="<?= $proveedor->getCodProveedor() ?>" id=""><?= $proveedor->getCodProveedor() . " - " . $proveedor->getRazonSocial() ?></option>
              <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
          </select>
        </div>


        <div class="mb-3">
          <label for="codEan" class="form-label">Código ean:</label>
          <input type="text" name="codEan" id="" value="codEan" class="form-control">
        </div>
        <div class="mb-3">
          <label for="refProveedor" class="form-label">Referencia proveedor:</label>
          <input type="text" name="refProveedor" id="" value="refProveedor" class="form-control">
        </div>
        <div class="mb-3">
          <label for="refMarca" class="form-label">Referencia marca</label>
          <input type="text" name="refMarca" id="refMarca" value="" class="form-control">
        </div>
        <!-- <div class="mb-3">
          <label for="" class="form-label">Descripcion</label>
          <input type="text" name="" id="" value="" class="form-control">
        </div> -->
        <div class="mb-3">
          <label for="auxMarca" class="form-label">Aux margen</label>
          <input type="text" name="auxMarca" id="auxMarca" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Existencias disponibles:</label>
          <input type="text" name="" id="" value="" class="form-control">
        </div>
        <div class="content-fluid">
          <div class="row">
            <div class="mb-3 col-6">
              <label for="pvp" class="form-label">PVP</label>
              <input type="number" name="pvp" step="0.01" placeholder="#.##" id="pvp" value="" class="form-control">
            </div>
            <div class="mb-3 col-6">
              <label for="pvp2" class="form-label">PVP2</label>
              <input type="number" name="pvp2" step="0.01" placeholder="#.##" id="" value="pvp2" class="form-control">
            </div>
            <div class="mb-3 col-6">
              <label for="pvpOfertaMostrador" class="form-label">PVP Oferta mostrador</label>
              <input type="number" name="pvpOfertaMostrador" step="0.01" placeholder="#.##" id="pvpOfertaMostrador" value="" class="form-control">
            </div>
            <div class="mb-3 col-6">
              <label for="" class="form-label">PVP</label>
              <input type="number" name="" step="0.01" placeholder="#.##" id="" value="" class="form-control">
            </div>
          </div>
        </div>

        <div class="mb-3 ">
          <label for="udsUltEntrada" class="form-label">Uds. última entrada</label>
          <input type="text" name="udsUltEntrada" id="udsUltEntrada" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="Base" class="form-label">Base</label>
          <input type="text" name="Base" id=Base"" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="Favorito" class="form-label">Favorito</label>
          <input type="text" name="Favorito" id="Favorito" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Posible</label>
          <input type="text" name="" id="" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="undGrannel" class="form-label">Und. por grannel</label>
          <input type="text" name="undGrannel" id="undGrannel" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen</label>
          <input type="file" name="imagen" id="imagen" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="iva" class="form-label">Iva percent</label>
          <input type="text" name="iva" id="iva" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="numOrdMostrar" class="form-label">N. orden mostrar</label>
          <input type="text" name="numOrdMostrar" id="numOrdMostrar" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="unidadMedida" class="form-label">Unidad medida</label>
          <input type="text" name="unidadMedida" id="unidadMedida" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="peso" class="form-label">Peso:</label>
          <input type="text" name="peso" id="peso" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="reqEq" class="form-label">Req. eq</label>
          <input type="text" name="reqEq" id="reqEq" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="codCategoria" class="form-label">Código categoría:</label>
          <input type="text" name="codCategoria" id="codCategoria" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="CodigoSubcategoria" class="form-label">Código subcategoría:</label>
          <input type="text" name="CodigoSubcategoria" id="CodigoSubcategoria" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Idwoocommerce:</label>
          <input type="text" name="" id="" value="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Caracteristicas técnicas</label>
          <input type="text" name="" id="" value="" class="form-control">
        </div>
        <div class="mb-3 form-floating">
          <textarea class="form-control" placeholder="Descripción artículo:" id="floatingTextarea"></textarea>
          <label for="" class="form-label">Descripción artículo:</label>
        </div>
        <div class="mb-3 form-floating">
          <textarea class="form-control" placeholder="Descripción artículo:" id="floatingTextarea"></textarea>
          <label for="" class="form-label">Caracteristicas técnicas:</label>
        </div>


        <button type="submit" class="btn btn-success">Enviar</button>
      </form>
    </div>
    <div class="col-2"></div>
  </div>
</div>
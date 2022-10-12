<?php

use App\Entity\Familia;
use App\Registry;
use App\FlashMessage;

$article = $data['article'];
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("inicio", []) ?>">Inicio</a></li>
          <li class="breadcrumb-item"><a href="<?= Registry::get(\App\Registry::ROUTER)->generate("conseguir_articles", []) ?>">Art&iacute;culo</a></li>
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
          <label for="codArticulo" class="form-label">C&oacute;digo art&iacute;culo:</label>
          <input type="number" class="form-control" value="<?= $article->getCodArticle() ?>" required id="codArticulo" value="" min="0" name="codArticulo">
          <?php if (FlashMessage::isNotNull("errorcodArticulo")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorcodArticulo") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="codFamilia" class="form-label">C&oacute;digo fam&iacute;lia:</label>
          <select required name="codFamilia" id="codFamilia" class="form-select  <?php count($families) === 0 ? 'border-danger' : '' ?>">
            <option value="" <?= $article->getCodFamilia() === 0 ? 'selected disabled' : '' ?> id="">Selecciona una opci&oacute;n</option>
            <?php if (count($families)  > 0) : ?>
              <?php foreach ($families as $familia) : ?>
                <option value="<?= $familia->getCodFamilia() ?>" id=""><?= $familia->getCodFamilia() . " - " . $familia->getNombreFamilia() ?></option>
              <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
          </select>
          <?php if (FlashMessage::isNotNull("errorcodFamilia")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorcodFamilia") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="codSubfamilia" class="form-label  <?php count($subfamilies) === 0 ? 'border-danger' : '' ?>">C&oacute;digo subfamilia:</label>
          <select name="codSubfamilia" id="codSubfamilia" class="form-select <?php count($subfamilies) === 0 ? 'border-danger' : '' ?>">
            <option value="" <?= !isset($article) ? 'selected disabled' : '' ?> id="">Selecciona una opci&oacute;n</option>
            <?php if (count($subfamilies) > 0) : ?>
              <?php foreach ($subfamilies as $subfamilia) : ?>
                <option value="<?= $subfamilia->getCodSubfamilia() ?>" id=""><?= $subfamilia->getCodSubfamilia() . " - " . $subfamilia->getNombre() ?></option>
              <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
          </select>
          <?php if (FlashMessage::isNotNull("errorcodSubfamilia")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorcodSubfamilia") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="codMarca" class="form-label <?php count($marques) === 0 ? 'border-danger' : '' ?>">C&oacute;digo marca:</label>
          <select name="codMarca" id="codMarca" class="form-select">
            <option value="" <?= !isset($article) ? 'selected disabled' : '' ?> id="">Selecciona una opci&oacute;n</option>
            <?php if (count($marques) > 0) : ?>

              <?php foreach ($marques as $marca) : ?>
                <option value="<?= $marca->getCodMarca() ?>" id=""><?= $marca->getCodMarca() . " - " . $marca->getNombreMarca() ?></option>
              <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
            <?php if (FlashMessage::isNotNull("errorcodSubfamilia")) : ?>
              <small class="text-danger"><?= FlashMessage::get("errorcodSubfamilia") ?></small>
            <?php endif ?>
          </select>
          <?php if (FlashMessage::isNotNull("errorcodMarca")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorcodMarca") ?></small>
          <?php endif ?>
        </div>

        <div class="mb-3">
          <label for="codProveedors" class="form-label <?php count($proveedors) === 0 ? 'border-danger' : '' ?>">C&oacute;digo proveedor:</label>
          <select name="codProveedors" id="codProveedors" class="form-select">
            <option value="" <?= !isset($article) ? 'selected disabled' : '' ?> id="">Selecciona una opci&oacute;n</option>
            <?php if (count($proveedors) > 0) : ?>

              <?php foreach ($proveedors as $proveedor) : ?>
                <option value="<?= $proveedor->getCodProveedor(); ?>" id=""><?= $proveedor->getCodProveedor() . " - " . $proveedor->getRazonSocial() ?></option>
              <?php endforeach; ?>
            <?php else : ?>
            <?php endif; ?>
          </select>
          <?php if (FlashMessage::isNotNull("errorcodProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorcodProveedor") ?></small>
          <?php endif ?>
        </div>


        <div class="mb-3">
          <label for="codEan" class="form-label">C&oacute;digo ean:</label>
          <input type="text" name="codEan" id="" value="<?= $article->getCodean() === 0 ? '' : $article->getCodean() ?>" class="form-control">
          <?php if (FlashMessage::isNotNull("errorcodEan")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorcodEan") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="refProveedor" class="form-label">Referencia proveedor:</label>
          <input type="text" name="refProveedor" id="refProveedor" name="refProveedor" value="<?= $article->getReferenciaProveedor() === 0 ? '' : $article->getReferenciaProveedor() ?>" class="form-control">
          <?php if (FlashMessage::isNotNull("errorrefProveedor")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorrefProveedor") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="refMarca" class="form-label">Referencia marca</label>
          <input type="text" name="refMarca" id="refMarca" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorrefMarca")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorrefMarca") ?></small>
          <?php endif ?>
        </div>
        <!-- <div class="mb-3">
          <label for="" class="form-label">Descripcion</label>
          <input type="text" name="" id="" value="" class="form-control">
        </div> -->
        <div class="mb-3">
          <label for="auxMarca" class="form-label">Aux margen</label>
          <input type="number" name="auxMarca" id="auxMarca" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Existencias disponibles:</label>
          <input type="number" name="" id="" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <div class="content-fluid">
          <div class="row">
            <div class="mb-3 col-6">
              <label for="pvp" class="form-label">PVP</label>
              <input type="number" name="pvp" step="0.01" placeholder="#.##" id="pvp" value="" class="form-control">
              <?php if (FlashMessage::isNotNull("errorpvp")) : ?>
                <small class="text-danger"><?= FlashMessage::get("errorpvp") ?></small>
              <?php endif ?>
            </div>
            <div class="mb-3 col-6">
              <label for="pvp2" class="form-label">PVP2</label>
              <input type="number" name="pvp2" step="0.01" placeholder="#.##" id="" value="pvp2" class="form-control">
              <?php if (FlashMessage::isNotNull("errorpvp2")) : ?>
                <small class="text-danger"><?= FlashMessage::get("errorpvp2") ?></small>
              <?php endif ?>
            </div>
            <div class="mb-3 col-6">
              <label for="pvpOfertaMostrador" class="form-label">PVP Oferta mostrador</label>
              <input type="number" name="pvpOfertaMostrador" step="0.01" placeholder="#.##" id="pvpOfertaMostrador" value="" class="form-control">
              <?php if (FlashMessage::isNotNull("errorpvpOfertaMostrador")) : ?>
                <small class="text-danger"><?= FlashMessage::get("errorpvpOfertaMostrador") ?></small>
              <?php endif ?>
            </div>
            <div class="mb-3 col-6">
              <label for="" class="form-label">PVP</label>
              <input type="number" name="" step="0.01" placeholder="#.##" id="" value="" class="form-control">
              <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
                <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
              <?php endif ?>
            </div>
          </div>
        </div>

        <div class="mb-3 ">
          <label for="udsUltEntrada" class="form-label">Uds. &uacute;ltima entrada</label>
          <input type="number" name="udsUltEntrada" id="udsUltEntrada" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorudsUltEntrada")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorudsUltEntrada") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="Base" class="form-label">Base</label>
          <input type="number" name="Base" id=Base"" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorBase")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorBase") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="Favorito" class="form-label">Favorito</label>
          <input type="number" name="Favorito" id="Favorito" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorFavorito")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorFavorito") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Posible</label>
          <input type="text" name="" id="" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorsPosible")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="undGrannel" class="form-label">Und. por grannel</label>
          <input type="number" name="undGrannel" id="undGrannel" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorundGrannel")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorundGrannel") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="imagen" class="form-label">Imagen</label>
          <input type="file" name="imagen" id="imagen" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsImage") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="iva" class="form-label">Iva percent</label>
          <input type="number" name="iva" id="iva" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("erroriva")) : ?>
            <small class="text-danger"><?= FlashMessage::get("erroriva") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="numOrdMostrar" class="form-label">N. orden mostrar</label>
          <input type="number" name="numOrdMostrar" id="numOrdMostrar" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errornumOrdMostrar")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errornumOrdMostrar") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="unidadMedida" class="form-label">Unidad medida</label>
          <input type="text" name="unidadMedida" id="unidadMedida" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorunidadMedida")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorunidadMedida") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="peso" class="form-label">Peso:</label>
          <input type="number" name="peso" id="peso" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorpeso")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorpeso") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="reqEq" class="form-label">Req. eq</label>
          <input type="text" name="reqEq" id="reqEq" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="codCategoria" class="form-label">Código categor&iacute;a:</label>
          <input type="number" name="codCategoria" id="codCategoria" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorreqEq")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorreqEq") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="CodigoSubcategoria" class="form-label">C&oacute;digo subcategor&iacute;a:</label>
          <input type="number" name="CodigoSubcategoria" id="CodigoSubcategoria" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Idwoocommerce:</label>
          <input type="text" name="" id="" value="" class="form-control">
          <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3 form-floating">
          <textarea class="form-control" placeholder="Descripción artículo:" name="textoDescripcion" id="textoDescripcion"></textarea>
          <label for="" class="form-label">Descripci&oacute;n art&iacute;culo:</label>
          <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3 form-floating">
          <textarea class="form-control" placeholder="Característica técnicas:" name="textoCaracteristicasTecnicas" id="textoCaracteristicasTecnicas"></textarea>
          <label for="" class="form-label">Caracter&iacute;sticas t&eacute;cnicas:</label>
          <?php if (FlashMessage::isNotNull("errorsCodEmpresa")) : ?>
            <small class="text-danger"><?= FlashMessage::get("errorsCodEmpresa") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3">
          <?php if (FlashMessage::isNotNull("resultadoSatisfactorio")) : ?>
            <small class="text-success"><?= FlashMessage::get("resultadoSatisfactorio") ?></small>
          <?php endif ?>
          <?php if (FlashMessage::isNotNull("resultadoInsatisfactorio")) : ?>
            <small class="text-danger"><?= FlashMessage::get("resultadoInsatisfactorio") ?></small>
          <?php endif ?>
        </div>
        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </div>



    </form>
  </div>
  <div class="col-2"></div>
</div>
</div>
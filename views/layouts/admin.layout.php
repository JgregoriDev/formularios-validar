<!doctype html>
<html lang="sp">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <?php $titulo = $data['titulo'] ?>
  <title><?= $titulo ?></title>
  <link rel="shortcut icon" href="http://proba.es/uploads/blank-profile-picture-100x100.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../../public/css/index.css">
</head>

<body class="p-3 m-0 border-0 bd-example">

  <!-- Example Code -->

  <?php

  use App\Registry; ?>

  <div class="container-fluid h-100 w-100">
    <!-- <?= var_dump(Registry::get(Registry::ROUTER)) ?> -->
    <div class="row">
      <header class="col-12 py-3 ">
        <div class="row">
          <div class="col-2 fs-2 d-flex justify-content-center align-items-center">
            Infoliva
          </div>
          <div class="col-9 d-flex justify-content-end align-items-center">
            <!--User dropdown start-->
            <div class="w-75">
              <!-- Boton mostra -->
              <button class="btn"><i class="bi bi-list fs-3 toggle-sidebar-btn"></i></button>
              <!-- Boton mostra -->
              <!-- Formulario busqueda inicio -->
              <form action="" class="d-none d-md-inline" method="get">

                <input type="search" name="buscar" placeholder="Buscar" id="buscar">
                <button type="submit" name="buscar" class="bbuscar btn position-relative" placeholder="Buscar" id="bbuscar">
                  <i class="bi bi-search"></i>
                </button>
              </form>
              <!-- Formulario busqueda fin -->
            </div>
            <div>
              <div class="dropdown">
                <button class="btn dropdown-toggle text-end" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="http://proba.es/uploads/blank-profile-picture-100x100.png" class="rounded-circle w-25 h-25 m-2" alt="">
                  <small>Admin</small>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
            </div>


            <!--User dropdown end-->
          </div>
        </div>
      </header>
    </div>
    <div class="row bg-principal h-100">
      <!-- Aside start -->
      <aside class="bg-white d-flex justify-content-center justify-content-lg-start col col-lg-2">
        <nav>
          <ul class="sidebar-nav list-unstyled" id="sidebar-nav">

            <li class="nav-item">
              <a class="nav-link " href="<?= Registry::get(Registry::ROUTER)->generate("inicio", []) ?>">
                <i class="bi bi-grid"></i>
                <span>Inicio</span>
              </a>
            </li><!-- End Dashboard Nav -->


            <!-- Start familias -->
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text me-2"></i><span>Familias</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("conseguir_families", []) ?>">
                    <i class="bi bi-view-list me-2"></i><span>Listar</span>
                  </a>
                </li>
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("insertar_familia", []) ?> ">
                    <i class="bi bi-plus-square me-2"></i></i><span>Añadir familia</span>
                  </a>
                </li>
              </ul>
            </li><!-- End  familias -->
            <!-- Start subfamilias -->
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text me-2"></i><span>Subamilias</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("conseguir_subfamilies", []) ?>">
                    <i class="bi bi-view-list me-2"></i><span>Listar</span>
                  </a>
                </li>
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("insertar_subfamilia", []) ?>">
                    <i class="bi bi-plus-square me-2"></i><span>Añadir subfamilia</span>
                  </a>
                </li>
              </ul>
            </li><!-- End  familias -->
            <!-- Start marcas -->
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text me-2"></i><span>Marcas</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("conseguir_marques", [])  ?>">
                    <i class="bi bi-view-list me-2"></i><span>Listar</span>
                  </a>
                </li>
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("insertar_marca", [])  ?>">
                    <i class="bi bi-plus-square me-2"></i><span>Añadir marca</span>
                  </a>
                </li>
              </ul>
            </li><!-- End  marcas -->
            <!-- Start Formas de pago -->
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text me-2"></i><span>Formas de pago</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("conseguir_FormaPagos", []) ?>">
                    <i class="bi bi-view-list me-2"></i><span>Listar</span>
                  </a>
                </li>
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("insertar_FormaPago", []) ?>">
                    <i class="bi bi-plus-square me-2"></i><span>Añadir forma de pago</span>
                  </a>
                </li>
              </ul>
            </li><!-- End  Formas de pago -->
            <!-- Start Proveedores -->
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text me-2"></i><span>Proveedores</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("conseguir_Proveedors", []) ?>">
                    <i class="bi bi-view-list me-2"></i><span>Listar</span>
                  </a>
                </li>
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("insertar_Proveedor", []) ?>">
                    <i class="bi bi-plus-square me-2"></i><span>Añadir proveedor</span>
                  </a>
                </li>
              </ul>
            </li><!-- End  Proveedores -->
            <!-- Start Articulos -->
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text me-2"></i><span>Articulos</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("conseguir_articles", []) ?>">
                    <i class="bi bi-view-list me-2"></i><span>Listar</span>
                  </a>
                </li>
                <li>
                  <a href="<?= Registry::get(Registry::ROUTER)->generate("insertar_article", []) ?>">
                    <i class="bi bi-plus-square me-2"></i><span>Añadir artículo</span>
                  </a>
                </li>
              </ul>
            </li><!-- End  Articulos -->
        </nav>
        <nav>
        </nav>



        </ul>
      </aside>
      <!-- Aside End -->
      <!-- Main start -->
      <main class="col col-lg-10">
        <?php if (isset($data['titulo'])) : ?>
          <h1><?= $data["titulo"]; ?></h1>
        <?php endif; ?>

        <?= $content ?>
      </main>
      <!-- Main end -->
    </div>
  </div>
  <!-- End Example Code -->
</body>

</html>
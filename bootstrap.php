<?php
require 'vendor/autoload.php';

use App\Config;
use App\Registry;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$router = new AltoRouter();
Registry::set(Registry::ROUTER, $router);
// map homepage
// $router->map('GET', '/', function () {
//   echo "Index";
// });

// map user details page
// $router->map('GET', '/user', function ($id) {
//   echo "user";
// });
$log = new Logger('articles');
$log->pushHandler(new StreamHandler(__DIR__ . "/./app.log", Logger::DEBUG));
$log->pushHandler(new FirePHPHandler());
Registry::set(Registry::LOGGER, $log);

$router->map('GET', '/', 'ArticlesController#inicio', 'inicio');
//articles
$router->map('GET', '/articulos', 'ArticlesController#llistarArticles', 'conseguir_articles');
$router->map('GET|POST', '/articulo/insertar', 'ArticlesController#insertarArticle', 'insertar_article');
$router->map('GET', '/articulo/[:id]', 'ArticlesController#conseguirArticle', 'conseguir_article');
$router->map('GET|POST', '/articulo/[:id]/borrar', 'ArticlesController#borrarArticle', 'borrar_article');
$router->map('GET|POST', '/articulo/[:id]/actualizar', 'ArticlesController#actualizarArticle', 'actualizar_article');

// Marques
$router->map('GET', '/marcas', 'MarcaController#llistarMarques', 'conseguir_marques');
$router->map('GET|POST', '/marca/insertar', 'MarcaController#insertarMarca', 'insertar_marca');
$router->map('GET|POST', '/marca/[:id]', 'MarcaController#conseguirMarca', 'conseguir_marca');
$router->map('GET|POST', '/marca/[:id]/actualizar', 'MarcaController#actualizarMarca', 'actualizar_marca');
$router->map('GET|POST', '/marca/[:id]/borrar', 'MarcaController#borrarMarca', 'borrar_marca');

// Families
$router->map('GET', '/familias', 'FamiliaController#llistarFamilies', 'conseguir_families');
$router->map('GET|POST', '/familia/insertar', 'FamiliaController#insertarFamilia', 'insertar_familia');
$router->map('GET', '/familia/[:id]', 'FamiliaController#conseguirFamilia', 'conseguir_familia');
$router->map('GET|POST', '/familia/[:id]/actualizar', 'FamiliaController#actualizarFamilia', 'actualizar_familia');
$router->map('GET|POST', '/familia/[:id]/borrar', 'FamiliaController#borrarFamilia', 'borrar_familia');

// Subfamilies
$router->map('GET', '/subfamilias', 'SubfamiliaController#llistarSubfamilies', 'conseguir_subfamilies');
// $router->map('GET', '/familia/[:id]/subfamilia/[:id2]', 'SubfamiliaController#conseguirSubfamilia', 'conseguir_subfamilia');
$router->map('GET|POST', '/subfamilia/insertar', 'SubfamiliaController#insertarSubfamilia', 'insertar_subfamilia');
$router->map('GET|POST', '/familia/[:id]/subfamilia/[:id2]/actualizar', 'SubfamiliaController#actualizarSubfamilia', 'actualizar_subfamilia');
$router->map('GET|POST', '/familia/[:id]/subfamilia/[:id2]/borrar', 'SubfamiliaController#borrarSubfamilia', 'borrar_subfamilia');

//Forma de pago
$router->map('GET', '/fps', 'FormaPagoController#llistarFormesPago', 'conseguir_FormaPagos');
$router->map('GET|POST', '/fp/insertar', 'FormaPagoController#insertarFormaPago', 'insertar_FormaPago');
$router->map('GET|POST', '/fp/[:id]', 'FormaPagoController#conseguirFormaPago', 'conseguir_FormaPago');
$router->map('GET|POST', '/fp/[:id]/actualizar', 'FormaPagoController#actualizarFormaPago', 'actualizar_FormaPago');
$router->map('GET|POST', '/fp/[:id]/borrar', 'FormaPagoController#borrarFormaPago', 'borrar_FormaPago');

//Proveedors
$router->map('GET', '/proveedores', 'ProveedorController#listarProveedores', 'conseguir_Proveedors');
$router->map('GET|POST', '/proveedor/insertar', 'ProveedorController#insertarProveedor', 'insertar_Proveedor');
$router->map('GET|POST', '/proveedor/[:id]', 'ProveedorController#conseguirProveedor', 'conseguir_Proveedor');
$router->map('GET|POST', '/proveedor/[:id]/actualizar', 'ProveedorController#actualizarProveedor', 'actualizar_Proveedor');
$router->map('GET|POST', '/proveedor/[:id]/borrar', 'ProveedorController#borrarProveedor', 'borrar_Proveedor');

//Recollir dsn
$configJSON = new Config(__DIR__ . '/./config.json');
Registry::setPDO($configJSON);

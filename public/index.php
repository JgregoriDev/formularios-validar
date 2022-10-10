<?php
require_once "../bootstrap.php";
// match current request url
$match = $router->match();
// echo "<pre>";
// var_dump($router);
// echo "</pre>";
// call closure or throw 404 status
// if (is_array($match) && is_callable($match['target'])) {
//   call_user_func_array($match['target'], $match['params']);
// } else {
//   // no route was matched
//   header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
// }
$prefix = "App\\Controller\\";
if (is_array($match)) {
  $temp = explode("#", $match["target"]);
  $controller = $prefix . $temp[0];
  $action = $temp[1];
  $controllerMethodExist = method_exists($controller, $action);

  if ($controllerMethodExist) {
    $object = new $controller;
    $response=call_user_func_array([$object, $action], $match['params']);
    $response->writeHeaders();
    echo $response->render();
  } else {
    // no route was matched
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
    echo "error1";
  }
} else {
  // no route was matched
  header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
  echo "error";
}

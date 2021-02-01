<?php
use Tuupola\Middleware\JwtAuthentication;
use \Illuminate\Database\Capsule\Manager;
$container = $app->getContainer();
$capsule = new Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['db'] = function ($container) use ($capsule) {
  return $capsule;
};
$container["JwtAuthentication"] = function ($container) {
  return new JwtAuthentication([
    "path" => "/api",
    "secret" => getenv("JWT_KEY"),
    "error" => function ($response, $arguments) {
      $data["status"] = "error";
      $data["message"] = $arguments["message"];
      return $response->withHeader("Content-Type", "application/json")->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));  
    },
	  "before" => function ($response, $arguments) use ($container) {
			return $response->withAttribute("token", $arguments["decoded"]);
    },
  ]);
};
// Uncomment if you use Middleware JWT
// $app->add("JwtAuthentication");



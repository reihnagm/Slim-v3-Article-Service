<?php
// use App\Middleware\JWTMiddleware;
use \Firebase\JWT\JWT;

$app->group('/api', function () use ($app) {
  $app->group('/articles', function () use ($app) {
    $app->get('', App\Controllers\ArticleController::class . ':index');
    $app->get('/{slug}', App\Controllers\ArticleController::class . ':show');
    $app->post('', App\Controllers\ArticleController::class . ':store');
    $app->put('/{uid}', App\Controllers\ArticleController::class . ':update');
    $app->delete('/{uid}', App\Controllers\ArticleController::class . ':destroy');
  });
  $app->group('/media', function () use ($app) {
    $app->post('/create-key', App\Controllers\MediaController::class . ':createKey');
    $app->post('/upload/{base64}', App\Controllers\MediaController::class . ':mediaUpload');
  });
  // $app->group('/articles', function () use ($app) {
  //   $app->get('', '\ArticleController:index');
  //   $app->get('/{uid}', '\ArticleController:show');
  //   $app->get('/{uid}', '\ArticleController:edit');
  //   $app->post('', '\ArticleController:store');
  //   $app->put('/{uid}', '\ArticleController:update');
  // });
  // $this->group('/user-profile', function () {
  //   $this->get('/', '\App\Controllers\UserProfileController:index');
  //   $this->get('/{uuid}', '\App\Controllers\UserProfileController:show');
  //   $this->post('/', '\App\Controllers\UserProfileController:store');
  //   $this->delete('/{uuid}', '\App\Controllers\UserProfileController:delete');
  //   $this->put('/{uuid}', '\App\Controllers\UserProfileController:update');
  // });
  // $this->group('/trader-profile', function () {
  // $this->get('', '\App\Controllers\TraderProfileController:index')->add(new JWTMiddleware()); pemanggilan middleware dengan otomatis menjalankan fungsi / metode __invoke()
  //   $this->get('/', '\App\Controllers\TraderProfileController:index');
  //   $this->get('/{uuid}', '\App\Controllers\TraderProfileController:view');
  //   $this->post('/subscribe/{trader_id}/{customer_id}', '\App\Controllers\TraderProfileController:subscribe');
  //   $this->delete('/unsubscribe/{uuid}/{trader_id}/{customer_id}', '\App\Controllers\TraderProfileController:unsubscribe');
  //   $this->put('/{uuid}', '\App\Controllers\TraderProfileController:update');
  // });
  // for simulation data
  // $this->group('/auth', function () {
  //   $this->post('/login', '\App\Controllers\AuthController:login');
  //   $this->post('/register', '\App\Controllers\AuthController:register');
  // });
});

// 
// $app->get('/articles', App\Controllers\ArticleController::class . ':index');

$app->get('/test', function ($request, $response) {
  die(var_dump("Hello World"));
});

$app->get('/set-token-test', function ($request, $response) {
  // test permission
  $jwt = JWT::encode([
    "iss" => "example.org",
    "aud" => "example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000,
    "scope" => [
      "user.profile.list",
      "user.profile.view",
      "user.profile.add",
      "user.profile.update",
      "user.profile.delete",
      "trader.profile.list",
      "trader.profile.view",
      "trader.profile.add",
      "trader.profile.update",
      "trader.profile.delete"
    ]
  ], getenv('SECRET_KEY'));
  return $response->withJson($jwt);
});
// Enable CORS
$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
    ->withHeader('Access-Control-Allow-Origin', '*') // example : http://www.site.com
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

<?php
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
});

$app->get('/test', function ($request, $response) {
  die(var_dump("Hello World"));
});

// Enable CORS
$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
    ->withHeader('Access-Control-Allow-Origin', '*') // example : http://www.site.com
    ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

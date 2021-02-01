<?php
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../.env');
$dotenv->load();
$app = new Slim\App([
  'settings' => [
    'displayErrorDetails' => true,
    'db' => [
      'driver'   => 'mysql',
      'host'     => '68.183.234.187:3307', // 127.0.0.1 OR localhost
      'database' => 'mobile-apps',
      'username' => 'root',
      'password' => 'cx2021!',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ]
  ]
]);

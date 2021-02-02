<?php

namespace App\Middleware;

use \Firebase\JWT\JWT;
use App\Helper\Helper;

class JWTMiddleware
{
  public function __invoke($req, $res, $next)
  {
    // __invoke akan terpanggil jika dengan memanggil class seperti function JWTMiddleware()
    $jwt = $req->getHeader('Authorization')[0];
    try {
      JWT::decode($jwt, getenv('JWT_KEY'), array('HS256'));
      // Set Attribute
      // $request = $request->withAttribute('foo', value);
      return $next($req, $res);
    } catch (\Exception $e) {
      Helper::response($res, 200, false,  $e->getMessage(), []);
    }
  }
}

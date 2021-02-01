<?php
namespace App\Middleware;
use \Firebase\JWT\JWT;
class JWTMiddleware {
  public function __invoke($request, $response, $next)  { 
    // __invoke akan terpanggil jika dengan memanggil class seperti function JWTMiddleware()
    $jwt = $request->getHeader('Authorization')[0];
    try {
			JWT::decode($jwt, getenv('JWT_KEY'), array('HS256'));
			// Set Attribute
			// $request = $request->withAttribute('foo', value);
      return $next($request, $response);
    } catch (\Exception $e) {
      return $response->withJson([
        'success' => false,
        'message' => $e->getMessage()
      ], 401);
    }
  }
}

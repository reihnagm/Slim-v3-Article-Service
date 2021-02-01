<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\User;
use \Firebase\JWT\JWT;
use Ramsey\Uuid\Uuid;
class AuthController extends Controller {
  public function login($request, $response) {
    // get attribute
    // $request = $request->getAttribute('scope');
    $name = $request->getParsedBody()['name'];
    $password = $request->getParsedBody()['password'];
    $user = User::where('name', $name)->where('password', $password)->first();
    if(empty($user)) {
      return $response->withJson([
        'success' => false,
        'message' => 'invalid credentials.'
      ]);
    }
    $token = [
      "iss" => "http://localhost:8080",
      "iat" => time(),
      "exp" => time() + 60 * 60,
      "data" => [
        "user_id" => $user->id
      ]
    ];
    return $response->withJson([
      'success' => false,
      'message' => 'successfull login.',
      'token' => JWT::encode($token, getenv('JWT_KEY'))
    ]);
  }
  public function register($request, $response) {
    $uuid4 = Uuid::uuid4();
    $name = $request->getParsedBody()["name"];
    $email = $request->getParsedBody()["email"];
    $password = $request->getParsedBody()["password"];
    $user = User::create([
      "uuid" => $uuid4->toString(),
      "name" => $name,
      "email" => $email,
      "password" => $password 
    ]);
    $token = [
      "iss" => "http://localhost:8080",
      "iat" => time(),
      "exp" => time() + 60*60,
      "data" => [
        "user_id" => $user->id
      ]
    ];
    JWT::encode($token, getenv('JWT_KEY'));
    return $response->withJson([
      'success' => false,
      'message' => 'Ok.'
    ]);
  }
}

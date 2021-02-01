<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\UserProfile;
use App\Token\Token;
use App\Exception\ForbiddenException;
use Ramsey\Uuid\Uuid;

class UserProfileController extends Controller
{
  public function index($request, $response)
  {
    $token = $request->getAttribute("token");
    if (in_array("user.profile.list", $token["scope"])) {
      $profiles = UserProfile::all();
      return $response->withJson([
        "error" => false,
        "message" => "Ok.",
        "results" => $profiles
      ]);
    } else {
      return $response->withStatus(401);
    }
  }
  public function show($request, $response, $args)
  {
    $token = $request->getAttribute("token");
    if (in_array('user.profile.view', $token["scope"])) {
      $profile = UserProfile::find($args["id"]);
      return $response->withJson([
        "error" => false,
        "message" => "Ok.",
        "result" => $profile
      ]);
    } else {
      return $response->withStatus(401);
    }
  }
  public function store($request, $response)
  {
    $token = $request->getAttribute("token");
    $name = $request->getParsedBody()["name"];
    $dob = $request->getParsedBody()["dob"];
    $gender = $request->getParsedBody()["gender"];
    $email = $request->getParsedBody()["email"];
    $phone = $request->getParsedBody()["phone"];
    $uuid4 = Uuid::uuid4();
    if (in_array("user.profile.add", $token["scope"])) {
      UserProfile::create([
        "id" =>  $uuid4->toString(),
        "name" => $name,
        "dob" => $dob,
        "gender" => $gender,
        "email" => $email,
        "phone" => $phone
      ]);
      return $response->withJson([
        "success" => true,
        "message" => "Ok.",
      ]);
    } else {
      return $response->withStatus(401);
    }
  }
  public function update($request, $response, $args)
  {
    $token = $request->getAttribute("token");
    $name = $request->getParsedBody()["name"];
    $dob = $request->getParsedBody()["dob"];
    $gender = $request->getParsedBody()["gender"];
    $email = $request->getParsedBody()["email"];
    $phone = $request->getParsedBody()["phone"];
    if (in_array("user.profile.update", $token["scope"])) {
      UserProfile::find($args["id"])->update([
        "name" => $name,
        "dob" => $dob,
        "gender" => $gender,
        "email" => $email,
        "phone" => $phone
      ]);
      return $response->withJson([
        "success" => true,
        "message" => "Ok."
      ]);
    } else {
      return $response->withStatus(401);
    }
  }
  public function delete($request, $response, $args)
  {
    $token = $request->getAttribute("token");
    if (in_array("user.profile.delete", $token["scope"])) {
      UserProfile::find($args["id"])->delete();
      return $response->withJson([
        "success" => true,
        "message" => "Ok."
      ]);
    } else {
      return $response->withStatus(401);
    }
  }
}

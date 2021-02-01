<?php
namespace App\Controllers;
use App\Controllers\Controller;
use App\Models\TraderProfile;
use App\Models\TraderSubscribe;
// use App\Exception\ForbiddenException;
use Ramsey\Uuid\Uuid;
class TraderProfileController extends Controller {
  public function index($request, $response) {
    $profiles = TraderProfile::all();
    return $response->withJson($profiles);
  }
  public function view($request, $response, $args) {
    $profile = TraderProfile::find($args["uuid"]);
    return $response->withJson($profile);
  }
  public function subscribe($request, $response, $args) {
    $uuid4 = Uuid::uuid4();
    TraderSubscribe::create([
      "id" =>  $uuid4->toString(),
      "trader_id" => (int) $args["trader_id"],
      "customer_id" => (int) $args["customer_id"]
    ]);
    return $response->withJson([
      "success" => true,
      "message" => "Ok."
    ]);
  }
  public function unsubscribe($request, $response, $args) {
    $trader_profile = TraderSubscribe::find($args["id"])
    ->where('trader_id', (int) $args["trader_id"])
    ->where('customer_id', (int) $args["customer_id"]);
    $trader_profile->delete();
    return $response->withJson([
      "success" => true,
      "message" => "Ok."
    ]);
  }
  public function update($request, $response, $args) {
    $uuid4 = Uuid::uuid4();
    $request_name = $request->getParsedBody()["name"];
    $request_address = $request->getParsedBody()["address"];
    $request_description = $request->getParsedBody()["description"];
    $check_is_exists_trader_profile = TraderProfile::where("user_uuid", $args["uuid"])->first();
    if($check_is_exists_trader_profile === NULL) {
      TraderProfile::create([
        "id" =>  $uuid4->toString(),
        "name" => $request_name,
        "description" => $request_description,
        "address" => $request_address,
        "user_uuid" => $args["uuid"]
      ]);
    } else {
      TraderProfile::where("user_id", $args["id"])->update([
        "name" => $request_name,
        "description" => $request_description,
        "address" => $request_address
      ]);
    }
    return $response->withJson([
      "success" => true,
      "message" => "Ok."
    ]);
  }
}

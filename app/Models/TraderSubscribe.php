<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TraderSubscribe extends Model {
  public $incrementing = true;
  public $timestamps = false;
  protected $keyType = "string";
  protected $table = "trader_subscribes";
  protected $primaryKey = "uuid";
  protected $fillable = ["uuid", "trader_id", "customer_id"];
}

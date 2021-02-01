<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TraderProfile extends Model {
  public $incrementing = false;
  public $timestamps = false;
  protected $keyType = "string";
  protected $table = "store_profiles";
  protected $primaryKey = "id";
  protected $fillable = ["id", "name", "description", "address", "user_uuid"];
}

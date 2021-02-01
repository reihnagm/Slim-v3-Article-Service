<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
  public $incrementing = true;
  public $timestamps = false;
  protected $keyType = "int";
  protected $primaryKey = "id";
  protected $table = "users";
  protected $fillable = ["uid","name","email","password"];

  public function articles() {
    return $this->hasMany('App/Models/User');
  }
}

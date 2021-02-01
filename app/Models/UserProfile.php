<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {
  public $incrementing = false;
  public $timestamps = false;
  protected $primaryKey = "id";
  protected $keyType = "string";
  protected $table = "user_profiles";
  protected $fillable = ["id", "name", "dob", "gender", "email", "phone"];
}

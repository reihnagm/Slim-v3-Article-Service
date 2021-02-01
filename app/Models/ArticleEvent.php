<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleEvent extends Model
{
  public $incrementing = true;
  public $timestamps = false;
  protected $keyType = "int";
  protected $primaryKey = "id";
  protected $table = "article_events";
  protected $fillable = ["uid", "name", "created_at", "updated_at"];
}

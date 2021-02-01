<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
  public $incrementing = true;
  public $timestamps = false;
  protected $keyType = "int";
  protected $primaryKey = "id";
  protected $table = "article_images";
  protected $fillable = ["uid", "article_uid", "imageurl", "created_at", "updated_at"];
}

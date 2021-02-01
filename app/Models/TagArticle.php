<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagArticle extends Model
{
  protected $hidden = ['pivot'];
  public $incrementing = true;
  public $timestamps = false;
  protected $keyType = "int";
  protected $primaryKey = "id";
  protected $table = "tag_articles";
}

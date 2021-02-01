<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  public $incrementing = true;
  public $timestamps = false;
  protected $keyType = "int";
  protected $primaryKey = "id";
  protected $table = "articles";
  protected $fillable = ["uid", "title", "slug", "body", "event_uid", "tag_uid", "user_uid", "created_at", "updated_at"];

  /* Model, Local_Key, Parent_Key */
  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_uid', 'uid');
  }
  public function event()
  {
    return $this->belongsTo('App\Models\ArticleEvent', 'event_uid', 'uid');
  }
  public function tags()
  {
    return $this->belongsToMany('App\Models\TagArticle', 'article_tags', 'article_uid', 'tag_uid', 'uid', 'uid')->select("tag_articles.uid AS uid", "name");
    // Without uid 
    // return $this->belongsToMany('App\Models\TagArticle', 'article_tags', 'id', 'id');
    // Nothing show if model TagArticle protected $hidden = ['pivot'];
    // ->withPivot('id', 'uid', 'tag_id', 'article_id', 'created_at', 'updated_at');
  }
}

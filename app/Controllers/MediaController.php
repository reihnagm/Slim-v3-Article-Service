<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use App\Models\Article;
use App\Models\ArticleImage;
use App\Helper\Helper;
use App\Helper\Media;

class MediaController extends Controller
{
  public function createKey($req, $res)
  {
    $uid = Uuid::uuid4();
    return Helper::response($res, 200, false, "Ok.", $uid);
  }

  public function mediaUpload($req, $res, $args)
  {
    // $root = $_SERVER['DOCUMENT_ROOT']; // Get path => public 
    $uid = Uuid::uuid4();
    $xContextId = getallheaders()["X-Context-ID"];
    $key = $args["base64"];
    $path = $_GET["path"];
    $dir = explode("/", $path); // path=/images/gambar => [""], ["images"], ["gambar.jpg"] 
    $basename = basename($path); // /images/gambar.jpg => gambar.jpg
    $binary = $req->getBody()->getContents();
    $convertSha256 = hash('sha256', $binary);
    $keyDecr = str_replace(array('+', '/'), array('-', '_'), base64_encode(pack('H*', $convertSha256)));
    if ($key === $keyDecr) {
      if (!is_dir($dir[1])) {
        if (!is_dir('assets/' . $dir[1]) && !file_exists('assets/' . $dir[1] . '/' . $basename)) {
          mkdir('assets/' . $dir[1]);
          file_put_contents('assets/' . $dir[1] . '/' . $basename, $binary);
        } else {
          file_put_contents('assets/' . $dir[1] . '/' . $basename, $binary);
        }
      } else {
        file_put_contents('assets/' . $dir[1] . '/' . $basename, $binary);
      }
    } else {
      return Helper::response($res, 500, true, "Invalid Hash.", []);
    }
    ArticleImage::create([
      "uid" => $uid,
      "article_uid" => $xContextId,
      "imageurl" => 'assets/' . $dir[1] . '/' . $basename
    ]);
    return Helper::response($res, 200, false, "Ok.", []);
  }
  public function mediaGet($req, $res)
  {
  }
}

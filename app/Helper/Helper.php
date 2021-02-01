<?php

namespace App\Helper;

class Helper
{
  public static function response($res, int $stat = 200, bool $err = false, String $msg = "Ok.", $results)
  {
    return $res->withJson([
      "status" => $stat,
      "error" => $err,
      "message" => $msg,
      "results" => $results
    ]);
  }
  public static function slugify($text)
  {
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;
  }
  public static function dd($value)
  {
    return die(var_dump($value));
  }
}

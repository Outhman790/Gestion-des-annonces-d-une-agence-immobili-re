<?php
function cutStr($str, $key, $length)
{
  global $annonce;
  $str = $annonce[$key];
  $str = substr($str, 0, $length);
  $str = explode(' ', $str);
  if (count($str) > 30)
    array_pop($str);
  $str = implode(' ', $str);
  if (strlen($str) > 30)
    return $str . '...';
  return $str;
}
?>
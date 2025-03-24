<?php

function view($path, $attributes = [])
{
  extract($attributes);

  require base_path('views/' . $path);
}

function base_path($path)
{
  return BASE_PATH . '/' . $path;
}

function redirect($path)
{
  header("location: {$path}");
  exit();
}

function urlIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}

function ordinal($number) {
  $suffixes = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];
  if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
    return $number . 'th';
  } else {
    return $number . $suffixes[$number % 10];
  }
}
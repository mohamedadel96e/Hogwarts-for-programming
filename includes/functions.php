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
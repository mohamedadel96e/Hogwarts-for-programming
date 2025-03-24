<?php

namespace Includes;

use Exception;

class Container
{
  protected $bindings = [];


  public function bind($key, $value)
  {
    $this->bindings[$key] = $value;
  }

  public function resolve($key)
  {
    if (isset($this->bindings[$key])) {
      return call_user_func($this->bindings[$key]); // ! important
    }

    throw new Exception("No binding found for key: " . $key);
  }

  public function has($key)
  {
    return isset($this->bindings[$key]);
  }

  public function remove($key)
  {
    if (isset($this->bindings[$key])) {
      unset($this->bindings[$key]);
    }
  }
}
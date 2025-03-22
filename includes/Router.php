<?php

namespace Includes;
require base_path('vendor/autoload.php');
use \Middleware\AuthMiddleware;
require base_path('middleware/AuthMiddleware.php');
use Config\Config;
require base_path('config/config.php');



class Router
{
  protected $routes = [];

  public function add($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null
    ];

    return $this;
  }

  public function get($uri, $controller)
  {
    return $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller)
  {
    return $this->add('POST', $uri, $controller);
  }

  public function delete($uri, $controller)
  {
    return $this->add('DELETE', $uri, $controller);
  }

  public function patch($uri, $controller)
  {
    return $this->add('PATCH', $uri, $controller);
  }

  public function put($uri, $controller)
  {
    return $this->add('PUT', $uri, $controller);
  }
  public function route($uri, $method)
  {
    // dd($uri, $method, $_POST);
    $jwt = $_COOKIE['jwt'] ?? null;
    try {
      $data = null;
      if ($jwt)
        $data = AuthMiddleware::validateToken($jwt);
      foreach ($this->routes as $route) {
        if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
          if (in_array($uri, Config::ROUTES['public'])) {
            return require base_path('controllers/' . $route['controller']);
          }
          if ($data && $data->role) {
            switch ($data->role) {
              case 'student':
                if (in_array($uri, Config::ROUTES['student'])) {
                  return require base_path('controllers/' . $route['controller']);
                }
                if (in_array($uri, Config::ROUTES['auth'])) {
                  redirect('dashboard');
                  return require base_path('controllers/' . 'student/dashboard.php');
                }
                break;
              case 'Professor':
                if (in_array($uri, Config::ROUTES['prof'])) {
                  return require base_path('controllers/' . $route['controller']);
                }
                if (in_array($uri, Config::ROUTES['auth'])) {
                  redirect('dashboard');
                  return require base_path('controllers/' . 'prof/dashboard.php');
                }
                break;
              case 'admin':
                if (in_array($uri, Config::ROUTES['admin'])) {
                  return require base_path('controllers/' . $route['controller']);
                }
                if (in_array($uri, Config::ROUTES['auth'])) {
                  redirect('dashboard');
                  return require base_path('controllers/' . 'admin/dashboard.php');
                }
                if (in_array($uri, Config::ROUTES['prof'])) {
                  return require base_path('controllers/' . $route['controller']);
                }
                break;
            }
            $this->abort(403);
          } else {
            // dd($uri, Config::ROUTES['public']);
            if (in_array($uri, Config::ROUTES['auth']))
              return require base_path('controllers/' . $route['controller']);
            else
              $this->abort(403);
          }
        }
      }
    } catch (\Exception $e) {
      $this->abort(401);
    }

    $this->abort();
  }

  public function previousUrl()
  {
    return $_SERVER['HTTP_REFERER'];
  }


  protected function abort($code = 404)
  {
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
  }
}

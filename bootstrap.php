<?php 
  
use Includes\App;
use Includes\Container;
use Includes\Database;
require __DIR__ . '/includes/Container.php';

$container = new Container();
App::setContainer($container);
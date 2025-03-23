<?php 
  
  namespace Controllers;
  require_once __DIR__ . '/../../models/Shop.php';
  use Models\Shop;

  $user = \Middleware\AuthMiddleware::validateToken($_COOKIE['jwt']);
  
  //dd($user);
  $shopModel = new Shop();
  
  $inventory = $shopModel->getInventory($user->id);
  //dd($course['stat']);
  view('student/shop.view.php', 
  [
    'heading' => 'Magical Shop',
    'title' => 'Shop',
    'user' => $user,
    'inventory' => $inventory
  ]
  );
<?php 
  
  namespace Controllers;
  require_once __DIR__ . '/../../models/Shop.php';
  use Models\Shop;

  $user = \Middleware\AuthMiddleware::validateToken($_COOKIE['jwt']);

  //dd($user);
  //dd($user);
  $shopModel = new Shop();
  
  $inventoryItems = $shopModel->getInventory($user->id);
  $shopItems = $shopModel->getShopItems($user->id);

  view('student/shop.view.php', 
  [
    'heading' => 'Magical Shop',
    'title' => 'Shop',
    'user' => $user,

    'inventoryItems' => $inventoryItems,
    'shopItems' => $shopItems
  ]
  );
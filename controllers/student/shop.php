<?php

namespace Controllers;
// require_once __DIR__ . '/../../models/Shop.php';
use Models\Shop;
use Models\Student;

$user = \Middleware\AuthMiddleware::validateToken($_COOKIE['jwt']);
$errors = [];
$student = new Student();
$shopModel = new Shop();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $itemId = (int)$_POST['item_id'];
  $price = (int)$_POST['price'];
  $userId = (int)$_POST['user_id'];
  $user = $student->get($userId);
  if ($user['balance'] < $price) {
    $errors['balance'] = 'You do not have enough gold to purchase this item';
  } else {
    $shopModel->purchaseItem($user['id'], $itemId);
    $user['balance'] -= $price;
    (new Student())->updateBalance($user['id'], $user['balance']);
    redirect('/shop');
    exit;
  }
  redirect('/shop');
  exit;
}
$inventoryItems = $shopModel->getInventory($user->id);
$shopItems = $shopModel->getShopItems($user->id);
// dd($shopItems);
view('student/shop.view.php',
    [
        'heading' => 'Magical Shop',
        'title' => 'Shop',
        'user' => $user,
        'inventoryItems' => $inventoryItems,
        'shopItems' => $shopItems,
        'errors' => $errors
    ]
);

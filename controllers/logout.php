<?php 
  
if(isset($_COOKIE['jwt'])) {
  setcookie('jwt', '', time() - 3600);
  redirect('login');
} else {
  redirect('login');
}
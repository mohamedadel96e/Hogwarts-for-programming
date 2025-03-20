<?php use Middleware\AuthMiddleware;

$jwt = $_COOKIE['jwt'] ?? null;
try {
  $data = null;
  if ($jwt)
    $data = AuthMiddleware::validateToken($jwt);

  $authenticated = $data && isset($data->role);
  $role = $data->role ?? null;
} catch (Exception $e) {
  $data = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gryffindorRed: "#7A0019",
                        gryffindorGold: "#D4AF37",
                        darkRed: "#4B000E",
                        darkGold: "#B8860B"
                    }
                }
            }
        }
  </script>

</head>


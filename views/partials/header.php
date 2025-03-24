<?php

use Middleware\AuthMiddleware;
use Models\Student;
$jwt = $_COOKIE['jwt'] ?? null;
try {
  $data = null;
  if ($jwt)
    $data = AuthMiddleware::validateToken($jwt);

  $authenticated = $data && isset($data->role);
  $role = $data->role ?? null;
  $user = $data;
  $studentModel = new Student();
  //dd($user);
  $userDB = $studentModel->get($user->id);
  $wand = (object)(new \Models\Wand())->get($user->wand_id);
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
            gryffindor: {
              400: '#AE0001',
              500: '#740001'
            },
            slytherin: {
              400: '#2A623D',
              500: '#1A472A'
            },
            ravenclaw: {
              300: '#5D5D5D',
              400: '#0E1A40',
              500: '#222F5B'
            },
            hufflepuff: {
              400: '#FFDB00',
              500: '#ECB939'
            }
          }
        }
      }
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&display=swap" rel="stylesheet">
  <style>
    .font-cinzel {
      font-family: 'Cinzel Decorative', cursive;
    }

    .house-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .house-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .artifact-overlay {
      @apply absolute inset-0 bg-black/60 p-4 flex flex-col justify-end rounded-xl opacity-0 group-hover:opacity-100 transition-opacity;
    }

    .artifact-text {
      @apply text-amber-300 italic text-center mb-2 text-sm;
    }

    .artifact-house {
      @apply inline-block px-2 py-1 rounded-full text-xs font-semibold;

      &.gryffindor {
        @apply bg-red-500/30 text-red-300;
      }

      &.slytherin {
        @apply bg-emerald-500/30 text-emerald-300;
      }

      &.ravenclaw {
        @apply bg-blue-500/30 text-blue-300;
      }

      &.hufflepuff {
        @apply bg-yellow-500/30 text-yellow-300;
      }

      &.deathly {
        @apply bg-gray-500/30 text-gray-300;
      }
    }
  </style>
</head>
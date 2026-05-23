<!DOCTYPE html>
<html lang="en">
<head>    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>LuxCar - Kezdőoldal</title>
    <link rel="icon" href="{{ asset('ChatGPT Image 2026. márc. 1. 13_20_49 (1).ico') }}">
    <meta charset="UTF-8">
    @vite([
      'resources/css/main_page.css',
      'resources/css/navbar.css',
    ])
</head>

<body>
  <x-navbar />
<x-gyk />
  <x-footer />
</body>


</html>
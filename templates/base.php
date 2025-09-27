<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Marianne Maric' ?></title>

    <!-- Tailwind CSS compiled -->
    <link rel="stylesheet" href="/assets/css/output.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

    <!-- Optional JS -->
    <script src="/assets/js/main.js" defer></script> <!-- if you have a main JS file -->
</head>
<body>
    <?= $content ?>
</body>
</html>
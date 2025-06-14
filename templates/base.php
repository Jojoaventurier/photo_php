<!-- templates/base.php -->
<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mon site' ?></title>

    <link rel="stylesheet" href="/css/output.css"> <!-- Compilé avec Tailwind -->
    <!--<link rel="stylesheet" href="/css/output.css">--> <!-- Compilé avec Tailwind -->
    <!--<script src="https://cdn.tailwindcss.com"></script>-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Playfair+Display:wght@600&display=swap" rel="stylesheet">

</head>
<body>
        <?= $content ?>
</body>
</html>
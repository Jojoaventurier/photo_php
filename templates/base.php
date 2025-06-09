<!-- templates/base.php -->
<!DOCTYPE html>
<html lang="fr" data-theme="cupcake"> <!-- daisyUI theme -->
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mon site' ?></title>
    <link rel="stylesheet" href="/public/css/output.css"> <!-- Compilé avec Tailwind + daisyUI -->
</head>
<body>
    <?= $content ?>
</body>
</html>
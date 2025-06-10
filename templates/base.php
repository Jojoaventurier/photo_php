<!-- templates/base.php -->
<!DOCTYPE html>
<html lang="fr" data-theme="cupcake"> <!-- daisyUI theme -->
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mon site' ?></title>
    <!--<link href="/css/output.css" rel="stylesheet">--> <!-- Compilé avec Tailwind -->
    <link rel="stylesheet" href="/public/css/output.css">
</head>
<body>
    <?= $content ?>
</body>
</html>
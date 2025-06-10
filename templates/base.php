<!-- templates/base.php -->
<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mon site' ?></title>
    <link rel="stylesheet" href="/photo_php/public/css/output.css"> <!-- Compilé avec Tailwind -->

</head>
<body>
        <?= $content ?>
</body>
</html>
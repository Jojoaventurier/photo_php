<!-- templates/base.php -->
<!DOCTYPE html>
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? htmlspecialchars($title) : 'Mon site' ?></title>

    <link rel="stylesheet" href="/css/output.css"> <!-- Compilé avec Tailwind -->
    <!--<link rel="stylesheet" href="/css/output.css">--> <!-- Compilé avec Tailwind -->
    <!--<script src="https://cdn.tailwindcss.com"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.min.js" integrity="sha512-Atu8sttM7mNNMon28+GHxLdz4Xo2APm1WVHwiLW9gW4bmHpHc/E2IbXrj98SmefTmbqbUTOztKl5PDPiu0LD/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
        <?= $content ?>
</body>
</html>
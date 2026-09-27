<?php use App\Template\View; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= View::e($title) ?></title>
    <meta name="description" content="<?= View::e($description) ?>">

    <!-- Open Graph (link previews on social networks) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= View::e($title) ?>">
    <meta property="og:description" content="<?= View::e($description) ?>">
    <?php if (!empty($ogImage)): ?>
        <meta property="og:image" content="<?= View::e($ogImage) ?>">
    <?php endif; ?>

    <!-- Tailwind CSS compiled -->
    <link rel="stylesheet" href="/css/output.css?v=<?= filemtime(__DIR__ . '/../public/css/output.css') ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&display=swap" rel="stylesheet">

    <script src="/js/main.js?v=<?= filemtime(__DIR__ . '/../public/js/main.js') ?>" defer></script>
</head>
<body class="bg-neutral-50">
    <div class="min-h-screen flex flex-col items-center">
        <?php include __DIR__ . '/partials/header.php'; ?>

        <main class="w-full flex-1 flex flex-col items-center">
            <?= $content ?>
        </main>
    </div>
</body>
</html>

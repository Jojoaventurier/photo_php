<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title ?? 'Photography Site') ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        <h1>My Photo Site</h1>
        <nav>
            <a href="/">Home</a>
            <a href="/gallery">Gallery</a>
        </nav>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
        &copy; <?= date('Y') ?> Photography by Your Friend
    </footer>
</body>
</html>
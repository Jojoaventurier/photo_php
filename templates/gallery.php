<h2><?= htmlspecialchars($title) ?></h2>

<div class="gallery">
    <?php foreach ($photos as $photo): ?>
        <img src="<?= str_replace(__DIR__ . '/../public', '', $photo) ?>" alt="Photo" style="max-width:200px;">
    <?php endforeach; ?>
</div>
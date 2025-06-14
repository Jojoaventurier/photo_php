<?php
// 1. Charger tous les fichiers images du dossier gallery1
$galleryDir = __DIR__ . '/../public/images/';
$photos     = glob($galleryDir . '/*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE);
?>

<div class="min-h-screen flex flex-col items-center justify-center bg-neutral-50">
    <div class="max-w-5xl mx-auto px-4 py-8">
        <!-- Image centrale -->
        <div class="mb-6">
            <img id="main-image"
                src="/images/gallery1/<?= basename($photos[0]) ?>"
                alt="Image principale"
                class="w-full max-h-[70vh] object-contain rounded shadow-lg transition duration-300">
        </div>

        <!-- Miniatures carrées -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <?php foreach ($photos as $index => $photo): ?>
                <img src="/images/gallery1/<?= basename($photo) ?>"
                    alt="Miniature <?= $index + 1 ?>"
                    class="thumbnail cursor-pointer aspect-square object-cover rounded shadow hover:opacity-80 transition duration-200 border-2 border-transparent"
                    data-index="<?= $index ?>">
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const mainImage  = document.getElementById('main-image');
    const thumbnails = document.querySelectorAll('.thumbnail');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function () {
            mainImage.src = this.src;                       // change la grande image
            thumbnails.forEach(t => t.classList.remove('border-red-500'));
            this.classList.add('border-red-500');           // effet sélection
        });
    });
});
</script>
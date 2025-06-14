    <h1 class="text-4xl font-bold text-black mb-4">Marianne Marić</h1>
    <!-- Barre de navigation -->
    <nav class="mb-5 w-full">
        <ul id="main-menu" class="flex justify-center gap-12 text-lg font-medium">
            <?php foreach ($menuItems as $item): ?>
                <?php $hasChildren = !empty($item['children']); ?>
                <li class="relative group <?= $hasChildren ? 'has-dropdown' : '' ?>">
                    <a href="<?= $item['route'] ?>" class="hover:underline">
                        <?= htmlspecialchars($item['label']) ?>
                    </a>

                    <?php if ($hasChildren): ?>
                        <ul class="submenu absolute left-0 mt-2 bg-white rounded shadow-md py-2 space-y-1
                                   opacity-0 pointer-events-none transition-opacity duration-150">
                            <?php foreach ($item['children'] as $child): ?>
                                <li>
                                    <a href="<?= $child['route'] ?>"
                                    class="block px-6 hover:bg-gray-100 hover:underline">
                                        <?= htmlspecialchars($child['label']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

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
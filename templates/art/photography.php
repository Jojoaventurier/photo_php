<div class="min-h-screen flex flex-col items-center justify-center bg-neutral-50">  
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

 <div class="max-w-6xl mx-auto px-4 py-4 relative">  <!-- relative pour positionner flèches -->
    <!-- Image centrale avec flèches -->
    <div class="mb-12 relative">
        <!-- Flèche gauche -->
        <button id="prevBtn"
            class="absolute top-1/2 left-2 -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-90 rounded-full p-2 shadow z-20">
            &#8592; <!-- ou &larr; -->
        </button>

        <img id="main-image"
            src="/images/gallery1/<?= basename($photos[0]) ?>"
            alt="Image principale"
            class="w-full max-h-[80vh] object-contain rounded shadow-lg transition duration-300 sticky top-0 z-10 bg-white">

        <!-- Flèche droite -->
        <button id="nextBtn"
            class="absolute top-1/2 right-2 -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-90 rounded-full p-2 shadow z-20">
            &#8594; <!-- ou &rarr; -->
        </button>
    </div>

    <!-- Miniatures carrées -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <?php foreach ($photos as $index => $photo): ?>
            <img src="/images/gallery1/<?= basename($photo) ?>"
                alt="Miniature <?= $index + 1 ?>"
                class="thumbnail cursor-pointer aspect-square object-cover rounded shadow hover:opacity-80 transition duration-200 border-2 border-transparent <?= $index === 0 ? 'border-red-500' : '' ?>"
                data-index="<?= $index ?>">
        <?php endforeach; ?>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const photos = <?= json_encode(array_map('basename', $photos)) ?>;
    const mainImage = document.getElementById('main-image');
    const thumbnails = document.querySelectorAll('.thumbnail');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let currentIndex = 0;

    function updateMainImage(index) {
        currentIndex = index;
        mainImage.src = `/images/gallery1/${photos[currentIndex]}`;
        thumbnails.forEach(t => t.classList.remove('border-red-500'));
        thumbnails[currentIndex].classList.add('border-red-500');
    }

thumbnails.forEach(thumb => {
    thumb.addEventListener('click', function () {
        updateMainImage(parseInt(this.dataset.index));

        const y = mainImage.getBoundingClientRect().top + window.pageYOffset;
        const offset = 30; // remonte de 30px au-dessus

        window.scrollTo({ top: y - offset, behavior: 'smooth' });
    });
});

    prevBtn.addEventListener('click', () => {
        let newIndex = currentIndex - 1;
        if (newIndex < 0) newIndex = photos.length - 1;
        updateMainImage(newIndex);
    });

    nextBtn.addEventListener('click', () => {
        let newIndex = currentIndex + 1;
        if (newIndex >= photos.length) newIndex = 0;
        updateMainImage(newIndex);
    });
});
</script>
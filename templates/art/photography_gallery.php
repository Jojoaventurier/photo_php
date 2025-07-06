<?php if (empty($photos)): ?>
    <p class="text-gray-500 text-center mb-6">No images found in this gallery.</p>
<?php else: ?>
    <!-- your main image + arrows -->
<?php endif; ?>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<div class="min-h-screen flex flex-col items-center bg-neutral-50">  
    <div class="inline-flex max-w-[80%] items-center mb-6 mt-6">
        <h1 class="text-4xl font-bold text-black">Marianne Marić</h1>

        <!-- Barre de navigation -->
        <nav class="w-full">
            <ul id="main-menu" class="flex justify-center gap-12 text-lg font-extralight">
                <?php foreach ($menuItems as $item): ?>
                    <?php $hasChildren = !empty($item['children']); ?>
                    <li class="relative group <?= $hasChildren ? 'has-dropdown' : '' ?>">
                        <a href="<?= $item['route'] ?>" class="hover:underline">
                            <?= htmlspecialchars($item['label']) ?>
                        </a>

                        <?php if ($hasChildren): ?>
                            <ul class="submenu absolute left-0 mt-2 bg-white shadow-md py-2 space-y-1
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
    </div>

<div class="max-w-6xl mx-auto px-4 py-4 space-y-8">
    <!-- Thumbnails (Grid) -->
    <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-4">
        <?php foreach ($photos as $index => $photo): ?>
            <a href="#photo-<?= $index ?>" class="block">
                <img
                    src="/images/<?= $directory ?>/<?= basename($photo) ?>"
                    alt="Miniature <?= $index + 1 ?>"
                    class="cursor-pointer aspect-square object-cover shadow hover:opacity-80 transition duration-200 border-2 border-transparent hover:border-red-500">
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Big Images -->
    <div class="space-y-16">
        <?php foreach ($photos as $index => $photo): ?>
            <img
                id="photo-<?= $index ?>"
                src="/images/<?= $directory ?>/<?= basename($photo) ?>"
                alt="Image <?= $index + 1 ?>"
                class="w-full max-h-[85vh] object-contain shadow-lg bg-white scroll-mt-24 cursor-zoom-in"
                onclick="openFullscreen(<?= $index ?>)">
        <?php endforeach; ?>
    </div>
</div>

<!-- Fullscreen Modal -->
<div id="fullscreenModal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center cursor-zoom-out" onclick="closeFullscreen()">
    <!-- Close Button -->
    <button onclick="closeFullscreen(); event.stopPropagation();" class="absolute top-4 right-4 text-white text-3xl font-light hover:text-red-500 z-50">
        &times;
    </button>

    <!-- Arrows -->
    <button onclick="event.stopPropagation(); showImage(currentIndex - 1)" class="absolute left-4 text-white text-4xl hover:text-red-500 z-50">&#8592;</button>
    <button onclick="event.stopPropagation(); showImage(currentIndex + 1)" class="absolute right-4 text-white text-4xl hover:text-red-500 z-50">&#8594;</button>

    <!-- Image -->
    <img id="fullscreenImage" src="" alt="Fullscreen Image" class="max-w-[90vw] max-h-[90vh] object-contain shadow-xl z-40" />
</div>

<script>
    const images = <?= json_encode(array_values($photos)) ?>;
    const dir = <?= json_encode($directory) ?>;
    let currentIndex = 0;

    function openFullscreen(index) {
        currentIndex = index;
        const modal = document.getElementById('fullscreenModal');
        const img = document.getElementById('fullscreenImage');
        img.src = `/images/${dir}/${basename(images[index])}`;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeFullscreen() {
        document.getElementById('fullscreenModal').classList.add('hidden');
        document.getElementById('fullscreenImage').src = '';
        document.body.style.overflow = '';
    }

    function basename(path) {
        return path.split('/').pop();
    }

    function showImage(index) {
        if (index >= 0 && index < images.length) {
            currentIndex = index;
            const img = document.getElementById('fullscreenImage');
            img.src = `/images/${dir}/${basename(images[currentIndex])}`;
        }
    }

    document.addEventListener('keydown', (e) => {
        const modalVisible = !document.getElementById('fullscreenModal').classList.contains('hidden');
        if (!modalVisible) return;

        if (e.key === 'Escape') {
            closeFullscreen();
        } else if (e.key === 'ArrowLeft') {
            showImage(currentIndex - 1);
        } else if (e.key === 'ArrowRight') {
            showImage(currentIndex + 1);
        }
    });
</script>
</div>
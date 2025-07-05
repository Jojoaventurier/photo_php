<h2 class="text-3xl font-bold mb-6">Photography Galleries</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    <?php foreach ($galleries as $gallery): ?>
        <?php
            // Get first image as cover
            $path = __DIR__ . "/../../public/images/photography/$gallery";
            $files = array_values(array_filter(scandir($path), function ($f) use ($path) {
                $fullPath = "$path/$f";
                $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
                return is_file($fullPath) && in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            }));

            $cover = count($files) > 0 ? $files[0] : null;
        ?>
        <a href="/art/photography/<?= urlencode($gallery) ?>" class="block group text-center">
            <?php if ($cover): ?>
                <img src="/images/photography/<?= $gallery ?>/<?= urlencode($cover) ?>"
                     alt="<?= $gallery ?>"
                     class="w-full h-64 object-cover rounded-lg shadow group-hover:opacity-80 transition" />
            <?php else: ?>
                <div class="w-full h-64 flex items-center justify-center bg-gray-200 rounded-lg">
                    <span class="text-gray-500">No images</span>
                </div>
            <?php endif; ?>
            <h3 class="mt-2 text-lg font-semibold"><?= ucfirst($gallery) ?></h3>
        </a>
    <?php endforeach; ?>
</div>
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


<div class="w-full grid grid-cols-2">
    <?php foreach ($galleries as $gallery): ?>
        <?php
            $path = __DIR__ . "/../../public/images/photography/$gallery";
            $files = array_values(array_filter(scandir($path), function ($f) use ($path) {
                $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
                return is_file("$path/$f") && in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            }));
            $cover = $files[0] ?? null;
        ?>
        <a href="/art/photography/<?= urlencode($gallery) ?>" class="block w-[80%] group mx-auto">
            <?php if ($cover): ?>
                <img src="/images/photography/<?= $gallery ?>/<?= urlencode($cover) ?>"
                     alt=""
                     class=" object-cover shadow group-hover:opacity-80 transition" />
            <?php else: ?>
                <div class="w-full h-64 flex items-center justify-center bg-gray-200">
                    <span class="text-gray-500">No images</span>
                </div>
            <?php endif; ?>
        </a>
    <?php endforeach; ?>
</div>
</div>
<?php
// Array hardcodé des titres de galleries (à ajouter en haut de votre fichier)
$galleryTitles = [
    'gallery1' => "Rose Sarajevo",
    'gallery2' => "Les Statues Meurent Aussi", 
    'gallery3' => "blabla",
    'gallery4' => "okidok",
    // Ajoutez vos titres selon les noms de vos dossiers de galleries
];
?>

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
    </div>
    <h2 class="text-2xl my-8 font-light underline">Photography</h2>
<div class="w-full max-w-[80%] grid grid-cols-1">
    <?php foreach ($galleries as $gallery): ?>
        <?php
            $path = __DIR__ . "/../../public/images/photography/$gallery";
            $files = array_values(array_filter(scandir($path), function ($f) use ($path) {
                $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
                return is_file("$path/$f") && in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            }));
            $cover = $files[0] ?? null;
            
            // Récupération du titre de la gallery
            $galleryTitle = $galleryTitles[$gallery] ?? ucfirst(str_replace(['_', '-'], ' ', $gallery));
        ?>
        <div class="inline-flex items-center justify-center mb-6">
            <a href="/art/photography/<?= urlencode($gallery) ?>" class="block group mr-8">
                <?php if ($cover): ?>
                    <div class="w-[32rem] h-96 bg-neutral-50 flex items-center justify-center overflow-hidden">
                        <img src="/images/photography/<?= $gallery ?>/<?= urlencode($cover) ?>"
                            alt=""
                            class="w-full h-full object-contain shadow group-hover:opacity-80 transition" />
                    </div>
                <?php else: ?>
                    <div class="w-[32rem] h-96 flex items-center justify-center bg-gray-200 font-light italic">
                        <span class="text-gray-500">No images</span>
                    </div>
                <?php endif; ?>
            </a>
        </div>
                    <div class="text-center font-light mb-12">
                <p><?= htmlspecialchars($galleryTitle) ?></p>
            </div>
    <?php endforeach; ?>
</div>
</div>
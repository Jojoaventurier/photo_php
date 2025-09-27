<?php 
     require_once __DIR__ . '../../../config.php'; 

// Hardcoded gallery titles
$galleryTitles = [
    'gallery1' => "Rose Sarajevo",
    'gallery2' => "Les Statues Meurent Aussi",
    // Add more titles based on your gallery folder names
];

// Normalize current URI for menu highlighting
$currentUri = rtrim($_SERVER['REQUEST_URI'], '/');
$isPhotographyPage = preg_match('#^/(art/)?photography#', $currentUri);
?>

<div class="min-h-screen flex flex-col items-center bg-neutral-50">  
    <!-- Header + Navigation -->
    <div class="inline-flex max-w-[80%] items-center mb-6 mt-6 w-full justify-between">
        <h1 class="text-4xl font-bold text-black">Marianne Marić</h1>

        <!-- Navigation -->
        <nav class="w-full">
            <ul id="main-menu" class="flex justify-center gap-12 text-lg font-extralight">
                <?php foreach ($menuItems as $item): ?>
                    <?php 
                        $hasChildren = !empty($item['children']); 
                        $isActive = ($_SERVER['REQUEST_URI'] === $item['route']); 
                    ?>
                    <li class="relative group <?= $hasChildren ? 'has-dropdown' : '' ?>">
                        <a href="<?= $item['route'] ?>"
                           class="hover:underline <?= $isActive ? 'underline' : '' ?>">
                            <?= htmlspecialchars($item['label']) ?>
                        </a>

                        <?php if ($hasChildren): ?>
                            <ul class="submenu absolute left-0 mt-2 bg-white rounded shadow-md py-2 space-y-1
                                       opacity-0 pointer-events-none transition-opacity duration-150">
                                <?php foreach ($item['children'] as $child): ?>
                                    <?php $isChildActive = ($_SERVER['REQUEST_URI'] === $child['route']); ?>
                                    <li>
                                        <a href="<?= $child['route'] ?>"
                                           class="block px-6 hover:bg-gray-100 hover:underline <?= $isChildActive ? 'underline' : '' ?>">
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

    <!-- Gallery Grid -->
    <div class="w-full max-w-[80%] flex flex-col justify-center items-center">
        <?php foreach ($galleries as $gallery): 
            $path = $_SERVER['DOCUMENT_ROOT'] . "/assets/images/photography/$gallery";

            $files = is_dir($path)
                ? array_values(array_filter(scandir($path), function($f) use($path){
                    $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
                    return is_file("$path/$f") && in_array($ext, ['jpg','jpeg','png','gif','webp']);
                }))
                : [];

            $cover = $files[0] ?? null;
            $galleryTitle = $galleryTitles[$gallery] ?? ucfirst(str_replace(['_', '-'], ' ', $gallery));
        ?>
        <div class="flex flex-col items-center justify-center mb-6">
            <a href="/photography/<?= urlencode($gallery) ?>" class="w-full">
                <?php if ($cover): ?>
                    <div class="w-[32rem] h-96 bg-white flex items-center justify-center overflow-hidden">
                        <img src="/assets/images/photography/<?= $gallery ?>/<?= urlencode($cover) ?>"
                             alt="<?= htmlspecialchars($galleryTitle) ?>"
                             class="w-full h-full object-contain shadow group-hover:opacity-80 transition" />
                    </div>
                <?php else: ?>
                    <div class="w-full aspect-[4/3] flex items-center justify-center bg-gray-200 font-light italic rounded-xl">
                        <span class="text-gray-500">No images</span>
                    </div>
                <?php endif; ?>
            </a>
            <p class="mt-4 text-center font-light text-gray-700"><?= htmlspecialchars($galleryTitle) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- templates/home.php -->
<div class="w-[1280px] flex items-center justify-center h-screen m-auto">
    <div class="w-1/2 mr-8 flex flex-col items-center justify-center">
        <h1 class="antic-didone-regular text-4xl mb-4">Photographer's Name</h1>

        <ul class="antic-didone-regular flex flex-col space-y-2">
            <?php foreach ($menuItems as $item): ?>
                <li>
                    <a href="<?= $item['route'] ?>" class="hover:underline cursor-pointer">
                        <?= htmlspecialchars($item['label']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="h-screen w-1/2 flex items-center">
        <img class="h-full object-contain" src="/img/scan0035-scaled.webp" alt="Schweissdissi par Marianne Maric">
    </div>
</div>
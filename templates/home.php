<!-- templates/home.php -->
<div class="w-[1280px] flex items-center justify-center h-screen m-auto bg-red-500 text-white">
    <div class="w-1/2 mr-8 flex flex-col items-center justify-center border  background">
        <h1 class="antic-didone-regular text-4xl mb-4 text-red-600">Marianne Marić</h1>

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

    <div class="h-screen w-1/2 flex items-center border">
        
    </div>
</div>
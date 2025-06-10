<!-- templates/home.php -->
<div class="w-[1280px] flex items-center justify-center h-screen m-auto">
    <div class="w-1/2 mr-8 flex flex-col items-center justify-center border bg-red-500 background">
        <h1 class="text-4xl mb-4 text-red-600">Marianne Marić</h1>

        <ul class="flex flex-col space-y-2">
            <?php foreach ($menuItems as $item): ?>
                <li>
                    <a href="<?= $item['route'] ?>" class="hover:underline cursor-pointer">
                        <?= htmlspecialchars($item['label']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="p-8">
        <h1 class="text-red-600">Should be red</h1>
        <div class="text-red-600 bg-white p-4">Red on white</div>
    </div>
    <div class="p-8">
        <h1 class="text-red-600 bg-white">FORCED RED TEST</h1>
        <div class="text-green-500">Green test</div>
    </div>
    <h1 class="force-red">Test</h1>

    <div class="h-screen w-1/2 flex items-center border">
        
    </div>
</div>
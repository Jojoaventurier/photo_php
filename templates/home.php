<!-- templates/home.php -->
<div class="min-h-screen flex flex-col items-center justify-center bg-neutral-50">
    <!-- Barre de navigation -->
    <nav class="mb-16 w-full">
        <ul class="flex justify-center gap-12 text-lg font-medium"
            x-data="{ openDropdown: false }">
            <?php foreach ($menuItems as $item): ?>
                <li class="relative group"
                    @mouseenter="openDropdown = <?= isset($item['children']) ? 'true' : 'false' ?>"
                    @mouseleave="openDropdown = false">
                    <a href="<?= $item['route'] ?>"
                       class="hover:underline">
                        <?= htmlspecialchars($item['label']) ?>
                    </a>

                    <?php if (!empty($item['children'])): ?>
                        <ul x-show="openDropdown"
                            x-transition
                            class="absolute left-0 mt-2 w-48 bg-white rounded shadow-md py-2 space-y-1"
                            @click.away="openDropdown = false">
                            <?php foreach ($item['children'] as $child): ?>
                                <li>
                                    <a href="<?= $child['route'] ?>"
                                       class="block px-4 py-2 hover:bg-gray-100">
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

    <!-- Contenu -->
    <h1 class="text-4xl font-bold text-red-600 mb-4">Marianne Marić</h1>
</div>
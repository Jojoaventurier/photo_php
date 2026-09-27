<?php use App\Template\View; ?>
<!-- Header + Navigation -->
<header class="w-full max-w-7xl mx-auto my-6 px-4 sm:px-6">
    <div class="flex items-center justify-center gap-4 lg:gap-10">
        <a href="/" class="shrink-0">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-black">Marianne Marić</h1>
        </a>

        <!-- Burger Menu Button (visible on mobile/tablet) -->
        <button id="burger-btn" type="button"
                class="lg:hidden relative z-50 flex flex-col gap-2.5 p-3"
                aria-label="Menu" aria-expanded="false" aria-controls="mobile-menu">
            <span class="w-8 h-0.5 bg-black transition-all duration-300"></span>
            <span class="w-8 h-0.5 bg-black transition-all duration-300"></span>
            <span class="w-8 h-0.5 bg-black transition-all duration-300"></span>
        </button>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:block" aria-label="Navigation principale">
            <ul class="flex gap-6 xl:gap-12 text-base xl:text-lg font-extralight whitespace-nowrap">
                <?php foreach ($menuItems as $item): ?>
                    <?php $isActive = View::isActive($item['route']); ?>
                    <li>
                        <a href="<?= View::e($item['route']) ?>"
                           class="hover:underline <?= $isActive ? 'underline' : '' ?>"
                           <?= $isActive ? 'aria-current="page"' : '' ?>>
                            <?= View::e($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>

    <!-- Mobile/Tablet Navigation (hidden by default, toggled by /js/main.js) -->
    <nav id="mobile-menu" aria-label="Navigation principale" inert
         class="lg:hidden fixed inset-0 z-40 bg-neutral-50 overflow-y-auto invisible translate-x-full transition-[transform,visibility] duration-300">
        <div class="flex flex-col items-center justify-center min-h-full py-20">
            <ul class="flex flex-col items-center gap-8 sm:gap-10 text-2xl sm:text-3xl font-extralight">
                <?php foreach ($menuItems as $item): ?>
                    <?php $isActive = View::isActive($item['route']); ?>
                    <li class="text-center">
                        <a href="<?= View::e($item['route']) ?>"
                           class="hover:underline <?= $isActive ? 'underline' : '' ?>"
                           <?= $isActive ? 'aria-current="page"' : '' ?>>
                            <?= View::e($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
</header>

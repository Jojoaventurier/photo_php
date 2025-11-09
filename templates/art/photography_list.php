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
    <div class="lg:max-w-[80%] mx-auto mb-6 mt-6 px-4 sm:px-6">
        <div class="inline-flex items-center">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-black">Marianne Marić</h1>

            <!-- Burger Menu Button (visible on mobile/tablet) -->
            <button id="burger-btn" class="lg:hidden flex flex-col gap-2.5 p-4 z-50" aria-label="Toggle menu">
                <span class="w-10 h-0.5 bg-black transition-all duration-300"></span>
                <span class="w-10 h-0.5 bg-black transition-all duration-300"></span>
                <span class="w-10 h-0.5 bg-black transition-all duration-300"></span>
            </button>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:block w-full ml-8">
                <ul class="flex justify-center gap-12 text-lg font-extralight">
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
                                        opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-opacity duration-150">
                                    <?php foreach ($item['children'] as $child): ?>
                                        <?php $isChildActive = ($_SERVER['REQUEST_URI'] === $child['route']); ?>
                                        <li>
                                            <a href="<?= $child['route'] ?>"
                                            class="block px-6 py-1 hover:bg-gray-100 hover:underline <?= $isChildActive ? 'underline' : '' ?>">
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

        <!-- Mobile/Tablet Navigation (Hidden by default) -->
        <nav id="mobile-menu" class="lg:hidden fixed inset-0 bg-neutral-50 z-40 transform translate-x-full transition-transform duration-300">
            <div class="flex flex-col items-center justify-center h-full">
                <ul class="flex flex-col items-center gap-10 text-3xl font-extralight">
                    <?php foreach ($menuItems as $item): ?>
                        <?php 
                            $hasChildren = !empty($item['children']); 
                            $isActive = ($_SERVER['REQUEST_URI'] === $item['route']); 
                        ?>
                        <li class="text-center">
                            <a href="<?= $item['route'] ?>"
                            class="hover:underline <?= $isActive ? 'underline' : '' ?>">
                                <?= htmlspecialchars($item['label']) ?>
                            </a>

                            <?php if ($hasChildren): ?>
                                <ul class="mt-6 space-y-4 text-xl">
                                    <?php foreach ($item['children'] as $child): ?>
                                        <?php $isChildActive = ($_SERVER['REQUEST_URI'] === $child['route']); ?>
                                        <li>
                                            <a href="<?= $child['route'] ?>"
                                            class="hover:underline <?= $isChildActive ? 'underline' : '' ?>">
                                                <?= htmlspecialchars($child['label']) ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Gallery Grid -->
    <div class="w-full max-w-6xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8 lg:gap-12">
            <?php foreach ($galleries as $gallery): 
                $path = $_SERVER['DOCUMENT_ROOT'] . "/images/photography/$gallery";

                $files = is_dir($path)
                    ? array_values(array_filter(scandir($path), function($f) use($path){
                        $ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
                        return is_file("$path/$f") && in_array($ext, ['jpg','jpeg','png','gif','webp']);
                    }))
                    : [];

                $cover = $files[0] ?? null;
                $galleryTitle = $galleryTitles[$gallery] ?? ucfirst(str_replace(['_', '-'], ' ', $gallery));
            ?>
            <div class="flex flex-col items-center">
                <a href="/photography/<?= urlencode($gallery) ?>" class="w-full group">
                    <?php if ($cover): ?>
                        <div class="w-full aspect-[4/3] bg-white flex items-center justify-center overflow-hidden rounded-xl shadow-lg">
                            <img src="/images/photography/<?= $gallery ?>/<?= urlencode($cover) ?>"
                                 alt="<?= htmlspecialchars($galleryTitle) ?>"
                                 class="w-full h-full object-cover group-hover:opacity-80 transition" />
                        </div>
                    <?php else: ?>
                        <div class="w-full aspect-[4/3] flex items-center justify-center bg-gray-200 font-light italic rounded-xl">
                            <span class="text-gray-500">No images</span>
                        </div>
                    <?php endif; ?>
                </a>
                <p class="mt-4 text-center font-light text-gray-700 text-lg"><?= htmlspecialchars($galleryTitle) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
// Burger menu functionality
const burgerBtn = document.getElementById('burger-btn');
const mobileMenu = document.getElementById('mobile-menu');
const burgerLines = burgerBtn.querySelectorAll('span');

burgerBtn.addEventListener('click', () => {
    const isOpen = mobileMenu.classList.contains('translate-x-0');
    
    if (isOpen) {
        // Close menu
        mobileMenu.classList.remove('translate-x-0');
        mobileMenu.classList.add('translate-x-full');
        
        // Reset burger lines
        burgerLines[0].classList.remove('rotate-45', 'translate-y-2.5');
        burgerLines[1].classList.remove('opacity-0');
        burgerLines[2].classList.remove('-rotate-45', '-translate-y-2.5');
    } else {
        // Open menu
        mobileMenu.classList.remove('translate-x-full');
        mobileMenu.classList.add('translate-x-0');
        
        // Animate burger to X
        burgerLines[0].classList.add('rotate-45', 'translate-y-2.5');
        burgerLines[1].classList.add('opacity-0');
        burgerLines[2].classList.add('-rotate-45', '-translate-y-2.5');
    }
});

// Close menu when clicking on a link
const mobileMenuLinks = mobileMenu.querySelectorAll('a');
mobileMenuLinks.forEach(link => {
    link.addEventListener('click', () => {
        mobileMenu.classList.remove('translate-x-0');
        mobileMenu.classList.add('translate-x-full');
        burgerLines[0].classList.remove('rotate-45', 'translate-y-2.5');
        burgerLines[1].classList.remove('opacity-0');
        burgerLines[2].classList.remove('-rotate-45', '-translate-y-2.5');
    });
});
</script>
<?php 
     require_once __DIR__ . '../../../config.php';  

$currentUri = rtrim($_SERVER['REQUEST_URI'], '/');
$isPhotographyPage = preg_match('#^/?photography/#', $currentUri);
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

    <!-- Scroll to Top Button -->
    <a href="#" class="fixed bottom-6 right-6 w-10 h-10 flex items-center justify-center bg-gray-800 text-white rounded-full shadow-md hover:bg-gray-700 transition-colors" title="Scroll to top">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
    </a>

    <!-- Full Images (Scroll Anchors) -->
    <div class="max-w-6xl space-y-16 px-4 py-4">
        <?php foreach ($photos as $index => $photo): ?>
            <img id="photo-<?= $index ?>"
                 src="/images/<?= $directory ?>/<?= basename($photo) ?>"
                 alt="Photo <?= $index + 1 ?>"
                 class="w-full max-h-[85vh] object-contain shadow-lg bg-white scroll-mt-24 cursor-zoom-in"
                 onclick="openFullscreen(<?= $index ?>)">
        <?php endforeach; ?>
    </div>
</div>

<!-- Fullscreen Modal -->
<div id="fullscreenModal" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center cursor-zoom-out">
    <button onclick="closeFullscreen(); event.stopPropagation();" class="absolute top-4 right-4 text-white text-3xl font-light hover:text-red-500 z-50">&times;</button>
    <button onclick="event.stopPropagation(); showImage(currentIndex - 1)" class="absolute left-4 text-white text-4xl hover:text-red-500 z-50">&#8592;</button>
    <button onclick="event.stopPropagation(); showImage(currentIndex + 1)" class="absolute right-4 text-white text-4xl hover:text-red-500 z-50">&#8594;</button>
    <img id="fullscreenImage" src="" alt="Fullscreen Image" class="max-w-[90vw] max-h-[90vh] object-contain shadow-xl z-40" />
</div>

<script>
    const images = <?= json_encode(array_values($photos)) ?>;
    const dir = <?= json_encode($directory) ?>;
    let currentIndex = 0;

    function basename(path) {
        return path.split('/').pop();
    }

    function openFullscreen(index) {
        currentIndex = index;
        const modal = document.getElementById('fullscreenModal');
        const img = document.getElementById('fullscreenImage');
        img.src = `/images/${dir}/${basename(images[index])}`;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeFullscreen() {
        document.getElementById('fullscreenModal').classList.add('hidden');
        document.getElementById('fullscreenImage').src = '';
        document.body.style.overflow = '';
    }

    function showImage(index) {
        if(index >= 0 && index < images.length) {
            currentIndex = index;
            document.getElementById('fullscreenImage').src = `/images/${dir}/${basename(images[currentIndex])}`;
        }
    }

    document.addEventListener('keydown', e => {
        const modalVisible = !document.getElementById('fullscreenModal').classList.contains('hidden');
        if(!modalVisible) return;

        if(e.key === 'Escape') closeFullscreen();
        else if(e.key === 'ArrowLeft') showImage(currentIndex - 1);
        else if(e.key === 'ArrowRight') showImage(currentIndex + 1);
    });

    // Scroll-to-top button
    document.querySelector('a[title="Scroll to top"]').addEventListener('click', e => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    
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

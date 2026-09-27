<?php use App\Template\View; ?>
<h2 class="sr-only"><?= View::e($galleryTitle) ?></h2>

<!-- Scroll to Top Button (shown once the visitor has scrolled) -->
<button type="button" id="scroll-top" aria-label="Retour en haut"
        class="fixed z-30 bottom-4 right-4 sm:bottom-6 sm:right-6 w-11 h-11 flex items-center justify-center bg-gray-800/80 text-white rounded-full shadow-md hover:bg-gray-700 transition-opacity opacity-0 pointer-events-none">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
    </svg>
</button>

<!-- Full Images -->
<div class="w-full max-w-6xl space-y-10 sm:space-y-16 px-4 pb-12">
    <?php foreach ($photos as $index => $photo): ?>
        <button type="button" class="block w-full cursor-zoom-in" data-index="<?= $index ?>"
                aria-label="Agrandir la photo <?= $index + 1 ?>">
            <img src="<?= View::e($photo['src']) ?>"
                 width="<?= $photo['width'] ?>" height="<?= $photo['height'] ?>"
                 <?= $index > 0 ? 'loading="lazy"' : 'fetchpriority="high"' ?>
                 decoding="async"
                 alt="<?= View::e($galleryTitle) ?> – photo <?= $index + 1 ?> sur <?= count($photos) ?>"
                 class="mx-auto w-auto h-auto max-w-full max-h-[85svh] object-contain shadow-lg">
        </button>
    <?php endforeach; ?>
</div>

<!-- Fullscreen Modal -->
<div id="fullscreenModal" role="dialog" aria-modal="true" aria-label="<?= View::e($galleryTitle) ?>"
     class="fixed inset-0 bg-black/90 z-50 hidden items-center justify-center cursor-zoom-out">
    <button type="button" data-action="close" aria-label="Fermer"
            class="absolute top-2 right-2 sm:top-4 sm:right-4 w-12 h-12 text-white text-4xl font-light hover:text-red-500 z-50">&times;</button>
    <button type="button" data-action="prev" aria-label="Photo précédente"
            class="absolute left-1 sm:left-4 w-12 h-12 text-white text-4xl hover:text-red-500 z-50">&#8592;</button>
    <button type="button" data-action="next" aria-label="Photo suivante"
            class="absolute right-1 sm:right-4 w-12 h-12 text-white text-4xl hover:text-red-500 z-50">&#8594;</button>
    <img id="fullscreenImage" src="" alt="" class="max-w-[90vw] max-h-[90svh] object-contain shadow-xl z-40 cursor-default" />
</div>

<script>
(() => {
    const images = <?= json_encode(array_column($photos, 'src')) ?>;
    const modal = document.getElementById('fullscreenModal');
    const img = document.getElementById('fullscreenImage');
    let currentIndex = 0;
    let lastFocus = null;

    function openFullscreen(index) {
        lastFocus = document.activeElement;
        showImage(index);
        modal.classList.replace('hidden', 'flex');
        document.body.style.overflow = 'hidden';
        modal.querySelector('[data-action="close"]').focus();
    }

    function closeFullscreen() {
        modal.classList.replace('flex', 'hidden');
        img.src = '';
        document.body.style.overflow = '';
        if (lastFocus) lastFocus.focus();
    }

    function showImage(index) {
        if (index >= 0 && index < images.length) {
            currentIndex = index;
            img.src = images[currentIndex];
            img.alt = `Photo ${currentIndex + 1} sur ${images.length}`;
        }
    }

    const isOpen = () => !modal.classList.contains('hidden');

    document.querySelectorAll('[data-index]').forEach(btn => {
        btn.addEventListener('click', () => openFullscreen(Number(btn.dataset.index)));
    });

    modal.addEventListener('click', e => {
        const action = e.target.closest('[data-action]')?.dataset.action;
        if (action === 'prev') showImage(currentIndex - 1);
        else if (action === 'next') showImage(currentIndex + 1);
        else if (action === 'close' || e.target === modal) closeFullscreen(); // click on the backdrop closes
    });

    document.addEventListener('keydown', e => {
        if (!isOpen()) return;
        if (e.key === 'Escape') closeFullscreen();
        else if (e.key === 'ArrowLeft') showImage(currentIndex - 1);
        else if (e.key === 'ArrowRight') showImage(currentIndex + 1);
    });

    // Swipe left/right on touch screens
    let touchX = null;
    modal.addEventListener('touchstart', e => { touchX = e.touches[0].clientX; }, { passive: true });
    modal.addEventListener('touchend', e => {
        if (touchX === null) return;
        const dx = e.changedTouches[0].clientX - touchX;
        if (Math.abs(dx) > 50) showImage(currentIndex + (dx < 0 ? 1 : -1));
        touchX = null;
    });

    // Scroll-to-top button
    const scrollTop = document.getElementById('scroll-top');
    const toggleScrollTop = () => {
        const show = window.scrollY > window.innerHeight;
        scrollTop.classList.toggle('opacity-0', !show);
        scrollTop.classList.toggle('pointer-events-none', !show);
    };
    window.addEventListener('scroll', toggleScrollTop, { passive: true });
    scrollTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
})();
</script>

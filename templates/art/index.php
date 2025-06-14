<!-- templates/art/index.php -->
<div class="min-h-screen flex flex-col items-center justify-center bg-neutral-50">
    
    <h1 class="text-4xl font-bold text-black mb-4">Marianne Marić</h1>
    <!-- Barre de navigation -->
    <nav class="mb-5 w-full">
        <ul id="main-menu" class="flex justify-center gap-12 text-lg font-medium">
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

    <!-- Contenu -->
    <div class="min-h-screen bg-white flex flex-col items-center justify-center">
        <h1 class="text-3xl font-semibold mb-6">Art</h1>
        <div class="flex gap-8">
            <a href="/photo_php/public/art/photography" class="hover:opacity-80">
                <img src="/photo_php/public/assets/images/photography.jpg" alt="Photography" class="w-64 h-64 object-cover rounded-lg shadow">
            </a>
            <a href="/photo_php/public/art/direction" class="hover:opacity-80">
                <img src="/photo_php/public/assets/images/art-direction.jpg" alt="Art Direction" class="w-64 h-64 object-cover rounded-lg shadow">
            </a>
        </div>
    </div>
</div>

<!-- Sous-menus déroulants sous 'Art' -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('#main-menu .has-dropdown').forEach(item => {
        const submenu = item.querySelector('.submenu');
        let hideTimer;                         // <- retarde la fermeture

        const show  = () => {
            clearTimeout(hideTimer);
            submenu.classList.remove('opacity-0','pointer-events-none');
            submenu.classList.add   ('opacity-100');
        };
        const hide  = () => {
            submenu.classList.add   ('opacity-0','pointer-events-none');
            submenu.classList.remove('opacity-100');
        };

        item.addEventListener('mouseenter', show);
        item.addEventListener('mouseleave', () => {
            hideTimer = setTimeout(hide, 200); // 200 ms de tolérance
        });

        // Si la souris entre directement dans le sous‑menu
        submenu.addEventListener('mouseenter', () => clearTimeout(hideTimer));
        submenu.addEventListener('mouseleave', () => hideTimer = setTimeout(hide, 200));

        // Clic en dehors → fermeture immédiate
        document.addEventListener('click', e => { if (!item.contains(e.target)) hide(); });
    });
});
</script>


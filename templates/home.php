<!-- templates/home.php -->
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
    <div>
        <img src="/images/sans-titre-4.jpg"
            alt="Mademoiselle prise en photo de dos, devant un mur de fleurs, noir et blanc, par Marianne Maric"
            class="w-full max-w-6xl h-auto rounded shadow-lg mb-8">
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
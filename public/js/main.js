// Burger menu
(() => {
    const burgerBtn = document.getElementById('burger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (!burgerBtn || !mobileMenu) return;

    const burgerLines = burgerBtn.querySelectorAll('span');

    function setMenu(open) {
        mobileMenu.classList.toggle('translate-x-full', !open);
        mobileMenu.classList.toggle('invisible', !open);
        mobileMenu.inert = !open;
        burgerBtn.setAttribute('aria-expanded', String(open));
        document.body.style.overflow = open ? 'hidden' : '';

        // Animate burger to X (lines are 2px tall with a 10px gap → 12px apart)
        burgerLines[0].classList.toggle('rotate-45', open);
        burgerLines[0].classList.toggle('translate-y-3', open);
        burgerLines[1].classList.toggle('opacity-0', open);
        burgerLines[2].classList.toggle('-rotate-45', open);
        burgerLines[2].classList.toggle('-translate-y-3', open);
    }

    const isOpen = () => burgerBtn.getAttribute('aria-expanded') === 'true';

    burgerBtn.addEventListener('click', () => setMenu(!isOpen()));

    // Close menu when clicking on a link
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => setMenu(false));
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape' && isOpen()) {
            setMenu(false);
            burgerBtn.focus();
        }
    });

    // Reset if the window grows past the lg breakpoint while open
    window.matchMedia('(min-width: 1024px)').addEventListener('change', e => {
        if (e.matches && isOpen()) setMenu(false);
    });
})();

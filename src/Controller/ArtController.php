<?php
namespace App\Controller;

use App\Template\View;

class ArtController
{
    /* --------  MENU COMMUN  -------- */
    private function getMenu(): array
    {
        return [
            ['label' => 'Home', 'route' => '/home'],
            [
                'label' => 'Art',
                'route' => '/art',
                'children' => [
                    ['label' => 'Photography',    'route' => '/art/photography'],
                    ['label' => 'Art Direction',  'route' => '/art/direction'],
                ],
            ],
            ['label' => 'Books & Exhibitions', 'route' => '/books'],
            ['label' => 'Contact',             'route' => '/contact'],
        ];
    }

    /* --------  PAGES  -------- */
    public function index(): string
    {
        return View::render('art/index', [
            'title'     => 'Art',
            'menuItems' => $this->getMenu(),
        ]);
    }

    public function photography(): string
    {
        $photos = $this->loadGallery('gallery1');   // dossiers: public/images/gallery1
        return View::render('art/gallery', [
            'title'     => 'Photography',
            'menuItems' => $this->getMenu(),
            'photos'    => $photos,
        ]);
    }

    public function direction(): string
    {
        $photos = $this->loadGallery('gallery2');   // dossiers: public/images/gallery2
        return View::render('art/gallery', [
            'title'     => 'Art Direction',
            'menuItems' => $this->getMenu(),
            'photos'    => $photos,
        ]);
    }

    /* --------  UTILITAIRE  -------- */
    /**
     * Renvoie les chemins publics des images d'un dossier de /public/images/{folder}
     *
     * @param  string $folder  ex. 'gallery1'
     * @return string[]        ex. ['/images/gallery1/photo1.jpg', ...]
     */
    private function loadGallery(string $folder): array
    {
        $dir = __DIR__ . '/../../public/images/' . $folder;
        $files = glob($dir . '/*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE);

        // Convertit le chemin absolu en chemin public
        return array_map(
            fn(string $f) => '/images/' . $folder . '/' . basename($f),
            $files ?: []
        );
    }

    public function showGallery(array $params): string
{
    $slug   = $params['gallery'];      // ex. 'photography'
    $photos = $this->loadGallery($slug);
    return View::render('art/gallery', [
        'title'     => ucfirst($slug),
        'menuItems' => $this->getMenu(),
        'photos'    => $photos,
    ]);
}
}
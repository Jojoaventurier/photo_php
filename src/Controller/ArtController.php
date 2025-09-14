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
            ['label' => 'Photography', 'route' => '/photography'], // Top-level now

            // ❌ Temporarily hidden
            /*
            [
                'label' => 'Art',
                'route' => '/art',
                'children' => [
                    ['label' => 'Photography (in Art)', 'route' => '/art/photography'],
                    ['label' => 'Art Direction',        'route' => '/art/direction'],
                ],
            ],
            */

            ['label' => 'Books & Exhibitions', 'route' => '/exhibitions-books'],
            ['label' => 'Contact',             'route' => '/contact'],
        ];
    }

    /* --------  PAGES  -------- */


    public function photography(): string
    {
        $photos = $this->loadGallery('gallery1');   // dossiers: public/images/gallery1
        return View::render('art/photography', [
            'title'     => 'Photography',
            'menuItems' => $this->getMenu(),
            'photos'    => $photos,
        ]);
    }

    public function direction(): string
    {
        $photos = $this->loadGallery('gallery2');   // dossiers: public/images/gallery2
        return View::render('art/photography', [
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

    public function photographyList(): string
    {
        // Each gallery folder must exist under /public/images/photography/
        $galleries = ['gallery1', 'gallery2'];  // You can dynamically scan the folder too

        return View::render('art/photography_list', [
            'title' => 'Photography Galleries',
            'menuItems' => $this->getMenu(),
            'galleries' => $galleries,
        ]);
    }

    public function showPhotographyGallery(string $gallery): string
    {
        $galleryPath = "photography/$gallery";

        $photos = $this->loadGallery($galleryPath);

        if (empty($photos)) {
            return View::render('error/404', [
                'title' => 'Gallery Not Found',
                'menuItems' => $this->getMenu(),
            ]);
        }

        return View::render('art/photography_gallery', [
            'title'     => ucfirst($gallery),
            'menuItems' => $this->getMenu(),
            'photos'    => $photos,
            'slug'      => $gallery,
            'directory' => $galleryPath,
        ]);
    }

}
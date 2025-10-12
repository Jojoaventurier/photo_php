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
            ['label' => 'Photography', 'route' => '/photography'],
            ['label' => 'Art Direction', 'route' => '/art-direction'],
            ['label' => 'Exhibitions & Books', 'route' => '/exhibitions-books'],
            ['label' => 'Contact', 'route' => '/contact'],
        ];
    }

    /* --------  PAGES  -------- */

    public function direction(): string
    {
        $photos = $this->loadGallery('art-direction'); // folder under /assets/images/art-direction
        return View::render('art/direction', [
            'title'     => 'Art Direction',
            'menuItems' => $this->getMenu(),
            'photos'    => $photos,
        ]);
    }

    public function photographyList(): string
    {
        // Each gallery folder must exist under /assets/images/photography/
        $galleries = ['gallery1', 'gallery2']; // You can dynamically scan the folder if needed

        return View::render('art/photography_list', [
            'title'     => 'Photography Galleries',
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
                'title'     => 'Gallery Not Found',
                'menuItems' => $this->getMenu(),
            ]);
        }

        return View::render('art/photography_gallery', [
            'title'     => ucfirst(str_replace(['-', '_'], ' ', $gallery)),
            'menuItems' => $this->getMenu(),
            'photos'    => $photos,
            'slug'      => $gallery,
            'directory' => $galleryPath,
        ]);
    }

    /* --------  UTILITAIRE  -------- */
    /**
     * Load images from a folder under /images/{folder}
     *
     * @param string $folder
     * @return string[] Array of public URLs
     */
    private function loadGallery(string $folder): array
    {
        $dir = __DIR__ . '/../../public/images/' . $folder;
        $files = glob($dir . '/*.{jpg,jpeg,png,webp,gif}', GLOB_BRACE);

        return array_map(
            fn(string $f) => '/public/images/' . $folder . '/' . basename($f),
            $files ?: []
        );
    }
}
<?php
namespace App\Controller;

use App\Template\View;

class ArtController
{
    /** Gallery folders under /public/images/photography/ => displayed title */
    private const GALLERIES = [
        'gallery1' => 'Rose Sarajevo',
        'gallery2' => 'Les Statues Meurent Aussi',
    ];

    private const IMAGE_EXTENSIONS = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    /* --------  PAGES  -------- */

    public function photographyList(): string
    {
        $galleries = [];
        foreach (self::GALLERIES as $slug => $title) {
            $photos = $this->loadGallery("photography/$slug");
            $galleries[] = [
                'slug'  => $slug,
                'title' => $title,
                'cover' => $photos[0] ?? null,
            ];
        }

        return View::render('art/photography_list', [
            'title'     => 'Photography – Marianne Marić',
            'galleries' => $galleries,
        ]);
    }

    public function showPhotographyGallery(string $gallery): string
    {
        // Only known galleries: also prevents browsing other folders via the URL
        $photos = isset(self::GALLERIES[$gallery]) ? $this->loadGallery("photography/$gallery") : [];

        if (empty($photos)) {
            return ErrorController::notFound();
        }

        return View::render('art/photography_gallery', [
            'title'        => self::GALLERIES[$gallery] . ' – Marianne Marić',
            'galleryTitle' => self::GALLERIES[$gallery],
            'photos'       => $photos,
            'ogImage'      => $photos[0]['src'],
        ]);
    }

    /* --------  UTILITAIRE  -------- */
    /**
     * Load images from a folder under /public/images/{folder}
     * (extension check is case-insensitive: .JPG must work on Linux too)
     *
     * @return array<array{src: string, width: int, height: int}>
     */
    private function loadGallery(string $folder): array
    {
        $dir = __DIR__ . '/../../public/images/' . $folder;
        $files = array_filter(
            glob($dir . '/*') ?: [],
            fn(string $f) => is_file($f)
                && in_array(strtolower(pathinfo($f, PATHINFO_EXTENSION)), self::IMAGE_EXTENSIONS, true)
        );
        natcasesort($files);

        return array_values(array_map(function (string $f) use ($folder) {
            [$width, $height] = getimagesize($f) ?: [0, 0];
            return [
                'src'    => '/images/' . $folder . '/' . rawurlencode(basename($f)),
                'width'  => $width,
                'height' => $height,
            ];
        }, $files));
    }
}

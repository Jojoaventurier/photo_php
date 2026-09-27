<?php use App\Template\View; ?>
<!-- Gallery Grid -->
<div class="w-full max-w-6xl px-4 sm:px-6 lg:px-8 mb-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
        <?php foreach ($galleries as $gallery): ?>
            <div class="flex flex-col items-center">
                <a href="/photography/<?= rawurlencode($gallery['slug']) ?>" class="w-full group">
                    <?php if ($gallery['cover']): ?>
                        <div class="w-full aspect-[4/3] bg-white overflow-hidden rounded-xl shadow-lg">
                            <img src="<?= View::e($gallery['cover']['src']) ?>"
                                 width="<?= $gallery['cover']['width'] ?>" height="<?= $gallery['cover']['height'] ?>"
                                 alt="<?= View::e($gallery['title']) ?>"
                                 class="w-full h-full object-cover group-hover:opacity-80 transition" />
                        </div>
                    <?php else: ?>
                        <div class="w-full aspect-[4/3] flex items-center justify-center bg-gray-200 font-light italic rounded-xl">
                            <span class="text-gray-500">No images</span>
                        </div>
                    <?php endif; ?>
                    <p class="mt-4 text-center font-light text-gray-700 text-lg group-hover:underline"><?= View::e($gallery['title']) ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

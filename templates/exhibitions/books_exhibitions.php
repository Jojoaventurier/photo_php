
<div class="min-h-screen flex flex-col items-center bg-neutral-50">  
    <div class="inline-flex max-w-[80%] items-center mb-6 mt-6">
        <h1 class="text-4xl font-bold text-black">Marianne Marić</h1>

        <!-- Barre de navigation -->
        <nav class="w-full">
            <ul id="main-menu" class="flex justify-center gap-12 text-lg font-extralight">
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
    </div>

    <div class="w-full my-auto max-w-[80%] grid grid-cols-1">
        <p class=text-justify>
            Marianne Marić (née en 1982) est photographe.



        Sa pratique de l’argentique n’exclut pas des projets relevant de la sculpture, de la chorégraphie et de la vidéo, et motive de nombreuses

        collaborations. Son parcours photographique s’enrichit des communautés que l’artiste traverse, en immortalisant leurs manières de faire

        corps. Alsacienne née en 1982, elle se forme à l’École Nationale Supérieure d’Art et de Design de Nancy, puis au National College of Art

        and Design de Dublin d’où elle sort diplômée d’un Master en 2009. Elle aiguise sa technique en assistant de nombreux photographes, tant documentaires que de mode, et se perfectionne au tirage dans le mythique labo parisien Imaginoir, sans cesser de regarder la peinture, et notamment les tableaux de Jean-Jacques Henner (1829-1905).

        Sa photographie vient de faire l'affiche de l'exposition La République Cynique au Palais de Tokyo (novembre 2024) et de nombreux projets arrivent, notammement la suite d'une collaboration avec Pierre Bal-Blanc ( depuis 2009 ) et une résidence photographique en Albanie au printemps 2025. L'an dernier elle a été marraine de promotion pour enseigner l'Image à l'Ecole Duperré, et continue l'enseignement par intermittence (Beaux-Arts d'Athènes). Son art flirte avec les grands écarts; engagement social avec des performances mais aussi céramiques utilitaires, il n'y a pas de limites et elle s'attribue la notion de se faire plaisir surtout en échangeant avec ses pairs, notamment Mireille Blanc, avec qui elle partage l'amour de la Peinture, qu'elle cotoie depuis 2007.
        </p>
    </div>
</div>
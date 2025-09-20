
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

<div class="flex flex-col md:flex-row items-start md:items-center gap-8 max-w-5xl mx-auto px-4">
    <!-- Image -->
    <div class="flex-shrink-0 text-center">
        <img src="/images/marianne.jpg"
             alt="Marianne Maric"
             class="w-40 md:w-48 h-auto rounded shadow-lg">
    </div>

    <!-- Text -->
    <div class="flex-1">
        <p class="text-justify font-light">
            Marianne Marić (née en 1982) est photographe.
            <br><br>
            Sa pratique de l’argentique n’exclut pas des projets relevant de la sculpture, de la chorégraphie et de la vidéo, et motive de nombreuses
            collaborations. Son parcours photographique s’enrichit des communautés que l’artiste traverse, en immortalisant leurs manières de faire
            corps. Alsacienne née en 1982, elle se forme à l’École Nationale Supérieure d’Art et de Design de Nancy, puis au National College of Art
            and Design de Dublin d’où elle sort diplômée d’un Master en 2009. Elle aiguise sa technique en assistant de nombreux photographes, tant documentaires que de mode, et se perfectionne au tirage dans le mythique labo parisien Imaginoir, sans cesser de regarder la peinture, et notamment les tableaux de Jean-Jacques Henner (1829-1905).
            <br><br>
            Sa photographie vient de faire l'affiche de l'exposition La République Cynique au Palais de Tokyo (novembre 2024) et de nombreux projets arrivent, notamment la suite d'une collaboration avec Pierre Bal-Blanc (depuis 2009) et une résidence photographique en Albanie au printemps 2025. L'an dernier elle a été marraine de promotion pour enseigner l'Image à l'École Duperré, et continue l'enseignement par intermittence (Beaux-Arts d'Athènes). Son art flirte avec les grands écarts; engagement social avec des performances mais aussi céramiques utilitaires, il n'y a pas de limites et elle s'attribue la notion de se faire plaisir surtout en échangeant avec ses pairs, notamment Mireille Blanc, avec qui elle partage l'amour de la Peinture, qu'elle côtoie depuis 2007.
        </p>
    </div>
</div>

<section class="max-w-6xl mx-auto px-4 my-12 grid grid-cols-1 md:grid-cols-2 gap-12">
  <!-- Exhibitions (left column) -->
  <div>
    <h2 class="text-2xl font-light mb-8 text-center">Expositions</h2>
    <div class="relative border-l border-gray-300">
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="font-semibold">« Dirty Rains » – CEAAC, Strasbourg</h3>
        <p class="text-sm text-gray-600">05.10.24 → 23.02.25</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="font-semibold">« Se Faire Plaisir » – La Kunsthalle, Mulhouse</h3>
        <p class="text-sm text-gray-600">14.02 → 27.04.25</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="font-semibold">En résidence – Vila 31 × Art Explora, Tirana</h3>
        <p class="text-sm text-gray-600">01.01 → 31.03.25</p>
      </div>
    </div>

    <!-- Separator -->
    <div class="my-12 border-t border-gray-300"></div>

    <!-- Past Exhibitions -->
    <div class="relative border-l border-gray-300">
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="">La République Cynique – Palais de Tokyo, Paris</h3>
        <p class="text-sm text-gray-600">2024</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="">Photo London – Londres</h3>
        <p class="text-sm text-gray-600">2022</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="">Biennale d’Athènes – Athènes</h3>
        <p class="text-sm text-gray-600">2018</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="">Filles de l’Est – La Filature, Mulhouse</h3>
        <p class="text-sm text-gray-600">2017</p>
      </div>
    </div>
  </div>

  <!-- PDFs Section (right column) -->
<div>
        <h2 class="text-2xl -light mb-8 text-center">Publications</h2>
        <div class="grid grid-cols-1 gap-6">
            <div class="border rounded-lg shadow p-4 flex justify-between items-center">
                <h3 class="text-sm">Portrait - NY Magazine</h3>
                <a href="/pdf/NYMagazine.pdf" target="_blank" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
                </svg>
                </a>
            </div>

            <div class="border rounded-lg shadow p-4 flex justify-between items-center">
                <h3 class="text-sm">Photo London 2024</h3>
                <a href="/pdf/PhotoLondon-1.pdf" target="_blank" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
                </svg>
                </a>
            </div>

            <div class="border rounded-lg shadow p-4 flex justify-between items-center">
                <h3 class="text-sm">Portrait - Magazine Poly</h3>
                <a href="/pdf/Marianne-Maric.pdf" target="_blank" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
                </svg>
                </a>
            </div>

            <div class="border rounded-lg shadow p-4 flex justify-between items-center">
                <h3 class="text-sm">Filles de l'Est</h3>
                <a href="/pdf/FILLESDELEST_Dossier.pdf" target="_blank" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
                </svg>
                </a>
            </div>

            <div class="border rounded-lg shadow p-4 flex justify-between items-center">
                <h3 class="text-sm">Selected Works</h3>
                <a href="/pdf/SelectionMM-2.pdf" target="_blank" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
                </svg>
                </a>
            </div>

            <div class="border rounded-lg shadow p-4 flex justify-between items-center">
                <h3 class="text-sm">Biographies</h3>
                <a href="/pdf/maric_biographies.pdf" target="_blank" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
                </svg>
                </a>
            </div>
        </div>
</div>
  </div>
</section>
</div>
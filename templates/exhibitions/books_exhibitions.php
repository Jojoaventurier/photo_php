<?php require_once __DIR__ . '../../../config.php'; ?>
<div class="min-h-screen flex flex-col items-center bg-neutral-50">  
    <div class="inline-flex max-w-[80%] items-center mb-6 mt-6">
        <h1 class="text-4xl font-bold text-black">Marianne Marić</h1>

        <!-- Barre de navigation -->
        <nav class="w-full">
          <ul id="main-menu" class="flex justify-center gap-12 text-lg font-extralight">
              <?php foreach ($menuItems as $item): ?>
                  <?php 
                      $hasChildren = !empty($item['children']); 
                      $isActive = ($_SERVER['REQUEST_URI'] === $item['route']); 
                  ?>
                  <li class="relative group <?= $hasChildren ? 'has-dropdown' : '' ?>">
                      <a href="<?= $item['route'] ?>"
                        class="hover:underline <?= $isActive ? 'underline' : '' ?>">
                          <?= htmlspecialchars($item['label']) ?>
                      </a>

                      <?php if ($hasChildren): ?>
                          <ul class="submenu absolute left-0 mt-2 bg-white rounded shadow-md py-2 space-y-1
                                  opacity-0 pointer-events-none transition-opacity duration-150">
                              <?php foreach ($item['children'] as $child): ?>
                                  <?php $isChildActive = ($_SERVER['REQUEST_URI'] === $child['route']); ?>
                                  <li>
                                      <a href="<?= $child['route'] ?>"
                                        class="block px-6 hover:bg-gray-100 hover:underline <?= $isChildActive ? 'underline' : '' ?>">
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
    Marianne Marić (born 1982) is a photographer.
    <br><br>
    Her practice in analog photography does not exclude projects in sculpture, choreography, and video, and has inspired numerous collaborations. Her photographic journey is enriched by the communities she engages with, capturing the ways they embody themselves. Born in Alsace in 1982, she trained at the École Nationale Supérieure d’Art et de Design in Nancy, then at the National College of Art and Design in Dublin, where she earned a Master’s degree in 2009. She honed her technique by assisting numerous photographers, both documentary and fashion, and perfected her printing skills at the legendary Parisian lab Imaginoir, all while continuing to study painting, particularly the works of Jean-Jacques Henner (1829–1905).
    <br><br>
    Her photography was recently featured on the poster for the exhibition <em>La République Cynique</em> at Palais de Tokyo (November 2024), and several projects are forthcoming, including a continuation of her long-term collaboration with Pierre Bal-Blanc (since 2009) and a photographic residency in Albania in spring 2025. Last year, she served as a mentor for teaching Image at École Duperré and continues to teach intermittently (Beaux-Arts of Athens). Her art flirts with wide-ranging practices: socially engaged performances alongside utilitarian ceramics, with no boundaries. Above all, she values the joy of creation and exchange with her peers, notably Mireille Blanc, with whom she has shared a passion for painting since 2007.
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
        <h2 class="text-2xl font-light mb-8 text-center">Publications</h2>
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
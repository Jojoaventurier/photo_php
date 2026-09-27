<?php
$publications = [
    "NYMagazine.pdf"           => "Portrait - NY Magazine",
    "PhotoLondon-1.pdf"        => "Photo London 2024",
    "Marianne-Maric.pdf"       => "Portrait - Magazine Poly",
    "FILLESDELEST_Dossier.pdf" => "Filles de l'Est",
    "SelectionMM-2.pdf"        => "Selected Works",
    "maric_biographies.pdf"    => "Biographies",
];
?>
<div class="flex flex-col md:flex-row items-start md:items-center gap-8 max-w-5xl mx-auto px-4 sm:px-6">
    <!-- Image -->
    <div class="flex-shrink-0 text-center w-full md:w-auto">
        <img src="/images/marianne.jpg"
             alt="Portrait de Marianne Marić"
             class="w-48 sm:w-56 md:w-48 h-auto rounded shadow-lg mx-auto">
    </div>

    <!-- Text -->
    <div class="flex-1">
<p class="text-left md:text-justify font-light text-base sm:text-lg leading-relaxed">
    Marianne Marić (born 1982) is a photographer.
    <br><br>
    Her practice in analog photography does not exclude projects in sculpture, choreography, and video, and has inspired numerous collaborations. Her photographic journey is enriched by the communities she engages with, capturing the ways they embody themselves. Born in Alsace in 1982, she trained at the École Nationale Supérieure d'Art et de Design in Nancy, then at the National College of Art and Design in Dublin, where she earned a Master's degree in 2009. She honed her technique by assisting numerous photographers, both documentary and fashion, and perfected her printing skills at the legendary Parisian lab Imaginoir, all while continuing to study painting, particularly the works of Jean-Jacques Henner (1829–1905).
    <br><br>
    Her photography was recently featured on the poster for the exhibition <em>La République Cynique</em> at Palais de Tokyo (November 2024), and several projects are forthcoming, including a continuation of her long-term collaboration with Pierre Bal-Blanc (since 2009) and a photographic residency in Albania in spring 2025. Last year, she served as a mentor for teaching Image at École Duperré and continues to teach intermittently (Beaux-Arts of Athens). Her art flirts with wide-ranging practices: socially engaged performances alongside utilitarian ceramics, with no boundaries. Above all, she values the joy of creation and exchange with her peers, notably Mireille Blanc, with whom she has shared a passion for painting since 2007.
</p>

    </div>
</div>

<section class="max-w-6xl mx-auto px-4 sm:px-6 my-12 grid grid-cols-1 lg:grid-cols-2 gap-12">
  <!-- Exhibitions (left column on desktop, first on mobile) -->
  <div>
    <h2 class="text-2xl sm:text-3xl font-light mb-8 text-center">Expositions</h2>
    <div class="relative border-l border-gray-300">
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="font-semibold text-base sm:text-lg">« Dirty Rains » – CEAAC, Strasbourg</h3>
        <p class="text-sm sm:text-base text-gray-600">05.10.24 → 23.02.25</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="font-semibold text-base sm:text-lg">« Se Faire Plaisir » – La Kunsthalle, Mulhouse</h3>
        <p class="text-sm sm:text-base text-gray-600">14.02 → 27.04.25</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="font-semibold text-base sm:text-lg">En résidence – Vila 31 × Art Explora, Tirana</h3>
        <p class="text-sm sm:text-base text-gray-600">01.01 → 31.03.25</p>
      </div>
    </div>

    <!-- Separator -->
    <div class="my-12 border-t border-gray-300"></div>

    <!-- Past Exhibitions -->
    <div class="relative border-l border-gray-300">
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="text-base sm:text-lg">La République Cynique – Palais de Tokyo, Paris</h3>
        <p class="text-sm sm:text-base text-gray-600">2024</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="text-base sm:text-lg">Photo London – Londres</h3>
        <p class="text-sm sm:text-base text-gray-600">2022</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="text-base sm:text-lg">Biennale d'Athènes – Athènes</h3>
        <p class="text-sm sm:text-base text-gray-600">2018</p>
      </div>
      <div class="mb-8 ml-6">
        <div class="absolute w-3 h-3 bg-black rounded-full -left-1.5 mt-1"></div>
        <h3 class="text-base sm:text-lg">Filles de l'Est – La Filature, Mulhouse</h3>
        <p class="text-sm sm:text-base text-gray-600">2017</p>
      </div>
    </div>
  </div>

  <!-- PDFs Section (right column on desktop, second on mobile) -->
  <div>
    <h2 class="text-2xl sm:text-3xl font-light mb-8 text-center">Publications</h2>
    <div class="grid grid-cols-1 gap-6">
      <?php foreach ($publications as $pdf => $label): ?>
        <a href="/pdf/<?= $pdf ?>" target="_blank" rel="noopener"
           class="border rounded-lg shadow p-4 sm:p-5 flex justify-between items-center gap-4 text-gray-900 hover:bg-white hover:shadow-md transition">
          <h3 class="text-base sm:text-lg"><?= $label ?></h3>
          <span class="text-gray-500 flex items-center gap-2 shrink-0">
            <span class="text-xs uppercase tracking-wide">PDF</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12v8m0 0l-4-4m4 4l4-4M12 4v8" />
            </svg>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

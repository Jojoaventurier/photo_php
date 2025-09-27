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

<div class="max-w-6xl mt-12 mx-auto p-6 space-y-10">

  <!-- COVER EN HAUT -->
  <div>
    <img src="/assets/images/art-direction/lampgirl.jpg" alt="Cover" 
         class="w-full max-h-[600px] object-cover rounded-2xl shadow-xl" />
  </div>

  <!-- GALERIE MAGAZINE -->
  <div class="grid grid-cols-6 gap-6 auto-rows-[300px]">

    <!-- Trois grandes images style Kool Keith -->
    <div class="col-span-3 row-span-2">
      <img src="/assets/images/art-direction/logistic_records_kool_keith_final_selection-1.webp" alt="Grande 1" 
           class="w-full h-full object-cover rounded-2xl shadow-lg" />
    </div>

    <div class="col-span-3 row-span-2">
      <img src="/assets/images/art-direction/logistic_records_kool_keith_final_selection-2.webp" alt="Grande 2" 
           class="w-full h-full object-cover rounded-2xl shadow-lg" />
    </div>

    <!-- Dernière grande image pleine largeur -->
    <div class="col-span-6 row-span-2">
      <img src="/assets/images/art-direction/logistic_records_kool_keith_final_selection-3.webp" alt="Grande 3 pleine largeur" 
           class="w-full h-full object-cover rounded-2xl shadow-lg" />
    </div>

    <!-- Petite photo carrée (mise en valeur) -->
    <div class="col-span-3 row-span-2">
      <img src="/assets/images/art-direction/51+EFF-BxVL-1.jpg" alt="Petit carré" 
           class="w-full h-full object-cover rounded-2xl shadow-lg" />
    </div>

    <!-- Photo carrée (mise en valeur) -->
    <div class="col-span-3 row-span-2">
      <img src="/assets/images/art-direction/BOTH-WAYS-ENSEMBLE-2-ok.webp" alt="Carré" 
           class="w-full h-full object-cover rounded-2xl shadow-lg" />
    </div>

  </div>
</div>
</div>
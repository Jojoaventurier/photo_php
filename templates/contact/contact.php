<?php require_once __DIR__ . '/config.php'; ?>
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

<section class="mt-20 text-center">
      <div class="m-auto">
        <img src="/assets/images/contact.jpg"
            alt="Jeune femme dans une cabane sur une montagne, par Marianne Maric"
            class="w-full max-w-6xl h-auto rounded shadow-lg mb-8">
    </div>
    <div class="m-8">
        <h2 class="font-light text-gray-700">contact@mariannemaric.com</h2>
    </div>
  
  <div class="flex justify-center space-x-8 mb-6">
    <!-- Instagram -->
    <div class="flex flex-col items-center">
      <a href="https://www.instagram.com/mariannemaricstudio/" target="_blank" class="text-gray-600 hover:text-gray-800">
        <!-- SVG icon unchanged -->
      </a>
      <span class="text-xs mt-1 font-light">Instagram</span>
    </div>

    <!-- Vimeo -->
    <div class="flex flex-col items-center">
      <a href="https://vimeo.com/mariannemaric" target="_blank" class="text-gray-600 hover:text-gray-800">
        <!-- SVG icon unchanged -->
      </a>
      <span class="text-xs mt-1 font-light">Vimeo</span>
    </div>

    <!-- Tumblr -->
    <div class="flex flex-col items-center">
      <a href="https://www.tumblr.com/mariannemaric?redirect_to=%2Fmariannemaric&source=content_warning_wall" target="_blank" class="text-gray-600 hover:text-gray-800">
        <!-- SVG icon unchanged -->
      </a>
      <span class="text-xs mt-1 font-light">Tumblr</span>
    </div>

    <!-- Facebook -->
    <div class="flex flex-col items-center">
      <a href="https://www.facebook.com/mariannemaricphotographie/" target="_blank" class="text-gray-600 hover:text-gray-800">
        <!-- SVG icon unchanged -->
      </a>
      <span class="text-xs mt-1 font-light">Facebook</span>
    </div>
  </div>
</section>
</div>
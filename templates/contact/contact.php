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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">


          <path d="M7.75 2h8.5C19.55 2 22 4.46 22 7.75v8.5C22 19.55 19.54 22 16.25 22h-8.5C4.46 22 2 19.54 2 16.25v-8.5C2 4.46 4.46 2 7.75 2zm0 2C5.68 4 4 5.68 4 7.75v8.5C4 18.32 5.68 20 7.75 20h8.5c2.07 0 3.75-1.68 3.75-3.75v-8.5C20 5.68 18.32 4 16.25 4h-8.5zm8.75 1a1 1 0 110 2 1 1 0 010-2zM12 7a5 5 0 110 10 5 5 0 010-10zm0 2a3 3 0 100 6 3 3 0 000-6z"/>


        </svg>
      </a>
      <span class="text-xs mt-1 font-light">Instagram</span>
    </div>

    <!-- Vimeo -->
    <div class="flex flex-col items-center">
      <a href="https://vimeo.com/mariannemaric" target="_blank" class="text-gray-600 hover:text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">


          <path d="M22 6.08c-.07 1.57-1.17 3.72-3.29 6.44-2.19 2.84-4.05 4.26-5.56 4.26-1.17 0-2.16-1.09-3.03-3.27-.55-2.09-1.11-4.18-1.67-6.27C8.72 4.48 9.93 3 11.65 3c1.03 0 1.71.7 2.03 2.1.24 1.05.43 2.1.61 3.15.21 1.39.43 2.61.66 3.67.31 1.35.61 2.03.91 2.03.4 0 1.02-.58 1.88-1.75 1.21-1.74 1.87-3.05 1.99-3.85.15-1.03-.24-1.51-1.16-1.46-1.07.05-1.89.69-2.46 1.89-.39.8-.79 1.6-1.21 2.41-.41.78-.71 1.18-.9 1.18-.17 0-.4-.73-.66-2.19-.25-1.4-.5-2.8-.76-4.19C9.9 2.7 9.33 2 8.35 2 7.04 2 5.93 3.01 5.02 5.05c-.88 1.84-1.48 3.54-1.82 5.1C2.55 12.68 2 14 2 14s1.5.09 3.02-1.57c1.36-1.4 2.49-2.76 3.39-4.08.73-1.07 1.38-1.63 1.97-1.63.63 0 1.08.72 1.33 2.16.21 1.16.39 2.24.56 3.27.27 1.58.51 2.53.72 2.85.34.48.62.47.83-.03.16-.35.24-.83.26-1.44.02-.77.02-1.15 0-1.13z"/>


        </svg>
      </a>
      <span class="text-xs mt-1 font-light">Vimeo</span>
    </div>

    <!-- Tumblr -->
    <div class="flex flex-col items-center">
      <a href="https://www.tumblr.com/mariannemaric?redirect_to=%2Fmariannemaric&source=content_warning_wall" target="_blank" class="text-gray-600 hover:text-gray-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">


          <path d="M14.67 21.86c-1.18 0-2.06-.55-2.58-1.64-.2-.42-.3-.9-.31-1.45V11.5h4.3v-3.1h-4.3V3H10.5c-.07.58-.1 1.16-.1 1.74v2.66h-3.1v3.1h3.1v7.95c0 1.03.23 1.81.68 2.35.57.68 1.33 1.02 2.28 1.02.94 0 1.76-.33 2.45-.99.67-.65 1.03-1.5 1.09-2.56h-3.22v-3.06h6.02v5.45c0 2.14-1.4 3.36-3.36 3.36z"/>


        </svg>
      </a>
      <span class="text-xs mt-1 font-light">Tumblr</span>
    </div>

    <!-- Facebook -->
    <div class="flex flex-col items-center">
      <a href="https://www.facebook.com/mariannemaricphotographie/" target="_blank" class="text-gray-600 hover:text-gray-800">

        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">


          <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 5 3.66 9.12 8.44 9.88v-6.99H7.9v-2.89h2.54V9.71c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.24.2 2.24.2v2.47h-1.26c-1.24 0-1.63.77-1.63 1.56v1.87h2.78l-.44 2.89h-2.34v6.99C18.34 21.12 22 17 22 12z"/>


        </svg>
      </a>
      <span class="text-xs mt-1 font-light">Facebook</span>
    </div>
  </div>
</section>
</div>
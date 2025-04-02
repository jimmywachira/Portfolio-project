<?php 
require "../views/partials/nav.php"; 
require "../views/partials/head.php"; 
?>

<main class="min-h-full place-items-center bg-white px-3 py-12 sm:py-16 lg:px-4">
  <div class="text-center">
    <p class="text-base font-semibold text-green-600">404</p>
    <h1 class="mt-4 font-semibold tracking-tight text-balance text-black-900 sm:text-7xl">Page not found</h1>
    <p class="mt-6 text-lg font-medium text-pretty text-black-500 sm:text-xl/8">Sorry, we couldn’t find the page you’re looking for.</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      <a href="/" class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-green-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Go back home</a>
      <a href="/about" class="text-sm font-semibold text-black-900">Contact support <span aria-hidden="true">&rarr;</span></a>
    </div>
  </div>
</main>
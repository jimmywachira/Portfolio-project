<?php 
require "../views/partials/head.php";
require "../views/partials/nav.php";
?>

<body class="h-full text-transform capitalize font-semibold p-2 m-2 items-center leading-6" style="font-family:quicksand">

<section class="px-4 py-6">
  <header class="max-w-4xl mt-10 text-center">
    <div class="max-w-lg mx-auto">
      <div >
        <h1 class="text-4xl mb-2">RareFinds <span class="text-green-500"> Marketplace</span>
      </h1>
      <h2 class="mb-2">
        Connecting those who seek - with those who have !
      </h2>
      
      </div>
    </div>
  </header>

  <main class="max-w-6xl mx-auto mt-4">
    <article class="rounded-xl">
      <div class="py-6 px-5 mb-4 flex">
          <div class="mr-8 flex-1 object-cover opacity-100">
            <img class="rounded w-full" src="https://assets.laracasts.com/images/wallpapers/Lara-Matrix.jpeg" alt="">
          </div>

          <div class="flex-1  flex flex-col justify-between">
              <header> 
                <div class="space-x-2">
                  <a class="py-2 px-4 border border-green-500 rounded-full  font-bold text-xs" href="/products">shop</a>
                  <a class="py-2 px-4 border border-green-500 rounded-full  text-xs font-bold" href="/about">blog</a>
                </div>

                <div class="mt-4">
                  <h1 class="text-2xl">
                    a unique online platform 
                  </h1>
           
                  <span class="mt-2 block text-black text-xs">published <time datetime="">1 day ago </time></span>
                </div>
              </header>

              <div class="text-sm mt-2">
                <p>
                At RareFinds Marketplace, we believe that just because an item is no longer widely available doesn't mean it's gone forever.  
              Our platform empowers individuals to share their treasures and helps others find the missing pieces they need. Join our community today and experience the satisfaction of finding – or helping someone else find – that truly rare gem.</p>
              </div>

              <footer class="justify-between items-center mt-6">
                <div class="flex items-center space-x-4">
                  <img class="h-20 w-auto" src="https://assets.laracasts.com/images/mascot/larylab.svg" alt=""> 

                  <div class="mt-4">
                       <a href="/products" class="bg-green-600 hover:bg-green-700 py-2 px-6 rounded-full shadow-lg"> Visit App Here
                        </a>
                  </div>
                </div>
                
              </footer>
          </div>

      </div>
        
    </article>
  </main>

  <?php require "../views/partials/footer.php";?>
</section>
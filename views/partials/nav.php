<nav class=" bg-green-800 shadow">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
            <div class="flex flex-shrink-0 items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=white&shade=600" alt="">
            </div>
                <div class="hidden md:block"> 
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-green-900 text-white", Default: "text-green-300 hover:bg-green-700 hover:text-white" -->
                        <a href="/"
                           class="<?= urlIs('/') ?'text-white' : 'text-black-400' ?> hover:bg-green-800 hover:text-white p-2 m-2 rounded-md">Home</a>

                           <a href="/products"
                               class="<?= urlIs('/products') ? 'text-white' : 'text-black-400' ?> hover:bg-green-800 hover:text-white p-2 m-2 rounded-md">products</a>
                        
                        <a href="/about"
                           class="<?= urlIs('/about') ? 'text-white' : 'text-black-400' ?> hover:bg-green-800 hover:text-white p-2 m-2 rounded-md"> About </a>
                        
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <!-- Profile dropdown -->
                    <?php if ($_SESSION['user'] ?? false) : ?>
                        <div class="relative ml-3">
                            <button type="button"
                                    class="flex max-w-xs items-center rounded-full bg-green-800 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only"> user</span>

                                <img class="h-10 w-8 rounded-full"
                                     src="https://api.dicebear.com/9.x/adventurer/svg?seed=Gizmo"
                                     alt="">
                            </button>
                        </div>

                        <div class="ml-3">
                            <form method="POST" action="/session">
                                <input type="hidden" name="_method" value="DELETE"/>

                                <button class="text-white">Log Out</button> 
                            </form>
                        </div>
                    <?php else : ?>
                        <div class="ml-3">
                            <a href="/register"
                               class="<?= urlIs('/register') ? 'bg-green-900 text-white' : 'text-black-300' ?> hover:bg-green-700 hover:text-white px-3 py-2 rounded-md">Reg</a>
                               
                            <a href="/login"
                               class="<?= urlIs('/login') ? 'bg-green-900 text-white' : 'text-black-300' ?> hover:bg-green-700 hover:text-white px-3 py-2 rounded-md">Log
                                In</a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="-mr-2 flex md:hidden">
        </div>
    </div>
    </div>
</nav>
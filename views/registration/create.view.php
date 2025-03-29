<?php 
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
?>

<main>
<div class="flex min-h-full flex-col justify-center px-6 py-8 lg:px-8">
<img class="h-8 w-auto" src="https://tailwindui.com/plus-assets/img/logos/mark.svg?color=black&shade=600" alt="">

            <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight">Register</h2>
        </div>

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="mt-2 space-y-6" action="/register" method="POST">
                <div>
                    <label for="email" class="block leading-6">Email address</label>
                    <div class="mt-1">
                    <input id="email" name="email" type="email" autocomplete="email" class="relative block w-full rounded-md border-0 p-2 shadow-sm ring-1 ring-inset ring-black-300 placeholder:text-black-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6" placeholder='email address'>
                </div>
                
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block leading-6">Password</label>
                </div>

                <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" placeholder='password' class="block w-full rounded-md border-0 p-2 shadow-sm ring-1 ring-inset ring-black-300 placeholder:text-black-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                </div>
 
            </div>
            <ul>
                    <?php if (isset($errors['email'])) : ?>
                        <li class="text-red-500 text-small mt-2"><?= $errors['email'] ?></li>
                    <?php endif; ?>

                    <?php if (isset($errors['password'])) : ?>
                        <li class="text-red-500 text-small mt-2"><?= $errors['password'] ?></li>
                    <?php endif; ?>
                </ul>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600"> Register</button>
            </div>
            
            </form>
        </div>
        </div>
    </div>  
</main>
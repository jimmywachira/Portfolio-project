<?php 
    require base_path('views/partials/head.php');
    require base_path('views/partials/nav.php');
    #require base_path('views/partials/banner.php');
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:col-span-2 md:mt-0 border shadow">
            <form method="POST" action="/products">
                <div class="p-2 m-2"><div>
                            <label for="title" >product</label>
                            <div class="px-2">
                                <input id="title" name="title" class="p-2 m-2 w-full" placeholder="product"><?= $_POST['title'] ?? '' ?> 
                                </input> 
                                    <?php if(isset($errors['body'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['title'] ?></p>
                                    <?php endif; ?>
                            </div>
                        </div>

                            <div class="px-2">
                                <label for="body" class="">descr</label>
                                <div class="mt-1"> <input id="body" name="body" class="m-2 p-2 block w-full "
                                     placeholder="descr goes here"><?= $_POST['body'] ?? '' ?>
                            </input>

                            <div class="px-2">
                                <label for="phone_number" class="">Phone Number</label>
                                <div class="mt-1">
                                    <input type="tel" id="phone_number" name="phone_number" class="m-2 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        placeholder="Enter phone number" value="<?= $_POST['phone_number'] ?? '' ?>">
                                    </div>
                                </div>

                                <div class="px-2 mt-4">
                                    <label for="price" class="">Price</label>

                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center p-3">
                                            <span class="text-gray-500 sm:text-sm">KES</span>
                                        </div>

                                        <input type="number" id="price" name="price" class="m-2 p-2 block w-full border border-gray-300 rounded-md py-2 pl-7 pr-12 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                            placeholder=" Enter price" value="<?= $_POST['price'] ?? '' ?>">


                                </div>
</div> 

                            <?php if(isset($errors['body'])) : ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="px-4 py-3 text-right sm:px-6">
                            <button
                                type="submit"
                                class="border rounded bg-green-600 px-4 py-2  hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                 Submit
                            </button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
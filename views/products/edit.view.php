<?php 
    require base_path('views/partials/head.php');
    require base_path('views/partials/nav.php');
    #require base_path('views/partials/banner.php');
?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="mt-5 md:col-span-2 md:mt-0">
            <form method="POST" action="/product">
                <input type="hidden" name="_method" value="PATCH">
                
                <input type="hidden" name="id" value="<?= $note["id"]?>">

                <div class="shadow rounded">
                        <div class="p-2 m-2 border">
                        <div class="mt-1 px-2">
                            <label for="title">title</label>
                            <div>
                                <input id="title" name="title"class="shadow p-2 m-2 w-full" placeholder="<?= $note['title'];?> ">
                                
                                </input>
                                    <?php if (isset($errors['title'])): ?>
                                        <p class="text-red-500 text mt-2"> <?= $errors['title'] ?></p>
                                    <?php endif; ?>
                                </div>
                          
                                <label for="body">Body</label>
                                <div class="mt-1">
                                    <textarea id="body" name="body" class="shadow p-2 m-2 w-full"
                                    placeholder="Note goes here">
                                    <?= htmlspecialchars($note['body']); ?>
                                    </textarea>
                                    <?php if (isset($errors['body'])) : ?>
                                        <p class="text-red-500 text m-2"><?= $errors['body'] ?></p>
                                    <?php endif; ?>
                                </div>

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
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            <span class="text-gray-500 sm:text-sm">KES</span>
        </div>
        <input type="number" id="price" name="price" class="m-2 p-2 block w-full border border-gray-300 rounded-md py-2 pl-7 pr-12 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
               placeholder="Enter price" value="<?= $_POST['price'] ?? '' ?>">
        <div class="absolute inset-y-0 right-0 flex items-center">
            <label for="currency" class="sr-only">Currency</label>
            <div class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-3 text-gray-500 sm:text-sm">
                KES
            </div>
        </div>
    </div>
</div>

                            </div>
                        </div>

                        <div class="text-right p-3 justify-end flex gap-1">
                        <a
                                href="/notes"
                                class="border inline-flex rounded bg-green-600 px-4 py-2 text-white shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"> cancel
                        </a>
                            <button
                                type="submit"
                                class="border rounded bg-green-600 px-4 py-2 text-white shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"> update
                            </button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
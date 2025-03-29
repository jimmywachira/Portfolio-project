<?php 
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');

?>

<main class="container mx-auto p-4 my-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php
            $row_count = 0;
            $item_count = 0;
            foreach ($notes as $note):
                if ($item_count % 3 === 0 && $item_count > 0) {
                    $row_count++;
                }
                if ($row_count < 4):
            ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img class="w-full h-48 object-cover" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="">
                    <div class="p-4">
                        <a href="/product?id=<?= $note['id']; ?>" class="block font-bold text-lg text-green-700 hover:text-green-900 mb-2">
                            <?= htmlspecialchars($note['title']); ?>
                        </a>

                        <p class="text-gray-700 text-base text-justify">
                            descr : <?= htmlspecialchars(substr($note['body'], 0, 100)) ; ?>
                        </p>

                        <p class="text-gray-700 text-base text-justify">
                            price : <?= htmlspecialchars(substr($note['price'], 0, 100)) ; ?>
                        </p>

                        <p class="text-gray-700 text-base text-justify">
                        contact no : 070-0<?= htmlspecialchars(substr($note['phone_number'], 0, 100)) ; ?>
                        </p>

                    </div>
                </div>
            <?php
                endif;
                $item_count++;
            endforeach;
            ?>
        </div>

        <?php if (count($notes) > 12): ?>
            <div class="mt-6 text-center">
                <p class="text-gray-600">Showing the first 12 notes. <a href="/notes/all" class="text-blue-500 hover:underline">View All Notes</a></p>
            </div>
        <?php endif; ?>

        <div class="mt-6 px-2 py-1 text-right sm:px-0">
            <a href="/products/create"
                title="opens this post"
                class="inline-flex justify-center rounded border border-transparent bg-green-600 py-2 px-4 text-white shadow-sm hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Create product
            </a>
        </div>
    </main>

<?php require "../views/partials/footer.php";?>
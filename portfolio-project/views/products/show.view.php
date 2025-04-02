<?php 
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
#require base_path('views/partials/banner.php'); 
?>

<main class="container mx-auto p-4 my-8">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

     <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-2.jpg" alt="">

        <div class="card p-2 m-2 border shadow">
            <ul>
                    <li class="center text-green-600 border-green">
                            <?= htmlspecialchars($note['title']); ?>
                        </li>
                        <li class="text-black-600" >price : <?= htmlspecialchars($note['price']); ?> </li>
                        <li class="text-black-600">contact no : 070-0<?= htmlspecialchars($note['phone_number']); ?> </li>
                    <li class="text-black-600">descr : <?= htmlspecialchars($note['body']); ?> </li>
            </ul>

            <div>
           
           <form action="/product" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                
                <input type="hidden" name="id" value="
                <?= $note['id'];?>
                ">

                <div class="text-right">
                    <button type="submit" class="text-white rounded border bg-red-800 py-2 px-4 hover:bg-red-600"> delete
                    </button>

                    <footer class="mt-3">
            <a href="/products/edit?id=<?= $note['id'] ?>" class="rounded m-2 border bg-green-700 py-2 px-4 text-white hover:bg-green-500 ">edit</a>
            </footer>
                </div>
            </form>  
        </div>
        </div>
        
         
    </div>  
</main>

<?php require "../views/partials/footer.php";?>
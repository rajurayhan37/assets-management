<?php
    $title = "Profile | Asset Management System";
    include 'includes/header.php';
    include 'includes/aside.php';

?>
    <!-- main section -->
    <main class="p-4 sm:ml-64">
        <!-- filter section -->
        <section class="mt-14">
            <div class="flex flex-col justify-center shadow border border-gray-200 rounded-lg py-3">
                <div class="mb-3">
                    <img class="mx-auto rounded-full" src="src/images/avatar.svg" width="150px" alt="">
                    <h1 class="mt-4 text-xl font-semibold text-center"><?= $_SESSION['user']['Username'] ?></h1>
                    <p class="text-center"><?= $_SESSION['user']['Email'] ?></p>
                </div>
                <hr class="divide-y divide-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-6">
                    <div>
                        <label for="fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" name="fname" id="fname" value="<?= $_SESSION['user']['Username'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" value="Raju" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="<?= $_SESSION['user']['Username'] ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" value="name@company.com" required="">
                    </div>
                </div>
                <div class="flex items-end justify-end">
                    <button type="submit" class="mr-6 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save All</button>
                </div>
            </div>
        </section>
    </main>
    
<?php
    include 'includes/footer.php';
?>
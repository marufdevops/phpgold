<?php require base_path("views/partials/header.view.php"); ?>
<?php require base_path("views/partials/nav.view.php"); ?>
<?php require base_path("views/partials/banner.view.php"); ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">Create a note</h1>
            <form action="" method="post" class="mt-4">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input required type="text" name="title" id="title" value="<?= $_POST['title'] ?? '' ?>"
                           class="mt-1 p-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <?php if (!empty($errors['title'])) : ?>
                    <div class="text-red-500"><?= $errors['title'] ?></div>
                <?php endif; ?>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Create
                    </button>
                </div>
        </div>
    </main>
<?php require base_path("views/partials/footer.view.php"); ?>
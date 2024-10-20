<?php require base_path("views/partials/header.view.php"); ?>
<?php require base_path("views/partials/nav.view.php"); ?>
<?php require base_path("views/partials/banner.view.php"); ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <a class="underline text-blue-400" href="/notes">Back to notes</a>
            <h1 class="text-3xl font-bold text-gray-900">Notes#<?= $note['id'] ?></h1>
            <div class="bg-white shadow overflow-hidden sm:rounded-md mb-2">
                <div class="px-4 py-5 sm:px-6">
                    <h2 class="text-lg font-medium text-gray-900"><?= htmlspecialchars($note['title']) ?></h2>
                </div>

                <a class="px-4 py-5 sm:px-6" href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
                <form action="" method="POST" class="px-4 py-5 sm:px-6">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="text-red-500">Delete</button>
                </form>
            </div>
    </main>
<?php require base_path("views/partials/footer.view.php"); ?>
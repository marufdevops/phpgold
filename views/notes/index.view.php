<?php require base_path("views/partials/header.view.php"); ?>
<?php require base_path("views/partials/nav.view.php"); ?>
<?php require base_path("views/partials/banner.view.php"); ?>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">My Notes</h1>
            <ul class="mt-4">
                <?php foreach ($notes as $note) : ?>
                    <li class="bg-white shadow overflow-hidden sm:rounded-md mb-2">
                        <div class="px-4 py-5 sm:px-6">
                            <a href="/note?id=<?= $note['id'] ?>"
                               class="text-lg font-medium text-blue-500 underline"><?= htmlspecialchars($note['title']) ?></a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p>
                <a href="/notes/create" class="text-blue-500 underline">Create a new note</a>
            </p>

        </div>
    </main>
<?php require base_path("views/partials/footer.view.php"); ?>
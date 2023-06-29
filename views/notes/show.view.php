<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/navigation.php'); ?>
<?php view('partials/banner.php', ['heading' => $heading]); ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <p><?=  htmlspecialchars($note['body']) ?></p>

            <div>

                <footer class="mt-6">
                    <a class="text-blue-500 hover:underline" href="note/edit?id=<?= $note['id'] ?>">Edit</a>
                </footer>

            </div>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>
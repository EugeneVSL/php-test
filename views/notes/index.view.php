<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/navigation.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

    <main>

        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <ul>

                <?php foreach ($notes as $note) : ?>

                    <li><a href="note?id=<?= htmlspecialchars($note['id']) ?>" class="text-blue-500 hover:underline"><?= $note['body'] ?></a></li>
                
                <?php endforeach; ?>

            </ul>

            <p class="mt-6">
                <a href="notes/create" class="text-blue-500 hover:underline">Create Note</a>
            </p>

        </div>
       
    </main>

<?php require base_path('views/partials/footer.php'); ?>
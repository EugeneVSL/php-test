<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/navigation.php'); ?>
<?php view('partials/banner.php', ['heading' => $heading]); ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <p><?=  htmlspecialchars($note['body']) ?></p>

            <form class="mt-6" method='POST'>
                <input type="hidden" name="id" value='<?= $note['id'] ?>'>
                <button class="text-blue-500 hover:underline">Delete</button>
            </form>

        </div>
    </main>

<?php require base_path('views/partials/footer.php'); ?>
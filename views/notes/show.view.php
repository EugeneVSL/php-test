<?php require base_path('views/partials/header.php'); ?>
<?php require base_path('views/partials/navigation.php'); ?>
<?php view('partials/banner.php', ['heading' => $heading]); ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <p><?=  htmlspecialchars($note['body']) ?></p>

        </div>
       
    </main>

<?php require base_path('views/partials/footer.php'); ?>
<?php view('partials/header.php'); ?>
<?php view('partials/navigation.php'); ?>
<?php view('partials/banner.php', ['heading' => $heading]); ?>

<main>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <form method="POST" action="/php-test/note/edit">

            <input type="hidden" name="id" value="<?= $note['id']?>">
            <input type="hidden" name="_METHOD" value="PATCH">

            <div class="space-y-12">
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="col-span-full">
                        <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $note['body'] ?></textarea>

                            <?php 
                                if(isset($errors) && count($errors) != 0) {

                                    foreach ($errors as $error) {
                                        echo "<p class='text-red-500 text-xs mt-2'>$error</p>";
                                    }
                                }
                            ?>
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">

                <a href="/php-test/notes"
                    class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cancel</a>
            
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </form>

        <!-- <form class="mt-6" method='POST'>
            <input type="hidden" name="id" value='<?= $note['id'] ?>'>
            <input type="hidden" name="_METHOD" value='DELETE'>
            <button class="text-blue-500 hover:underline">Delete</button>
        </form> -->

    </div>

</main>

<?php view('partials/footer.php'); ?>
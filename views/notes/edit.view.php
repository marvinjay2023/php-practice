<?php 

require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/header.php');


?>

<main>
    <h2>Create Note</h2>

    <form method="POST" action="/note">

        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <label for="body">Description</label>
        <div>
            <textarea name="body" id="body"><?= $note['body'] ?? '' //<-------para dre mag clear an textbox ?></textarea>
        </div>
        
        <br>
        <button>Update</button>

        <a href="/notes">Cancel</a>

        <?php if(isset($errors['body'])) :?>
            <p style="color: red;"><?= $errors['body'] ?></p>
        <?php endif;?>
    </form>
</main>



<?php 

require base_path('views/partials/footer.php');

?>

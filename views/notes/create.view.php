<?php 

require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/header.php');


?>

<main>
    <h2>Create Note</h2>

    <form method="POST" action="/notes">
        <label for="body">Description</label>
        <div>
            <textarea name="body" id="body"><?= $_POST['body'] ?? '' //<-------para dre mag clear an textbox ?></textarea>
        </div>
        
        <br>
        <button>create</button>

        <?php if(isset($errors['body'])) :?>
            <p style="color: red;"><?= $errors['body'] ?></p>
        <?php endif;?>
    </form>
</main>

<?php 

require base_path('views/partials/footer.php');

?>

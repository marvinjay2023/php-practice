<?php 

require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/header.php');

?>

<main>
    <p><?= htmlspecialchars($note['body']) //<-----tanggal special character ha string?></p>
    
    <a href="/note/edit?id=<?= $note['id'] ?>">Edit</a>
    <br>
    <br>
    <form method="POST">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
        <button class="active">Delete</button>
    </form>
    <br>
    <br>
    <a href="/notes">go Back</a>
</main>



<?php 

require base_path('views/partials/footer.php');

?>

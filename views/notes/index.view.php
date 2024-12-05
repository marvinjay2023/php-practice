<?php 

require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/header.php');

?>

<main>
    <?php foreach($notes as $notes): ?>
        <li>
            <a href="/note?id=<?= $notes['id'] ?>">
                <?= htmlspecialchars($notes['body'])?>
            </a>
        </li>
    <?php endforeach; ?>
    <br>
    <br>
    <p>
        <a href="/notes/create">Create Note</a>
    </p>
</main>

<?php 

require base_path('views/partials/footer.php');

?>

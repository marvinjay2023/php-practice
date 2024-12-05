<?php 

require base_path('views/partials/head.php');
require base_path('views/partials/nav.php'); 


?>

<main>
    <h2>Register Account</h2>

    <form method="POST" action="/register">

            <?php if(isset($errors['userExist'])) :?>
                <p style="color: red;"><?= $errors['userExist'] ?></p>
            <?php endif;?>
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= $_POST['name'] ?? ''?>"> 
            <?php if(isset($errors['name'])) :?>
                <p style="color: red;"><?= $errors['name'] ?></p>
            <?php endif;?>

            <br>
            <br>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= $_POST['email'] ?? ''?>"> 

            <?php if(isset($errors['email'])) :?>
                <p style="color: red;"><?= $errors['email'] ?></p>
            <?php endif;?>

            <br>
            <br>

            <label for="pass">Password</label>
            <input type="text" id="pass" name="password" value="<?= $_POST['password'] ?? ''?>">  

            <?php if(isset($errors['password'])) :?>
                <p style="color: red;"><?= $errors['password'] ?></p>
            <?php endif;?>

        </div>
        
        <br>
        <button>Register</button>
    </form>
</main>

<?php 

require base_path('views/partials/footer.php');

?>

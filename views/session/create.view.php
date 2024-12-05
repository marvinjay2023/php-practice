<?php 

require base_path('views/partials/head.php');
require base_path('views/partials/nav.php'); 


?>

<main>
    <h2>Login</h2>

    <form method="POST" action="/session">
        <div>

            <label for="email">Email</label>
            <input type="text" 
                    id="email" 
                    name="email" 
                    value="<?= old('email') ?>"> 

            <?php if(isset($errors['email'])) :?>
                <p style="color: red;"><?= $errors['email'] ?></p>
            <?php endif;?>

            <br>
            <br>

            <label for="pass">Password</label>
            <input type="text" 
                    id="pass" 
                    name="password" 
                    value="<?= $_POST['password'] ?? ''?>">  

            <?php if(isset($errors['password'])) :?>
                <p style="color: red;"><?= $errors['password'] ?></p>
            <?php endif;?>
 
        </div>
         
        <br>
        <button>Login</button>
    </form>
</main>

<?php 

require base_path('views/partials/footer.php');

?>

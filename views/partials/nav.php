<nav>

    <ul>
        <li><a href="/" class="<?= urlIs('/') ? 'active' : '' ?>">Home</a></li>
        <li><a href="/about" class="<?= urlIs('/about') ? 'active' : '' ?>">About</a></li>

        <?php if($_SESSION['user'] ?? false) :?>

            <li><a href="/notes" class="<?= urlIs('/notes') ? 'active' : '' ?>">Notes</a></li>

        <?php endif;?>
        
        <li><a href="/contact" class="<?= urlIs('/contact') ? 'active' : '' ?>">Contact</a></li>

        <?php if($_SESSION['user'] ?? false) :?>

            <form method="post" action="/session">
                <input type="hidden" name="_method" value="DELETE">
                <button>Logout</button>
            </form>
        <?php else:?>

            <li><a href="/register" class="<?= urlIs('/register') ? 'active' : '' ?>">Register</a></li>
            <li><a href="/login" class="<?= urlIs('/login') ? 'active' : '' ?>">login</a></li>
        
            <?php endif?>
        
       
    </ul>
</nav>
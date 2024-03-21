<?php session_start(); ?>

<nav class="nav_flex">
        <img src="images/logo.png" alt="logo">
        <?php if (isset($_SESSION['username'])) { ?>
                <p><span class="welcome">Welcome, <?php echo $_SESSION['username']; ?>!</span></p>
        <?php } ?>

        <div class="nav_div">
                <a href="index.php">Home</a>
                <span>|</span>
                <a href="contact.php">Contact</a>
                <span>|</span>
                <?php if (isset($_SESSION['username'])) { ?>
                        <a href="logout.php">Log out</a>
                <?php } else { ?>      
                        <a href="login.php">Log in</a>
                <?php } ?>
        </div>
</nav>
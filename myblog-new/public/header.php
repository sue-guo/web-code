<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?></title>
    <link rel="stylesheet" href="<?php echo $style ?>">
    <script src="<?php echo $jscript ?>" defer></script>
</head>
<body>
<nav class="nav_flex">
        <img src="images/logo.png" alt="logo">
        <?php if (isset($_SESSION['username'])): ?>
        <span class="welcome">Welcome, <?php echo $_SESSION['username']?>
            <a href="logout.php">Log out</a>
        </span>
        <?php endif ?>

        <div class="nav_div">
            <a href="index.php">Home</a>
            <span>|</span>
            <a href="contact.php">Contact</a>

            <?php if ( !isset($_SESSION['username'])): ?>
            <span>|</span>
            <a href="login.php">Log In</a>
            <a href="signup.php" class="sign-up">Sign Up</a>
            <?php else: ?>
                <span>|</span>
                <a href="list.php">My Blogs</a>
            <?php endif ?>
        </div>
</nav>

<body>
<nav class="nav_flex">
        <img src="images/logo.png" alt="logo">
        <?php if (isset($_SESSION['username'])): ?>
        <span class="welcome">Welcome, Sue
            <a href="index1.html">Log out</a>
        </span>
        <?php endif ?>

        <div class="nav_div">
            <a href="index.php">Home</a>
            <span>|</span>
            <a href="contact.php">Contact</a>
            <span>|</span>
            <a href="login.php">Log In</a>
            <a href="signup.php" class="sign-up">Sign Up</a>
        </div>
</nav>
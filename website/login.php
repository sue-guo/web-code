<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/log.js" defer></script>
</head>
<body>
    <?php include("navEm.php"); ?>
    
    <?php         
        require_once('db_credentials.php');
        require_once('database.php');
        $db = db_connect();

        $error_message = "";
       
        // Handle form values sent by the form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check if the username and password match in the database
            $sql = "SELECT * FROM users WHERE username = '$username' AND passwd = '$password'";
            $result = mysqli_query($db, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                // If the user exists and the password matches, set session variables and redirect
                $user = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $user['Id'];
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit();
            } else {
                // If login fails, show error message
                $error_message = "Invalid username or password. Please try again.";
            }
        }
    ?>

    <main class="flex_container img_background">
        <article>
            <h2 class="text_shadow">RECORDE LIFE.</h2>
            <h2 class="text_shadow">SHERA LIFE.</h2>
            <p class="text_center left-p">Life is worth recording and sharing, record the beauty and share the love </p>
        </article>
        <aside>
            <h2 class="text_shadow">Log In</h2>
            <p class="text_center">Don't have an account?
                <a href="signup.php">Sign Up</a>
            </p>
            <form action="login.php" method="post" onsubmit="return validate();">
                <div class="textfield">
                    <label for="username">user name:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="textfield">
                    <label for="password">password:</label>
                    <input type="password" name="password" id="password" class="round_border">
                </div>
                <div class="textfield">
                    <span style="color:red"><?=$error_message?></label>
                </div>
                <div class="buttonfield">
                    <button type="submit" class="round_border login_button">Log In</button>                   
                </div>
            </form>
        </aside>

    </main>

  <?php include("footerEm.php"); ?>
</body>
</html>
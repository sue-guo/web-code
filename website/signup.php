<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/log.js" defer></script>
</head>
<body>    
    <?php include("navEm.php"); ?>

    <?php 
        require_once('db_credentials.php');
        require_once('database.php');

        $signup = false;
        $error_message = "";

        $db = db_connect();

        // Handle form values sent by the form
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Assuming confirm_password is intended to be used to verify the password, you can add validation here if needed

            // Assuming your database table is users and you want to insert username and password
            $sql = "INSERT INTO users (username, passwd) VALUES ('$username', '$password')";
            
            try{
                $result = mysqli_query($db, $sql);

                if ($result) {
                    $id = mysqli_insert_id($db);
                    $signup = true;                
                } 
            }catch (Exception $e) {
                $error_message = "Error in signup: ".mysqli_error($db);
            }
        }
    ?>
    <main class="flex_container img_background">
        <?php if (!$signup) { ?>                
            <form class="half_width" method="post" onsubmit="return validate();">
                <h2 class="text_shadow">Sign Up</h2>
                <p class="text_center">Already have an account?
                    <a href="login.php">Log In</a>
                </p>
                <div class="textfield">
                    <label for="username">user name:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="textfield">
                    <label for="password">password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="textfield">
                    <label for="confirm_pswd">confirm password:</label>
                    <input type="password" id="confirm_password">
                </div>
                <div class="textfield">
                    <span style="color:red"><?=$error_message?></label>
                </div>
                <div class="textfield">
                    <button type="submit" class="round_border login_button">Sign Up</button>
                    <button type="reset" class="round_border login_button" id="reset">Reset</button>
                </div>
            </form>
        <?php } else { ?>
            
            <form class="half_width" method="get" action="login.php">
                <h2 class="text_shadow">Sign Up</h2>
                <hr>
                <p class="text_center">Contratulations <?=$_POST['username']?>!<br><br>You have signed up an account.</p>
                <div class="textfield">
                    <button type="submit" class="round_border login_button">Login</button>
                </div>
            </form>
            
            <?php } ?>
    </main>
    
  <?php include("footerEm.php"); ?>

</body>
</html>
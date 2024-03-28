<?php
    $pageTitle = 'login';
    $style = 'stylesheets/login.css';    
    $jscript = 'js/log.js';
    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');

    $errors = array('username' => '', 'password' => '');
    $username = '';
    $password = '';

    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "select * from users where username = '$username'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){//if there is a user with the same username
            $errors['username'] = '';
            $user = mysqli_fetch_assoc($result); //fetching the user as an associative array
            // print_r($user);
            // print($user['passwd']);
            if(password_verify($password, $user['passwd'])){
                $errors['password'] = '';

                //if the user wants to be remembered, set a cookie
                if($_POST['remember'] == 'on'){
                    setcookie('name', $_POST['username'], time() + 86400);//cookie will last for 1 day
                }
                //start a session
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['id'];
                
                //redirect to list.php
                header('Location: list.php');
            }else{
            $errors['password'] = 'incorrect password';
            }

        }else{
            $errors['username'] = 'user does not exist';
    }
    close_connection($conn);
}
?>

    <?php include('header.php')?>

    <main class="flex_container img_background">
        <article>
            <h2 class="text_shadow">RECORDE LIFE.</h2>
            <h2 class="text_shadow">SHARE LIFE.</h2>
            <p class="text_center left-p">Life is worth recording and sharing, record the beauty and share the love </p>
        </article>
        <aside>
            <h2 class="text_shadow">Log In</h2>
            <p class="text_center">Don't have an account?
                <a href="signup.php">Sign Up</a>
            </p>
            <form action="login.php" method="POST" onsubmit="return validate();">
                <div class="textfield">
                    <label for="username">user name:</label>
                    <input type="text" name="username" id="username" 
                    value="<?php if(isset($_POST['username'])) echo $_POST['username']?>">
                    <span class="errorMsg" id="username_span"><?php echo $errors['username']?></span>
                </div>
                <div class="textfield">
                    <label for="password">password:</label>
                    <input type="password" name="password" id="password" 
                    value="<?php if(isset($_POST['password'])) echo $_POST['password']?>">
                    <span class="errorMsg" id="password_span"><?php echo $errors['password']?></span>
                </div>
                <div class="buttonfield">
                    <!-- <button type="submit" class="round_border login_button">Log In</button> -->
                    <input type="submit" name="submit" value="Log In" class="round_border login_button">
                    <input type="checkbox" name="remember" id="remember" 
                    <?php if(isset($_POST['remember'])) echo 'checked'; ?> >
                    <label for="remember">Remember me</label>
                </div>
            </form>
        </aside>

    </main>

    <?php include('footer.php')?>

<?php
    $pageTitle = 'sign up';
    $style = 'stylesheets/login.css';    
    $jscript = 'js/log.js';

    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');

    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "insert into users(username,passwd) values('$username','$password')";
        if(mysqli_query($conn,$sql)){
            header('Location: login.php');
        }else{
            echo 'sign up query error: ' . mysqli_error($conn);
        }
    }
    close_connection($conn);
?>

<?php include('header.php')?>
    <main class="flex_container img_background">
        <form class="half_width" method="POST" onsubmit="return validate();" action="signup.php">
            <h2 class="text_shadow">Sign Up</h2>
            <p class="text_center">Already have an account?
                <a href="login.php">Log In</a>
            </p>
            <div class="textfield">
                <label for="username">user name:</label>
                <input type="text" name="username" id="username">
                <span class="errorMsg" id="username_span"></span>
            </div>
            <div class="textfield">
                <label for="password">password:</label>
                <input type="password" name="password" id="password">
                <span class="errorMsg" id="password_span"></span>
            </div>
            <div class="textfield">
                <label for="confirm_password">confirm password:</label>
                <input type="password" id="confirm_password">
                <span class="errorMsg" id="confirm_password_span"></span>
            </div>
            <div class="buttonfield">
                <!-- <button type="submit" class="round_border login_button">Sign Up</button>
                <button type="reset" class="round_border login_button" id="reset">Reset</button> -->
                <input type="submit" name="submit" id="submit" value="Sign Up" class="round_border login_button">
                <input type="reset" name="reset" id="reset" value="Reset" class="round_border login_button">
            </div>
        </form>
    </main>
<?php include('footer.php')?>

<!-- CST8285 Assignment 2 group 12:
HuaiFang Yin: implement contact us function
-->
<?php 
    $pageTitle = 'contact us';
    $style = 'stylesheets/login_new.css';    
    $jscript = 'js/contact.js';
    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');
    session_start();
?>
<?php include('header.php')?>

<?php

 // Handle form values sent by the form
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $name = $_POST['name'];
     $email = $_POST['email'];
     $subject = $_POST['subject'];
     $message = $_POST['message'];

     // Assuming your database table is users and you want to insert username and password
     $sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
     
     try{
         $result = mysqli_query($conn, $sql);
     }catch (Exception $e) {
         echo "Error in submit contact: ".mysqli_error($conn);
     }
 }
?>

<main class="flex_container img_background">
        <article>
            <h2 class="text_shadow">CONTACT US</h2>
            <h2 class="text_shadow"></h2>
            <p class="text_center left-p">Thanks for your message!</p>
        </article>
</main>
<?php include('footer.php')?>
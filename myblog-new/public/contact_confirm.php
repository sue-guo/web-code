<?php 
    $pageTitle = 'contact us';
    $style = 'stylesheets/login.css';    
    $jscript = 'js/contact.js';
    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');
?>
<?php include('header.php')?>

<?php

 // Handle form values sent by the form
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $user = $_POST['name'];
     $email = $_POST['email'];
     $subject = $_POST['subject'];
     $message = $_POST['message'];

     // Assuming your database table is users and you want to insert username and password
     $sql = "INSERT INTO contact_us (user, email, subject, message) VALUES ('$user', '$email', '$subject', '$message')";
     
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
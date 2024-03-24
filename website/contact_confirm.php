<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>       
    <?php include("navEm.php"); ?>
    
    <main class="flex_container img_background">
        <article>
            <h2 class="text_shadow">CONTACT US</h2>
            <h2 class="text_shadow"></h2>
            <p class="text_center left-p">Thanks for your message!</p>
        </article>       
    </main>
<?php
 require_once('db_credentials.php');
 require_once('database.php');

 $db = db_connect();

 // Handle form values sent by the form
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $user = $_POST['name'];
     $email = $_POST['email'];
     $subject = $_POST['subject'];
     $message = $_POST['message'];

     // Assuming your database table is users and you want to insert username and password
     $sql = "INSERT INTO contact_us (user, email, subject, message) VALUES ('$user', '$email', '$subject', '$message')";
     
     try{
         $result = mysqli_query($db, $sql);
     }catch (Exception $e) {
         echo "Error in submit contact: ".mysqli_error($db);
     }
 }
?>

  <?php include("footerEm.php"); ?>
</body>
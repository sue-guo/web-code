<!-- CST8285 Assignment 2 group 12:
Jiayun Wang: implement publish blog function 
-->
<?php
    require_once('db_connect.php');
    include_once('db_functions.php');
    //if use the session, need to start the session
    $blogId = '';
    if (isset($_GET['blogId'])) {
        $blogId = $_GET['blogId'];
        publishBlogById($conn, $blogId);
        header('Location: list.php');
    } else {
        header('Location: list.php');
    }

    close_connection($conn);
?>

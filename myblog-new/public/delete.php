<?php
    $pageTitle = 'Delete Blog';
    $style = 'stylesheets/add.css';    
    $jscript = 'js/edit.js';
    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');
    //if use the session, need to start the session
    session_start();

    $blogId = '';
    if (isset($_GET['blogId'])) {
        $blogId = $_GET['blogId'];
        deleteBlogById($conn, $blogId);
        header('Location: list.php');
    } else {
        header('Location: list.php');
    }

    close_connection($conn);
?>

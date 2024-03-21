<?php

//mysqli_connect(host, username, password, dbname ) returns a new connection to the MySQL server 
$conn = mysqli_connect('localhost', 'myblog', '123456', 'myblog');//connecting to the database

//check the connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}else{
    echo 'Connection successful';
}
?>

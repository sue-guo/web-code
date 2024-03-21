<?php 
require('../private/db_connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="stylesheets/list.css">
    <script src="js/index.js" defer></script>
</head>

<?php include('header.php')?>

<main>
<div class="input-container">
            <!-- <select name="category" id="" class="category-input">
                <option value="" selected>Category</option>
                <option value="travel">published</option>
                <option value="life">non-published</option>
            </select> -->
            <input type="search" placeholder="Search" name="" class="search-input ">
            <img src="images/search.png" onclick="">
        </div>
        <section>
            <div class="list_container">
                <div class="list_img">
                    <a href="detail.html"><img src="images/travel.png" alt="image"></a>
                </div>
                <div class="list_info">
                    <h3>like this restrand ddddd dddddddddddddddddddd</h3>
                    <span>2024-03-11</span>
                    <span>published</span>
                </div>
            </div>
            <div class="list_container">
                <div class="list_img">
                    <a href="detail.html"><img src="images/food.png" alt="image"></a>
                </div>
                <div class="list_info">
                    <h3>like this restrand ddddd dddddddddddddddddddd</h3>
                    <span>2024-03-11</span>
                    <span>published</span>
                </div>
            </div>
            <div class="list_container">
                <div class="list_img">
                    <a href="detail.html"><img src="images/life.png" alt="image"></a>
                </div>
                <div class="list_info">
                    <h3>like this restrand ddddd dddddddddddddddddddd</h3>
                    <span>2024-03-11</span>
                    <span>published</span>
                </div>
            </div>
            <div class="list_container">
                <div class="list_img">
                    <a href="detail.html"><img src="images/logo.png" alt="image"></a>
                </div>
                <div class="list_info">
                    <h3>like this restrand ddddd dddddddddddddddddddd</h3>
                    <span>2024-03-11</span>
                    <span>published</span>
                </div>
            </div>
        </section>
</main>

<?php include('footer.php')?>

</html>
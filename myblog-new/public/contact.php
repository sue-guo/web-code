
<?php 
    $pageTitle = 'contact us';
    $style = 'stylesheets/login.css';    
    $jscript = 'js/contact.js';
    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');
?>
<?php include('header.php')?>

    <main class="flex_container img_background">
        <article>
            <h2 class="text_shadow">CONTACT US</h2>
            <h2 class="text_shadow"></h2>
            <p class="text_center left-p">Feel free to contact us if you have any concerns about our website.
                Leave a message and we will get back to you as soon as possible.
            </p>
        </article>
        <aside>
            <form action="contact_confirm.php" method="post" onsubmit="return validate();">
                <div class="textfield">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="textfield">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" class="round_border">
                </div>
                <div class="textfield">
                    <label for="subject">Subject:</label>
                    <input type="text" name="subject" id="subject" class="round_border">
                </div>
                <div class="textfield">
                    <label for="message">Leave a message...</label>
                    <textarea name="message" id="message"></textarea>
                </div>
                <div class="buttonfield">
                    <button type="submit" class="round_border login_button">submit</button>
                </div>
            </form>
        </aside>

    </main>
<?php include('footer.php')?>

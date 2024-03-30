
<!-- CST8285 Assignment 2 group 12:
Hongxiu Guo: design the HTML and CSS
HuaiFang Yin: JavaScript,PHP: implement client-side validation for contact form, server-side save contact form data to database, and implement contact form page
-->
<?php 
    $pageTitle = 'contact us';
    $style = '../stylesheets/login.css';    
    $jscript = '../scripts/contact.js';
    require_once('db_connect.php');
    include_once('db_functions.php');
    session_start();

    close_connection($conn);
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

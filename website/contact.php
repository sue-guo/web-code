<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/contact.js" defer></script>
</head>
<body>       
    <?php include("navEm.php"); ?>
    
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

    <!-- <main class="form-main">
        <form action="contact.php" method="post">
            <h2></h2>
            <p>Feel free to contact us</p>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="Email">Email:</label>
                <input type="text" id="Email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Leave a message...</label>
                <textarea name="message" id="message"></textarea>
            </div>


            <div class="form-button" id="form-button">
                <button type=" submit">submit</button>
                <button type="reset">Reset</button>
            </div>

        </form>

    </main> -->
  <?php include("footerEm.php"); ?>
</body>
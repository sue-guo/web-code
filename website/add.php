<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog</title>
    <link rel="stylesheet" href="css/add.css">
    <script src="js/add.js" defer></script>
</head>
<body>       
    <?php include("navEm.php"); ?>
    <main class="form-main">
        <form action="add.php" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="title">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="title">Description:</label>
                <textarea name="description" id="description" placeholder="write some details for this blog"></textarea>
            </div>
            <div id="form-group-img-container">
                <div class="form-group-img">
                    <span onclick="removeImageDiv(this);">
                        —
                    </span>
                    <div>
                        <label for="imagePath" class="custom-file-upload">
                            + Add Image
                        </label>
                        <input type="file" name="imagePath" id="imagePath">
                    </div>
                    <textarea name="imgDescription" placeholder="write some description for this image"></textarea>
                </div>
            </div>

            <div class="form-button" id="form-button">
                <button onclick="addImageDiv();">Add Image</button>
                <button type=" submit">Add Blog</button>
                <button type="reset">Reset</button>
            </div>

        </form>

    </main>
  <?php include("footerEm.php"); ?>
</body>
</html>
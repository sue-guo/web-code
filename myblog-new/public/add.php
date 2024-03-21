<?php
    $pageTitle = 'Add Blog';
    $style = 'stylesheets/add.css';    
    $jscript = 'js/add.js';
    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');
    //if use the session, need to start the session
    session_start();

    //image upload path
    $targitDir ="images/".$_SESSION['username']."/";
    //create the directory if not exist
    if(!file_exists($targitDir)){
        mkdir($targitDir, 0777, true);
    }
    //submit has been clicked
    if($_POST['submit']){
        //insert blog into database, return the new id or false
        $userId = mysqli_real_escape_string($conn, $_SESSION['user_id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $result = insertBlog($conn, $userId, $title, $location, $description);

        if($result && isset($_FILES['image'])){
            $blogId = $result;
            //count the number of images
            $imgCount = count($_FILES['image']['name']);
            for($i = 0; $i < $imgCount; $i++){
                $imgName = $_FILES['image']['name'][$i];
                $imgDescription = mysqli_real_escape_string($conn,$_POST['imgDescription'][$i]);
                $imgPath = $targitDir.$imgName;
                //upload image
                move_uploaded_file($_FILES['image']['tmp_name'][$i], $imgPath);
                insertImage($conn, $blogId, $imgPath, $imgDescription);
            }
            header('Location: list.php');
        }else{
            echo 'add blog query error: ' . mysqli_error($conn);
        }
    }

?>

<?php include('header.php') ?>
    <main class="form-main">
        <form action="add.php" method="POST" onsubmit="return validateAdd();"enctype = "multipart/form-data">

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
                <textarea name="description" id="description" placeholder="write details for this blog" required></textarea>
            </div>
            <div id="form-group-img-container">
                <!-- <div class="form-group-img">
                    <span onclick="removeImageDiv(this);">
                        —
                    </span>
                    <div>
                        <input type="file" name="imagePath" id="imagePath" onchange="validateImage(this);">
                    </div>
                    <textarea name="imgDescription" placeholder="write description for this image"></textarea>
                </div>
                <span class="errorMsg"></span> -->
            </div>
            <div class="form-button" id="form-button">
                <input type="button" value="More Image" onclick="addImageDiv1();" ">
                <input type="submit" name="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
        <template id="imageTemplate">
            <div class="form-group-img">
                <span onclick="removeImageDiv(this);"> &nbsp;x&nbsp;</span>
                <div>
                    <input type="file" name="image[]" id="image" onchange="validateImage(this);">
                </div>
                <textarea name="imgDescription[]" placeholder="write description for this image" required></textarea>
                <span class="errorMsg"></span>
            </div>
        </template>
    </main>
<?php include('footer.php') ?>
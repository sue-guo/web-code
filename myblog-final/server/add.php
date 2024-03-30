<!-- CST8285 Assignment 2 group 12:

Hongxiu Guo: design the HTML and CSS, implement the add blog function, implement the image upload function,
implement the image validation function, implement the form validation function
Jiayun Wang: design the database structure
-->
<?php
    $pageTitle = 'Add Blog';
    $style = '../stylesheets/add_new.css';    
    $jscript = '../scripts/add.js';
    require_once('db_connect.php');
    include_once('db_functions.php');
    //if use the session, need to start the session
    session_start();

    //image upload path
    $targitDir ="../images/".$_SESSION['username']."/";
    //create the directory if not exist
    if(!file_exists($targitDir)){
        mkdir($targitDir, 0777, true);
    }
    //submit has been clicked
    if(isset($_POST['submit'])){
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
    close_connection($conn);
?>

<?php include('header.php') ?>
    <main class="form-main">
        <form action="add.php" method="POST" onsubmit="return validateAdd();"enctype = "multipart/form-data">

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title">
                <span class="errorMsg" id="title_error"></span>
            </div>
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location">
                <span class="errorMsg" id="location_error"></span>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" placeholder="write details for this blog"></textarea>
                <span class="errorMsg" id="description_error"></span>
            </div>
            <div id="form-group-img-container">
                <!-- add img div here-->
            </div>
            <span class="errorMsg" id="img_error"></span>
            <div class="form-button" id="form-button">
                <input type="button" value="More Image" onclick="addImageDiv1();">
                <input type="submit" name="submit" value="Submit">
                <input type="reset" value="Reset" id="reset">
            </div>
        </form>
        <template id="imageTemplate">
            <div class="form-group-img">
                <span onclick="removeImageDiv(this);"> &nbsp;x&nbsp;</span>
                <div>
                    <input type="file" name="image[]" id="image" onchange="validateImage(this);">
                </div>
                <textarea name="imgDescription[]" placeholder="write description for this image"></textarea>
                <span class="errorMsg"></span>
            </div>
        </template>
    </main>
<?php include('footer.php') ?>
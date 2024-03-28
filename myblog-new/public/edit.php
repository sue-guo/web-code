<?php
    $pageTitle = 'Edit Blog';
    $style = 'stylesheets/add.css';    
    $jscript = 'js/edit.js';
    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');
    //if use the session, need to start the session
    session_start();

    $blogId = '';
    if (isset($_GET['blogId']) && !isset($_POST['submit'])) {
        $blogId = $_GET['blogId'];
        $blog = searchBlogById($conn, $blogId);
        if(!empty($blog)){
            $blogDetails = searchBlogDetailByBlogId($conn, $blogId);
        }
    }
    //submit has been clicked
    if(isset($_POST['submit'])){
        //insert blog into database, return the new id or false
        $blogId = mysqli_real_escape_string($conn, $_POST['blogId']);
        $userId = mysqli_real_escape_string($conn, $_SESSION['user_id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        echo $blogId;
        echo $title;
        updateBlogById($conn, $blogId, $userId, $title, $location, $description, "", "");

        if(isset($_POST['imgDescription'])){
            //count the number of images
            $count = count($_POST['blogDetailId']);
            echo $count;
            for($i = 0; $i < $count; $i++){
                updateBlogDetailById($conn, $_POST['blogDetailId'][$i], $_POST['imgDescription'][$i]);
            }
        }else{
            echo 'edit blog query error: ' . mysqli_error($conn);
        }

        header('Location: list.php');
    }
    close_connection($conn);
?>

<?php include('header.php') ?>
    <main class="form-main">
        <form action="edit.php" method="POST" onsubmit="return validateEdit();">
            <input type="text" name="blogId" value="<?php echo $blogId ?>" hidden>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $blog['title']?>">
                <span class="errorMsg" id="title_error"></span>
            </div>
            <div class="form-group">
                <label for="title">Location:</label>
                <input type="text" id="location" name="location" value="<?php echo $blog['location'] ?>">
                <span class="errorMsg" id="location_error"></span>
            </div>
            <div class="form-group">
                <label for="title">Description:</label>
                <textarea name="description" id="description" placeholder="write details for this blog"><?php echo $blog['description'] ?></textarea>
                <span class="errorMsg" id="description_error"></span>
            </div>
            <div id="form-group-img-container">
                <?php if(!empty($blogDetails)): ?>
                    <?php foreach($blogDetails as $blogDetail): ?>
                        <div class="form-group-img">
                            <div>
                                <img src="<?php echo $blogDetail['imagePath'] ?>" alt="image">
                            </div>
                            <textarea name="imgDescription[]" placeholder="write description for this image"><?php echo $blogDetail['description']?></textarea>
                            <input type="text" name="blogDetailId[]" value="<?php echo $blogDetail['id'] ?>" hidden>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <div class="form-button" id="form-button">
                <input type="submit" name="submit" value="Submit">
                <!-- <input type="reset" value="Reset"> -->
            </div>
        </form>
    </main>
<?php include('footer.php') ?>
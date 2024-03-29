<?php
    $pageTitle = 'detail';
    $style = 'stylesheets/detail_new.css';    
    $jscript = 'js/detail.js';
    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');

    session_start();
    $blogId = '';
    if (isset($_GET['blogId'])) {
        $blogId = $_GET['blogId'];
        $blog = searchBlogById($conn, $blogId);
        if(!empty($blog)){
            $blogDetails = searchBlogDetailByBlogId($conn, $blogId);
        }
    }
    else{
        header('Location: index.php');
    }

    // insert comment in db
    if (isset($_POST['submit'])) {
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
        $userId = $_SESSION['user_id'];
        $blogId = $_GET['blogId'];
            if ($comment != '') {
            insertComment($conn, $blogId, $userId, $comment);
        }
    }

    // retrieve comments from db
    $comments = searchCommentsByBlogId($conn, $blogId);

    close_connection($conn);
?>

<?php include('header.php')?>
    <main class="bg-paper flex-container">
        <article>
            <div class="title_container">
                <h2 class="title"><?php echo $blog['title']?></h2>
                <div class="author"><?php echo $blog['author'] ?>/create at: <?php echo formatDate($blog['createtime'])?></div>
                <div class="">location: <?php echo $blog['location'] ?></div>
                <p class="detail"><?php echo $blog['description'] ?></p>
            </div>
            <section>
                <?php if(!empty($blogDetails)): $count=0; ?>
                    <?php foreach($blogDetails as $blogDetail): ?>
                        <div class="<?php echo $count%2 == 0? 'image-right':'image-left';$count++; ?>">
                            <p class=""><?php echo $blogDetail['description']?></p>
                        <div>
                        <img src="<?php echo $blogDetail['imagePath'] ?>" alt="image">
                    </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
                <!-- <div class="image-right">
                    <p class="">Traveling is not just about visiting new places; it's about immersing yourself in
                        different cultures, embracing new experiences, and creating lasting memories. From the bustling
                        streets of Tokyo to the serene beaches of Bali, each destination offers its own unique charm and
                        allure. Whether you're exploring ancient ruins, </p>
                    <div>
                        <img src="images/travel.png" alt="image">
                    </div>
                </div>
                <div class="image-left">
                    <p>Traveling is not just about visiting new places; it's about immersing yourself in
                        different cultures, embracing new experiences, and creating lasting memories. From the bustling
                        streets of Tokyo to the serene beaches of Bali, each destination offers its own unique charm and
                        allure. Whether you're exploring ancient ruins,</p>
                    <div>
                        <img src="images/travel.png" alt="image">
                    </div>
                </div> -->
            </section>
        </article>
        <aside>
            <?php if(isset($_SESSION['username']) && $_SESSION['username'] == $blog['author'] && $blog['status'] == 1): ?>
                <div class="comment_add">
                    <a href="edit.php?blogId=<?php echo $blog['id']?>"><button>Edit</button></a>
                    <a href="#" onclick="confirmDelete(<?php echo $blog['id']?>)"><button>Delete</button></a>
                    <a href="#" onclick="confirmPublish(<?php echo $blog['id']?>)" hidden><button>Publish</button></a>
                </div>
            <?php endif ?>
            <?php if(isset($_SESSION['username']) && $_SESSION['username'] == $blog['author'] && $blog['status'] == 0): ?>
                <div class="comment_add">
                    <a href="edit.php?blogId=<?php echo $blog['id']?>"><button>Edit</button></a>
                    <a href="#" onclick="confirmDelete(<?php echo $blog['id']?>)"><button>Delete</button></a>
                    <a href="#" onclick="confirmPublish(<?php echo $blog['id']?>)"><button>Publish</button></a>
                </div>
            <?php endif ?>


            <h3>Comments</h3>
            <?php if(isset($_SESSION['username'])): ?>
                <div class="comment_add">
                    <form action="detail.php?blogId=<?php echo $blog['id']?>" method="POST" onsubmit="return validateComment()">
                        <textarea name="comment" id="comment" placeholder="Leave a comment"></textarea>
                        <span class="errorMsg" id="comment_error"></span>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            <?php endif ?>

            <?php if(!empty($comments)): ?>
                <?php foreach($comments as $comment): ?>
                    <div class="comment_container">
                        <div class="comment_info">
                            <div class="comment_user"> @ <?php echo $comment['author']?></div>
                            <div class="comment_date"><?php echo formatDate($comment['createtime'])?></div>
                        </div>
                        <div class="comment_content"><?php echo $comment['content']?></div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>


        </aside>
    </main>
<?php include('footer.php')?>
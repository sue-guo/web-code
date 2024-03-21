<?php
    $pageTitle = 'My Blogs';
    $style = 'stylesheets/list.css';    
    $jscript = 'js/index.js';
    require_once('../private/db_connect.php');
    include_once('../private/db_functions.php');

    session_start();

    if (isset($_SESSION['username'])) {
        $title = '';
        $status = '';
        //search data from database,retrun all data as an array
        if(isset($_POST['submit'])){
            $title = $_POST['title'];
            $status = $_POST['status'];
        }
        //function searchAllOfUser($conn, $userId, $title, $status)
        $list = searchAllOfUser($conn ,$_SESSION['user_id'], $title, $status);

    }else{
        header('Location: login.php');
    }
    //close the connection
    close_connection($conn);
?>
<?php include('header.php') ?>
    <main>
        <div class="input-container">
                <form action="list.php" method="POST">
                    <input type="radio" name="status" value="" id="all" class="radio-input" 
                    <?php if($status == '') echo 'checked'?>>
                    <label for="all">ALL</label>
                    <input type="radio" name="status" value="1" id="published" class="radio-input"
                    <?php if($status == 1) echo 'checked'?>>
                    <label for="published">published</label>
                    <input type="radio" name="status" value="0" id="unpublished" class="radio-input"
                    <?php if($status == 0) echo 'checked'?>>
                    <label for="unpublished">non-published</label>

                    <input type="search" placeholder="Search" name="title" class="search-input "
                    value="<?php echo $title ?>">
                    <label for="search_submit">
                        <img src="images/search.png">
                    </label>
                    <input type="submit" name="submit" value="search" id="search_submit" hidden>
                </form>
                <a href="add.php"><button>add blog</button></a>
        </div>
        
        <section>
        <?php if(!empty($list)): ?>
            <?php foreach($list as $blog): ?>
            <div class="list_container">
                <div class="list_img">
                    <a href="detail.php?blogId=<?php echo $blog['id']?>">
                    <?php if(!empty($blog['img'])): ?>    
                        <img src="<?php echo $blog['img'] ?>" alt="image">
                    <?php else: ?>
                        <img src="images/travel.png" alt="image">
                    <?php endif ?>
                    </a>
                </div>
                <div class="list_info">
                    <h3><?php echo $blog['title'] ?></h3>
                    <span><?php echo formatDate($blog['createtime']); ?></span>
                    <span><?php echo formatStatus($blog['status']); ?></span>
                </div>
            </div>
            <?php endforeach ?>
        <?php endif ?>

        </section>
    </main>

    <?php include('footer.php') ?>

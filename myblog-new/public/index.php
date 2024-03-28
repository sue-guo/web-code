<?php 
    $pageTitle = 'index';
    $style = 'stylesheets/list.css';    
    $jscript = 'js/index.js';
    require('../private/db_connect.php');
    include('../private/db_functions.php');
    session_start();

    $title = '';
    if(isset($_POST['title'])){
        $title = $_POST['title'];
    }
    //retrieve all published blogs data
    $list = searchAllPublished($conn ,$title);

    //close the connection
    close_connection($conn);
?>

<?php include('header.php')?>

<main>
    <form action="index.php" method="POST">
        <div class="input-container">
            <input type="search" placeholder="Search" name="title" class="search-input "
            value="<?php echo $title ?>">
            <label for="search_submit">
                <img src="images/search.png">
            </label>
            <input type="submit" name="submit" value="search" id="search_submit" hidden>
        </div>
    </form>
    <section>
        <?php if(!empty($list)): ?>  
            <?php foreach($list as $blog): ?>
                <div class="list_container">
                    <div class="list_img">
                        <a href="detail.php?blogId=<?php echo $blog['id']?>"">
                        <?php if(!empty($blog['img'])): ?>    
                            <img src="<?php echo $blog['img'] ?>" alt="image">
                        <?php else: ?>
                            <img src="images/travel.png" alt="image">
                        <?php endif ?>
                        </a>
                    </div>
                    <div class="list_info">
                        <h3><?php echo $blog['title'] ?></h3>
                        <span><?php echo formatDate($blog['updatetime']); ?></span>
                        <span><?php echo $blog['author'] ?></span>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </section>
</main>

<?php include('footer.php')?>

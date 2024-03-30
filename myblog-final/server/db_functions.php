<!-- CST8285 Assignment 2 group 12:

Hongxiu Guo:  some database functions that to munipulate records
Jiayun Wang:  some database functions that to munipulate records
HuaiFang Yin:  some database functions that to munipulate records
-->

<?php

/*search data from database,retrun all data that published*/
function searchAllPublished($conn, $title){
    $sql = "select t1.*, t2.username as author,"
            ."(select t3.imagePath from blogdetails t3 WHERE t1.id = t3.blogId LIMIT 1) as img"
            ." from blogs t1 left join users t2 on t1.userId = t2.id where t1.status = 1";
    
    if($title != ""){
        $sql .= " and t1.title like '%$title%'";
    }
    $sql .= " order by t1.updatetime desc";
    $result = mysqli_query($conn, $sql);
    $list = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $list;

}


/*search data from database,retrun all data belong to the user*/
function searchAllOfUser($conn, $userId, $title, $status){
    $sql = "select t1.*,(select t2.imagePath from blogdetails t2 WHERE t1.id = t2.blogId LIMIT 1) as img"
         ." from blogs t1 where 1";
    if($userId != ""){
        $sql .= " and t1.userId = $userId";
    }
    if($title != ""){
        $sql .= " and t1.title like '%$title%'";
    }
    if($status != ""){
        $sql .= " and t1.status = '$status'";
    }
    $sql .= " order by t1.createtime desc";
    $result = mysqli_query($conn, $sql);
    //$list = mysqli_fetch_assoc($result);//fetching only one row data
    $list = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $list;

}
/*search blog by id*/
function searchBlogById($conn, $blogId){
    $sql = "select t1.*, t2.username as author"
        ." from blogs t1 left join users t2 on t1.userId = t2.id where 1";
    if($blogId != ""){
        $sql .= " and t1.id = $blogId";
    }
    $result = mysqli_query($conn, $sql);
    $blog = mysqli_fetch_assoc($result);//fetching only one row data
    return $blog;
}
/*search blog details by blog id*/
function searchBlogDetailByBlogId($conn, $blogId){
    $sql = "select * from blogdetails where 1";
    if($blogId != ""){
        $sql .= " and blogId = $blogId";
    }
    $result = mysqli_query($conn, $sql);
    $blogDetails = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return $blogDetails;
}
/*add new blog, return the new id or false */
function insertBlog($conn, $userId, $title, $location, $description){
    $sql = "insert into blogs(userId, title, description, location, status)"
            ." values( $userId, '$title', '$description', '$location', 0)";
    $result = mysqli_query($conn, $sql);
    if($result){
        return mysqli_insert_id($conn);
    }else{
        echo "<br> insertBlog error:".mysqli_error($conn);
        return false;
    }
}

/*insert image info into database*/
function insertImage($conn, $blogId, $imgPath, $imgDescription){
    $sql = "insert into blogdetails(blogId, imagePath, description)"
            ." values($blogId, '$imgPath', '$imgDescription')";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function updateBlogById($conn, $blogId, $userId, $title, $location, $description, $status, $viewCount){
    $sql = "update blogs set updatetime = now()";
    if(!empty($userId)){
        $sql .= ", userId = $userId";
    }
    if(!empty($title)){
        $sql .= ", title = '$title'";
    }
    if(!empty($location)){
        $sql .= ", location = '$location'";
    }
    if(!empty($description)){
        $sql .= ", description = '$description'";
    }
    if(!empty($status)){
        $sql .= ", status = $status";
    }
    if(!empty($viewCount)){
        $sql .= ", viewcount = $viewCount";
    }
    $sql .= " where id = $blogId";
    echo $sql;  
    $result = mysqli_query($conn, $sql);
    return $result;
}

function updateBlogDetailById($conn, $blogDetailId, $imgDescription){
    $sql = "update blogdetails set id = $blogDetailId";
    if(!empty($imgDescription)){
        $sql .= ", description = '$imgDescription'";
    }
    $sql .= " where id = $blogDetailId";
    $result = mysqli_query($conn, $sql);
    return $result;
}

/*format the date*/
function formatDate($time){
    $time = strtotime($time);
    return date('Y-m-d', $time);
}
/*return the status name*/
function formatStatus($status){
    $statusName = '';
    if($status == 1){
        $statusName = 'published';
    }else if($status == 0){
        $statusName = 'non-published';
    }
    return $statusName;
}



// delete blog
function deleteBlogById($conn, $blogId){
    $sql = "delete from blogs where id = $blogId";
    $result = mysqli_query($conn, $sql);
    return $result;
}


// Publish bolg
function publishBlogById($conn, $blogId){
    $sql = "update blogs set status = 1, updatetime = now() where id = $blogId";
    $result = mysqli_query($conn, $sql);
    return $result;
}


// insert comment
function insertComment($conn, $blogId, $userId, $comment){
    $sql = "insert into comments(blogId, userId, content)"
            ." values($blogId, $userId, '$comment')";
    $result = mysqli_query($conn, $sql);
    return $result;
}


// search comments by blog id
function searchCommentsByBlogId($conn, $blogId){
    $sql = "select t1.*, t2.username as author"
            ." from comments t1 left join users t2 on t1.userId = t2.id where 1";
    if($blogId != ""){
        $sql .= " and t1.blogId = $blogId";
    }
    $result = mysqli_query($conn, $sql);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $comments;
}



?>
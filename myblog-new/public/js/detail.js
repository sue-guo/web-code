function confirmDelete(blogId) {
    if (confirm("Are you sure you want to delete this blog post?")) {
        window.location.href = "delete.php?blogId=" + blogId;
    }
}

function confirmPublish(blogId) {
    if (confirm("Are you sure you want to publish this post?")) {
        window.location.href = "publish.php?blogId=" + blogId;
    }
}

// valiadate comment
let comment = document.getElementById("comment");
let comment_error = document.getElementById("comment_error");

function validateComment() {
    let valid = true;
    if (comment.value == "") {
        comment_error.innerHTML = "Please enter a comment.";
        valid = false;
    }
    return valid;
}

    comment.addEventListener('focus', function(){
        comment_error.innerHTML = "";
    });

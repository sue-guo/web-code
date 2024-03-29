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


function confirmDelete(blogId) {
    if (confirm("Are you sure you want to delete this blog post?")) {
        window.location.href = "delete.php?blogId=" + blogId;
    }
}

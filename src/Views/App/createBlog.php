<?php
ob_start();
?>

<h1>Create new blog</h1>

<form action="/storeBlog/" method="post" enctype="multipart/form-data">
    <input type="text" name="title_blog" id="title_blog" placeholder="Blog title">
    <label for="title_blog" class="error"></label>
    <textarea name="description_blog" id="description_blog" placeholder="Blog description"></textarea>
    <label for="description_blog" class="error"></label>
    <input type="file" name="file_blog" id="file_blog">
    <button type="submit">Create</button>
</form>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>
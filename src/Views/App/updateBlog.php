<?php
ob_start();
?>

<h1>Update blog</h1>

<form action="/updateBlog/<?= escape($blog->getid_blog()) ?>/" method="post" enctype="multipart/form-data">
    <input type="hidden" name="current_file_blog" value="<?= escape($blog->getfile_blog()) ?>">
    <div>
        <input type="text" name="title_blog" id="title_blog" placeholder="Blog title"
            value="<?= escape($blog->gettitle_blog()) ?>">
        <label for="title_blog" class="error"><?= error("title_blog") ?></label>
    </div>
    <div>
        <textarea name="description_blog" id="description_blog"
            placeholder="Blog description"><?= escape($blog->getdescription_blog()) ?></textarea>
        <label for="description_blog" class="error"><?= error("description_blog") ?></label>
    </div>
    <div>
        <label for="file_blog"><img src="/files/<?= escape($blog->getfile_blog()) ?>"
                alt="<?= escape($blog->getfile_blog()) ?>"></label>
        <input type="file" name="file_blog" id="file_blog">
        <label for="file_blog" class="error"><?= error("file_blog") ?></label>
    </div>
    <div>
        <?php $arrayDatetime = explode(" ", escape($blog->getdatetime_blog()));
        $date = $arrayDatetime[0] ?>
        <input type="date" name="date_blog" id="date_blog" placeholder="Blog date" value="<?= $date ?>">
        <label for="date_blog" class="error"><?= error("date_blog") ?></label>
    </div>
    <button type="submit">Update</button>
</form>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>
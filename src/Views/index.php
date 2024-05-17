<?php
ob_start();
?>

<h1>Blogs</h1>

<div class="blogs">
    <?php foreach ($blogs as $blog) {
        $date = new DateTime($blog->getdatetime_blog()); ?>
        <article id="blog_<?= escape($blog->getid_blog()) ?>">
            <img src="/files/<?= escape($blog->getfile_blog()) ?>" alt="<?= escape($blog->getfile_blog()) ?>">
            <div>
                <h2><?= escape($blog->gettitle_blog()) ?></h2>
                <strong><?= escape($blog->getusername()) ?></strong>
            </div>
            <p><?= escape($blog->getdescription_blog()) ?></p>
            <time datetime="<?= escape($date->format("Y-m-d h:i:s")) ?>"><?= escape($date->format("Y/m/d")) ?></time>
            <a class="buttonsUpdate"
                href="/update-blog/<?= escape($blog->getid_blog()) ?>/<?= escape($blog->getid_user()) ?>/">Update</a>
            <button class="buttonsDelete" data-id="<?= escape($blog->getid_blog()) ?>">Delete</button>
        </article>
    <?php } ?>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>
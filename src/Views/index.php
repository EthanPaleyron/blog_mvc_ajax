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
            <form id="newComment" data-blog="<?= escape($blog->getid_blog()) ?>"
                data-username="<?= $_SESSION["user"]["username"] ?>">
                <input type="text" name="content_comment" id="content_comment">
                <button type="submit" class="button">Comment</button>
            </form>
            <div class="comments">
                <?php foreach ($blog->getComments() as $comment) {
                    $date = new DateTime($comment->getdatetime_comment()); ?>
                    <div class="comment">
                        <strong><?= escape($comment->getusername()) ?></strong>
                        <p><?= escape($comment->getcontent_comment()) ?></p>
                        <time datetime="<?= escape($date->format("Y-m-d h:i:s")) ?>">
                            <?= escape($date->format("Y/m/d")) ?>
                        </time>
                        <form action="/storeSubComment/<?= escape($comment->getid_comment()) ?>/" method="post"
                            enctype="multipart/form-data">
                            <input type="text" name="content_sub_comment" id="content_sub_comment">
                            <button type="submit" class="button">Comment</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </article>
    <?php } ?>
</div>
<script type="module" src="/js/deleteBlogAjax.js"></script>
<script type="module" src="/js/createCommentAjax.js"></script>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>
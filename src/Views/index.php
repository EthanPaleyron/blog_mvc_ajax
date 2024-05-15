<?php
ob_start();
?>

<h1>Blogs</h1>

<div class="blogs">
    <article>
        <img src="" alt="">
        <h2>title</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis, repudiandae facilis, magnam nihil accusamus
            velit, inventore quia neque aut ipsam nesciunt libero! Consequatur, aperiam fugit assumenda ipsum ducimus
            itaque corrupti.</p>
        <time datetime="15-05-2024">15/05/2024</time>
        <a href="/update-blog/x/">Update</a>
        <a href="/delete-blog/x/">Delete</a>
    </article>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>
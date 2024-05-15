<?php
ob_start();
?>

<h1>Update blog</h1>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>
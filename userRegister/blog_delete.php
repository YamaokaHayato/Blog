<?php

require_once("blog.php");
ini_set("display_errors", "On");

$blog = new Blog();

$result = $blog->delete($_GET["id"]);

?>

<p><a href="/">戻る</a></p>
<?php

// ①require_onceを使ってみよう
require_once("blog.php");
ini_set("display_errors", "On");
$blog = new Blog();
// ②namespaceを設定しよう
// 変数名、関数名などの重複(名前衝突)を回避するために使われる
// 一番最初に書く
// ③useを使おう! namespaceと一緒に使うことが多い

// ②詳細ページでidを受け取る
// PHPの$_GETでidを取得
// $id = $_GET["id"];

$result = $blog->getById($_GET["id"]);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ詳細</title>
</head>
<body>
    <h2>ブログ詳細</h2>
    <h3>タイトル：<?php echo $result["title"] ?></h3>
    <p>投稿日時：<?php echo $result["post_at"] ?></p>
    <p>カテゴリ：<?php echo $blog->setCategoryName($result["category"]) ?></p>
    <hr>
    <p>本文：<?php echo $result["content"] ?></p>
    <p><a href="/">戻る</a></p>
</body>
</html>
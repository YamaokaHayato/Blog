<?php
//変数
//ブログのタイトル
$title = "PHPテスト";
$content = "PHPのテストです";
$post_at = "2020/1/19";
$tag = ["PHP", "プログラミング"];
$status = true; //公開 //非公開 false
//定数
const ID = 1;

echo ID;
echo "<br>"; //改行
echo $title;
echo "<br>";
echo $content;
echo "<br>";
echo $post_at;
echo "<br>";
print_r($tag);

//データ型
var_dump($status); //データ型を調べたいときに使用

//""と''の違い
echo "<br>";
echo "タイトル名:$title"; //変数として展開ができる
echo "<br>";
echo 'タイトル名:$title'; //そのまま文字列として表示
//''の方が処理速度が速い
?>
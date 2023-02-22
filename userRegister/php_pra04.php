<?php
//変数
//ブログのタイトル
const ID = 1;
$title = "PHPテスト";
$content = "PHPのテストです";
$post_at = "2020/1/19";
$tag = ["PHP", "プログラミング"];
$status = true; //公開 //非公開 false

// ブログ2
const ID2 = 2;
$title2 = "PHPテスト2";
$content2 = "PHPのテストです2";
$post_at2 = "2020/1/19";
$tag2 = ["PHP2", "プログラミング2"];
$status2 = true; //公開 //非公開 false


// 2つの記事データを配列に入れてループ処理で表示する
// ブログ①
$blog1 = array(
    'id' => ID,
    'title' => $title,
    'content' => $content,
    'post_at' => $post_at,
    'tag' => $tag,
    'status' => $status
);

// 配列の取り出し方
// 配列の中から添字orキーを指定する
// echo $blog1['title'];

// PHP5.4以降では配列の短縮構文が追加されarray()の代わりに[]を使用できるようになった
// ブログ②
$blog2 = [
    'id2' => ID2,
    'title2' => $title2,
    'content2' => $content2,
    'post_at2' => $post_at2,
    'tag2' => $tag2,
    'status2' => $status2
];
// echo '<pre>';
// var_dump($blog2);
// echo '</pre>';

// 多次元配列
// 配列の中に配列
$blogs = [$blog1, $blog2];
// echo '<pre>';
// var_dump($blogs); //var_dumpは基本はデバッグ用
// echo '</pre>';

// ループ処理
// foreachの練習
// ①バリューのみ出力
// foreach($blog1 as $blog) {
//     echo '<pre>';
//     echo $blog;
//     echo '</pre>';
// }
// ②キーとバリューを出力
// foreach($blog2 as $key => $value) {
//     echo '<pre>';
//     echo $key , $value;
//     echo '</pre>';
// };

// 多次元配列blogsを展開するには？
foreach($blogs as $blogg) {
    foreach($blogg as $blog) {
        echo '<pre>';
        echo $blog;
        echo '</pre>';
    }
}

?>

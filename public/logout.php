<?php
session_start();
require_once("../classes/UserLogic.php");

// ログアウトボタンが押されなかったら不正なリクエスト
if(!$logout = filter_input(INPUT_POST, "logout")) {
    exit("不正なリクエストです");
}

// ログインしているかを判定し、セッションが切れていたらログインしてくださいと出す
// PHPのセッションの期限はデフォで24分
$result = UserLogic::checkLogin();

if(!$result) {
    exit("セッションが切れましたので、ログインし直してください");
}

// ログアウトする
UserLogic::logout();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
</head>
<body>
    <h2>ログアウト完了</h2>
    <p>ログアウトしました</p>
    <a href="login_form.php">ログイン画面へ</a>
    </form>
</body>
</html>
<?php

require_once "../dbConnect.php";

Class UserLogic {

/**
 * ユーザーを登録する
 * @param array $userData
 * @return bool $result
 */
public static function createUser($userData) {

    $result = false;
    $sql = "INSERT INTO users (name ,email, password) VALUES (?, ?, ?)";

    // ユーザデータを配列に入れる
    $arr = [];
    $arr[] = $userData["username"];
    $arr[] = $userData["email"];
    $arr[] = password_hash($userData["password"], PASSWORD_DEFAULT);
    try {
        $stmt = connect()->prepare($sql);
        $result = $stmt->execute($arr);
        return $result;
    } catch(\Exception $e) {
        return $result;
    }
    

}

/**
 * ログイン処理
 * @param string $email
 * @param string $password
 * @return bool $result
 */
public static function login($email, $password) {

    // 結果
    $result = false;
    // ユーザをemailから検索して取得
    $user = self::getUserByEmail($email);
    
    if(!user) {
        $_SESSION["msg"] = "メールアドレスが一致しましせん";
        return $result;
    }
    
    // パスワードの照会
    if(password_verify($password, $user["password"])) {
        // ログイン成功
        session_regenerate_id(true); //セッションハイジャック対策
        $_SESSION["login_user"] = $user;
        $result = true;
        return $result;
    }
    
        $_SESSION["msg"] = "パスワードが一致しましせん";
        return $result;
    
}

/**
 * emailからユーザを取得
 * @param string $email
 * @return array|bool $result|false
 */
public static function getUserByEmail($email) {

    // SQLの準備
    // SQLの実行
    // SQLの結果を返す

    $sql = "SELECT * FROM users WHERE email = ?";
    // ユーザデータを配列に入れる
    $arr = [];
    $arr[] = $email;
    
    try {
        $stmt = connect()->prepare($sql);
        $result = $stmt->execute($arr);
        // SQLの結果を返す emailから1件のユーザ情報を取得
        $user = $stmt->fetch();
        return $user;
    } catch(\Exception $e) {
        return $false;
    }
}

/**
 * ログインチェック
 * @param void
 * @return bool $result
 */
public static function checkLogin() {
    $result = false;
    // セッションにログインユーザーが入っていなかったらfalse
    // isset = 変数が入っているかをtrue or falseで判定
    if (isset($_SESSION["login_user"]) && $_SESSION["login_user"]["id"] > 0) {
        return $result = true;
    } 

    return $result;
}

/**
 * ログアウト処理
 * 
 */
public static function logout() {

// セッションの中身を空にする
$_SESSION = array();
// セッションを破棄する
session_destroy();

}

}

?>
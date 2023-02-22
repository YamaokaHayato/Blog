<?php

require_once("env.php"); // gitにはenv.phpはあげない

Class Dbc {

    protected $table_name;

    // コンストラクタの定義
    // function __construct($table_name) {
    //     $this->$table_name = $table_name;
    // }

    // 関数に1つの機能のみを持たせる
    // 1.データベース接続
    // 引数：なし
    // 戻り値：接続結果を返す
    protected function dbConnect() {
        $host   = DB_HOST;
        $dbname = DB_NAME;
        $user   = DB_USER;
        $pass   = DB_PASS;
        $dsn    = "mysql:host=$host;dbname=$dbname;charset=utf8";
        try{
            $dbh = new PDO($dsn, $user, $pass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //エラーを表示する
            ]);
        } catch(PDOException $e) {
            echo "接続失敗". $e->getMessage(); //エラーメッセージの表示
            exit();
        };
        return $dbh;
    }
    // 2.データを取得する
    // 引数：なし
    // 戻り値：取得したデータ

    // idをもとにデータベースから記事を取得
    // SELECT文でプレースホルダーを使う

    public function getAll() {
        $dbh = $this->dbConnect();
        // ①SQLの準備
        $sql = "SELECT * FROM $this->table_name";
        // ②SQLの実行
        $stmt = $dbh->query($sql);
        // ③SQLの結果を受け取る
        $result = $stmt->fetchall(\PDO::FETCH_ASSOC); // fetchall 全てのデータを返す
        return $result;
        $dbh = null;
    }
    // 取得したデータを表示
    // $blogData = getAllBlog();

    
    // 引数：ID
    // 戻り値：$result
    public function getById($id) {
        if(empty($id)) {
            exit("IDが不正です");
        }
        
        $dbh = $this->dbConnect();
        
        // SQL準備
        $stmt = $dbh->prepare("SELECT * FROM $this->table_name WHERE id = :id");
        $stmt->bindValue(":id", (int)$id, PDO::PARAM_INT);
        // $idのデータ型変換を忘れずに(Varchar型で取得)
        // prepareを使用する場合はDB接続のオプションを追加
        // SQL実行
        $stmt->execute();
        // 結果を取得
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result) {
            exit("ブログがありません");
        }
        return $result;
    }

    public function delete($id) {
        if(empty($id)) {
            exit("IDが不正です");
        }
        
        $dbh = $this->dbConnect();
        
        // SQL準備
        $stmt = $dbh->prepare("DELETE FROM $this->table_name WHERE id = :id");
        $stmt->bindValue(":id", (int)$id, PDO::PARAM_INT);
        // $idのデータ型変換を忘れずに(Varchar型で取得)
        // prepareを使用する場合はDB接続のオプションを追加
        // SQL実行
        $result = $stmt->execute();
        echo "ブログを削除しました";
        return $result;
    }
    
}


?>


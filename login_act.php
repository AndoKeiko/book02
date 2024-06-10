<?php
ini_set( 'display_errors', 1 );
session_start();

//POST値
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE lid=:lid");// prepareメソッドを呼び出し
$stmt->bindValue(':lid',$lid, PDO::PARAM_STR);// bindValueメソッドを呼び出し
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status == false){
  sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();

//5.該当１レコードがあればSESSIONに値を代入
$pw = password_verify($lpw, $val["lpw"]);
if($pw){
  $_SESSION["chk_ssid"] = session_id();
  $_SESSION["id"] = $val["id"];
  $_SESSION["lid"] = $val["vid"];
  //Login成功時
  redirect("index.php");

} else {
  //login失敗時
  $_SESSION['error'] = "IDかパスワードが間違えています";
  redirect("login.php");
}

exit();







?>
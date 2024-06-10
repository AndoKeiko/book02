<?php
ini_set("display_errors", 1); 
session_start();
include "funcs.php";
//1. POSTデータ取得
$bid = $_POST["bid"];
$title = $_POST["title"];
$authors = $_POST["authors"];
$publisher = $_POST["publisher"];
$publishedDate = $_POST["publishedDate"];
$thumbnail = $_POST["thumbnail"];
$description = $_POST["description"];
$get_count = $_POST["get_count"];
$buyLink = $_POST["buyLink"];
//2. DB接続します
$pdo = db_conn();
//３．データ登録SQL作成
$sql = "INSERT INTO diet_table(uid,input_date,weight,step,fat,stamp,memo,indate) VALUES (:uid,:input_date,:weight,:step,:fat,:stamp,:memo,sysdate())";
$stmt = $pdo->prepare($sql);
//バインド変数入れる
// $stmt->bindValue(':id', "", PDO::PARAM_INT);
$stmt->bindValue(':bid', $bid, PDO::PARAM_INT);
$stmt->bindValue(':title', $title, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':authors', $authors, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 
$stmt->bindValue(':publisher', $publisher, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':publishedDate', $publishedDate, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':thumbnail', $thumbnail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':description', $description, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':get_count', $get_count, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':buyLink', $buyLink, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();//true or false


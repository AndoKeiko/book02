<!DOCTYPE html>
<html lang="ja">

<head>
  <title>本棚アプリ</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="./css/output.css" rel="stylesheet">
  <link href="./css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
  <header class="header">
    <div class="container xl:container mxl:mx-auto md:container md:mx-auto">
      <h1 class="h1"><a href="./index.php">Honbako</a></h1>
      <div class="left_box">
        <form name="search_head" action="search.php" method="post" id="header_search"><input type="text" name="search" class="input_text"><button type="submit"><i class="bi bi-search"></i></button></form>
        <ul class="unav">
          <li class="unav_item"><i class="bi bi-bookshelf"></i></li>
          <li class="unav_item"><i class="bi bi-person-fill-gear"></i></li>
          <li class="unav_item prof">
            <p class="user_icon"><img src="./img/img_user01.jpg"></p>
            <ul class="sub_unav_item">
              <li class="sub_unav_item"><a href="./home.php">ホーム</a></li>
              <li class="sub_unav_item"><a href="./logout.php">ログアウト</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="wave"></div>
  </header>

  <main class="main">
  <div class="container xl:container mxl:mx-auto md:container md:mx-auto">
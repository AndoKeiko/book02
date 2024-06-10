<?php
session_start();
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
$bid = $_POST["bid"];
$authors = $_POST["authors"];
$publisher = $_POST["publisher"];
$publishedDate = $_POST["publishedDate"];
$title = $_POST["title"];
$authors = $_POST["authors"];
$publisher = $_POST["publisher"];
$publishedDate = $_POST["publishedDate"];
$thumbnail = $_POST["thumbnail"];
$description = $_POST["description"];
$get_count = $_POST["get_count"];
$buyLink = $_POST["buyLink"];
$_POST = array();
?>
<?php include 'header.php'; ?>

<form action="./detail_insert.php" method="post" id="booklist_form" class="booklist_form">
  <div class="detail_box">
    <div class="detail_left">
      <p class="book_item_img"><img src="<?= $thumbnail; ?>"></p>
    </div>
    <div class="detail_right">
      <h2 class="bookitem_title"><?= $title; ?><span>(<?= $publisher; ?>)</span></h2>
      <p class="bookitem_authors">著者: <?= $authors; ?></p>
      <p class="bookitem_publisher"><?= $publisher; ?> (<?= $publishedDate; ?>発売)</p>
      <p class="book_item_description"><?= $description; ?></p>
      <ul class="book_btn">
        <li class="book_btn_item"><button type="submit"><i class="bi bi-plus-circle"></i> 本箱に入れる</button></li>
        <li class="book_btn_item"><a href="<?= $buyLink ?>" target="_blank">購入する</a></li>
      </ul>

    </div>
    <div class="detail_sns">
      
    </div>
  </div>




  <input type="hidden" name="bid" value="<?= $bid; ?>">

</form>
<?php  ?>
<?php include 'footer.php'; ?>
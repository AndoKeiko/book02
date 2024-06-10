<?php

// 検索条件を配列にする
$params = array(
  'intitle'  => 'スキップ・ビート！',  //書籍タイトル
  'inauthor' => '仲村佳樹',       //著者
);

// 1ページあたりの取得件数
$maxResults = 10;

// ページ番号（1ページ目の情報を取得）
$startIndex = 0;  //欲しいページ番号-1 で設定

//ソート順
$sort = 'newest';

// APIの基本になるURL
$base_url = 'https://www.googleapis.com/books/v1/volumes?q=';

// 配列で設定した検索条件をURLに追加
foreach ($params as $key => $value) {
  $base_url .= $key . ':' . $value . '+';
}

// 末尾につく「+」をいったん削除
$params_url = substr($base_url, 0, -1);

// 件数情報を設定
$url = $params_url . '&maxResults=' . $maxResults . '&startIndex=' . $startIndex . '&orderBy=' . $sort;

// 書籍情報を取得
$json = file_get_contents($url);

// デコード（objectに変換）
$data = json_decode($json);

// 全体の件数を取得
$total_count = $data->totalItems;

// 書籍情報を取得
$books = $data->items;

// 実際に取得した件数
$get_count = count($books);
// var_dump($get_count);
?>

<?php include 'header.php'; ?>
<script>
  let i = 1;
</script>
<p class="mb-5">全<?php echo $total_count; ?>件中、<?php echo $get_count; ?>件を表示中</p>

<!-- 1件以上取得した書籍情報がある場合 -->
<?php if ($get_count > 0) : ?>

  <div class="loop_books">

    <!-- 取得した書籍情報を順に表示 -->
    <?php
    // var_dump($books);
    $i = 1;
    foreach ($books as $book) :

      // var_dump($book->saleInfo->buyLink);
      // タイトル
      if (isset($book->id)) {
        $bid = $book->id;
      } else {
        $bid = "-";
      }

      // タイトル
      if (isset($book->volumeInfo->title)) {
        $title = $book->volumeInfo->title;
      } else {
        $title = "-";
      }
      // サムネ画像
      if (isset($book->volumeInfo->imageLinks->thumbnail)) {
        $thumbnail = $book->volumeInfo->imageLinks->thumbnail;
      } else {
        $thumbnail = "";
      }
      // 出版社
      if (isset($book->volumeInfo->publisher)) {
        $publisher = $book->volumeInfo->publisher;
      } else {
        $publisher = "";
      }
      // 出版日
      if (isset($book->volumeInfo->publishedDate)) {
        $publishedDate = $book->volumeInfo->publishedDate;
      } else {
        $publishedDate = "-";
      }
      // 説明
      if (isset($book->volumeInfo->description)) {
        $description = $book->volumeInfo->description;
      } else {
        $description = "";
      }
      // 著者（配列なのでカンマ区切りに変更）
      if (isset($book->volumeInfo->authors)) {
        $authors = implode(',', $book->volumeInfo->authors);
      } else {
        $authors = "-";
      }
      // 巻
      if (isset($book->volumeInfo->orderNumber)) {
        $orderNumber = implode(',', $book->volumeInfo->orderNumber);
      } else {
        $orderNumber = "-";
      }
      //購入ページ
      if (isset($book->saleInfo->buyLink)) {
        $buyLink = $book->saleInfo->buyLink;
      } else {
        $buyLink = "-";
      }

      if ($thumbnail) {
    ?>
        <form action="./detail.php" method="POST" id="detail_box[<?= $i ?>]" class="detail_box">
          <div class="loop_books_item">
            <!-- <label for="books_item[<?= $i ?>]">
              <input type="checkbox" name="book_select[<?= $i ?>]" class="books_item" id="books_item[<?= $i ?>]"> -->
              <a href="detail.php" class="books_item_btn" id="books_item_btn[<?= $i ?>]">
                <img src="<?= $thumbnail; ?>" alt="<?= $title; ?>"><br />
                <p class="book_item_title">
                  『<?= $title; ?>』</p>
                <p class="book_item_authors">著者：<?= $authors; ?></p>
                <p class="book_item_authors"><?= $publisher; ?>(<?= $publishedDate; ?>発売)</p>
                <input type="hidden" name="bid" value="<?= $bid; ?>">
                <input type="hidden" name="title" value="<?= $title; ?>">
                <input type="hidden" name="authors" value="<?= $authors; ?>">
                <input type="hidden" name="publisher" value="<?= $publisher; ?>">
                <input type="hidden" name="publishedDate" value="<?= $publishedDate; ?>">
                <input type="hidden" name="thumbnail" value="<?= $thumbnail; ?>">
                <input type="hidden" name="description" value="<?= $description; ?>">
                <input type="hidden" name="get_count" value="<?= $get_count; ?>">
                <input type="hidden" name="buyLink" value="<?= $buyLink ?>">
              </a>
              <!-- </label> -->
          </div>
        </form>

    <?php
      }
      $i++;
    endforeach; ?>

    <!-- ./loop_books -->

    <!-- 書籍情報が取得されていない場合 -->
  <?php else : ?>
    <p>情報が有りません</p>

  <?php endif; ?>
  </div>
  <script>
          i = <?php echo $i; ?>;
          $(document).ready(function() {
            $(".books_item_btn").click(function(e) {
              // alert("押した");
              e.preventDefault();
              $(this).closest('.detail_box').submit();
            });
          });
  </script>
  <?php include 'footer.php'; ?>
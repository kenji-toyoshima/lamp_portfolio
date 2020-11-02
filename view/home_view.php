<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>商品一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  

  <div class="container">
    <h1>商品一覧</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>



    <div class="card-deck">
      <div class="row">
      <?php foreach($items as $item){ ?>
        <div class="col-6 item">
          <div class="card h-100 text-center">
            <div class="card-header">
              <?php print($item['name']); ?>
            </div>
            <figure class="card-body">
              <img class="card-img" src="<?php print(IMAGE_PATH . $item['image']); ?>">
              <figcaption>
                <?php print(number_format($item['price'])); ?>円
                <?php if($item['stock'] > 0){ ?>
                  <form action="index_add_cart.php" method="post">
                    <input type="submit" value="カートに追加" class="btn btn-primary btn-block">
                    <input type="hidden" name="item_id" value="<?php print($item['item_id']); ?>">
                    <!-- トークンの埋め込み -->
                    <input type="hidden" name="token" value="<?php print($token); ?>">
                  </form>
                <?php } else { ?>
                  <p class="text-danger">現在売り切れです。</p>
                <?php } ?>
              </figcaption>
            </figure>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>

    <nav aria-label="Page navigation" class="mt-5">
      <ul class="pagination pagination-lg">
        <li class="page-item <?php $page==1 ? print "disabled": print ""; ?>">
          <a class="page-link" href="home.php?page=<?php print($page-1); ?>">Prev</a>
        </li>

    <?php
        for ($i = 1; $i <= $total_page; $i++) {
    ?>
        <li 
          class="page-item 
          <?php 
            if($i == $page){
              print("active");
            }
          ?>
        ">
        <a class="page-link" href="home.php?page=<?php print($i); ?>"><?php print($i); ?></a></li>
    <?php
        }
    ?>
      <li class="page-item
        <?php 
            if($page==$total_page){
              print("disabled");
            }
        ?>
      ">
        <a class="page-link" href="home.php?page=<?php print($page+1); ?>">Next</a>
      </li>
  </div>
  
</body>
</html>
<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

// PDOを取得
$db = get_db_connect();

// PDOを利用してログインユーザーのデータを取得<user.php参照>
$user = get_login_user($db);

// 商品一覧用の商品データを取得(公開している商品のみ) <item.php参照>

if(isset($_GET['pulldown']) === TRUE){
  //pulldownの値を取得
  $pulldown = get_get('pulldown');

}

//デフォルトは１ページ
$page=1;
//$_GET['page']に値が入っていればその値を取得
$page = get_get('page');


//配列から商品数を取り出す
$count_array = get_count_item($db);
$count = $count_array[0]["count(*)"];

//必要なページ数を計算
$total_page = ceil($count/8);

//ページ毎に8個商品を取り出すためのlimitを計算
$limit = 8*($page-1);

// 商品一覧用の商品データをページネーション用に8個ずつ取得(公開している商品のみ) <item.php参照>
$items = get_pagenation_items($db,$limit,TRUE,$pulldown);

 




//HTMLエンティティ処理
$items = entity_assoc_array($items);

// CSRFトークンの生成<function.php参照>
$token= get_csrf_token();

include_once VIEW_PATH . 'home_view.php';
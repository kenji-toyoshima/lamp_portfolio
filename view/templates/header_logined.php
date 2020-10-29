<header>
  <nav class="navbar navbar-expand-sm navbar-light bg-dark text-white">
    <a class="navbar-brand text-white" href="<?php print(HOME_URL);?>">Engineer Shop</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#headerNav" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="ナビゲーションの切替">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="headerNav">
      <ul class="navbar-nav mr-auto text-white">
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php print(CART_URL);?>">カート</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="<?php print(LOGOUT_URL);?>">ログアウト</a>
        </li>
        <li class="nav-item text-white">
          <a class="nav-link text-white" href="<?php print(HISTORY_URL);?>">購入履歴</a>
        </li>

        <?php if(is_admin($user)){ ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="<?php print(ADMIN_URL);?>">管理</a>
          </li>
        <?php } ?>


      </ul>

      <p class="my-2">ようこそ、<?php print($user['name']); ?>さん。</p>
      

      <form class="form-inline my-2 my-lg-0" method="get" action="/index.php">
        <select class="form-control mr-sm-2" name="pulldown">
          <option value="新着順">新着順</option>
          <option value="価格の安い順">価格の安い順</option>
          <option value="価格の高い順">価格の高い順</option>
        </select>
        <input class="btn my-2 my-sm-0" type="submit" value="並び替え">
      
      </form>    


    </div>
  </nav>
</header>
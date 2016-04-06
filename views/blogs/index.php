<!-- 新規登録画面へ遷移するリンクを設置 -->
<div>
  <a href="/seed_blog/blogs/add/" class="btn btn-info">新規ブログ投稿</a>
</div>


<?php foreach ($this->viewOptions as $viewOption): ?>
  <!-- htmlと絡めて取得データの出力をする -->
  <?php echo $viewOption['id']; ?> : 
  <a href="/seed_blog/blogs/show/<?php echo $viewOption['id'] ?>">
    <?php echo $viewOption['title']; ?>
  </a> : 
  <?php echo $viewOption['created']; ?>

  <!-- 編集画面へ遷移するボタン -->
  [<a href="/seed_blog/blogs/edit/<?php echo $viewOption['id']; ?>" style="color: #00994C;">編集</a>] 

  <!-- 削除ボタン -->
  [<a href="/seed_blog/blogs/delete/<?php echo $viewOption['id']; ?>" style="color: #F33;">削除</a>]

  <br>
<?php endforeach; ?>

















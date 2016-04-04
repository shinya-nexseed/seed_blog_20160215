<?php foreach ($this->viewOptions as $viewOption): ?>
  <!-- htmlと絡めて取得データの出力をする -->
  <?php echo $viewOption['id']; ?> : 
  <a href="/seed_blog/blogs/show/<?php echo $viewOption['id'] ?>">
    <?php echo $viewOption['title']; ?>
  </a> : 
  <?php echo $viewOption['created']; ?><br>
<?php endforeach; ?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>フレームワークブロク</title>
</head>
<body>
  ヘッダー<br>
  <!-- 各ページに必要なコードをURLを元にrequire (処理自体はcontrollerで) -->
  <?php
      include('views/blogs/' . $this->action . '.php');
  ?>
  フッター
</body>
</html>

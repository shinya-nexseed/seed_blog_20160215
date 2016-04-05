<form method="post" action="/seed_blog/blogs/update/<?php echo $this->viewOptions['id']; ?>">
  
  <div>
    <label>タイトル</label>
    <input type="text" name="title" value="<?php echo $this->viewOptions['title']; ?>">
  </div>

  <div>
    <label>本文</label>
    <textarea name="body" cols="30" rows="5"><?php echo $this->viewOptions['body']; ?></textarea>
  </div>

  <div>
    <a href="/seed_blog/blogs/index">戻る</a> : 
    <!-- <a href="index.html">投稿する</a> -->
    <input type="submit" value="編集する">
  </div>

</form>












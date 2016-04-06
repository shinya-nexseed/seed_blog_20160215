<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>フレームワークブロク</title>
  <link rel="stylesheet" type="text/css" href="/seed_blog/webroot/assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="/seed_blog/webroot/assets/font-awesome/css/font-awesome.css">
</head>
<body>
  
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#page-top"><span class="strong-title"><i class="fa fa-comment-o"></i> Seed blog</span></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <!-- <li class="hidden">
            <a href="#page-top"></a>
          </li>
          <li class="page-scroll">
            <a href="#portfolio">Portfolio</a>
          </li>
          <li class="page-scroll">
            <a href="#about">About</a>
          </li>
          <li class="page-scroll">
            <a href="#contact">Contact</a>
          </li> -->
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4" style="margin-top: 80px;">

        <!-- 各ページに必要なコードをURLを元にrequire (処理自体はcontrollerで) -->
        <?php
            include('views/blogs/' . $this->action . '.php');
        ?>

      </div>
    </div>
  </div>

</body>
</html>
















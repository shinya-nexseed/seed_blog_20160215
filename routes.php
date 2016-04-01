<?php
    echo 'routes.phpを通りました<br>';
    // $arr = explode('/', 'ほげ/ふが/もげ/ほご/あげ');
    // var_dump($arr);

    $params = explode('/', $_GET['url']);
    // var_dump($params);
    // 192.168.33.10/seed_blog/blogs/indexというリクエストがあった場合
    // 192.168.33.10/seed_blog/routes.php?url=blogs/indexとして処理
    // $_GETの中身
    // $_GET['url'] = 'blogs/index';
    // $params = array('blogs', 'index') ← $_GET['url']をexplodeすると
    // $params配列が完成する

    $resource = $params[0]; // 上記リクエストの場合はblogsが格納される
    $action = $params[1]; // 上記リクエストの場合はindexが格納される
    $id = 0; // 初期値0で定義

    if (isset($params[2])) {
        $id = $params[2];
    }

    // コントローラーの呼び出し
    // 作成した変数を文字連結させ、require()を使って
    // 必要なコントローラーファイルを呼び出す
    echo 'controllers/' . $resource . '_controller.php<br>';
    require('controllers/' . $resource . '_controller.php');
?>
















<?php 

    // 対応するモデルファイルをrequireする
    require('models/blog.php');

    // コントローラのクラスをインスタンス化
    // インスタンス(オブジェクト) = クラス
    $controller = new BlogsController();

    // アクション名によって、呼び出すメソッドを変える
    switch ($action) {
      case 'index':
        $controller->index();
        break;
      
      default:
        # code...
        break;
    }


    // フレームワークのM,Cのファイルはクラス化する
    // 命名規則 → リソース名Controller
    // 単語ごとの頭文字は大文字
    class BlogsController {
        // プロパティ
        private $resource = '';
        private $action = '';

        // URLがblogs/indexであった場合に呼ばれるメソッドで、
        // blogデータの全件を取得し、表示するための処理をするメソッドです。
        public function index() {
            echo 'blogs_controller.phpのindex()メソッドが呼ばれました<br>';
            // blogモデルのindex()メソッドを呼び出す
            $blog = new Blog();
            $blog->index();

            // アクション名を設定する
            $this->action = 'index';

            // 共通レイアウトファイルを呼び出す
            require('views/layout/application.php');
        }
    }
?>


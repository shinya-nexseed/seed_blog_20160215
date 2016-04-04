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
      case 'show':
        $controller->show($id);
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
        private $viewOptions = ''; // Viewに送りたいデータを保持するプロパティ

        // URLがblogs/indexであった場合に呼ばれるメソッドで、
        // blogデータの全件を取得し、表示するための処理をするメソッドです。
        public function index() {
            // echo 'blogs_controller.phpのindex()メソッドが呼ばれました<br>';
            // blogモデルのindex()メソッドを呼び出す
            $blog = new Blog();
            $this->viewOptions = $blog->index(); // 返り値$rtnを返します

            // viewOptionsプロパティに代入された$rtn配列のデータを
            // 一件一件$viewOptionに格納し、{}の中で処理
            // foreach ($this->viewOptions as $viewOption) {
            //     echo $viewOption['id'] . ' : ' .
            //          $viewOption['title'] . ' : ' .
            //          $viewOption['created'] . '<br>';
            // }

            // アクション名を設定する
            $this->action = 'index';

            // 共通レイアウトファイルを呼び出す
            require('views/layout/application.php');
        }

        public function show($id) {
            $blog = new Blog();
            // URLのオプションに指定したidのデータ一件が格納される
            $this->viewOptions = $blog->show($id);

            $this->action = 'show';

            include('views/layout/application.php');
        }
    }
?>
















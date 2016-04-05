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
      case 'add':
        $controller->add();
        break;
      case 'create':
        $controller->create($post);
        break;
      case 'edit':
        $controller->edit($id);
        break;
      case 'update':
        $controller->update($id, $post);
        break;
      case 'delete':
        $controller->delete($id);
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

        public function add() {
            // addアクションは新規ブログ登録ページを表示するだけなので
            // モデルとの連携はしない
            $this->action = 'add';

            include('views/layout/application.php');
        }

        public function create($post) {
            // データの登録処理を実装
            // データの処理なので、モデルを呼び出す必要がある
            $blog = new Blog();
            // モデルのBlogクラスに定義されたcreateメソッドを呼び出す
            // createメソッドはアクションの役割に応じ、
            // データの登録処理を行うようプログラムを組む
            $blog->create($post);

            header('Location: /seed_blog/blogs/index/');

            // create処理には、Viewが必要ないため
        }

        public function edit($id) {
            // $idを引数として送る形で、モデルのBlogクラスに
            // 定義されたedit()メソッドを呼び出し実行
            $blog = new Blog();
            $this->viewOptions = $blog->edit($id);

            // // edit画面 (View) を出力するため
            $this->action = 'edit';
            include('views/layout/application.php');
        }

        public function update($id, $post) {
            // 指定したidのデータを、フォームから送られた
            // postデータで上書きする処理
            $blog = new Blog();
            $blog->update($id, $post);

            // indexページへ遷移
            header('Location: /seed_blog/blogs/index');
        }

        public function delete($id) {
            // 指定したidのデータを削除する処理
            $blog = new Blog();
            $blog->delete($id);

            // indexページへ遷移
            header('Location: /seed_blog/blogs/index');
        }
    }
?>
















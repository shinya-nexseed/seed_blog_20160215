<?php 
    // フレームワークではM,Cファイルはクラス化する
    // 命名規則はリソース名(テーブル名)の単数形
    // 頭文字は大文字
    class Blog {
        // プロパティ
        private $dbconnect = '';

        // コンストラクタ
        public function __construct() {
            // DB接続ファイルの読み込み
            require('dbconnect.php');
            // $dbが使えるようになるので、
            $this->dbconnect = $db;
        }

        public function index() {
            // index()はデータ(リソース)の一覧を取得し表示するためのメソッド
            // echo 'モデルファイルblog.phpのindex()メソッドが呼ばれました<br>';
            $sql = 'SELECT * FROM `blogs` WHERE `delete_flag`=0';
            $results = mysqli_query($this->dbconnect, $sql) 
                or die(mysqli_error($this->dbconnect));

            // 返り値としてModelファイルで取得したデータをControllerに
            // 送るための配列データ (returnの略)
            $rtn = array();

            while ($result = mysqli_fetch_assoc($results)) {
                // echo $result['id'] . ' : ' .
                //      $result['title'] . ' : ' .
                //      $result['created'] . '<br>';
                $rtn[] = $result;
            }

            // ModelファイルのBlogクラスにあるindex()メソッドを使用すると
            // 取得データを返り値$rtnとして返す
            return $rtn;
        }

        public function show($id) {
            $sql = 'SELECT * FROM `blogs` WHERE `id`=' . $id;
            $results = mysqli_query($this->dbconnect, $sql) 
                or die(mysqli_error($this->dbconnect));
            $result = mysqli_fetch_assoc($results);

            // 返り値として取得データをControllerに返す
            return $result;
        }

        public function create($post) {
            // データの登録処理
            // SQL文のINSERTを書いていきます
            $sql = sprintf('INSERT INTO `blogs` SET `title`="%s", `body`="%s", `delete_flag`=0, `created`=NOW()',
                    // $post['title'],
                    // $post['body']
                    mysqli_real_escape_string($this->dbconnect, $post['title']),
                    mysqli_real_escape_string($this->dbconnect, $post['body'])
                );

            mysqli_query($this->dbconnect, $sql) or die(mysqli_error($this->dbconnect));

        }

        public function edit($id) {
            // 編集したいブログ記事一件のデータを取得するSQL文
            $sql = 'SELECT * FROM `blogs` WHERE `id`=' . $id;
            $results = mysqli_query($this->dbconnect, $sql) 
                    or die(mysqli_error($this->dbconnect));
            $result = mysqli_fetch_assoc($results);

            // 取得したデータ一件が入った$result配列をconttollerに返す
            return $result;
        }

        public function update($id, $post) {
            $sql = sprintf('UPDATE `blogs`
                            SET `title`="%s", `body`="%s"
                            WHERE `id`=%d',
                        mysqli_real_escape_string($this->dbconnect, $post['title']),
                        mysqli_real_escape_string($this->dbconnect, $post['body']),
                        $id
                    );

            mysqli_query($this->dbconnect, $sql) 
                or die(mysqli_error($this->dbconnect));
        }

        public function delete($id) {
            // 物理削除
            // $sql = 'DELETE FROM `blogs` WHERE `id`=' . $id;
            // mysqli_query($this->dbconnect, $sql)
            //     or die(mysqli_error($this->dbconnect));

            // 論理削除
            $sql = 'UPDATE `blogs` SET `delete_flag`=1 WHERE `id`=' . $id;
            mysqli_query($this->dbconnect, $sql)
                or die(mysqli_error($this->dbconnect));
        }
    }
?>




















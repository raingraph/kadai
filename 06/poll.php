<?php

// 名前空間
namespace MyApp;

// Class
class Poll {
  private $_db;

  public function __construct() {
    $this->_connectDB();
    $this->_createToken();
  }

  private function _createToken() {
    if (!isset($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    }
  }

  private function _validateToken() {
    if (
      !isset($_SESSION['token']) ||
      !isset($_POST['token']) ||
      $_SESSION['token'] !== $_POST['token']
    ) {
      throw new \Exception('invalid token!');
    }
  }

  public function post() {
      $this->_validateToken();
      $this->_validateAnswer();  //渡ってきたデータが正しいかの確認
      $this->_save();
      // result.phpへリダイレクトする
      header('Location: http://' . $_SERVER['HTTP_HOST'] . '/result.php');
      exit;
  }

  // 投票結果を渡すメソッド
  public function getResults() {
    $data = array_fill(0, 2, 0);
    $sql = "select answer, count(id) as c from answers group by answer";
    foreach ($this->_db->query($sql) as $row) {
      $data[$row['answer']] = (int)$row['c'];
    }
    return $data;
  }

  // POSTエラー時の処理
  public function getError() {
    $err = null;
    if (isset($_SESSION['err'])) {
      $err = $_SESSION['err'];
      unset($_SESSION['err']);
    }
    return $err;
  }

  // POSTデータの検証
  private function _validateAnswer() {
    // POSTされたデータがおかしい場合はエラーを出す. answerがセットされていないか、きのこ0,たけのこ1が選ばれたいない場合.
    if (
      !isset($_POST['answer']) ||
      !in_array($_POST['answer'], [0, 1])
    ) {
      throw new \Exception('invalid answer!');
    }
  }

  // SQLへの保存
  private function _save() {
    $sql = "insert into answers
            (answer, created)
            values (:answer, now())";
    $stmt = $this->_db->prepare($sql);
    $stmt->bindValue(':answer', (int)$_POST['answer'], \PDO::PARAM_INT);
    $stmt->execute();
  }

  // DB接続.PDOのインスタンスを割り当てる
  private function _connectDB() {
    try {
      $this->_db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
      // エラー処理
      $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\PDOException $e) {
      throw new \Exception('Failed to connect DB');
    }
  }

}
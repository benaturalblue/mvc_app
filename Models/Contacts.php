<?php
require_once(ROOT_PATH . 'Models/Db.php');

class Contact extends Db
{

  public function __construct($dbh = null)
  {
    parent::__construct($dbh);
    $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  /**
   * メールアドレスが一意か判定後ユーザー登録処理を行ってユーザーIDを返却する
   *
   * @param string $name 氏名
   * @param string $kana ふりがな
   * @param string $email メールアドレス
   * @param string $tel 電話番号
   * @param string $body お問い合わせ内容
   */
  public function createContact(string $name, string $kana, string $tel, string $email, string $body)
  {
    try {
      $this->dbh->beginTransaction();
      $query = 'INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)';
      $stmt = $this->dbh->prepare($query);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
      $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':body', $body, PDO::PARAM_STR);
      $stmt->execute();

      $lastId = $this->dbh->lastInsertId();

      // トランザクションを完了することでデータの書き込みを確定させる
      $this->dbh->commit();

      return $lastId;
    } catch (PDOException $e) {
      // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
      $this->dbh->rollBack();
      echo "登録失敗: " . $e->getMessage() . "\n";
      exit();
    }
  }

  public function getAllContacts()
  {
    try {
      $query = 'SELECT * FROM contacts';
      $stmt = $this->dbh->query($query);
      $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $contacts;
    } catch (PDOException $e) {
      echo "データベースエラー: " . $e->getMessage();
    }
  }

  public function getContact($contactId)
  {
    try {
      $query = 'SELECT * FROM contacts WHERE id = :contactId';

      $stmt = $this->dbh->prepare($query);
      $stmt->bindValue(':contactId', (int) $contactId, PDO::PARAM_INT);
      $stmt->execute();
      $contactData = $stmt->fetch(PDO::FETCH_ASSOC);

      return $contactData;
    } catch (PDOException $e) {
      echo "データベースエラー: " . $e->getMessage();
    }
  }


  public function updateContact(array $data): bool
  {
    try {
      $this->dbh->beginTransaction();

      $query =  'UPDATE contacts SET name = :name, kana = :kana, email = :email, tel = :tel, body = :body';
      $query .= ' WHERE id = :id';

      $stmt = $this->dbh->prepare($query);
      $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
      $stmt->bindParam(':name', $data['name']);
      $stmt->bindParam(':kana', $data['kana']);
      $stmt->bindParam(':email', $data['email']);
      $stmt->bindParam(':tel', $data['tel']);
      $stmt->bindParam(':body', $data['body']);
      var_dump($data);
      $stmt->execute();

      $this->dbh->commit();
      return true;
    } catch (PDOException $e) {
      $this->dbh->rollBack();
      echo "登録失敗: " . $e->getMessage() . "\n";
      return false; // 更新失敗を返す
    }
  }


  /**
   * @param string
   * @return void
   */
  public function deleteContact(string $id)
  {
    try {
      $this->dbh->beginTransaction();
      $query = 'DELETE FROM contacts WHERE id = :id';
      $stmt = $this->dbh->prepare($query);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      // トランザクションを完了することでデータの書き込みを確定させる
      $this->dbh->commit();
      return;
    } catch (PDOException $e) {
      // 不具合があった場合トランザクションをロールバックして変更をなかったコトにする。
      $this->dbh->rollBack();
      echo "削除失敗: " . $e->getMessage() . "\n";
      exit();
    }
  }
}

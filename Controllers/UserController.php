<?php
require_once ROOT_PATH . 'Controllers/Controller.php';
require_once ROOT_PATH . 'Models/Users.php';
class UserController extends Controller
{
  public function create()
  {
    $errorMessages = [];

    if (empty($_POST['name'])) {
      $errorMessages['name'] = '氏名を入力してください。';
    }

    if (empty($_POST['kana'])) {
      $errorMessages['kana'] = 'ふりがなを入力してください。';
    }

    if (empty($_POST['email'])) {
      $errorMessages['email'] = 'メールアドレスを入力してください。';
    }

    if (empty($_POST['password'])) {
      $errorMessages['password'] = 'パスワードを入力してください';
    }

    if ($_POST['password'] !== $_POST['password-confirmation']) {
      $errorMessages['password-confirmation'] = '確認用パスワードが正しくありません。';
    }
    
    if (!empty($errorMessages)) {
      // バリデーション失敗
      $this->view('user/signup', ['post' => $_POST, 'errorMessages' => $errorMessages]);
    } else {
      //登録処理
      $user = new User;
      $result = $user->createUser(
        $_POST['name'],
        $_POST['kana'],
        $_POST['email'],
        $_POST['password']
      );

      if (is_numeric($result)) {
        session_start();
        $_SESSION['auth'] = $result;

        $this->view('user/create-complete');
      } else {
        $errorMessages['email'] = 'メールアドレスが既に使用されています。';
        $this->view('user/signup', ['post' => $_POST, 'errorMessages' => $errorMessages]);
      }
    }
  }

  public function logIn()
  {
    if (is_numeric($this->getAuth())) {
      // ログイン中の場合はトップページへリダイレクト
      header('Location: /');
      exit;
    }
    $this->view('user/login');
  }

  public function signUp()
  {
    if (is_numeric($this->getAuth())) {
      // ログイン中の場合はトップページへリダイレクト
      header('Location: /');
      exit;
    }
    $this->view('user/signup');
  }
  public function logOut()
  {
    session_start();
    $_SESSION['auth'] = false;
    header('Location: /');
    exit;
  }
  public function getAuth()
  {
    session_start();
    return $_SESSION['auth'] ?? false;
  }
  public function myPage()
  {
    session_start();
    $userId = $_SESSION['auth'] ?? false;
    if ($userId === false) {
      header('Location: /');
      exit;
    }

    $user = new User;
    $result = $user->getMyPage($userId);
    $this->view('user/mypage', ['data' => $result, 'auth' => $userId]);
  }
  public function delete()
  {
    session_start();
    $userId = $_SESSION['auth'] ?? false;
    if ($userId === false) {
      header('Location: /');
      exit;
    }
    $user = new User;
    $user->deleteUserAccount($userId);
    $_SESSION['auth'] = false;
    header('Location: /');
    exit;
  }
  
  public function update()
  {
    $errorMessages = [];

    $userId = $this->getAuth();
    if ($userId === false) {
      // 未ログインの場合はトップページへリダイレクト
      header('Location: /');
      exit;
    }

    if (empty($_POST['name'])) {
      $errorMessages['name'] = '氏名を入力してください。';
    }

    if (empty($_POST['kana'])) {
      $errorMessages['kana'] = 'ふりがなを入力してください。';
    }

    if (empty($_POST['email'])) {
      $errorMessages['email'] = 'メールアドレスを入力してください。';
    }

    if (empty($_POST['password'])) {
      // passwordが空の場合はpasswordを更新しないためバリデーションをチェックしない
    } else {
      if ($_POST['password'] !== $_POST['password-confirmation']) {
        $errorMessages['password-confirmation'] = '確認用パスワードが正しくありません。';
      }
    }

    if (!empty($errorMessages)) {
      // バリデーション失敗
      $this->view('user/edit', ['post' => $_POST, 'errorMessages' => $errorMessages]);
    } else {
      // 更新処理
      $user = new User;
      $result = $user->updateUser(
        $userId,
        $_POST['name'],
        $_POST['kana'],
        $_POST['email'],
        $_POST['password']
      );

      if ($result === true) {
        header('Location: /user/my-page');
        exit;
      } else {
        $errorMessages['email'] = 'メールアドレスが既に使用されています。';
        $this->view('user/edit', ['post' => $_POST, 'errorMessages' => $errorMessages, 'auth' => $userId]);
      }
    }
  }
}
?>
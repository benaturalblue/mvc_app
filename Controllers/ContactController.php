<?php
require_once ROOT_PATH . 'Controllers/Controller.php';
require_once ROOT_PATH . 'Models/Contacts.php';
class ContactController extends Controller
{
  public function index()
  {
    $contact = new Contact();
    $contacts = $contact->getAllContacts();

    $this->view('contact/index', ['contacts' => $contacts]);
  }

  public function confirmation()
  {
    session_start();

    $_SESSION['confirmation_data'] = $_POST;


    $this->view('contact/confirmation', ['data' => $_POST]);
  }



  public function create()
  {
    $errorMessages = [];

    if (empty($_POST['name'])) {
      $errorMessages['name'] = '氏名を入力してください。';
    } elseif (mb_strlen($_POST['name']) > 10) {
      $errorMessages['name'] = '氏名は10文字以内で入力してください。';
    }

    if (empty($_POST['kana'])) {
      $errorMessages['kana'] = 'ふりがなを入力してください。';
    } elseif (mb_strlen($_POST['kana']) > 10) {
      $errorMessages['kana'] = 'ふりがなは10文字以内で入力してください。';
    }

    if (empty($_POST['email'])) {
      $errorMessages['email'] = 'メールアドレスを入力してください。';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errorMessages['email'] = '正しいメールアドレスの形式で入力してください。';
    }

    if (!preg_match('/^[0-9]+$/', $_POST['tel'])) {
      $errorMessages['tel'] = '電話番号は数字のみで入力してください。';
    }

    if (empty($_POST['body'])) {
      $errorMessages['body'] = 'お問い合わせ内容を入力してください。';
    }

    if (!empty($errorMessages)) {
      // バリデーション失敗
      $this->view('contact/index', ['post' => $_POST, 'errorMessages' => $errorMessages]);
    } else {
      $csrfToken = bin2hex(random_bytes(32));
      session_start();
      $_SESSION['csrf_token'] = $csrfToken;

      // 登録処理
      $contact = new Contact;
      global $result;
      $result = $contact->createContact(
          $_POST['name'],
          $_POST['kana'],
          $_POST['tel'],
          $_POST['email'],
          $_POST['body']
      );

      if (is_numeric($result)) {
          $_SESSION['auth'] = $result;
          $this->view('contact/create-complete');
      }
  }
}

  public function edit()
  {
    session_start();
    $urlArray = explode('/', $_SERVER['REDIRECT_URL']);
    $contactId = end($urlArray);

    $contact = new Contact();
    $result = $contact->getContact($contactId);

    $this->view('contact/edit', ['data' => $result, 'auth' => $contactId]);
  }

  public function update()
  {
    $errorMessages = [];
    $urlArray = explode('/', $_SERVER['REDIRECT_URL']);
    $contactId = end($urlArray);

    if (empty($_POST['name'])) {
      $errorMessages['name'] = '氏名を入力してください。';
    } elseif (mb_strlen($_POST['name']) > 10) {
      $errorMessages['name'] = '氏名は10文字以内で入力してください。';
    }

    if (empty($_POST['kana'])) {
      $errorMessages['kana'] = 'ふりがなを入力してください。';
    } elseif (mb_strlen($_POST['kana']) > 10) {
      $errorMessages['kana'] = 'ふりがなは10文字以内で入力してください。';
    }

    if (empty($_POST['email'])) {
      $errorMessages['email'] = 'メールアドレスを入力してください。';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errorMessages['email'] = '正しいメールアドレスの形式で入力してください。';
    }

    if (!preg_match('/^[0-9]+$/', $_POST['tel'])) {
      $errorMessages['tel'] = '電話番号は数字のみで入力してください。';
    }

    if (empty($_POST['body'])) {
      $errorMessages['body'] = 'お問い合わせ内容を入力してください。';
    }

    if (!empty($errorMessages)) {
      // バリデーション失敗
      $this->view('contact/edit', ['data' => $_POST, 'errorMessages' => $errorMessages]);
    } else {
      // 更新処理
      $contact = new Contact;

      $data = [
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'kana' => $_POST['kana'],
        'email' => $_POST['email'],
        'tel' => $_POST['tel'],
        'body' => $_POST['body']
      ];

      if ($contact->updateContact($data)) {
        header('Location: /contact/index');
        exit;
      } else {
        echo "更新処理に失敗しました。";
      }
    }
  }

  public function delete()
  {
    session_start();
    $urlArray = explode('/', $_SERVER['REDIRECT_URL']);
    $contactId = end($urlArray);

    $contact = new Contact;
    $contact->deleteContact($contactId);
    header('Location: /contact/index');

    exit;
  }
}

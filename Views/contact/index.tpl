<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Casteria</title>
</head>

<body>
  <div class="container my-5">
    <h1>お問い合わせフォーム</h1>
    <form action="/contact/confirmation" method="post" onsubmit="return validateForm();" class="bg-white p-3 rounded mb-5">

      <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="お名前">
        <p class="error-text">{$errorMessages.name|default:''}</p>
      </div>
      <div class="form-group">
        <input type="text" name="kana" class="form-control" placeholder="お名前カナ">
        <p class="error-text">{$errorMessages.kana|default:''}</p>
      </div>
      <div class="form-group">
        <input type="tel" name="tel" class="form-control" placeholder="電話番号">
        <p class="error-text">{$errorMessages.tel|default:''}</p>
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="メールアドレス">
        <p class="error-text">{$errorMessages.email|default:''}</p>
      </div>
      <div class="form-group">
        <textarea rows="4" cols="50" placeholder="お問い合わせ内容" name="body" type="text" class="form-control"></textarea>
        <p class="error-text">{$errorMessages.body|default:''}</p>
      </div>
      <?php
      session_start();

      $csrfToken = bin2hex(random_bytes(32));

      $_SESSION['csrf_token'] = $csrfToken;
      ?>
      <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
      <button type="submit" class="btn btn-outline-secondary">送信</button>
    </form>
  </div>
  
  <div class="container mt-5">
    <h2>お問い合わせ一覧</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">氏名</th>
          <th scope="col">ふりがな</th>
          <th scope="col">電話番号</th>
          <th scope="col">メールアドレス</th>
          <th scope="col">お問い合わせ内容</th>
        </tr>
      </thead>
      <tbody>
        {foreach $contacts as $contact}
        <tr>
          <td>{$contact.name}</td>
          <td>{$contact.kana}</td>
          <td>{$contact.tel}</td>
          <td>{$contact.email}</td>
          <td><pre>{$contact.body}</pre></td>
          <td>
            <a href="/contact/edit/{$contact.id}" class="btn btn-outline-secondary">編集</a>
            <a href="/contact/delete/{$contact['id']}" class="btn btn-outline-secondary" onclick="return confirm('本当に削除しますか?')">削除</a>
          </td>

        </tr>
        {/foreach}
      </tbody>
    </table>
  </div>

</body>

</html>
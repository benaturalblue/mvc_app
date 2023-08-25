<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Casteria - 確認画面</title>
</head>

<body>
  <div class="container my-5">
    <h2>入力内容の確認</h2>
    <table>
      <tr>
        <td>お名前：</td>
        <td>{$smarty.session.confirmation_data.name|escape}</td>
      </tr>
      <tr>
        <td>お名前カナ：</td>
        <td>{$smarty.session.confirmation_data.kana|escape}</td>
      </tr>
      <tr>
        <td>電話番号：</td>
        <td>{$smarty.session.confirmation_data.tel|escape}</td>
      </tr>
      <tr>
        <td>メールアドレス：</td>
        <td>{$smarty.session.confirmation_data.email|escape}</td>
      </tr>
      <tr>
        <td>お問い合わせ内容：</td>
        <td>{$smarty.session.confirmation_data.body|escape}</td>
      </tr>
    </table>

    <form method="post" action="/contact/create">
      <input type="hidden" name="name" value="{$smarty.session.confirmation_data.name}">
      <input type="hidden" name="email" value="{$smarty.session.confirmation_data.email}">
      <input type="hidden" name="kana" value="{$smarty.session.confirmation_data.kana}">
      <input type="hidden" name="tel" value="{$smarty.session.confirmation_data.tel}">
      <input type="hidden" name="body" value="{$smarty.session.confirmation_data.body}">
      <input type="submit" class="btn btn-outline-secondary" value="送信">
      <button type="button" onclick="history.back()">戻る</button>
    </form>
  </div>
</body>

</html>

<?php
/* Smarty version 4.3.2, created on 2023-08-25 04:41:41
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_64e83105e768b2_90940859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e922cbbdf1fd4e35380fc1e61d2cc165491caa9' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/confirmation.tpl',
      1 => 1692938389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64e83105e768b2_90940859 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
        <td><?php echo htmlspecialchars((string) htmlspecialchars((string)$_SESSION['confirmation_data']['name'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
      </tr>
      <tr>
        <td>お名前カナ：</td>
        <td><?php echo htmlspecialchars((string) htmlspecialchars((string)$_SESSION['confirmation_data']['kana'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
      </tr>
      <tr>
        <td>電話番号：</td>
        <td><?php echo htmlspecialchars((string) htmlspecialchars((string)$_SESSION['confirmation_data']['tel'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
      </tr>
      <tr>
        <td>メールアドレス：</td>
        <td><?php echo htmlspecialchars((string) htmlspecialchars((string)$_SESSION['confirmation_data']['email'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
      </tr>
      <tr>
        <td>お問い合わせ内容：</td>
        <td><?php echo htmlspecialchars((string) htmlspecialchars((string)$_SESSION['confirmation_data']['body'], ENT_QUOTES, 'UTF-8', true), ENT_QUOTES, 'UTF-8');?>
</td>
      </tr>
    </table>

    <form method="post" action="/contact/create">
      <input type="hidden" name="name" value="<?php echo htmlspecialchars((string) $_SESSION['confirmation_data']['name'], ENT_QUOTES, 'UTF-8');?>
">
      <input type="hidden" name="email" value="<?php echo htmlspecialchars((string) $_SESSION['confirmation_data']['email'], ENT_QUOTES, 'UTF-8');?>
">
      <input type="hidden" name="kana" value="<?php echo htmlspecialchars((string) $_SESSION['confirmation_data']['kana'], ENT_QUOTES, 'UTF-8');?>
">
      <input type="hidden" name="tel" value="<?php echo htmlspecialchars((string) $_SESSION['confirmation_data']['tel'], ENT_QUOTES, 'UTF-8');?>
">
      <input type="hidden" name="body" value="<?php echo htmlspecialchars((string) $_SESSION['confirmation_data']['body'], ENT_QUOTES, 'UTF-8');?>
">
      <input type="submit" class="btn btn-outline-secondary" value="送信">
      <button type="button" onclick="history.back()">戻る</button>
    </form>
  </div>
</body>

</html>
<?php }
}

<?php
/* Smarty version 4.3.2, created on 2023-08-25 04:51:45
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_64e833612d1484_80240807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c57b4f7d76450b6666497f89adb5183a6385d349' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl',
      1 => 1692939100,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64e833612d1484_80240807 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
      </div>
      <div class="form-group">
        <input type="text" name="kana" class="form-control" placeholder="お名前カナ">
        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
      </div>
      <div class="form-group">
        <input type="tel" name="tel" class="form-control" placeholder="電話番号">
        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
      </div>
      <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="メールアドレス">
        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
      </div>
      <div class="form-group">
        <textarea rows="4" cols="50" placeholder="お問い合わせ内容" name="body" type="text" class="form-control"></textarea>
        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
      </div>
      <?php echo '<?php'; ?>

      session_start();

      $csrfToken = bin2hex(random_bytes(32));

      $_SESSION['csrf_token'] = $csrfToken;
      <?php echo '?>'; ?>

      <input type="hidden" name="csrf_token" value="<?php echo '<?php'; ?>
 echo $csrfToken; <?php echo '?>'; ?>
">
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contacts']->value, 'contact');
$_smarty_tpl->tpl_vars['contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->do_else = false;
?>
        <tr>
          <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['name'], ENT_QUOTES, 'UTF-8');?>
</td>
          <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['kana'], ENT_QUOTES, 'UTF-8');?>
</td>
          <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['tel'], ENT_QUOTES, 'UTF-8');?>
</td>
          <td><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['email'], ENT_QUOTES, 'UTF-8');?>
</td>
          <td><pre><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['body'], ENT_QUOTES, 'UTF-8');?>
</pre></td>
          <td>
            <a href="/contact/edit/<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="btn btn-outline-secondary">編集</a>
            <a href="/contact/delete/<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['contact']->value['id'], ENT_QUOTES, 'UTF-8');?>
" class="btn btn-outline-secondary" onclick="return confirm('本当に削除しますか?')">削除</a>
          </td>

        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </tbody>
    </table>
  </div>

</body>

</html><?php }
}

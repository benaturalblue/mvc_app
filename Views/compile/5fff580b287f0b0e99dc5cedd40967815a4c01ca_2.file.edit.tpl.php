<?php
/* Smarty version 4.3.2, created on 2023-08-25 03:04:36
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_64e81a44836f53_19405165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fff580b287f0b0e99dc5cedd40967815a4c01ca' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl',
      1 => 1692932675,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64e81a44836f53_19405165 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="main">
        <div class="container my-5">
            <div class="form-wrapper">
                <h1 class="text-center mb-4">お問い合わせ内容更新</h1>
                
                <form action="/contact/update" method="POST">
                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['data']->value['name'], ENT_QUOTES, 'UTF-8');?>
">
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>

                    <div class="form-group">
                        <label for="kana">ふりがな</label>
                        <input type="text" name="kana" class="form-control" value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['data']->value['kana'], ENT_QUOTES, 'UTF-8');?>
">
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" name="tel" class="form-control" value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['data']->value['tel'], ENT_QUOTES, 'UTF-8');?>
">
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['data']->value['email'], ENT_QUOTES, 'UTF-8');?>
">
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>

                    <div class="form-group">
                        <label for="body">お問い合わせ内容</label>
                        <textarea name="body" class="form-control"><?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['data']->value['body'], ENT_QUOTES, 'UTF-8');?>
</textarea>
                        <p class="error-text"><?php echo htmlspecialchars((string) (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp), ENT_QUOTES, 'UTF-8');?>
</p>
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars((string) $_smarty_tpl->tpl_vars['data']->value['id'], ENT_QUOTES, 'UTF-8');?>
">
                
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-outline-secondary">更新</button>
                        <button type="button" class="btn btn-secondary d-inline-block mt-0 ml-3" onclick="window.location.href='/contact/index'">戻る</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php }
}

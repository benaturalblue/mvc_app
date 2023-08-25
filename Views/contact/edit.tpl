<!DOCTYPE html>
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
                        <input type="text" name="name" class="form-control" value="{$data.name}">
                        <p class="error-text">{$errorMessages.name|default:''}</p>
                    </div>

                    <div class="form-group">
                        <label for="kana">ふりがな</label>
                        <input type="text" name="kana" class="form-control" value="{$data.kana}">
                        <p class="error-text">{$errorMessages.kana|default:''}</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" name="tel" class="form-control" value="{$data.tel}">
                        <p class="error-text">{$errorMessages.tel|default:''}</p>
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" name="email" class="form-control" value="{$data.email}">
                        <p class="error-text">{$errorMessages.email|default:''}</p>
                    </div>

                    <div class="form-group">
                        <label for="body">お問い合わせ内容</label>
                        <textarea name="body" class="form-control">{$data['body']}</textarea>
                        <p class="error-text">{$errorMessages.body|default:''}</p>
                    </div>
                    
                    <input type="hidden" name="id" value="{$data.id}">
                
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

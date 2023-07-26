<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <title>successor</title>

    <style>
        .title {margin-top: 300px; font-size: 90px;}
        .signflex{justify-content: center;}
        .signflex a{text-decoration: none; color:white; font-size: 25px; background-color: green ;padding: 8px;
    border-radius:10px;}
    </style>
</head>
<div class="title">successor</div>
    <div class="signflex">
        <div class="login"><a href="{{ route('login') }}">ログイン</a></div>
        <div class="signup"><a href="{{ route('register') }}">新規登録</a></div>
        <!-- <div class="signup"><a href="{{ route('register') }}">管理者</a></div> -->

    </div>  
    
<body style="background:url({{ asset('img/img1.jpeg') }});
background-size:cover">
</body>
</html>
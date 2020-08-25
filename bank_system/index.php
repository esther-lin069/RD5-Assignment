<?php 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="scss/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

</head>
<body>
<div class="container">
    <ul id="nav-bar" class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link active" href="#">總覽</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">動作</a>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="#"></a>
        <a class="dropdown-item" href="#">存款</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">提款</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">轉帳</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">個人資料</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">查詢明細</a>
    </li>
    </ul>
    <div id="main" class="row">
        <div class="col"></div>
        <div id="content" class="col-8">
            <h2 id="welcome">Hi,XXX</h2>
            <h3>帳戶餘額: <label id="money">1000</label>元</h3>
            <div id="actionBtn">
                <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">提款</a>
                <a href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">存款</a>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>    
    
</html>
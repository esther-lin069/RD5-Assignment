<?php 
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
	  exit();
}
else{
    $customerId = $_SESSION['user'];
}

    require ("config.php");

    $sql = "select firstName, lastName, accountBalance  
    FROM `customer` c join `account` a
    ON c.customerId = a.customerId where c.customerId = '$customerId'";

    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="scss/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

</head>
<body>
<div class="container">
    <?php include("nav.php"); ?>

    <div id="main" class="row">
        <div class="col"></div>
        <div id="content" class="col-8">
            <h2 id="welcome">Hi,<span><?= $row['firstName'] ?></sapn></h2>
            <h3>帳戶餘額: <label id="money"><?= $row['accountBalance']?></label>元
            <a id="iconEye" href="#" role="button"><span class="fa fa-eye-slash"></span></span></a></h3>

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
    
    <script>
        $(function(){
            $("#iconEye").click(function(){
                $("#iconEye span").toggleClass("fa fa-eye");
                $("#money").text("＊＊＊");
            })
            //這裡還要再研究
        })
    </script>
    
</html>
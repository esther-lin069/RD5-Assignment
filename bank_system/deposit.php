<?php 
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
	  exit();
}
else{
    $customerId = $_SESSION['user'];
}

if(isset($_POST['submit'])){
    if(!isset($_POST['amount']) && $_POST['amount'] == ''){
        exit;
    }
    $amount = $_POST['amount'];
    require ("config.php");

    $sql_getacc = "SELECT accountId from account where customerId = '$customerId'";
    $result = mysqli_query($link,$sql_getacc);
    $accountId = mysqli_fetch_row($result);

    $sql_trans = "insert into `transaction` 
    (`transId`, `accountId`, `transAccount`, `transType`, `transAmount`, `transDate`) 
    VALUES (NULL, (SELECT accountId from account where customerId = '$customerId'),
    (SELECT accountNum from account where accountId = '$accountId[0]'), '存款', '$amount', CURRENT_TIMESTAMP);
    ";

    $sql_acc = "update `account` set `accountBalance` = `accountBalance` + '$amount' 
    where `account`.`accountId` = '$accountId[0]';";

    mysqli_query($link,$sql_trans);
    mysqli_query($link,$sql_acc);

}
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
            <form method="post" action="deposit.php">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                        </div>
                        <input id="amount" name="amount" type="text" class="form-control" placeholder="0">
                    </div>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember" required> 確定存入款項
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Check this checkbox to continue.</div>
                    </label>
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Deposit!</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <script>
        $(function(){
            
        })
    </script>
    
</html>
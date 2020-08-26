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

    $sql = "select (select `accountNum` from `account` 
    where `customerId` = c.customerId)as accountNum, `firstName`, `lastName`, `phone`, `email` from `customer` as c 
    where c.customerId = '$customerId'";

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
            <!-- put content here -->
            <table class="table">
                <tr>
                <th scope="row">帳號</th>
                    <td><?= $row['accountNum'] ?></td>
                </tr>
                <tr>
                <th scope="row">戶名</th>
                    <td><?= $row['firstName'] ." ". $row['lastName'] ?></td>
                </tr>
                <tr>
                <th scope="row">電話</th>
                    <td><?= $row['phone'] ?></td>
                </tr>
                <tr>
                <th scope="row">電子郵件</th>
                    <td><?= $row['email'] ?></td>
                </tr>

            </table>
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
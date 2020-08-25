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

    $sql = "select transDate,transAccount,transType,transAmount FROM `transaction` 
    WHERE accountId = (SELECT accountId from account where customerId = '$customerId') LIMIT 10";

    $result = mysqli_query($link,$sql);
    

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
            <h5>交易紀錄明細：(10筆)</h5>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">日期</th>
                    <th scope="col">對象</th>
                    <th scope="col">類型</th>
                    <th scope="col">金額</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)):?>
                    <tr>
                    <th scope="row"><?= date('m/d',); ?></th>
                    <td><?= $row['transAccount'] ?></td>
                    <td><?= $row['transType'] ?></td>
                    <td><?= $row['transAmount'] ?></td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
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
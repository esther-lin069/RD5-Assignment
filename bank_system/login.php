<?php 
session_start();

if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
    exit;
}

require ("config.php");
if(isset($_POST['submit'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];


    if(trim($username) != ''){
        $sql = "select * from `register` WHERE `username` = '$username' and `password` = '$password'" ;
        $result = mysqli_query($link,$sql);
        @$row_num = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if($row_num != 0){
            $_SESSION['user'] = $row['customerId'];
            echo "welcome!{$username}";
            header("Location: index.php");
            exit;
          }
        else
            echo "wrong username or password";
    }

    

mysqli_close($link);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<div class="container w-50">
    <div style="height:100px"></div>
    <h3>Login</h3><br>
    <form method="post" action="login.php">

        <!-- input: username & password -->
        <div id="userData" style="display:block">
            <div class="form-group">
                <label for="username">Username</label> 
                <input id="username" name="username" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label> 
                <input id="password" name="password" type="password" class="form-control" required>
            </div>    <br>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                &nbsp;&nbsp;<a href="register.php" role="button">sign up</a>

            </div>
        </div>   
    </form>
</div>
    
</body>

<script>
    $(function(){
        $("#next").click(function(){
            var inputList = $("#userData div :input");
            if(inputList.eq(0).val().length > 20 || inputList.eq(1).val().length > 20){
                alert("帳號密碼字元數皆為20以內");
            }
            else
                alert("請填入帳號密碼!");
            
            
        });
    });

</script>
</html>
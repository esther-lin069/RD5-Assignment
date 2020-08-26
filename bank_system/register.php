<?php 
require ("config.php");


if(isset($_POST['submit'])){
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $photoId = $_POST['photoId'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    //驗證帳號是否已存在
    $sql_verify = "select * from `register` WHERE `username` = '$username'";
    $result = mysqli_query($link,$sql_verify);
    @$row_num = mysqli_num_rows($result);


    if($row_num != 0){
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('該帳號已存在');
                window.history.go(-2);
                </script>");
        exit;
    }
    else{
        $sql_customer = "insert into `customer` values (null,'$firstName','$lastName','$photoId','$phone','$email')";
        mysqli_query($link,$sql_customer);
        $inserted = mysqli_insert_id($link);

        $sql_register = "insert into `register` values (null, $inserted,'$username','$password')";
        mysqli_query($link,$sql_register);

        //帳號格式為yymd+7碼整數尾數為accountId,共15碼
        $iNum = str_pad($inserted, 7, '0', STR_PAD_LEFT);
        $accountNum = date("yymd").$iNum;
        echo($accountNum);

        $sql_account = "insert into `account` values (null, $inserted,'$accountNum',0)";
        mysqli_query($link,$sql_account);
    }
    
    header("Location: login.php");
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
    <h3>Register</h3><br>
    <form method="post" action="register.php">

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
                <a id="next" href="#userData" role="button" class="btn btn-primary">Next</a>
            </div>
        </div>

        <!-- input: userInformation -->
        <div id="userInfo" style="display:none">
            <div class="form-group">
                <label for="firstName">FirstName</label> 
                <input id="firstName" name="firstName" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastName">LastName</label> 
                <input id="lastName" name="lastName" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="photoId">PhotoID</label> 
                <input id="photoId" name="photoId" type="text" class="form-control" value="A123456789" pattern="[A-Z]\d{9}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label> 
                <input id="phone" name="phone" type="text" class="form-control" value="0910234567" pattern="\d{10}" required> 
            </div><!--placeholder -->
            <div class="form-group">
                <label for="email">Email</label> 
                <input id="email" name="email" type="text" class="form-control" pattern="\w+([-.]\w)*@\w+([-.]\w+)+" required>
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>  
        </div>    
    </form>
</div>
    
</body>

<script>
    $(function(){

        $("#username").val('');

        $("#next").click(function(){
            var inputList = $("#userData div :input");
            if(inputList.eq(0).val().length > 20 || inputList.eq(1).val().length > 20){
                alert("帳號密碼字元數皆為20以內");
            }
            else if(inputList.eq(0).val() != "" && inputList.eq(1).val() != ""){
                $("#userData").css('display','none'); 
                $("#userInfo").css('display','block');
            }
            else
                alert("請填入預註冊之帳號密碼!");
            
            //非法字符?
            
        });
    });

</script>
</html>
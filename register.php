<?php 
require ("config.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container w-25">
<div style="height:100px"></div>
<h3>Add</h3>
    <form method="post" action="new.php">    
    <div class="form-group">
        <label for="firstName">FirstName</label> 
        <input id="firstName" name="firstName" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label for="lastName">LastName</label> 
        <input id="lastName" name="lastName" type="text" class="form-control">
    </div>
    <br> 
    <div class="form-group">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
    
</body>
</html>
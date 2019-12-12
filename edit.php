<?php
include 'connection.php';
if(!isset($_GET['id'])){
    die("Error: Unsucessful");
}
$query = $db->prepare("SELECT * FROM `data` WHERE id = :id");
$query->bindParam(":id", $_GET['id']);
// Jalankan perintah sql
$query->execute();
if($query->rowCount() == 0){

    die("Error:Unsucessful");
}else{

    $data = $query->fetch();
}
if(isset($_POST['submit'])){

    $email = htmlentities($_POST['email']);
    $address = htmlentities($_POST['address']);
    $desination = htmlentities($_POST['desination']);

//update query
    $query = $db->prepare("UPDATE `data` SET `email`=:email,`address`=:address,`desination`=:desination WHERE id=:id");
    $query->bindParam(":email",  $email);
    $query->bindParam(":address", $address);
    $query->bindParam(":desination", $desination);
    $query->bindParam(":id", $_GET['id']);
    $query->execute();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    <title>CRUD PDO</title>
</head>
<body>

<form method="post">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label >Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" value="<?php echo $data['email'] ?>"> </br>
        </div>
    </div>
    <div class="form-group">
        <label >Address</label>
        <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address" value="<?php echo $data['address'] ?>">
    </div>
    <div class="form-group">
        <label>Destination</label>
        <input type="text" class="form-control" name="desination" id="inputAddress2" placeholder="Destination" value="<?php echo $data['desination'] ?>">
    </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Update Data</button>
</form>
</body>
</html>
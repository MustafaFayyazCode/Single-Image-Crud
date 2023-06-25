<?php

include "./Conn.php";   

if(isset($_POST['sub'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $date = mysqli_real_escape_string($conn,$_POST['date']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $spic = $_FILES['spic']['name'];
    $exe=strtolower(pathinfo($spic,PATHINFO_EXTENSION));
    $arr=array('jpg','png','jpeg');
    if(in_array($exe,$arr)){
    $sql="INSERT INTO `po`(`name`,`fname`,`date`,`email`,`password`,`spic`) VALUES ('$name','$fname','$date','$email','$password','$spic')";
    $run=mysqli_query($conn,$sql);
    move_uploaded_file($_FILES['spic']['tmp_name'],'./imgs/'.$spic);
    if($run){
        echo "inserted";
    }else{
        echo "not inserted";
    }
}
else{
    echo "image is not right";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<style>
    .box{
        width:50%;
        background-color: lightgreen;
        border-radius:50px;
        padding:20px;
    }
    .cantainer{
      text-align:center;
    }
</style>
<body>
    <div class="box">
<form method="post" enctype="multipart/form-data">
    <div class="cantainer">
    <label>Name</label>
    <input type="text" name="name" id="" required>
    <br><br>
    <label>Father Name</label>
    <input type="text" name="fname" id=""required>
    <br><br>
    <label>Date</label>
    <input type="text" name="date" id="" required>
    <br><br>
    <label>Email</label>
    <input type="text" name="email" id=""required>
    <br><br>
    <label>Password</label>
    <input type="text" name="password" id=""required>
    <br><br>
    <label>Image</label>
    <input id="spic" size="48" type="file" name="spic" required>
    <input type="submit" name="sub" id="btn" value="Submit">
    </div>
    </form>
    </div>
</body>
</html>
<?php
require_once 'connect.php';
$email=$_POST['email'];
$pwd=$_POST['password'];
$password = md5($pwd);
$sql="select email,password from user where email='$email' AND password='$password';";
$result=mysqli_query($conn,$sql);
$row=mysqli_num_rows($result);

if(!$row){
        echo "<script>alert('wrong or email or password, please try again');
        location='login.html'</script>";
    }
    else{
        echo "<script>alert('login successfully');
        location='index.html'</script>";
    }
?>

﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>Home_login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--图标-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

	<!--布局框架-->
	<link rel="stylesheet" type="text/css" href="css/util.css">

	<!--主要样式-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<?php
//本文件为重设密码界面

//require_once 'connect.php';

$db_hostname = "rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com";
$db_database = "kiwi_test";
$db_username = "team39";
$db_password = "Comp20839";
$db_charset = "utf8mb4";
$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
$opt = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false);
  try {
   $pdo = new PDO($dsn,$db_username,$db_password,$opt);

	 function checkEmpty($email,$password,$password2){
	 	if($email==null||$password==null||$password2==null){
	 		echo '<html><head><Script Language="JavaScript">alert("You have enter all info to regist");</Script></head></html>'.
	 		 "<meta http-equiv=\"refresh\" content=\"0;url=register.php\">";
	 	}
	 	else{
	 		return true;
	 	}
	 }






$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];
function checkEmpty($email,$password,$password2){
	if($email==null||$password==null||$password2==null){
	//if((!isset($email))||(!isset($password))||(!isset($password2))){
		echo '<html><head><Script Language="JavaScript">alert
		("hey! You have enter all info to reset your password");</Script></head></html>'.
		 "<meta http-equiv=\"refresh\" content=\"0;url=index2.php\">";//redirect
	}else{
		return true;
	}
}
function checkpwd($password,$password2){
  if($password==$password2)
    return true;
  else
    echo '<html><head><Script Language="JavaScript">alert("The two passwords don\'t match");</Script></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=index2.php\">";
}
function checkEmail($email){
  $preg = '/^(\w{1,25})@(\w{1,16})(\.(\w{1,4})){1,3}$/';
  if(preg_match($preg, $email)){
    return true;
  }else{
    echo '<html><head><Script Language="JavaScript">alert("wrong email adress");
    </Script></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=index2.php\">";
  }
}
//方法：将数据插入数据库中
/*
function insert($email,$password,$verify_code){
  $conn=new Mysql();
  $sql="insert into user VALUE (NUll,'$email',$password','$verify_code')";
  $result=$conn->sql($sql);
  if($result){
    return true;
  }
  else{
    echo '<html><head><Script Language="JavaScript">alert("Failed to connect to database, please try again");
    </Script></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=register.php\">";
  }
  $conn->close();
}
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];
if(checkEmpty($email,$password,$password2)){
  if(checkEmail($email)){
    if(checkpwd($password,$password2)){
      //$verify_code  = codestr();
      //if(insert($email,$password)){
			echo '<html><head><Script Language="JavaScript">alert("reset successfully!");</Script></head></html>'.
	    "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";//reset完成，跳转到登陆页面
			//页面会显示出一个close的按钮，前端看看能不能把close改成 Ok！go to login page

        //echo '<script>location.href="./index.php"</script>';//注册完成，跳转到登陆页面
      //}
    }
  }
}
}
?>
<body>

<div class="login">
	<div class="container-login100">
		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<img src="img/logo2.png" alt="IMG">
			</div>

			<form method="post" class="login100-form validate-form">
				<span class="login100-form-title">
					Reset Password
				</span>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="email" placeholder="email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" name="password" placeholder="new password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" name="password2" placeholder="repeat password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Reset
					</button>
				</div>

				<div class="text-center p-t-136">
					<a class="txt2" href="index.php">
							Back to login
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>


			</form>
		</div>
	</div>
</div>

</body>
</html>

<?php

$pdo = NULL;
} catch (PDOException $e) {
exit("PDO Error: ".$e->getMessage()."<br>");
}
?>

<?php
session_start();// 存储 session 数据
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>Home_loginindex</title>
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

//require_once 'connect.php';
//本文件为登陆首页

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

function checkEmpty($email,$password){
	if($email==null||$password==null){
		echo '<html><head><Script Language="JavaScript">alert("you have enter all info to regist:(");</Script></head></html>'.
		 "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";//redirect
	}
	else{
		return true;
	}
}

function checkEmail($email){
  $preg = '/^(\w{1,25})@(\w{1,16})(\.(\w{1,4})){1,3}$/';
  if(preg_match($preg, $email)){
    return true;
  }else{
    echo '<html><head><Script Language="JavaScript">alert("wrong email adress");
    </Script></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email=$_POST['email'];
$password=$_POST['password'];
if (checkEmpty($email,$password)) {
	if (checkEmail($email)) {
		$sql="select email,password from user where email='$email' AND password='$password'";
		$result = $pdo->query($sql);
		$row = $result ->fetch();
		//$result=mysqli_query($conn,$sql);
		//$row=mysqli_num_rows($result);
		echo "email: ",$email,".<br>";
		echo "password: ",$password,".<br>";
		if(!$row){
			echo '<html><head><Script Language="JavaScript">
			alert("wrong or email or password, please try agai");
			</Script></head></html>'."<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
		 }else{
			 	//$_SESSION['name']=$name;
				$_SESSION['email']=$email;
				echo '<html><head><Script Language="JavaScript">alert("login successfully");
			  </Script></head></html>'."<meta http-equiv=\"refresh\" content=\"0;url=movie/index5.php\">";
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
				<img src="img/logo.png" alt="IMG">
			</div>

			<form method="post" class="login100-form validate-form">
				<span class="login100-form-title">
					Login :)
				</span>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" placeholder="Email" name="email" >
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user-o" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn" >
						<a>Login</a>

					</button>

				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						<a href="movie/index5.php">
							Vistor
						</a>
					</button>
				</div>

				<div class="text-center p-t-12">
					<a class="txt2" href="index2.php">
						Forget Password？
					</a>
				</div>

				<div class="text-center p-t-136">
					<a class="txt2" href="register.php">
							 "No Account？Lets Regist"
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

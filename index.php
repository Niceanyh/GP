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
$email=$_POST['email'];
$pwd=$_POST['password'];


function checkEmpty($email,$password){
	if($email==null||$password==null){
		echo '<html><head><Script Language="JavaScript">alert("you have enter all info to regist");</Script></head></html>'.
		 "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";//redirect
	}
	else{
		return true;
	}
}

function checkpwd(){
	$password = md5($pwd);
	$sql="select email,password from user where email='$email' AND password='$password';";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($result);
	if(!$row){
		echo '<html><head><Script Language="JavaScript">
		alert("wrong or email or password, please try agai");
		</Script></head></html>'."<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";
	 }else{
			echo '<html><head><Script Language="JavaScript">alert("login successfully");
		  </Script></head></html>'."<meta http-equiv=\"refresh\" content=\"0;url=index4.html\">";
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
					<input class="input100" type="text" placeholder="Username" name="email" placeholder="email">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-user-o" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" placeholder="Password"
					name="pass" placeholder="password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn" >
						<a href="movie/index4.html">Login</a>

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
							No Account？Let's Regist
						<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
</form>
			<!--</form> -->
		</div>
	</div>
</div>

</body>
</html>

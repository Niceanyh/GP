<!DOCTYPE html>
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

$db_hostname = "35.246.107.238"; $db_database = "ut";
$db_username = "root";
$db_password = "comp208"; $db_charset = "utf8mb4";
$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
$opt = array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false);
  try {
   $pdo = new PDO($dsn,$db_username,$db_password,$opt);

	 $stmt = $pdo->query("select email from user");#where module='$module'
	 foreach($stmt as $row) {//
	 	echo "email=",$row["email"],"\n";
	 	#echo "<p1>$row["time"]</p1>";
	 }





function checkEmpty($email,$password,$password2){
	if($email==null||$password==null||$password2==null){
		echo '<html><head><Script Language="JavaScript">alert("You have enter all info to regist");</Script></head></html>'.
		 "<meta http-equiv=\"refresh\" content=\"0;url=register.php\">";//redirect to register.html
	}
	else{
		return true;
	}
}
function checkpwd($password,$password2){
  if($password==$password2)
    return true;
  else
    echo '<html><head><Script Language="JavaScript">alert("The two passwords don\'t match,pls try again");</Script></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=register.php\">";
}
function checkEmail($email){
  $preg = '/^(\w{1,25})@(\w{1,16})(\.(\w{1,4})){1,3}$/';
  if(preg_match($preg, $email)){
    return true;
  }else{
    echo '<html><head>
		<Script Language="JavaScript">alert("wrong email adress,pls try again");</Script
		></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=register.php\">";
  }
}
//方法：将数据插入数据库中
function insert($email,$password){//$verify_code
  $sql="insert into user(email,password) VALUES ('$email',$password')";
	$sucess_update=$pdo->exec($sql);
  //$result=$conn->sql($sql);
  if($sucess_update){
		echo "<h1>yes!</h1>";
    return true;
  }else{
    echo '<html><head><Script Language="JavaScript">alert("Failed to connect to database, please try again");
    </Script></head></html>'.
    "<meta http-equiv=\"refresh\" content=\"0;url=register.php\">";
  }
  //$conn->close();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email=$_POST['email'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
	if(checkEmpty($email,$password,$password2)){
	  if(checkEmail($email)){
	    if(checkpwd($password,$password2)){
	      //$verify_code  = codestr();
	      if(insert($email,$password)){
					echo '<html><head><Script Language="JavaScript">alert("register successfully!");</Script></head></html>'.
			    "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";//注册完成，跳转到登陆页面
	        //echo"register successfully!";
	        //echo '<script>location.href="./index.php"</script>';//注册完成，跳转到登陆页面
					//GRANT ALL PRIVILEGES ON *.* TO ‘testuser’@'%’ IDENTIFIED BY ‘testpassword’ WITH GRANT OPTION;
	      }
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
					Register
				</span>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="text" name="email" placeholder="email">


					<span class="focus-input100"></span>
					<span class="symbol-input100">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
				</div>

				<div class="wrap-input100 validate-input">
					<input class="input100" type="password" name="password" placeholder="password">
					<?php
					if(isset($password)){

					}
					?>

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
					<button type="submit" class="login100-form-btn" >
						Regist
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

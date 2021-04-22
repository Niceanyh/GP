<?php
session_start();
?>

<?php
if(isset($_SESSION['email'])){
?>

<!DOCTYPE html>
<html>
<head>
	<?php
			//$link = mysqli_connect('rm-d7oxcn1pw78ncu9952o.mysql.eu-west-1.rds.aliyuncs.com','team39','Comp20839');
			//var_dump($link);

		//database
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

	?>
	<title>Personal-information</title>
	<meta name="author" content="order by womengda.cn/" />
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="My Show Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<!-- start menu -->
	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
		});
	</script>
	<link rel="stylesheet" href="css/menu.css" />
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
		});
	});
</script>
<!---- start-smoth-scrolling---->
</head>
<body>
	<!-- header-section-starts -->
	<div class="container">
		<div class="main-content">
			<div class="header">
				<div class="logo">
					<img src="images/logo.png" alt="IMG" width="56" height="56">
				</div>
				<div class="search">
					<div class="search2">
						<form>
							<i class="fa fa-search"></i>
							<input type="text" value="Search " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search ';}"/>
						</form>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="bootstrap_container">
				<nav class="navbar navbar-default w3_megamenu" role="navigation">
					<div class="navbar-header">
						<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand"><i class="fa fa-home"></i></a>
					</div><!-- end navbar-header -->

					<div id="defaultmenu" class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">

						</a></li>
<!-- onclick="<script type="text/javascript">
	alert("log out successfully");
</script> " <li><a href="../index.php" >Logout</a></li>-->
						<li><a href="../logout.php"> Logout</a></li>
					</ul>
				</div><!-- end #navbar-collapse-1 -->

			</nav><!-- end navbar navbar-default w3_megamenu -->
		</div><!-- end container -->
		<!-- AddThis Smart Layers END -->
		<div class="review-slider">

			<div class="now-showing-list">
				<div class="col-md-4 movies-by-category movie-booking">
					<div class="movie-ticket-book">
						<div class="clearfix"></div>
						<img src="images/person.jpg", alt="" />
						<div class="bahubali-details">

							<h4>nickname:</h4>
							<?php
							$Session_email = $_SESSION['email'];
							$user_nickname = $pdo->query("select nickname from user where email = '$Session_email'");#where module='$module'
							$row = $user_nickname ->fetch();
							 $nickname=$row['nickname'];
								 echo "$nickname";
							?>

							<h4>gender:</h4>
							<?php
							$user_gender = $pdo->query("select gender from user where email = '$Session_email'");#where module='$module'
							$row = $user_gender ->fetch();
							 $gender=$row['gender'];
								 echo "$gender";
							?>

							<h4>registered time:</h4>
							<?php
							$user_registered_time = $pdo->query("select time_stamp from user where email = '$Session_email'");#where module='$module'
							$row = $user_registered_time ->fetch();
							 $time_stamp=$row['time_stamp'];
							 $now= date("Y-m-d h:i:sa");
							 $date=floor((strtotime($now)-strtotime($time_stamp))/86400);
								 echo "$date days";
							?>

							<h4>user id:</h4>
							<?php
							$user_id = $pdo->query("select user_id from user where email = '$Session_email'");#where module='$module'
							$row = $user_id ->fetch();
							 $id=$row['user_id'];
								 echo "$id";
							?>

							<h4>description:</h4>
							<?php
							$user_description = $pdo->query("select description from user where email = '$Session_email'");#where module='$module'
							$row = $user_description ->fetch();
							 $description=$row['description'];
								  echo "$description";
							?>

						</div>
					</div>
				</div>
				<div class="col-md-8 movies-dates">
					<div class="show-times-with-movies">
						<div class="movie-show">
							<h4 class="show">Movie List</h4>

								<?php
								$review_movie_id = $pdo->query("select movie_id from review where user_id = '$id'");#where module='$module'
								foreach($review_movie_id as $row) {
								 $movie_id=$row['movie_id'];

								$movie_poster = $pdo->query("select poster_path from movie where movie_id = '$movie_id'");#where module='$module'
								$row = $movie_poster ->fetch();
								 $poster_path=$row['poster_path'];
								echo "<a><img src=https://image.tmdb.org/t/p/w500/",$poster_path," height=50 width=200></a>";
 			 				  echo "<div class=\"date-city\">";
 			 				  echo "<div class=\"buy-tickets\">";
 			 					echo "</div></div>";
 			 					echo "</li>";
							}
								?>

							<figure>
								<img src="images/ms4.jpg" alt="">
							</figure>


						</div>
						<div class="cinema">
							<h4 class="show">Watch data</h4>
							<h5><a href="movie-select-show.php">sloka</a></h5>
							<h6>watch at 2019-06-15</h6>
						</div>
							<?php
							$review_movie_id = $pdo->query("select movie_id from review where user_id = '$id'");#where module='$module'
							foreach($review_movie_id as $row) {
							 $movie_id=$row['movie_id'];

							$movie_title = $pdo->query("select title from movie where movie_id = '$movie_id'");#where module='$module'
							$row = $movie_title ->fetch();
							 $title=$row['title'];
							echo "<a href='movie-select-show.php'>$title</a><br>";
						}
							?>

								<?php
								$review_time_stamp = $pdo->query("select time_stamp from review where user_id = '$id'");#where module='$module'
								foreach($review_time_stamp as $row) {
								 $time_stamp=$row['time_stamp'];
								// echo "<div class=\"date-city\">";
								//	 echo "<div class=\"buy-tickets\">";
									 echo "<a>$time_stamp</a>";
								//	echo "</div></div>";
								//	echo "</li>";
								}
								?>

							


						</div>
						<div class="cinema">
							<h4 class="show">Your Comment</h4>
							<div class="show-title">

								<h5><?php
								$review_rating = $pdo->query("select rating from review where user_id = '$id'");#where module='$module'
								foreach($review_rating as $row) {
								 $rating=$row['rating'];
								// echo "<div class=\"date-city\">";
								//	 echo "<div class=\"buy-tickets\">";
									 echo "<a>$rating</a>";
								//	echo "</div></div>";
								//	echo "</li>";
								}
								?></h5>

								<h6><?php
								$review_content = $pdo->query("select content from review where user_id = '$id'");#where module='$module'
								foreach($review_content as $row) {
								 $content=$row['content'];
								// echo "<div class=\"date-city\">";
								//	 echo "<div class=\"buy-tickets\">";
									 echo "<a>$content</a>";
								//	echo "</div></div>";
								//	echo "</li>";
								}
								?></h6>

							</div>
							<div class="show-title">
								<h5>rating 9.1</h5>
								<h6>nomal</h6>
							</div>

						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear'
					 		};
					 		*/

					 		$().UItoTop({ easingType: 'easeOutQuart' });

					 	});
					 </script>
					 <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
					</body>
					</html>

			<?php
			$pdo = NULL;
			} catch (PDOException $e) {
			exit("PDO Error: ".$e->getMessage()."<br>");
			}
      ?>

     <?php
		 }else {//this is html file, need to be beautified
			 echo '<html><head><Script Language="JavaScript">alert("You need login to see it!");</Script></head></html>'.
 			 "<meta http-equiv=\"refresh\" content=\"0;url=index5.php\">";
		 }
     ?>

<?php
session_start();// 存储 session 数据
?>
<!DOCTYPE html>
<html>
<head>
	<!-- 导航
				92行开始转动的电影内容（热评）
				180行 popular
				277行 highest score
				377行 Guess You Like
	-->
	<?php
	echo "session: ",$_SESSION['email'],"<br>";
	//echo "<a href='javascript:alert(123);'>点我弹出123</a>";

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
/*
		$stmt = $pdo->query("select title from movie limit 4");#where module='$module'
		foreach($stmt as $row) {//
		 echo "___film__     ",$row["title"],"<br>";
		 //echo "year:",$row["title"],"";
		 #echo "<p1>$row["time"]</p1>";
		}
		//
echo "--------------------------<br>";
		$stmt = $pdo->query("select poster_path,title from movie limit 4");#where module='$module'
		foreach($stmt as $row) {//
		 $film_poster=$row['poster_path'];
		 echo "movie: ",$row['title'],"<br>";
		 echo "<img src=https://image.tmdb.org/t/p/w500/",$film_poster," height=220 width=150><br>";
		 echo $row['poster_path'],"<br>";
		 //echo "year:",$row["title"],"";
		 #echo "<p1>$row["time"]</p1>";
		}
		//

*/
		?>

	<title>Homeyeap</title>
	<meta name="author" content="order by womengda.cn/" />
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link rel="stylesheet" href="css/menu.css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="My Show Responsive web template, Bootstrap Web Templates,
	Flat Web Templates, Andriod Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia,
	Samsung, LG, SonyErricsson, Motorola web design" />
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

</head>
<body>
	<!-- header-section-starts -->
</div>
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
						<input type="text" value="Search for a movie" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search for a movie';}"/>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="bootstrap_container">
			<nav class="navbar navbar-default w3_megamenu" role="navigation">
				<div class="navbar-header">
					<button type="button" data-toggle="collapse" data-target="#defaultmenu"
					class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a href="#" class="navbar-brand"><i class="fa fa-home"></i></a>
				</div><!-- end navbar-header -->

				<div id="defaultmenu" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class='active'><a href='personal-information.php'>
							<?php
							if(isset($_SESSION['email'])){

								echo $_SESSION['email'];
							}else {
								//echo "<li class='active'><a href='../visitor_warning.php'>";
								echo "Vistor";
							}
							?>
						</a></li>
<!-- onclick="<script type="text/javascript">
	alert("log out successfully");
</script> " <li><a href="../index.php" >Logout</a></li>-->
<?php
if (isset($_SESSION['email'])) {
	echo "<li><a href='../logout.php'> Logout</a></li>";
}else {
	echo "<li><a href='../visitor_logout.php'> Logout</a></li>";
}
//<li><a href="../logout.php"> Logout</button></li>
 ?>

					</ul>
				</div><!-- end #navbar-collapse-1 -->

			</nav><!-- end navbar navbar-default w3_megamenu -->
		</div><!-- end container -->
		<!-- AddThis Smart Layers END -->
		<div class="review-slider">
			<ul id="flexiselDemo1">

				<?php

				$poster_path = $pdo->query("select poster_path,title,movie_id from movie where poster_path is not null limit 7");#where module='$module'
				foreach($poster_path as $row) {
				 $film_poster=$row['poster_path'];
				 $film_title=$row['title'];
				 $film_id=$row['movie_id'];
				 //echo $film_poster;
				 //echo "<img src=https://image.tmdb.org/t/p/w500/",$film_poster," height=235 width=290><br>";
				 //echo $row['poster_path'],"<br>";
				 echo "<li><a><img src=https://image.tmdb.org/t/p/w500",$film_poster," height=270 width=130></a>";
				 echo "<div class=\"slide-title\"><h4>this is comment </h4></div>";
				 echo "<div class=\"date-city\">";
					 echo "<div class=\"buy-tickets\">";
					 echo"<form method='get' action='movie-select-show.php'>
					 <input type='hidden' name='film_id' value='$film_id'>";
					 //这里出了一点问题，我用form之后它不像原来那样显示蓝色的框
					 echo "<input type='submit' value='$film_title'></form>";
					  //echo "<a href=\"movie-select-show.php\">$film_title</a></form>";
					echo "</div></div>";
					echo "</li>";
		}
		?>
					<li>
						<a><img src="images/r4.jpg" height=240 width=300></a><div class="slide-title"><h4>TEST</h4></div>
						<div class="date-city">
							<div class="buy-tickets">
								<a href="movie-select-show.html">TEST</a>
							</div>
						</div>
					</li>
				</ul>
				<script type="text/javascript">
					$(window).load(function() {

						$("#flexiselDemo1").flexisel({
							visibleItems: 5,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,
							pauseOnHover: false,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: {
								portrait: {
									changePoint:480,
									visibleItems: 2
								},
								landscape: {
									changePoint:640,
									visibleItems: 3
								},
								tablet: {
									changePoint:800,
									visibleItems: 4
								}
							}
						});
					});
				</script>
				<script type="text/javascript" src="js/jquery.flexisel.js"></script>
			</div>
			<div class="footer-top-grid">
				<div class="list-of-movies col-md-8">
					<div class="featured">
						<h4>Popular</h4>
						<ul>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f4.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f5.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f6.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f1.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f2.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f3.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAILs</a>
									</div>
								</div>
							</li>
							<div class="clearfix"></div>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="featured">
						<h4>Highest Score</h4>
						<ul>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f4.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f5.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f6.jpg" alt="" /></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f1.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f2.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<li>
								<div class="f-movie">
									<div class="f-movie-img">
										<a><img src="images/f3.jpg" alt=""></a>
									</div>
									<div class="f-movie-name">
										<a>The movie is directed by xxx</a>
										<p>Tom:this movie is great</p>
										<p>Bob:that is so excellent</p>
									</div>
									<div class="f-buy-tickets">
										<a href="movie-select-show.html">DETAIL</a>
									</div>
								</div>
							</li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>
				<div class="right-side-bar">
					<div class="top-movies-in-india">

						<?php
						//$film_name = $pdo->query("select title from movie limit 4");#where module='$module'
						 ?>
						<h4>Guess You Like</h4>
<?php
if(isset($_SESSION['email'])){
	$film_name = $pdo->query("select title,vote_average from movie limit 15");
	foreach($film_name as $row) {//
	 //echo "___film__     ",$row["title"],"<br>";
	 //echo "year:",$row["title"],"";
	 #echo "<p1>$row["time"]</p1>";
	 echo "
	 <ul class=\"mov_list\">
		<li><i class=\"fa fa-star\"></i></li>
		<li>",$row["vote_average"],"</li>
		<li><a href=\"movie-select-show.html\">",$row["title"],"</a></li>
	 </ul>
	 ";

	}
}else {//this is html file, need to be beautified
	echo "<h3><font color=red>you need login to see it</font></h3>";
}

						?>
						<ul class="mov_list">
							<li><i class="fa fa-star"></i></li>
							<li>100</li>
							<li><a href="movie-select-show.html">TEST</a></li>
						</ul>

					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
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

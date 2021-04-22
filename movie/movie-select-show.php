<!DOCTYPE html>
<html>
<head>
	<?php
//get variable from a form(clicked)

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

	 $getid=$_GET['film_id'];
	 echo "<title>$gettitle</title>";
	 $sql_get_film="select title,poster_path,vote_average,vote_count,overview from movie where movie_id='$getid'";
	 $result = $pdo->query($sql_get_film);
	 $row = $result ->fetch();
	 $get_film_title=$row['title'];
	 $get_film_poster=$row['poster_path'];
	 $get_vote_average=$row['vote_average'];
	 $get_vote_count=$row['vote_count'];
	 $get_film_overview=$row['overview'];


	 $sql_get_director_id="select actor_id from cast where movie_id=$getid and identity='Produce: Director'";
	 $result = $pdo->query($sql_get_director_id);
	 $row = $result ->fetch();
	 $get_film_director_id=$row['actor_id'];

	 $sql_get_director="select name from actor where actor_id=$get_film_director_id";
	 $result = $pdo->query($sql_get_director);
	 $row = $result ->fetch();
	 $director_name=$row['name'];

	 $sql_get_actor_id="select actor_id from cast where movie_id=$getid and identity like 'Act: %'";
	 $get_film_actor_id = $pdo->query($sql_get_actor_id);
	 //$row = $result ->fetch();
	 //$get_film_actor_id=$row['actor_id'];



?>

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
								<li class="active"><a href="personal-information.php">
									<?php
									if(isset($_SESSION['email'])){
										echo $_SESSION['email'];
									}else {
										echo "Vistor";
									}
									?>
								</a></li>
							<?php
							if (isset($_SESSION['email'])) {
								echo "<li><a href='../logout.php'> Logout</a></li>";
							}else {
								echo "<li><a href='../visitor_logout.php'> Logout</a></li>";
							}
						 ?>

						</ul><!-- end nav navbar-nav navbar-right -->
					</div><!-- end #navbar-collapse-1 -->

				</nav><!-- end navbar navbar-default w3_megamenu -->
			</div><!-- end container -->

			<!-- AddThis Smart Layers END -->

			<div class="now-showing-list">
				<div class="col-md-4 movies-by-category movie-booking">
					<div class="movie-ticket-book">
						<div class="clearfix"></div>
						<?php
	//echo "<a><img src=https://image.tmdb.org/t/p/w500/",$get_film_poster,"alt='' /></a>";
	echo "<img src=","https://image.tmdb.org/t/p/w500",$get_film_poster," alt='' />";
	//<img src="images/movie-show.jpg" alt="" />
						 ?>
						<div class="bahubali-details">
							<h4>Movie name:</h4>
							<p><?php echo $get_film_title;?></p>
							<h4>Score(based on <?php echo $get_vote_count ?> votes):</h4>
							<p><?php echo $get_vote_average ?></p>
							<h4>Director:</h4>
							<p><?php echo $director_name; ?></p>
							<h4>Actor:</h4>
							<?php
								//$film_name = $pdo->query("select title,vote_average from movie limit 15");
								foreach($get_film_actor_id as $row) {
									$get_one_actor_id=$row['actor_id'];
									$sql_get_actor_name="select name from actor where actor_id=$get_one_actor_id";
							 	 	$result = $pdo->query($sql_get_actor_name);
									$line = $result ->fetch();
									$get_film_actor_name=$line['name'];
									//echo "<a href='actor.php'>$get_film_actor_name </a>";
									echo "<form method='get' name='form1' action='actor.php'>
										<input type='hidden' name='actor_id' value='$get_one_actor_id'>
									</form>
										<a href='javascript:form1.submit();'>",$get_film_actor_name,"</a>";

									}
									//<a href="actor-information.php">Telugu</a>
									?>

							<h4>Content Introduce:</h4>
							<p><?php echo $get_film_overview;?></p>
						</div>
					</div>
				</div>
				<div class="col-md-8 movies-dates">
					<div class="movie-date-selection">
						<div class="comment">
							<div class="client">
								<img src="images/c2.jpg" alt="">
							</div>
							<div class="client-message">
								<p><a href="#">stephen</a><i class="fa fa-calendar"></i>10 minutes ago</p>
								<h6>great fun.great fun.great fun.great fun.great fun.great fun.great fun.great fun.great fun.great fun.great fun.great fun.</h6>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="movie-date-selection">
						<div class="comment">
							<div class="client">
								<img src="images/c3.jpg" alt="">
							</div>
							<div class="client-message">
								<p><a href="#">felps</a><i class="fa fa-calendar"></i>half hours ago</p>
								<h6>i like it.i like it.i like it.i like it.i like it.i like it.i like it.i like it.i like it.i like it.i like it.i like it.i like it.</h6>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="movie-date-selection">
						<div class="comment">
							<div class="client">
								<img src="images/gc.jpg" alt="">
							</div>
							<div class="client-message">
								<p><a href="#">Tompson</a><i class="fa fa-calendar"></i>1 hours ago</p>
								<h6>have fun.have fun.have fun.have fun.have fun.have fun.have fun.have fun.have fun.have fun.have fun.have fun.</h6>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="movie-date-selection">
						<div class="comment">
							<div class="client">
								<img src="images/c1.jpg" alt="">
							</div>
							<div class="client-message">
								<p><a href="#">john doe</a><i class="fa fa-calendar"></i>2 hours ago</p>
								<h6>the director might be excellent !! While Cameron has had a great night, I suspect his problems in some way have only just begun.</h6>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="movie-date-selection">
						<div class="comment">
							<div class="client">
								<img src="images/c1.jpg" alt="">
							</div>
							<div class="client-message">
								<p><a href="#">john doe</a><i class="fa fa-calendar"></i>2 hours ago</p>
								<h6>the director might be excellent !! While Cameron has had a great night, I suspect his problems in some way have only just begun.</h6>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="movie-date-selection">
						<div class="comment">
							<div class="client">
								<img src="images/c1.jpg" alt="">
							</div>
							<div class="client-message">
								<p><a href="#">john doe</a><i class="fa fa-calendar"></i>2 hours ago</p>
								<h6>the director might be excellent !! While Cameron has had a great night, I suspect his problems in some way have only just begun.</h6>
							</div>
							<div class="clearfix"></div>
						</div>
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

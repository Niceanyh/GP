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
       $get_actor_id=$_GET['m'];

	?>

	<title>Actor</title>
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
							<li><a href="../logout.php">Logout</a></li>
						</ul><!-- end nav navbar-nav navbar-right -->
					</div><!-- end #navbar-collapse-1 -->

				</nav><!-- end navbar navbar-default w3_megamenu -->
			</div><!-- end container -->
      <div class="review-slider">
			<!-- AddThis Smart Layers END -->

			<div class="now-showing-list">
				<div class="col-md-4 movies-by-category movie-booking">
					<div class="movie-ticket-book">
						<div class="clearfix"></div>
						<?php
						$actor_profile_path = $pdo->query("select profile_path from actor where actor_id =$get_actor_id ");#where module='$module'
						$row = $actor_profile_path ->fetch();
						 $profile_path=$row['profile_path'];
						 //echo $film_poster;
						 //echo "<img src=https://image.tmdb.org/t/p/w500/",$film_poster," height=235 width=290><br>";
						 //echo $row['poster_path'],"<br>";
						 echo "<a><img src=https://image.tmdb.org/t/p/w500/",$profile_path," height=450 width=70></a>";
						 echo "<div class=\"date-city\">";
							 echo "<div class=\"buy-tickets\">";
							echo "</div></div>";
							echo "</li>";
				?>

						<div class="bahubali-details">
							<h4>name:</h4>
							<?php
							$actor_name = $pdo->query("select name from actor where actor_id = $get_actor_id ");#where module='$module'
							$row = $actor_name ->fetch();
							 $name=$row['name'];
								 echo "$name";
							?>

							<h4>date of birth:</h4>
							<?php
							$actor_birthday = $pdo->query("select date_birth from actor where actor_id = $get_actor_id");#where module='$module'
							$row = $actor_birthday ->fetch();
							 $date_birth=$row['date_birth'];
							 $date_birth= date('Y-m-d',strtotime($date_birth));
								 echo "$date_birth";
							?>

							<h4>gender:</h4>
							<?php
							$actor_gender = $pdo->query("select gender from actor where actor_id =$get_actor_id ");#where module='$module'
							$row = $actor_gender ->fetch();
							 $gender=$row['gender'];
								 echo "$gender";
							?>

							<h4>Person Intorduce:</h4>
							<?php
							$actor_biography = $pdo->query("select biography from actor where actor_id =$get_actor_id ");#where module='$module'
							$row = $actor_biography ->fetch();
							 $biography=$row['biography'];
								 echo "$biography";
							?>

						</div>
					</div>
				</div>
				<div class="col-md-8 movies-dates">
					<div class="movie-date-selection">
						<ul>
							<li class="location">

									<?php
								$actor_movie_id = $pdo->query("select movie_id from cast where actor_id = $get_actor_id");#where module='$module'
								foreach($actor_movie_id as $row) {
								 $movie_id=$row['movie_id'];

								$movie_title = $pdo->query("select title from movie where movie_id = '$movie_id'");#where module='$module'
								$movie_vote_average = $pdo->query("select vote_average from movie where movie_id = '$movie_id'");
								$movie_release_date = $pdo->query("select release_date from movie where movie_id = '$movie_id'");
								$row = $movie_title ->fetch();
								$title=$row['title'];
								 echo "<i class='fa fa-star'></i>";
								 echo "<a href='movie-select-show.php?v=$movie_id'>$title</a><br>";
								$row = $movie_vote_average ->fetch();
								$vote_average=$row['vote_average'];
								echo "Rating: ";
								echo "$vote_average<br>";
								$row = $movie_release_date ->fetch();
								 $release_date=$row['release_date'];
								 $release_date= date('Y-m-d',strtotime($release_date));
								  echo "Release Time: ";
									echo "$release_date<br>";
									echo "<br>";
							}
								?></a>
							</li>
							<li class="time">
							</li>
							<li class="time">
							</li>
						</ul>

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

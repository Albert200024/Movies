<?php
 $id = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet"> 

	<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">
	<link rel="stylesheet" href="css/plyr.css">
	<link rel="stylesheet" href="css/photoswipe.css">
	<link rel="stylesheet" href="css/default-skin.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- Favicons -->
	<link rel="icon" type="image/png" href="icon/favicon-32x32.png" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
	<link rel="apple-touch-icon" sizes="72x72" href="icon/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="icon/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="144x144" href="icon/apple-touch-icon-144x144.png">
    <link rel="stylesheet" href="css/style.css">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>FlixGo – Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body class="body">
	
	<!-- header -->
	<header class="header">
		<div class="header__wrap">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__content">
							<!-- header logo -->
							<a href="index.php" class="header__logo">
								<img src="img/logo.svg" alt="">
							</a>
							<!-- end header logo -->

							<!-- header nav -->
							<ul class="header__nav">
								<!-- dropdown -->
								<li class="header__nav-item">
                                    <a href="index.php" class="header__nav-link">Home</a>
								</li>
								<!-- end dropdown -->

                                <li class="header__nav-item">
                                    <a href="catalog1.php" class="header__nav-link">Catalog</a>
                                </li>

								<li class="header__nav-item">
									<a href="pricing.php" class="header__nav-link">Pricing Plan</a>
								</li>

								<li class="header__nav-item">
									<a href="faq.php" class="header__nav-link">Help</a>
								</li>

								<!-- dropdown -->
								<li class="dropdown header__nav-item">
									<a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

									<ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
										<li><a href="about.php">About</a></li>
										<li><a href="404.php">404 Page</a></li>
									</ul>
								</li>
								<!-- end dropdown -->
							</ul>
							<!-- end header nav -->

							<!-- header auth -->
							<div class="header__auth">
								<button class="header__search-btn" type="button">
									<i class="icon ion-ios-search"></i>
								</button>
							</div>
							<!-- end header auth -->

							<!-- header menu btn -->
							<button class="header__btn" type="button">
								<span></span>
								<span></span>
								<span></span>
							</button>
							<!-- end header menu btn -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- header search -->
		<form action="#" class="header__search">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="header__search-content">
							<input type="text" placeholder="Search for a movie, TV Series that you are looking for">

							<button type="button">search</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- end header search -->
	</header>
	<!-- end header -->

	<!-- details -->
	<section class="section details">
		<!-- details background -->
		<div class="details__bg" data-bg="img/home/home__bg.jpg"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
            <?php
              require "config.php";
              $sel = "SELECT * FROM `film` WHERE id='$id'";
              $result = mysqli_query($con, $sel);
              $movie = mysqli_fetch_assoc($result);
            ?>
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title"><?=$movie["name"]?></h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="<?=$movie["photos"]?>" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>

										<ul class="card__list">
											<li>HD</li>
											<li>16+</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li>
                                            <span>Genre:</span>
                                            <?php
                                              require "config.php";
                                               $sel_ganre = "SELECT * FROM `film` LEFT JOIN `film_ganre` ON `film`.`id` = `film_ganre`.`film_id` WHERE `film`.`id` = '$id'" ;
                                               $result_ganre = mysqli_query($con, $sel_ganre);
                                               while ($ganre = $result_ganre -> fetch_assoc()){
                                                   $id2 = $ganre["ganre_id"];
                                                   $select_ganre_name = "SELECT * FROM `ganre` WHERE `ganre`.`id` = '$id2'";
                                                   $result2 = mysqli_query($con, $select_ganre_name);
                                              ?>
                                                 <?php
                                                      while ($row = $result2 -> fetch_assoc()){
                                                    ?>
                                                    <a href="#"><?= $row["name"] ?></a>
                                                 <?php }?>
                                            <?php };?>
                                        </li>
										<li><span>Release year:</span>
                                         <?php
                                            $sel_year = "SELECT * FROM `film` RIGHT JOIN `year` ON `film`.`id` = `year`.`_id` WHERE `film`.`id` = '$id'" ;
                                            $result_year = mysqli_query($con, $sel_ganre);
                                            $year = mysqli_fetch_assoc($result_year);
                                            $year_id = $year["year_id"];

                                            $select_year = "SELECT * FROM `year` WHERE id = '$year_id'";
                                            $select_yaer_result = mysqli_query($con, $select_year);
                                            $year1 = mysqli_fetch_assoc($select_yaer_result);

                                            echo $year1["date"]
                                         ?>
                                        </li>
                                        <li><span>Director:</span>
                                        <?php
                                          require "config.php";
                                          $sel_rejisor = "SELECT * FROM `film` LEFT JOIN `film_rejisor` ON `film`.`id` = `film_rejisor`.`film_id` WHERE `film`.`id` = '$id'";
                                          $rejisor_sel_rtesult = mysqli_query($con, $sel_rejisor);
                                          $rejisor = mysqli_fetch_assoc($rejisor_sel_rtesult);
                                          $rej_id = $rejisor["rejisor_id"];

                                          $select_rejisor = "SELECT name FROM rejisor WHERE id='$rej_id'";
                                          $query = mysqli_query($con, $select_rejisor);
                                          $rej = mysqli_fetch_assoc($query);
                                          print_r($rej["name"])

                                        ?>
									</ul>
									<div class="card__description card__description--details">
										<?= $movie["description"]?>
									</div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
                    <iframe width="500" height="315" src="<?=$movie["videos"]?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
				<!-- end player -->

				<div class="col-12">
					<div class="details__wrap">
						<!-- availables -->
						<div class="details__devices">
							<span class="details__devices-title">Available on devices:</span>
							<ul class="details__devices-list">
								<li><i class="icon ion-logo-apple"></i><span>IOS</span></li>
								<li><i class="icon ion-logo-android"></i><span>Android</span></li>
								<li><i class="icon ion-logo-windows"></i><span>Windows</span></li>
								<li><i class="icon ion-md-tv"></i><span>Smart TV</span></li>
							</ul>
						</div>
						<!-- end availables -->

						<!-- share -->
						<div class="details__share">
							<span class="details__share-title">Share with friends:</span>

							<ul class="details__share-list">
								<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
								<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
								<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
								<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
							</ul>
						</div>
						<!-- end share -->
					</div>
				</div>
			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
	<section class="content">
		<div class="content__head">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- content title -->
						<h2 class="content__title">Actors</h2>
						<!-- end content title -->
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8 col-xl-8">
					<!-- content tabs -->
					<div class="tab-content" id="myTabContent">
						<dizv class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
							<div class="row">
								<!-- Actor blcock -->
								<div class="col-12 actor_block" >
                                    <?php
                                       require "config.php";
                                       $join_actor = "SELECT * FROM `film` LEFT JOIN `film_actor` ON `film`.`id` =  `film_actor`.`film_id` WHERE `film`.`id`='$id'";
                                       $join_query =  mysqli_query($con, $join_actor);

                                       while ($actor = $join_query -> fetch_assoc()){
                                           echo "<br>";

                                           $actor_id = $actor["actor_id"];
                                           $sel_actors = "SELECT * FROM `actor` WHERE id = '$actor_id'";
                                           $query_actors = mysqli_query($con, $sel_actors);
                                           $actors = mysqli_fetch_assoc($query_actors);

                                    ?>
                                      <div class="actor">
                                          <img src="img/actors/<?=$actors["actor_photos"]?>" height="250" width="200" alt="">
                                          <p style="color: white"><?php echo $actors["name"]?></p>
                                      </div>
                                    <?php }?>
								</div>
								<!-- end Actor block -->
							</div>
						</dizv>
					</div>
					<!-- end content tabs -->
				</div>

				<!-- sidebar -->
				<div class="col-12 col-lg-4 col-xl-4">
					<div class="row">
						<!-- section title -->
						<div class="col-12">
							<h2 class="section__title section__title--sidebar">You may also like...</h2>
						</div>
						<!-- end section title -->

						<!-- card -->
                        <?php
                            require "config.php";
                            $sel = "SELECT * FROM `film` WHERE id < 6";
                            $result = mysqli_query($con, $sel);

                            while ($row = $result -> fetch_assoc()){
                            $id = $row["id"];
                            $sel_ganre = "SELECT * FROM `film` LEFT JOIN `film_ganre` ON `film`.`id` = `film_ganre`.`film_id` WHERE `film`.`id` = '$id'" ;
                            $result1 = mysqli_query($con, $sel_ganre);
                        ?>
						<div class="col-6 col-sm-4 col-lg-6">
							<div class="card">
								<div class="card__cover">
									<img src="<?=$row["photos"]?>" alt="" height="250">
									<a href="details1.php?id=<?=$row["id"]?>" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="details1.php?id=<?=$row["id"]?>">I Dream in Another Language</a></h3>
									<span class="card__category">
										 <?php
                                         while ($ganre = $result1 -> fetch_assoc()){
                                             $id2 = $ganre["ganre_id"];
                                             $select_ganre_name = "SELECT * FROM `ganre` WHERE `ganre`.`id` = '$id2'";
                                             $result2 = mysqli_query($con, $select_ganre_name);

                                             while ($row = $result2 -> fetch_assoc()){
                                                 ?>
                                                 <a href="#"><?= $row["name"] ?></a>
                                             <?php }?>
                                         <?php }?>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
								</div>
							</div>
						</div>
                            <?php }?>
						<!-- end card -->
					</div>
				</div>
				<!-- end sidebar -->
			</div>
		</div>
	</section>
	<!-- end content -->

	<!-- footer -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<!-- footer list -->
				<div class="col-12 col-md-3">
					<h6 class="footer__title">Download Our App</h6>
					<ul class="footer__app">
						<li><a href="#"><img src="img/Download_on_the_App_Store_Badge.svg" alt=""></a></li>
						<li><a href="#"><img src="img/google-play-badge.png" alt=""></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Resources</h6>
					<ul class="footer__list">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Pricing Plan</a></li>
						<li><a href="#">Help</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Legal</h6>
					<ul class="footer__list">
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Security</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-12 col-sm-4 col-md-3">
					<h6 class="footer__title">Contact</h6>
					<ul class="footer__list">
						<li><a href="tel:+18002345678">+1 (800) 234-5678</a></li>
						<li><a href="mailto:support@moviego.com">support@flixgo.com</a></li>
					</ul>
					<ul class="footer__social">
						<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
						<li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
						<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
						<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						<ul>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<!-- end footer copyright -->
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

		<!-- Background of PhotoSwipe. 
		It's a separate element, as animating opacity is faster than rgba(). -->
		<div class="pswp__bg"></div>

		<!-- Slides wrapper with overflow:hidden. -->
		<div class="pswp__scroll-wrap">

			<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
			<!-- don't modify these 3 pswp__item elements, data is added later on. -->
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
			<div class="pswp__ui pswp__ui--hidden">

				<div class="pswp__top-bar">

					<!--  Controls are self-explanatory. Order can be changed. -->

					<div class="pswp__counter"></div>

					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

					<!-- Preloader -->
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
							<div class="pswp__preloader__cut">
								<div class="pswp__preloader__donut"></div>
							</div>
						</div>
					</div>
				</div>

				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>

				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>

				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
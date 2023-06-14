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
                                    <a href="catalog1.php" class="header__nav-link header__nav-link--active">Catalog</a>
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
        <form action="search_catalog.php" class="header__search" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="header__search-content">
                            <input type="text" name="search" placeholder="Search for a movie, TV Series that you are looking for">
                            <div>
                                <input class="sign__btn" name="submit" type="submit"  value="SEARCH">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
		<!-- end header search -->
	</header>
	<!-- end header -->

	<!-- page title -->
	<section class="section section--first section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Catalog Moives</h2>
						<!-- end section title -->
						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item"><a href="#">Home</a></li>
							<li class="breadcrumb__item breadcrumb__item--active">Catalog Movies</li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- catalog -->
	<div class="catalog" style="margin-top: 60px;">
		<div class="container">
			<div class="row">
				<!-- card -->
                <?php
                    require "config.php";
                    $start = 0;

                    $rows_pare_page= 12;

                    $sel_all = "SELECT * FROM `film`";
                    $records = mysqli_query($con, $sel_all);
                    $nr_of_rows = mysqli_num_rows($records);

                    $pages = ceil($nr_of_rows / $rows_pare_page);

                    $page = 0;
                    if(isset($_GET['page-nr'])){
                        $page = $_GET['page-nr'] - 1;
                        $start = $page  * $rows_pare_page;
                    }

                    $sel = "SELECT * FROM `film` WHERE id < 8 OR id > 16 LIMIT $start, $rows_pare_page";
                    $result = mysqli_query($con, $sel);

                    while ($row = $result -> fetch_assoc()){
                        $id = $row["id"];
                        $sel_ganre = "SELECT * FROM `film` LEFT JOIN `film_ganre` ON `film`.`id` = `film_ganre`.`film_id` WHERE `film`.`id` = '$id'" ;
                        $result1 = mysqli_query($con, $sel_ganre);
                ?>
				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="<?=$row["photos"]?>" alt="" height="240">
							<a href="details1.php?id=<?=$row["id"]?>"  class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title"><a href="details1.php?id=<?=$row["id"]?>"><?=$row["name"]?></a></h3>
							<span class="card__category">
								 <?php
                                 while ($ganre = $result1 -> fetch_assoc()){
                                     $id2 = $ganre["ganre_id"];
                                     $select_ganre_name = "SELECT * FROM `ganre` WHERE `ganre`.`id` = '$id2'";
                                     $result2 = mysqli_query($con, $select_ganre_name);

                                     while ($row = $result2 -> fetch_assoc()){
                                         ?>
                                         <a><?= $row["name"] ?></a>
                                     <?php }?>
                                 <?php };?>
							</span>
							<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
						</div>
					</div>
				</div>
                        <?php
                    }?>
				<!-- end card -->

				<!-- paginator -->
				<div class="col-12">
					<ul class="paginator">
                        <?php
                        if(isset($_GET["page-nr"]) && $_GET['page-nr'] > 1){
                            ?>
                            <li class="paginator__item paginator__item--prev">
                                <a href="?page-nr=<?php echo $_GET['page-nr']-1?>"><i class="icon ion-ios-arrow-back"></i></a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class="paginator__item paginator__item--prev">
                                <a><i class="icon ion-ios-arrow-back"></i></a>
                            </li>
                            <?php
                        }
                        ?>

                        <?php
                           for ($counter = 1; $counter <= $pages; $counter++){
                              if($page  == $counter - 1){ ?>
                                  <li class="paginator__item paginator__item--active"><a href="?page-nr=<?php echo $counter?>"><?php echo $counter?></a></li>
                              <?php
                              } else { ?>
                                  <li class="paginator__item "><a href="?page-nr=<?php echo $counter?>"><?php echo $counter?></a></li>
                               <?php
                              }
                           }
                        ?>

                        <?php
                           if(!isset($_GET['page-nr'])){
                               ?>
                               <li class="paginator__item paginator__item--next ">
                                   <a href="?page-nr=2"><i class="icon ion-ios-arrow-forward"></i></a>
                               </li>
                               <?php
                           } else {
                               if($_GET["page-nr"] >= $pages){
                                   ?>
                                   <li class="paginator__item paginator__item--next">
                                       <a><i class="icon ion-ios-arrow-forward"></i></a>
                                   </li>
                                    <?php
                               } else {
                                   ?>
                                   <li class="paginator__item paginator__item--next">
                                       <a href="?page-nr=<?php echo $_GET["page-nr"] + 1?>"><i class="icon ion-ios-arrow-forward"></i></a>
                                   </li>

                                   <?php
                               }
                           }
                        ?>
					</ul>
				</div>
				<!-- end paginator -->
			</div>
		</div>
	</div>
	<!-- end catalog -->

	<!-- expected premiere -->
	<section class="section section--bg" data-bg="img/section/section.jpg">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title">Expected premiere</h2>
				</div>
				<!-- end section title -->
                <!-- card -->
                <?php
                require "config.php";
                $sel = "SELECT * FROM `film` WHERE id> 6 AND id<17";
                $result = mysqli_query($con, $sel);

                while ($row = $result -> fetch_assoc()){
                    $id = $row["id"];
                    $sel_ganre = "SELECT * FROM `film` LEFT JOIN `film_ganre` ON `film`.`id` = `film_ganre`.`film_id` WHERE `film`.`id` = '$id'" ;
                    $result1 = mysqli_query($con, $sel_ganre);

                    ?>
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                        <div class="card">
                            <div class="card__cover">
                                <img src="<?=$row["photos"]?>" height="240" alt="">
                                <a href="details1.php?id=<?=$row["id"]?>" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="details1.php?id=<?=$row["id"]?>"><?=$row["name"]?></a></h3>
                                <span class="card__category">
                                    <?php
                                    while ($ganre = $result1 -> fetch_assoc()){
                                        $id2 = $ganre["ganre_id"];
                                        $select_ganre_name = "SELECT * FROM `ganre` WHERE `ganre`.`id` = '$id2'";
                                        $result2 = mysqli_query($con, $select_ganre_name);

                                        while ($row = $result2 -> fetch_assoc()){
                                            ?>
                                            <a ><?= $row["name"] ?></a>
                                        <?php }?>
                                    <?php };?>
                                </span>
                                <!--                                <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>-->
                            </div>
                        </div>
                    </div>
                <?php }?>
                <!-- end card -->
			</div>
		</div>
	</section>
	<!-- end expected premiere -->

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
						<small><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></small>

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
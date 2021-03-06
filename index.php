<?php
	session_start();
	require("model/database.php");
	require("model/modelCustomers.php");
	require("model/modelCategorys.php");
	require("model/modelProducts.php");

	$title = "Home page";
	if(isset($_GET["f"])){
		if($_GET["f"] == "contact"){
			$title = "Contact here";
		}else if($_GET["f"] == "login"){
			$title = "Login page";
		}else if($_GET["f"] == "home"){
			$title = "Home page";
		}
	}
	else if(isset($_GET["a"])){
		if($_GET["a"] == "blog-archive"){
			$title = "Our Blog-Archive";
		}
	}
	else if(isset($_GET["c"])){
		if($_GET["c"] == "scholarship"){
			$title = "Scholarship";
		}else if($_GET["c"] == "course-archive"){
			$title = "Our Course-Archive";
		}
	}
	else if(isset($_GET["e"])){
		if($_GET["e"] == "events-archive"){
			$title = "Our Evevts-Archive";
		}else if($_GET["e"] == "gallery"){
			$title = "Our Gallery";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title><?php echo $title; ?></title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="img/wpf-favicon.png"/>

    <!-- CSS
    ================================================== -->       
    <!-- Bootstrap css file-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="css/superslides.css">
    <!-- Slick slider css file -->
    <link href="css/slick.css" rel="stylesheet"> 
    <!-- Circle counter cdn css file -->
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css'>  
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="css/animate.css"> 
    <!-- preloader -->
    <link rel="stylesheet" href="css/queryLoader.css" type="text/css" />
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="css/jquery.tosrus.all.css" />    
    <!-- Default Theme css file -->
    <link id="switcher" href="css/themes/default-theme.css" rel="stylesheet">
    <!-- Main structure css file -->
    <link href="style.css" rel="stylesheet">
    <!--My style sheet-->
    <link rel="stylesheet" href="table.css" type="text/css" />
   
    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>   
    <link href='http://fonts.googleapis.com/css?family=Varela' rel='stylesheet' type='text/css'>    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
  </head>
  <body>    

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">  <div class="container">
            <div class="navbar-header">
              <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- LOGO -->
              <!-- TEXT BASED LOGO -->
              <a class="navbar-brand" href="index.php">WpF <span>Degree</span></a>              
              <!-- IMG BASED LOGO  -->
               <!-- <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="logo"></a>  -->            
                     
            </div>
            <?php
				if(isset($_GET["a"])){
					$menu = $_GET["a"];
				}else if(isset($_GET["c"])){
					$menu = $_GET["c"];
				}else if(isset($_GET["e"])){
					$menu = $_GET["e"];
				}else if(isset($_GET["f"])){
					$menu = $_GET["f"];
				}else{
					$menu = "home";
				}
			?>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                <li <?php if($menu == "home"){echo 'class="active"';}?>><a href="index.php?f=home">Home</a></li>
                <?php if(isset($_SESSION["mytype"]) && ($_SESSION["mytype"] == "a" || $_SESSION["mytype"] == "e" || $_SESSION["mytype"] == "c")) { ?>
                <li <?php if($menu == 'course-archive'){echo 'class="active"';}?>><a href="index.php?c=course-archive">Course</a></li>
                <li <?php if($menu == 'scholarship'){echo 'class="active"';}?>><a href="index.php?c=scholarship">Scholarship</a></li>
                <?php } ?>
                <?php if(isset($_SESSION["mytype"]) && ($_SESSION["mytype"] == "a" || $_SESSION["mytype"] == "e")) { ?>
                <li <?php if($menu == 'events-archive'){echo 'class="active"';}?>><a href="index.php?e=events-archive">Events</a></li>
                <li <?php if($menu == 'gallery'){echo 'class="active"';}?>><a href="index.php?e=gallery">Gallery</a></li>
                <?php } ?>
                <?php if(isset($_SESSION["mytype"]) && ($_SESSION["mytype"] == "a")) { ?>              
                <li <?php if($menu == 'blog-archive'){echo 'class="active"';}?>><a href="index.php?a=blog-archive">Blog</a></li>
                <?php } ?>
                <!--
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Page<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="404.html">404 Page</a></li>
                    <li><a href="#">Link Two</a></li>
                    <li><a href="#">Link Three</a></li>               
                  </ul>
                </li> 
                -->           
                <li <?php if($menu == 'contact'){echo 'class="active"';}?>><a href="index.php?f=contact">Contact</a></li>
                <?php if(isset($_SESSION["mytype"]) && ($_SESSION["mytype"] == "a" || $_SESSION["mytype"] == "e")) { ?>
                <li <?php if($menu == 'products'){echo 'class="active"';}?>><a href="index.php?e=products">Products</a></li>
                <?php } ?>
                <?php if(isset($_SESSION["myid"])){?>
					<li <?php if($menu == 'logout'){echo 'class="active"';}?>><a href='index.php?f=logout'>Logout</a></li>
				<?php } else{?>
					<li <?php if($menu == 'login'){echo 'class="active"';}?>><a href='index.php?f=login'>Login</a></li>
				<?php } ?>
				?>
              </ul>           
            </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->    
    </header>
    <!--=========== END HEADER SECTION ================--> 
	<?php
		if(isset($_GET["f"])){
			if(file_exists("view/fornt-end/".$_GET["f"].".php")){
				require("view/fornt-end/".$_GET["f"].".php");
			}else{
				require("view/fornt-end/error404.php");
			}
		}else if(isset($_GET["c"]) && isset($_SESSION["mytype"])){
			if(file_exists("view/customers/".$_GET["c"].".php")){
			  require("view/customers/".$_GET["c"].".php");
		  }else{
				require("view/fornt-end/error404.php");
			}
	  }else if(isset($_GET["e"]) && isset($_SESSION["mytype"]) && ($_SESSION["mytype"] == "a" || $_SESSION["mytype"] == "e")){
			if(file_exists("view/employee/".$_GET["e"].".php")){
			  require("view/employee/".$_GET["e"].".php");	
			}else{
				require("view/fornt-end/error404.php");
			}
	  }else if(isset($_GET["a"]) && isset($_SESSION["mytype"]) && ($_SESSION["mytype"] == "a")){
			if(file_exists("view/admin/".$_GET["a"].".php")){
			  require("view/admin/".$_GET["a"].".php");	
			}else{
				require("view/fornt-end/error404.php");
			}
	  }else{
				require("view/fornt-end/home.php");
			}
	?>
    <!--=========== BEGIN FOOTER SECTION ================-->
    <footer id="footer">
      <!-- Start footer top area -->
      <div class="footer_top">
        <div class="container">
          <div class="row">
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>About Us</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
              </div>
            </div>
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Community</h3>
                <ul class="footer_widget_nav">
                  <li><a href="#">Our Tutors</a></li>
                  <li><a href="#">Our Students</a></li>
                  <li><a href="#">Our Team</a></li>
                  <li><a href="#">Forum</a></li>
                  <li><a href="#">News &amp; Media</a></li>
                </ul>
              </div>
            </div>
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Others</h3>
                <ul class="footer_widget_nav">
                  <li><a href="#">Link 1</a></li>
                  <li><a href="#">Link 2</a></li>
                  <li><a href="#">Link 3</a></li>
                  <li><a href="#">Link 4</a></li>
                  <li><a href="#">Link 5</a></li>
                </ul>
              </div>
            </div>
            <div class="col-ld-3  col-md-3 col-sm-3">
              <div class="single_footer_widget">
                <h3>Social Links</h3>
                <ul class="footer_social">
                  <li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Twitter" class="soc_tooltip"  href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a data-toggle="tooltip" data-placement="top" title="Youtube" class="soc_tooltip"  href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End footer top area -->

      <!-- Start footer bottom area -->
      <div class="footer_bottom">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="footer_bootomLeft">
                <p> Copyright &copy; All Rights Reserved</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="footer_bootomRight">
                <p>Designed by <a href="http://wpfreeware.com/" rel="nofollow">Wpfreeware.com</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End footer bottom area -->
    </footer>
    <!--=========== END FOOTER SECTION ================--> 

  

    <!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Preloader js file -->
    <script src="js/queryloader2.min.js" type="text/javascript"></script>
    <!-- For smooth animatin  -->
    <script src="js/wow.min.js"></script>  
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="js/slick.min.js"></script>
    <!-- superslides slider -->
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.animate-enhanced.min.js"></script>
    <script src="js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
    <!-- for circle counter -->
    <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
    <!-- Gallery slider -->
    <script type="text/javascript" language="javascript" src="js/jquery.tosrus.min.all.js"></script>   
   
    <!-- Custom js-->
    <script src="js/custom.js"></script>
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->


  </body>
</html>
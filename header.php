 <?php

require("database.php");
include('config.php');
$user_id=$_SESSION['stdid'];  
$sql_qry=mysql_query("select * from student where stdid='$user_id'");
$sql_qry_arr=mysql_fetch_array($sql_qry);
    
?>
<header class="noFixMenu menu_right with_user_menu no_container_padding">
<div class="topWrapFixed"></div>
<div class="topWrap">
<div class="usermenu_area">
<div class="container">
<div class="menuUsItem menuItemRight">
<ul class="usermenu_list" id="usermenu">
 <?php
            if($_SESSION['stdname']!='')
            {
                 $ref_count_img=mysql_query("SELECT * FROM student where stdid='$user_id'"); 
									  while($ref_count_img_arr=mysql_fetch_array($ref_count_img))
                                    {
                                      
									 ?> <li class="dropdown user">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?=$_SESSION['stdname']?><span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
            </li>
    <?php } } else { ?>
	<li class="menu-item ">
<a href="#user-popUp" class="user-popup-link">Register for FREE!</a>
</li>
<li class="usermenu_login">
<a href="#user-popUp" class="user-popup-link">Login</a>
</li>
<?php    } ?>

	<li class="menu-item ">
<a href="#">Support &#038; FAQ</a>
</li>
  
</ul>
</div>
<div class="menuUsItem menuItemLeft">
<span class="icon-phone"></span>
 9659960119
<span class="icon-email"></span>
<a href="#">
<span>akashkumarero1998@gmail.com</span>
</a>
</div>
</div>
</div>
<div class="mainmenu_area">
<div class="container with_logo_left">
<div class="logo logo_left">
<a href="index.php">
<img src="images/logo/logo.png" class="logo_main" alt="">
<img src="images/logo/logo.png" class="logo_fixed" alt="">
<span class="logo_slogan"></span>
</a>
</div>
<div class="search" title="Open/close search form">
<div class="searchForm">
<form role="search" method="get" class="search-form" action="#">
<button type="submit" class="searchSubmit" title="Start search">
<span class="icoSearch"></span>
</button>
<input type="text" class="searchField" placeholder="Search &hellip;" value="" name="s" title="Search for:"/>
</form>
</div>
<div class="ajaxSearchResults"></div>
</div>
<a href="#" class="openResponsiveMenu">Menu</a>
<nav role="navigation" class="menuTopWrap topMenuStyleLine">
<ul id="mainmenu" class="">
<li class="menu-item menu-item-home">
<a href="index.php">Home</a>
</li>
<li class="menu-item menu-item-has-children columns custom_view_item">
<a title="About Us" href="aboutus.php">About Us</a>

     <?php
            if($_SESSION['stdname']!='')
            { ?>
                <li class="dropdown user">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Exams</a>
              <ul class="dropdown-menu" role="menu">
			  <li><a href="main_subject.php"><i class="fa fa-user"></i>Exam</a></li>
           <!--     <li><a href="stdtest.php"><i class="fa fa-user"></i>Take Test</a></li>
               --> <li><a href="resumetest.php"><i class="fa fa-sign-out"></i>Resume Test</a></li>
              </ul>
            </li>
    <?php }  else { ?>
<li class="menu-item menu-item-has-children columns custom_view_item">
<a href="main_subject.php">Exams</a>
    <?php } ?>
</li>
<!-- <li class="menu-item">
<a href="pricing.php">Pricing</a>
</li>  -->
<li class="menu-item menu-item-has-children">
<a title="Posts pages" href="faq.php">Blog</a>
</li>
<li class="menu-item menu-item-has-children">
<a title="successors" href="index.php?#topper">Topper</a>
</li>
</ul>
</nav>
</div>
</div>
</div>
</header>

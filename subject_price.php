<?php

include("database.php");
extract($_GET);
session_start();
$user_id=$_SESSION['stdid'];
if(isset($_POST['submit'])){
	$plans1=$_POST['plans'];
	$_SESSION['plan']=$plans1;
 $plans_id=$_POST['plans_id'];
 $_SESSION['plan_id']=$plans_id;
 mysql_query("INSERT INTO `payment_details`(`id`, `student_id`, `plan`, `plan_id`, `subject_id`) VALUES 
 	(null,'$user_id','$plans1','$plans_id','$id')");
  //echo $plans1;

	header('location:https://www.payumoney.com/paybypayumoney/#/2DB94C2D8BD97E2CF3C01DB0C0EC4745');
 //  https://www.payumoney.com/paybypayumoney/#/2DB94C2D8BD97E2CF3C01DB0C0EC4745
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>ExamsVenue | Pricing</title>
<link rel="icon" type="image/x-icon" href="images/icon/favicon.ico"/>

<link rel='stylesheet' id='packed-css' href='css/_packed.css' type='text/css' media='all'/>
<link rel='stylesheet' id='fontello-css' href='css/fontello.css' type='text/css' media='all'/>
<link rel='stylesheet' id='main-style-css' href='css/style.css' type='text/css' media='all'/>
<link rel='stylesheet' id='shortcodes-css' href='css/shortcodes.css' type='text/css' media='all'/>
<link rel='stylesheet' id='theme-skin-css' href='css/general.css' type='text/css' media='all'/>
<link rel='stylesheet' id='responsive-css' href='css/responsive.css' type='text/css' media='all'/>
</head>
<body class="page fullscreen top_panel_above top_panel_opacity_transparent theme_skin_general usermenu_show">

<div class="main_content">
<div class="boxedWrap">
<?php include('header.php'); 
	$user_id=$_SESSION['stdid'];
	// $_SESSION['student_id']=$user_id;
	?>
<section class="orange_section">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="text-center">
<h1 class="sc_title sc_title_regular sc_title_bold margin_top_large">We Make your Learning Practice Interesting</h1>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="text-center animated">
<div class="sc_button sc_button_style_dark sc_button_size_banner squareButton dark banner">
<a href="#" class="">Start With ExamsVenue</a>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="mainWrap without_sidebar">
<div class="content">
<section class="light_section">
<div class="container">
<div class="row animated">
<div class="col-sm-12">
<div class="text-center">
<h1 class="sc_title sc_title_bold sc_title_regular">Our Exams Price Plans For</h1>
	<?php
  // $_SESSION['subject_id']=$id;
	$query_003 = mysql_query("SELECT * FROM `subject` WHERE `subid`='$id'");
	$fetch_003 = mysql_fetch_array($query_003);
	?>
<h3 class="sc_title sc_title_regular margin_bottom_small"> <?=$fetch_003['subname']; ?></h3>
</div>
</div>
</div>
<div class="row animated">
<div class="col-sm-12">
<div class="sc_pricing_table columns_3 alignCenter sc_table_style_custom1">
	<?php
	$query_004 = mysql_query("SELECT * FROM `plans` WHERE `subid`='$id'");
	while($fetch_004 = mysql_fetch_array($query_004)){
	?>
<div class="sc_pricing_columns sc_pricing_column_1">
<ul class="columnsAnimate">
<li class="sc_pricing_data sc_pricing_title"> <?php echo htmlspecialchars_decode($fetch_004['plan_name'],ENT_QUOTES); ?></li>
<?php $plan = htmlspecialchars_decode($fetch_004['plan_name'],ENT_QUOTES);

$plan_id = htmlspecialchars_decode($fetch_004['id'],ENT_QUOTES);
//$_SESSION['plan_id']=$plan_id;
 ?>
<li class="sc_pricing_data sc_pricing_price">
<div class="sc_price_item">
<span class="sc_price_currency">&#8377</span>
<div class="sc_price_money"><?=$fetch_004['amount']; ?></div>
<div class="sc_price_info">
<div class="sc_price_penny"></div>
<div class="sc_price_period">MONTHLY</div>
</div>
</div>
</li>

<li class="sc_pricing_data">
	<?php 
		$d1=$fetch_004['plan_desc'];
	$d2=$fetch_004['plan_desc2']; 
	$d3=$fetch_004['plan_desc3']; 
	$d4=$fetch_004['plan_desc4']; 
	$d5=$fetch_004['plan_desc5']; 
		
		
		$query_0001=mysql_query("SELECT * FROM `test` WHERE `testid`='$d1'");
	$fetch_0001=mysql_fetch_array($query_0001);
	$query_0002=mysql_query("SELECT * FROM `test` WHERE `testid`='$d2'");
	$fetch_0002=mysql_fetch_array($query_0002);
		$query_0003=mysql_query("SELECT * FROM `test` WHERE `testid`='$d3'");
	$fetch_0003=mysql_fetch_array($query_0003);
		$query_0004=mysql_query("SELECT * FROM `test` WHERE `testid`='$d4'");
	$fetch_0004=mysql_fetch_array($query_0004);
		$query_0005=mysql_query("SELECT * FROM `test` WHERE `testid`='$d5'");
	$fetch_0005=mysql_fetch_array($query_0005);
	?>
<strong></strong><?=$fetch_0001['testname']; ?> </li>
	<li class="sc_pricing_data">
<strong></strong><?=$fetch_0002['testname']; ?> </li>
	<li class="sc_pricing_data">
<strong></strong><?=$fetch_0003['testname']; ?> </li>
	<li class="sc_pricing_data">
<strong></strong><?=$fetch_0004['testname']; ?> </li>
	<li class="sc_pricing_data">
<strong></strong><?=$fetch_0005['testname']; ?> </li>
<li class="sc_pricing_data sc_pricing_footer">
<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge margin_bottom_small ico">
  <form method="post">
    <input type="hidden" value="<?php echo $plan;?>" name="plans">
    <input type="hidden" value="<?php echo $plan_id;?>" name="plans_id">
  <center>
<input type="submit" value="BUY" name="submit" class="btn btn-primary"data-animated>
</center>
 </form>                
</div>
</li>
</ul>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</section>



<section class="lightgrey_section">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-7">
<h2 class="sc_title sc_title_bold sc_title_regular">Do you need more ExamsVenue?</h2>
<span class="sc_highlight sc_highlight_style_6">Get the Experience of Exams Here..</span>
</div>
<div class="col-md-4 col-sm-5">
<div class="text-center">
<div class="sc_button sc_button_style_global sc_button_size_banner squareButton global banner margin_top_small">
<a href="#" class="">Learn more</a>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
<div class="footerContentWrap">
<?php include('footer.php'); ?>
	</div>
</div>
</div>
<div id="preloader" class="preloader">
<div class="preloader_image"></div>
</div>
<script type='text/javascript' src='js/vendor/jquery.js'></script>
<script type='text/javascript' src='js/vendor/jquery-migrate.min.js'></script>
<script type='text/javascript' src='js/vendor/bootstrap.min.js'></script>
<script type='text/javascript' src='js/custom/_main.js'></script>
<script type='text/javascript' src='js/vendor/_packed.js'></script>
<script type='text/javascript' src='js/custom/shortcodes_init.js'></script>
<script type='text/javascript' src='js/custom/_front.js'></script>
</body>
</html>

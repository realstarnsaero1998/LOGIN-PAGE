
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Akash AK| Subjects</title>
<link rel="icon" type="image/x-icon" href="images/icon/favicon.ico"/>
<!--[if lt IE 9]>
	<script src="js/vendor/html5.js" type="text/javascript">
	</script>
	<![endif]-->
<link rel='stylesheet' id='packed-css' href='css/_packed.css' type='text/css' media='all'/>
<link rel='stylesheet' id='fontello-css' href='css/fontello.css' type='text/css' media='all'/>
<link rel='stylesheet' id='main-style-css' href='css/style.css' type='text/css' media='all'/>
<link rel='stylesheet' id='shortcodes-css' href='css/shortcodes.css' type='text/css' media='all'/>
<link rel='stylesheet' id='theme-skin-css' href='css/general.css' type='text/css' media='all'/>
<link rel='stylesheet' id='responsive-css' href='css/responsive.css' type='text/css' media='all'/>
     <script type="text/javascript" src="validate.js" ></script>
</head>
<body class="page fullscreen top_panel_above top_panel_opacity_transparent theme_skin_general usermenu_show">
 <div class="main_content">
<div class="boxedWrap">
<?php include('header.php'); ?>
	<?php 
	if($_SESSION['stdname']!=''){
		$var1=1;
	}else{
		$var1=0;
	}
	
	$sname=$_SESSION['stdname'];
	$qry_1=mysql_query("SELECT * FROM `student` WHERE `stdname`='$sname'");
	$fet_1=mysql_fetch_array($qry_1);
	?>
<section class="yellow_section">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="text-center">
<h1 class="sc_title sc_title_regular sc_title_bold margin_top_large">Want to get marks?</h1>
<h5 class="sc_highlight">Study! NO Time to Waste!</h5>
</div>
</div>
</div>

</div>
</section>
<div class="mainWrap without_sidebar">
<div class="content">

<section class="grey_section">
<div class="container">
<div class="row ">
	<?php 
	$user_id=$_SESSION['stdid'];
	$query_002 = mysql_query("SELECT * FROM `subject` WHERE `subid`!='21'");
	while($fetch_002 = mysql_fetch_array($query_002)){
		
$sub=$fetch_002['subid'];

$query_003 = mysql_query("SELECT * FROM `student` where stdid='$user_id'");
	$fetch_003 = mysql_fetch_array($query_003);
		if($fetch_003['payment']!='unpaid' || $fetch_003['payment']!=''){
$status=$fetch_003['payment'];



	$query_004 = mysql_query("SELECT * FROM `plans` where subid='$sub' and plan_name='$status'");
	$fetch_004 = mysql_fetch_array($query_004);
$plan_id=$fetch_005['id'];

if(mysql_num_rows($query_004)>0){


			$query_005 = mysql_query("SELECT * FROM `student_plan` where student_id='$user_id' and sub_id='$sub'");
	$fetch_005 = mysql_fetch_array($query_005);
$plan_id=$fetch_005['plan_id'];
}else{
$sub='';	
}
		}else{
$sub='';
		}




	?>
<div class="col-sm-3">
<div class="text-center animated">
	<?php if($fetch_003['payment']=='unpaid' || $fetch_003['payment']==''){
		
?>
	<a class="sc_title_linked" href="subject_price.php?id=<?=$fetch_002['subid']; ?>">
	<?php }else{

$query_007 = mysql_query("SELECT * FROM `plans` where subid='$sub' and plan_name='$status'");
		if(mysql_num_rows($query_007)>0){



$query_006 = mysql_query("SELECT * FROM `student_plan` where student_id='$user_id' and sub_id='$sub'");
if(mysql_num_rows($query_006)>0){?>
<a class="sc_title_linked" href="stdtest.php?subid=<?=$sub; ?>&stdid=<?=$user_id; ?>&planid=<?=$plan_id; ?>">
	<?php }else{?>
		<a class="sc_title_linked" href="subject_price.php?id=<?=$fetch_002['subid']; ?>">
	<?php }

}else{?>
<a class="sc_title_linked" href="subject_price.php?id=<?=$fetch_002['subid']; ?>">
	



<?php }}?>
<div class="sc_title_icon sc_title_top sc_size_huge inherit">
<img src="admin/<?php echo  htmlspecialchars_decode($fetch_002['location'],ENT_QUOTES); ?>" alt="" height="165" width="165"/>
	</div>
<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small"><?=$fetch_002['subname']; ?></h3>
</a>
<span class="sc_highlight sc_highlight_style_3">
<?=$fetch_002['subdesc']; ?>
</span>
</div>
</div>
	<?php } ?>

</div>
<div class="row">
<div class="col-sm-12">
<div class="text-center animated">
<div class="sc_button margin_top_big sc_button_style_dark sc_button_size_banner squareButton dark banner">
<a href="free-mock.php" class="">Start my Free TEST</a>
</div>
</div>
</div>
</div>
</div>
</section>	
<section class="yellow_section">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-7">
<h2 class="sc_title sc_title_bold sc_title_regular">Try our services</h2>
<span class="sc_highlight sc_highlight_style_6">See how we optimize your performances and grow your Knowledge!</span>
</div>
<div class="col-md-4 col-sm-5">
<div class="text-center">
<div class="sc_button sc_button_style_dark sc_button_size_banner squareButton dark banner margin_top_small">
<a href="#" class="">Request Free EV</a>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
    <?php require('footer.php'); ?>
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
<script>
$.noConflict();
jQuery(document).ready(function(){
    jQuery("button").click(function(){
        jQuery("p").text("jQuery is still working!");
    });
});
</script>
	</body>
</html>

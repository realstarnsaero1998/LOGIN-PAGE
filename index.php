<?php
require("database.php");
session_start();
 require 'PHPMailer/PHPMailerAutoload.php';
if(!empty($_SESSION['stdid']))
{
 $user_id=$_SESSION['stdid'];
}
if(isset($_POST['submit']))
{
	
	$name=mysql_real_escape_string($_POST['name']); 
	$mail_id=mysql_real_escape_string($_POST['emailid']); 
    $password=mysql_real_escape_string($_POST['password']); 
    $rpass=mysql_real_escape_string($_POST['repass']); 
	
	//$image=mysql_real_escape_string($_POST['image']) 
	if($password==$rpass)
    {
	$search_duplicate_qry=mysql_query("SELECT * FROM `student` where stdname='$name' and stdpassword='$password' and emailid='$mail_id' and status='1'")or die(mysql_error()); 
    $count_row=mysql_num_rows($search_duplicate_qry);
	
    // $ref_count_qry=mysql_query("select * from tbl_users where id='$user_id'") 
      //                              $ref_count_qry_arr=mysql_fetch_array($ref_count_qry) 
    //$uploadedby=$ref_count_qry_arr['name'] 
	
    if($count_row<1)
    {
        $insert_qry=	mysql_query("INSERT INTO `student`(`stdname`, `stdpassword`,`emailid`,`status`) VALUES ($name,$password,$mail_id,1)")or die(mysql_error()); 
		  $reg_success=1; 
        
        echo "<script>alert('Registered Successfully')  </script>"; 
        header("location: index.php");
   
      
   
    
/*--------------mailer--------------------------
	
	$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'brothergarmentsvkl@gmail.com';                 // SMTP username
$mail->Password = 'kaashiv123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                  // TCP port to connect to
/*testing 

$mail->AddAttachment($location1);

$cus_mail_id=$mail_id;
$cus_name=$name;


/*-------------------------
$mail->From = 'sculpteclat.info@gmail.com';
$mail->FromName = 'Paramount Auto Bay Services';
$mail->addAddress($cus_mail_id,$cus_name);     // Add a recipient
//$mail->addAddress('brother@gmail.com');               // Name is optional
//$mail->addReplyTo('brother@gmail.com', 'Brother');
$mail->isHTML(true);
//$mail->isHTML(false);                                  // Set email format to HTML

$mail->Subject = 'Welcome To Paramount Auto Bay Services';
$mail->Body    = '';


if(!$mail->send()) 
	{
	echo "<script>alert ('Mail Not Sent')</script>";

												  }else{
													  echo "<script>alert ('Mail has been sent to vendor')</script>";
												  }
	
	
	/*----------------------------------------------*/
 }
    else
    {
        echo "<script>
alert('Contact Number or mailid is Already Register') </script>"; 
    }
} }  
    
 ?>



<!DOCTYPE html>
<html lang="en-US">


<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Nandha InfoTech | Home</title>
<link rel="icon" type="image/x-icon" href="images/icon/favicon.ico"/>
<!--[if lt IE 9]>
	<script src="js/vendor/html5.js" type="text/javascript">
	</script>
	<![endif]-->
<link rel='stylesheet' id='packed-css' href='css/_packed.css' type='text/css' media='all'/>
<link rel='stylesheet' id='rs-plugin-settings-css' href='js/vendor/revslider/css/settings.css' type='text/css' media='all'/>
<link rel='stylesheet' id='fontello-css' href='css/fontello.css' type='text/css' media='all'/>
<link rel='stylesheet' id='main-style-css' href='css/style.css' type='text/css' media='all'/>
<link rel='stylesheet' id='shortcodes-css' href='css/shortcodes.css' type='text/css' media='all'/>
<link rel='stylesheet' id='theme-skin-css' href='css/general.css' type='text/css' media='all'/>
<style id="theme-skin-inline-css" type="text/css"></style>
<link rel='stylesheet' id='responsive-css' href='css/responsive.css' type='text/css' media='all'/>
    <link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css'>
<!-- <link rel="stylesheet" type="text/css" href="css/default.css" />
--><link rel="stylesheet" type="text/css" href="css/component.css" />
	
	
<link rel='stylesheet' href='custom_tools/css/custom_tools.css' type='text/css' media='all'/>
	
<script src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
		});
	});
	</script>
	<script>
$.noConflict();
jQuery(document).ready(function(){
    jQuery("button").click(function(){
        jQuery("p").text("jQuery is still working!");
    });
});
</script>
</head>
<body class="home page wild top_panel_above top_panel_opacity_transparent theme_skin_general usermenu_show">
<!--[if lt IE 9]>
	<div class="sc_infobox sc_infobox_style_error">
	<div style="text-align:center ">It looks like you're using an old version of Internet Explorer. For the best WordPress experience, please <a href="http://microsoft.com" style="color:#191919">update your browser</a> or learn how to <a href="http://browsehappy.com" style="color:#222222">browse happy</a>!</div>
	</div>	<![endif]-->
<div class="main_content">
<div class="boxedWrap">
<?php include('header.php')  ?>  
	
<div id="mainslider_1" class="sliderHomeBullets staticSlider slider_engine_revo slider_alias_revo-seo1">
<div id="rev_slider_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
<div id="rev_slider" class="rev_slider fullwidthabanner">
<ul>
<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
<img src="images/slider/transparent.png" class="slider_2_bg" alt="babbysitter-slider-ground" data-bgposition="center bottom" data-bgfit="normal" data-bgrepeat="no-repeat">
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="-445" data-y="center" data-voffset="150" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_line_dot.png" alt="">
</div>
<div class="tp-caption tp-fade customout rs-parallaxlevel-0" data-x="center" data-hoffset="-445" data-y="center" data-voffset="150" data-customout="x:0 y:0 z:0 rotationX:0 rotationY:0 rotationZ:0 scaleX:1.8 scaleY:1.8 skewX:0 skewY:0 opacity:0 transformPerspective:600 transformOrigin:50% 50% " data-speed="300" data-start="600" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="900" data-endspeed="700">
<img src="images/slider/slide2_line_dot.png" alt="">
</div>
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="-445" data-y="center" data-voffset="100" data-speed="300" data-start="650" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_line_dash.png" alt="">
</div>
<div class="tp-caption lft rs-parallaxlevel-0" data-x="center" data-hoffset="-444" data-y="center" data-voffset="20" data-speed="300" data-start="700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_object_1.png" alt="">
</div>
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="262" data-y="center" data-voffset="145" data-speed="300" data-start="800" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_line_line.png" alt="">
</div>
<div class="tp-caption _seo_text sfb tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="-445" data-y="center" data-voffset="200" data-speed="300" data-start="800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
Ideas
</div>
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="-230" data-y="center" data-voffset="50" data-speed="300" data-start="1100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_object_2.png" alt="">
</div>
<div class="tp-caption customin rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="150" data-customin="x:0 y:0 z:0 rotationX:0 rotationY:0 rotationZ:0 scaleX:1.2 scaleY:1.2 skewX:0 skewY:0 opacity:0 transformPerspective:600 transformOrigin:50% 50% " data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_line_dot.png" alt="">
</div>
<div class="tp-caption tp-fade customout rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="150" data-customout="x:0 y:0 z:0 rotationX:0 rotationY:0 rotationZ:0 scaleX:1.8 scaleY:1.8 skewX:0 skewY:0 opacity:0 transformPerspective:600 transformOrigin:50% 50% " data-speed="300" data-start="1600" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="1900" data-endspeed="700">
<img src="images/slider/slide2_line_dot.png" alt="">
</div>
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="100" data-speed="300" data-start="1650" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_line_dash.png" alt="">
</div>
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="-10" data-speed="300" data-start="1700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_object_3.png" alt="">
</div>
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="51" data-y="center" data-voffset="-25" data-speed="300" data-start="2100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_arrow_shadow.png" alt="">
</div>
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="50" data-y="center" data-voffset="-30" data-speed="300" data-start="2000" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_arrow.png" alt="">
</div>
<div class="tp-caption _seo_text sfb tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="0" data-y="center" data-voffset="200" data-speed="300" data-start="1800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
Targeting
</div>
<div class="tp-caption customin rs-parallaxlevel-0" data-x="707" data-y="center" data-voffset="145" data-customin="x:0 y:0 z:0 rotationX:0 rotationY:0 rotationZ:0 scaleX:0 scaleY:1 skewX:0 skewY:0 opacity:0 transformPerspective:600 transformOrigin:0% 50% " data-speed="300" data-start="1800" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_line_line.png" alt="">
</div>
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="230" data-y="center" data-voffset="50" data-speed="300" data-start="2100" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_object_4.png" alt="">
</div>
<div class="tp-caption customin rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="151" data-customin="x:0 y:0 z:0 rotationX:0 rotationY:0 rotationZ:0 scaleX:1.2 scaleY:1.2 skewX:0 skewY:0 opacity:0 transformPerspective:600 transformOrigin:50% 50% " data-speed="300" data-start="2500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_line_dot.png" alt="">
</div>
<div class="tp-caption tp-fade customout rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="151" data-customout="x:0 y:0 z:0 rotationX:0 rotationY:0 rotationZ:0 scaleX:1.8 scaleY:1.8 skewX:0 skewY:0 opacity:0 transformPerspective:600 transformOrigin:50% 50% " data-speed="300" data-start="2600" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="2900" data-endspeed="700">
<img src="images/slider/slide2_line_dot.png" alt="">
</div>
<div class="tp-caption tp-fade rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="100" data-speed="300" data-start="2650" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_line_dash.png" alt="">
</div>
<div class="tp-caption sft rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="20" data-speed="300" data-start="2700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide2_object_5.png" alt="">
</div>
<div class="tp-caption _seo_text sfb tp-resizeme rs-parallaxlevel-0" data-x="center" data-hoffset="445" data-y="center" data-voffset="200" data-speed="300" data-start="2800" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
Mission
</div>
</li>
<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
<img src="images/slider/transparent.png" class="slider_3_bg" alt="babbysitter-slider-ground" data-bgposition="center bottom" data-bgfit="normal" data-bgrepeat="no-repeat">
<div class="tp-caption lfr rs-parallaxlevel-0" data-x="866" data-y="181" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide3_object_1.png" alt="">
</div>
<div class="tp-caption customin rs-parallaxlevel-0" data-x="center" data-hoffset="370" data-y="center" data-voffset="51" data-customin="x:0 y:60 z:0 rotationX:0 rotationY:0 rotationZ:0 scaleX:1 scaleY:0 skewX:0 skewY:0 opacity:0 transformPerspective:600 transformOrigin:50% 50% " data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<div class="tp-layer-inner-rotation rs-pulse" data-easing="Power3.easeInOut" data-speed="2" data-zoomstart="1" data-zoomend="1.08">
<img src="images/slider/slide3_object_2.png" alt="">
</div>
</div>
<div class="tp-caption tp-fade fadeout rs-parallaxlevel-0" data-x="866" data-y="181" data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="1">
<img src="images/slider/slide3_object_3.png" alt="">
</div>
<div class="tp-caption _seo_title_small lfl tp-resizeme rs-parallaxlevel-0" data-x="116" data-y="201" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
Online Exams
</div>
<div class="tp-caption _seo_title_small lfl tp-resizeme rs-parallaxlevel-0" data-x="116" data-y="261" data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">

</div>
<div class="tp-caption _text lfl tp-resizeme rs-parallaxlevel-0" data-x="116" data-y="371" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<a href='#' class='button-action darkgrey big' data-text='Free EV Review'>
<span>GET IT NOW!</span>
</a>
</div>
</li>
	
<li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
<img src="images/slider/transparent.png" class="slider_1_bg" alt="babbysitter-slider-ground" data-bgposition="center bottom" data-bgfit="normal" data-bgrepeat="no-repeat">
<div class="tp-caption lfl rs-parallaxlevel-0" data-x="center" data-hoffset="-305" data-y="bottom" data-voffset="-111" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<div class="tp-layer-inner-rotation rs-slideloop" data-easing="Power3.easeInOut" data-speed="2" data-xs="0" data-xe="0" data-ys="0" data-ye="0">
<img src="images/slider/slide1_object_1.png" alt="">
</div>
</div>
<div class="tp-caption customin rs-parallaxlevel-0" data-x="center" data-hoffset="-301" data-y="center" data-voffset="69" data-customin="x:0 y:60 z:0 rotationX:0 rotationY:0 rotationZ:0 scaleX:1 scaleY:0 skewX:0 skewY:0 opacity:0 transformPerspective:600 transformOrigin:50% 50% " data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide1_object_3.png" alt="">
</div>
<div class="tp-caption sfb rs-parallaxlevel-1" data-x="center" data-hoffset="-201" data-y="center" data-voffset="24" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<img src="images/slider/slide1_object_2.png" alt="">
</div>   
 <div class="tp-caption _seo_title lfr tp-resizeme rs-parallaxlevel-0" data-x="681" data-y="221" data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<div class="tp-layer-inner-rotation _seo_title  rs-slideloop" data-easing="Power3.easeInOut" data-speed="2" data-xs="0" data-xe="0" data-ys="0" data-ye="0">
Let us make
</div>
</div>

	<div class="tp-caption _seo_title sfr tp-resizeme rs-parallaxlevel-0" data-x="681" data-y="291" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<div class="tp-layer-inner-rotation _seo_title  rs-slideloop" data-easing="Power3.easeInOut" data-speed="2" data-xs="0" data-xe="0" data-ys="0" data-ye="0">
your Exams Practice Easy
</div>
</div>
<div class="tp-caption _text lfr tp-resizeme rs-parallaxlevel-0" data-x="681" data-y="391" data-speed="300" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
<div class="tp-layer-inner-rotation _text  rs-slideloop" data-easing="Power3.easeInOut" data-speed="2" data-xs="0" data-xe="0" data-ys="0" data-ye="0">
<a href='#' class='button-action red' data-text='FREE EV REVIEW'>
<span>ExamsVenue Analysis</span>
</a>
</div>
</div>
</li>  
</ul>
</div>
</div>
</div>
<div class="mainWrap without_sidebar">
<div class="content">
<section class="light_section">

</section>
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
<div class="row">
<div class="col-sm-12">
<div class="text-center animated">
<h1 class="sc_title sc_title_regular margin_top_middle sc_title_big">What is EV?</h1>
<h3 class="sc_title sc_title_regular">Exam Venue (EV)</h3>
<div class="sc_section bg_tint_none text-center">
<span class="sc_highlight">
Exam venue is one stop solutions for your exam preparation
</span>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="dark_section">
<div class="container">
<div class="">
<div class="">
<div class="row">
<div class="text-center animated">
<div class="col-sm-12">
<h1 class="sc_title sc_title_big sc_title_regular">Our Exams</h1>
<h3 class="sc_title sc_title_regular margin_bottom_small">What You Get Using Our Nandha InfoTech</h3>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="animated">
<div class="text-right margin_bottom_big">
<div class="sc_title_icon sc_title_right sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#">TNPC Exams</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<!--Get insights about your internal link texts and page authority metrics for up to 1000 pages.-->
</span>
</div>
</div>
<div class="text-right margin_bottom_big">
<div class="sc_title_icon sc_title_right sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#">Banking Exams</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<!--Get insights about your internal link texts and page authority metrics for up to 1000 pages.-->
</span>
</div>
</div>
<div class="text-right margin_bottom_big">
<div class="sc_title_icon sc_title_right sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#">RRB Exams</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<!--Get insights about your internal link texts and page authority metrics for up to 1000 pages.-->
</span>
</div>
</div>
</div>
</div>
<div class="col-sm-4">
<div class="text-center animated">
<figure class="sc_image  sc_image_shape_square">
<img src="images/iphone_toolbox.png" alt=""/>
</figure>
</div>
</div>
<div class="col-sm-4">
<div class="animated">
<div class="text-left margin_bottom_big">
<div class="sc_title_icon sc_title_left sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#"> RRB Plan199</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<!--Get insights about your internal link texts and page authority metrics for up to 1000 pages.-->
</span>
</div>
</div>
<div class="text-left margin_bottom_big">
<div class="sc_title_icon sc_title_left sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#"> RRB Plan 349 </a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<!--Get insights about your internal link texts and page authority metrics for up to 1000 pages.-->
</span>
</div>
</div>
<div class="text-left margin_bottom_big">
<div class="sc_title_icon sc_title_left sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#"> RRB Plan 499</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<!--Get insights about your internal link texts and page authority metrics for up to 1000 pages.-->
</span>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="animated text-center margin_top_small">
<div class="sc_button sc_button_style_global sc_button_size_big squareButton global big  ico">
<a href="#" class="inherit">Get a quote</a>
</div>
<div class="sc_button sc_button_style_global sc_button_size_big squareButton global big  ico">
<a href="#" class="inherit">Learn More</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
	
	<section class="light_section">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-12">
<div class="sc_skills sc_skills_arc" data-type="arc" data-subtitle="Skills">
<h2>Exams</h2>
<div class="sc_skills_legend">
<ul>
<li style="background-color:rgba(255,183,47,1)">RRB</li>
<li style="background-color:rgba(255,183,47,0.9)">TNPC</li>
<li style="background-color:rgba(255,183,47,0.8)">Banking</li>

</ul>
</div>
<div id="sc_skills_diagram_438952584_diagram" class="sc_skills_arc_canvas">
</div>
<div class="sc_skills_data" style="display:none;">
<div class="arc">
<input type="hidden" class="text" value="RRB"/>
<input type="hidden" class="percent" value="95"/>
<input type="hidden" class="color" value="rgba(255,183,47,1)"/>
</div>
<div class="arc">
<input type="hidden" class="text" value="TNPC"/>
<input type="hidden" class="percent" value="90"/>
<input type="hidden" class="color" value="rgba(255,183,47,0.9)"/>
</div>
<div class="arc">
<input type="hidden" class="text" value="Banking"/>
<input type="hidden" class="percent" value="80"/>
<input type="hidden" class="color" value="rgba(255,183,47,0.8)"/>
</div>

</div>
</div>
</div>
<div class="col-md-4 col-sm-12">
<h2 class="sc_title sc_title_regular">Our Exams</h2>
<div class="sc_skills sc_skills_bar sc_skills_horizontal no_padding" data-type="bar" data-subtitle="Skills" data-dir="horizontal">
<div class="sc_skills_info">General Knowledge Mock</div>
<div class="sc_skills_item sc_skills_style_1 first">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="98" data-step="1" data-max="100" data-speed="25" data-duration="2450" data-ed="%">0%</div>
</div>
</div>
<div class="sc_skills_info">Arithmetic Ability Mock</div>
<div class="sc_skills_item sc_skills_style_1">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="66" data-step="1" data-max="100" data-speed="35" data-duration="2310" data-ed="%">0%</div>
</div>
</div>
<div class="sc_skills_info">General Intelligence Mock </div>
<div class="sc_skills_item sc_skills_style_1">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="87" data-step="1" data-max="100" data-speed="21" data-duration="1827" data-ed="%">0%</div>
</div>
</div>
<div class="sc_skills_info"> General Science Mock </div>
<div class="sc_skills_item sc_skills_style_1">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="82" data-step="1" data-max="100" data-speed="14" data-duration="1148" data-ed="%">0%</div>
</div>
</div>
<div class="sc_skills_info">Real Mock Exams  </div>
<div class="sc_skills_item sc_skills_style_1">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="76" data-step="1" data-max="100" data-speed="27" data-duration="2052" data-ed="%">0%</div>
</div>
</div>
</div>
</div>
<div class="sc_line sc_line_style_solid sc_line_style_1"></div>
</div>
</div>
</section>
	
	<section class="light_section">
<div class="container">
<div class="row">
	
<div class="col-sm-12">
<div class="text-center">
<h2 class="sc_title sc_title_regular">Highlights</h2>
</div>
</div>
</div>
<div class="row">
<div class="sc_skills sc_skills_counter" data-type="counter" data-subtitle="Skills">
<div class="sc_skills_columns_5">
<div class="sc_skills_column col-md-2 col-sm-4">
<div class="sc_skills_item no_margin sc_skills_style_2">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="98" data-step="1" data-max="100" data-speed="30" data-duration="2040" data-ed="%">0%</div>
</div>
<div class="sc_skills_info">Quality Content</div>
</div>
</div>
<div class="sc_skills_column col-md-2 col-sm-4">
<div class="sc_skills_item no_margin sc_skills_style_2">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="89" data-step="1" data-max="100" data-speed="15" data-duration="1080" data-ed="%">0%</div>
</div>
<div class="sc_skills_info">Detailed Analysis</div>
</div>
</div>
<div class="sc_skills_column col-md-2 col-sm-4">
<div class="sc_skills_item no_margin sc_skills_style_2">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="98" data-step="1" data-max="100" data-speed="10" data-duration="980" data-ed="%">0%</div>
</div>
<div class="sc_skills_info">Responsive</div>
</div>
</div>
<div class="sc_skills_column col-md-2 col-sm-4">
<div class="sc_skills_item no_margin sc_skills_style_2">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="85" data-step="1" data-max="100" data-speed="32" data-duration="1440" data-ed="%">0%</div>
</div>
<div class="sc_skills_info">EV Ready</div>
</div>
</div>
<div class="sc_skills_column col-md-2 col-sm-4">
<div class="sc_skills_item no_margin sc_skills_style_2">
<div class="sc_skills_count">
<div class="sc_skills_total" data-start="0" data-stop="99" data-step="1" data-max="100" data-speed="18" data-duration="1404" data-ed="%">0%</div>
</div>
<div class="sc_skills_info">Free support</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
	
<section class="darkgrey_section">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-7">
<div class="animated">
<span class="sc_highlight sc_highlight_style_4">Not enough for your EV needs?</span>
<span class="sc_highlight sc_highlight_style_5">Want to add more exams/ tests/ pages to analyze?</span>
</div>
</div>
<div class="col-md-4 col-sm-5">
<div class="text-center">
<div class="sc_button sc_button_style_dark sc_button_size_banner squareButton dark banner animated">
<a href="#" class="">Go to Premium Features</a>
</div>
</div>
</div>
</div>
</div>
</section>
	
	
	
	
	
<section class="light_section">
<div class="container">
<div class="row">
<div class="col-sm-5">
<div class="text-center animated">
<figure class="sc_image  sc_image_shape_square">
<img src="images/seo-parallax-2.jpg" alt=""/>
</figure>
</div>
</div>
<div class="col-sm-7 no_margin">
<div class="animated">
<h2 class="sc_title sc_title_regular sc_title_big">STAY UPDATED WITH EXAMS VENUE NEW CURRENT AFFAIRS </h2>
<div class="margin_top_small margin_bottom_middle">
</div>
<ul class="sc_list sc_list_style_disk_style2">
<li class="sc_list_item inherit">
 Seamless Reading Experience
</li>
<li class="sc_list_item inherit">
Smart Quiz for Easy Recall
</li>
<li class="sc_list_item inherit">
Carry your News Anywhere, Everywhere
</li>
<li class="sc_list_item inherit">
Sample Test also available
</li>

</ul>
<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge margin_top_small">
<a href="#" class="">Sign Up Free!</a>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="red_section" id="topper">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="animated text-center">
<h1 class="sc_title sc_title_bold sc_title_regular">Nandha InfoTech Toppers!</h1>
<div class="sc_testimonials sc_testimonials_style_4">
<div class="sc_slider sc_slider_swiper sc_slider_nopagination sc_slider_autoheight swiper-slider-container" data-interval="7000">
<ul class="sc_testimonials_items slides swiper-wrapper">
<li class="sc_testimonials_item swiper-slide">
<div class="sc_testimonials_item_content">
<div class="sc_testimonials_item_quote">
<div class="sc_testimonials_item_text">
"The analysis provided made me evaluate myself better. It gave me a fair idea of where I need to focus more and where I need to improve. As the questions are created by IITians, the level of the questions matches up to the original exam. All GATE aspirants must definitely utilise this platform to better their performance."
</div>
</div>
<div class="sc_testimonials_item_author">
<div class="sc_testimonials_item_avatar">
<img alt="" src="photos/indian-students.jpg">
</div>
<div class="sc_testimonials_item_name">
ASTHA JADA,,
</div>
<div class="sc_testimonials_item_position">
GATE CS - AIR 51
</div>
</div>
<div class="sc_testimonials_item_object">
<div class="object"></div>
</div>
</div>
</li>
<li class="sc_testimonials_item swiper-slide">
<div class="sc_testimonials_item_content">
<div class="sc_testimonials_item_quote">
<div class="sc_testimonials_item_text">
"After studying on my own, I took the part and chapter tests. The overall analysis provided was excellent. It showed a comparison between my performance and other students. Also, I learnt from the analysis how to manage time. I also took the 5 test series which I believed help me improve my rank."
</div>
</div>
<div class="sc_testimonials_item_author">
<div class="sc_testimonials_item_avatar">
<img alt="" src="photos/1407784184287.jpg">
</div>
<div class="sc_testimonials_item_name">
VAMSI DEEP,
</div>
<div class="sc_testimonials_item_position">
GATE EE - AIR 81
</div>
</div>
<div class="sc_testimonials_item_object">
<div class="object"></div>
</div>
</div>
</li>
<li class="sc_testimonials_item swiper-slide">
<div class="sc_testimonials_item_content">
<div class="sc_testimonials_item_quote">
<div class="sc_testimonials_item_text">
"Excellent ! One of the best site for students aspiring for competitive examinations. Points and coins act as incentives to move forward. Absolutely a student friendly site."
</div>
</div>
<div class="sc_testimonials_item_author">
<div class="sc_testimonials_item_avatar">
<img src="photos/istock_000003780254xsmall.jpg" alt="">
</div>
<div class="sc_testimonials_item_name">
Adithya SV
</div>
<div class="sc_testimonials_item_position">

</div>
</div>
<div class="sc_testimonials_item_object">
<div class="object"></div>
</div>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
		
<!--section class="light_section">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="text-center animated">
<h1 class="sc_title sc_title_bold sc_title_regular">Recent Exams</h1>
</div>
</div>
	<?php 
	$query_001 = mysql_query("SELECT * FROM `mian_sub`");
	while($fetch_001 = mysql_fetch_array($query_001)){
		
	?>
<div class="col-sm-3">
<div class="sc_blogger style_image style_image_large animated">
<article class="sc_blogger_item">
<div class="thumb">
<a href="pricing.php">
<img alt="" src="<?=$fetch_001['img_loc']; ?>" height="50%" width="60%">
</a>
</div>
<h4 class="sc_blogger_title sc_title">
<a href="pricing.php"><?=$fetch_001['sub_name']; ?></a>
</h4>
<div class="sc_blogger_content"></div>
<div class="sc_blogger_info">
<div class="squareButton light ico sc_blogger_more">
<a class="icon-link" title="" href="#">Description</a>
</div>
<div class="sc_blogger_author">

<a href="pricing.php" class="post_author"><?=$fetch_001['desc']; ?></a>

</div>
</div>
</article>
</div>
</div>
	<?php } ?>

</div>
</div>
</section-->
</div>
</div>
<div class="footerContentWrap">
<?php require("footer.php")  ?>
</div>
</div>
</div>
<div id="preloader" class="preloader">
<div class="preloader_image"></div>
</div>
<script type='text/javascript' src='js/vendor/jquery.js'></script>
<script type='text/javascript' src='js/vendor/jquery-migrate.min.js'></script>
<script type='text/javascript' src='js/vendor/bootstrap.min.js'></script>
<script type='text/javascript' src='js/vendor/revslider/js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='js/vendor/revslider/js/jquery.themepunch.revolution.min.js'></script>
<script type='text/javascript' src='js/custom/_main.js'></script>
<script type='text/javascript' src='js/vendor/_packed.js'></script>
<script type='text/javascript' src='js/custom/shortcodes_init.js'></script>
<script type='text/javascript' src='js/custom/_front.js'></script>
	
	
<script type='text/javascript' src='js/vendor/chart.min.js'></script>
<script type='text/javascript' src='js/vendor/diagram.raphael.min.js'></script>
 
</body>
</html>

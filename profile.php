<?php

include('header.php');


include('oesdb.php');
/************************** Step 1 *************************/
if(!isset($_SESSION['stdname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}
else if(isset($_REQUEST['logout']))
{
    /************************** Step 2 - Case 1 *************************/
    //Log out and redirect login page
    unset($_SESSION['stdname']);
    header('Location: index.php');

}
else if(isset($_REQUEST['dashboard'])){
     /************************** Step 2 - Case 2 *************************/
        //redirect to dashboard
     header('Location: stdwelcome.php');

    }else if(isset($_REQUEST['savem']))
{
      /************************** Step 2 - Case 3 *************************/
                //updating the modified values
    if(empty($_REQUEST['cname'])||empty ($_REQUEST['password'])||empty ($_REQUEST['email']))
    {
         $_GLOBALS['message']="Some of the required Fields are Empty.Therefore Nothing is Updated";
    }
    else
    {
     $query="update student set stdname='".htmlspecialchars($_REQUEST['cname'],ENT_QUOTES)."', stdpassword=ENCODE('".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."','oespass'),emailid='".htmlspecialchars($_REQUEST['email'],ENT_QUOTES)."',contactno='".htmlspecialchars($_REQUEST['contactno'],ENT_QUOTES)."',address='".htmlspecialchars($_REQUEST['address'],ENT_QUOTES)."',city='".htmlspecialchars($_REQUEST['city'],ENT_QUOTES)."',pincode='".htmlspecialchars($_REQUEST['pin'],ENT_QUOTES)."' where stdid='".$_REQUEST['student']."';";
     if(!@executeQuery($query))
        $_GLOBALS['message']=mysql_error();
     else
        $_GLOBALS['message']="Your Profile is Successfully Updated.";
    }
    closedb();

}


?>
<!DOCTYPE html>
<html lang="en-US">


<head>
<meta charset="UTF-8"/>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Nandha InfoTech | User Profile</title>
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
 
    
          <style>
body  {
    background-image: url("image/001+background+pattern+designs.jpg");
    background-color: #cccccc;
}
</style>

</head>
<body class="home page wild top_panel_above top_panel_opacity_transparent theme_skin_general usermenu_show">
<!--[if lt IE 9]>
	<div class="sc_infobox sc_infobox_style_error">
	<div style="text-align:center;">It looks like you're using an old version of Internet Explorer. For the best WordPress experience, please <a href="http://microsoft.com" style="color:#191919">update your browser</a> or learn how to <a href="http://browsehappy.com" style="color:#222222">browse happy</a>!</div>
	</div>	<![endif]-->
	
	<?php

        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
<div class="main_content">
<div class="boxedWrap">


<div class="mainWrap without_sidebar">
<div class="content">

    
    <section class="yellow_section">
<div class="container">
<div class="text-center animated">
    <br/>
    <br/>
    <br/>
    
    <h1 class="sc_title sc_title_big sc_title_regular">Update Your Profile</h1>
    </div>
    </div>


</section>
<!--    Profile   -->
            <section class="grey_section">
                
                <form id="editprofile" action="edit_profile.php" method="post">
				<?php if(isset($_SESSION['stdname'])) {
                         // Navigations
                         ?>
						 <?php
                       
 /************************** Step 3 - Case 1 *************************/
        // Default Mode - Displays the saved information.
                        $result=executeQuery("select * from student where stdname='".$_SESSION['stdname']."';");
                        if(mysql_num_rows($result)==0) {
                           header('Location: stdwelcome.php');
                        }
                        else if($r=mysql_fetch_array($result))
                        {
                           //editing components
                 ?>
<div class="container">
<div class="">
<div class="">
<div class="row">
<div class="text-center animated">
<div class="col-sm-12">
<h1 class="sc_title sc_title_big sc_title_regular"><?php echo htmlspecialchars_decode($r['stdname'],ENT_QUOTES); ?></h1>
<h3 class="sc_title sc_title_regular margin_bottom_small">memoir</h3>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<div class="animated">
<div class="text-right margin_bottom_big">
<div class="sc_title_icon sc_title_right sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#">Name</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
 <?php echo htmlspecialchars_decode($r['stdname'],ENT_QUOTES); ?> 
</span>
</div>
</div>
<div class="text-right margin_bottom_big">
<div class="sc_title_icon sc_title_right sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#">Email</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<?php echo htmlspecialchars_decode($r['emailid'],ENT_QUOTES); ?>
</span>
</div>
</div>
    
    <div class="text-right margin_bottom_big">
<div class="sc_title_icon sc_title_right sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#">Phone</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
 <?php echo htmlspecialchars_decode($r['contactno'],ENT_QUOTES); ?> 
</span>
</div>
</div>
  
    
  
</div>
</div>
<div class="col-sm-4">
<div class="text-center animated">
<figure class="sc_image  sc_image_shape_square">
<img src="<?=$sql_qry_arr['image']?>" alt="" height="220" width="220"/>
</figure>
</div>
</div>   
<div class="col-sm-4">
<div class="animated">
<div class="text-left margin_bottom_big">
<div class="sc_title_icon sc_title_left sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#">Address</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<?php echo htmlspecialchars_decode($r['address'],ENT_QUOTES); ?>
</span>
</div>
</div>
<div class="text-left margin_bottom_big">
<div class="sc_title_icon sc_title_left sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#">City </a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<?php echo htmlspecialchars_decode($r['city'],ENT_QUOTES); ?>
</span>
</div>
</div>
    
<div class="text-left margin_bottom_big">
<div class="sc_title_icon sc_title_left sc_size_mini icon-record"></div>
<h4 class="sc_title sc_title_iconed">
<a href="#">PIN Code</a>
</h4>
<div class="sc_section bg_tint_none">
<span class="sc_highlight sc_highlight_style_3">
<?php echo htmlspecialchars_decode($r['pincode'],ENT_QUOTES); ?>
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
<a href="edit_profile.php" class="inherit">Edit Profile</a>
</div>
<div class="sc_button sc_button_style_global sc_button_size_big squareButton global big  ico">
<a href="viewresult.php" class="inherit">Exams Taken</a>
</div>
</div>
</div>
</div>
</div>
</div>
                    </div>
<?php
                        closedb();
                        }
                        
                        }
  ?>
                     </form>
</section>
<!--     /profile -->


</div>
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
<script type='text/javascript' src='js/vendor/revslider/js/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='js/vendor/revslider/js/jquery.themepunch.revolution.min.js'></script>
<script type='text/javascript' src='js/custom/_main.js'></script>
<script type='text/javascript' src='js/vendor/_packed.js'></script>
<script type='text/javascript' src='js/custom/shortcodes_init.js'></script>
<script type='text/javascript' src='js/custom/_front.js'></script>
 
</body>
</html>

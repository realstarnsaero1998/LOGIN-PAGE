<?php
session_start();
  $result = mysql_query("SELECT * FROM `subject`");
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Nandha InfoTech | Subjests</title>
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
<section class="light_section">
<div class="container">
<div class="row animated">
<div class="col-sm-12">
<div class="text-center">
<h1 class="sc_title sc_title_regular sc_title_bold">EXAM PREPARATION SIMPLIFIED!</h1>
<h3 class="sc_title sc_title_regular"> Tests Offered</h3>
</div>
</div>
</div>
<!-----------------------------------------------Testname----------------------------------------------------->
  <?php  
   
                                if (mysql_num_rows($result) == 0) {
                                    echo "<br/>";
                                    echo"<h3 style=\"color:#0000cc;text-align:center;\">Sorry...! For this moment, You have not Offered to take any tests.</h3>";
                                } else {
                                    //editing components
                    ?>
       
<div class="row animated">
   <?php
                                    while ($r = mysql_fetch_array($result)) {
                                        $i = $i + 1;
                                        if ($i % 2 == 0) {
                                            echo "";
                                        } else {
                                            echo "";
                                        }
                                        ?>
<div class="col-sm-3">
       
<div class="text-center">
<a class="sc_title_linked" href="#">
<div class="sc_title_icon sc_title_top sc_size_huge inherit">
<img src="images/icon/featured_icon_x1.png" alt=""/>
</div>
<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small"><?php  echo htmlspecialchars_decode($r['subname'], ENT_QUOTES); ?></h3>
</a>
<div class="sc_section bg_tint_none sc_aligncenter">
<span class="sc_highlight sc_highlight_style_3"><?php echo htmlspecialchars_decode($r['subdesc'], ENT_QUOTES); ?></span>
</div>
<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small margin_bottom_middle ico">
<a title="Take Test" href="stdtest.php?subid=<?=$row[0]; ?>">Take Test</a>
</div>
</div>
   
</div>
 <?php } ?>
</div>
        
     

<?php      
                               
                            }
    
    ?>
<!-----------------------------------------------/Testname---------------------------------------------------->
</div>
    
</section>
    </div>
<section class="yellow_section">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-7">
<h2 class="sc_title sc_title_bold sc_title_regular">Try our 30 days free services</h2>
<span class="sc_highlight sc_highlight_style_6">See how we optimize your site’s performances and grow your business!</span>
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
</body>
</html>

<?php
if(isset($_POST['submit1'])){
	$plan=mysql_real_escape_string($_POST['plan1']);
	$_SESSION['plan']=$plan;
	header('location: https://www.payumoney.com/paybypayumoney/#/2DB94C2D8BD97E2CF3C01DB0C0EC4745');
}
if(isset($_POST['submit2'])){
	$plan=mysql_real_escape_string($_POST['plan2']);
	$_SESSION['plan']=$plan;
	header('location: https://www.payumoney.com/paybypayumoney/#/FBC0760F16CB67F6818BEB90FEE94F26');
}
if(isset($_POST['submit3'])){
	$plan=mysql_real_escape_string($_POST['plan3']);
	$_SESSION['plan']=$plan;
	header('location: https://www.payumoney.com/paybypayumoney/#/87800FCEF4C105B44A26ED2712EA1053');
}

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>ExamsVenue | Pricing</title>
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
</head>
<body class="page fullscreen top_panel_above top_panel_opacity_transparent theme_skin_general usermenu_show">

<div class="main_content">
<div class="boxedWrap">
<?php include('header.php'); 
	$user_id=$_SESSION['stdid'];
	
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
<h1 class="sc_title sc_title_bold sc_title_regular">Our Exams Price Plans</h1>
<h3 class="sc_title sc_title_regular margin_bottom_small"></h3>
</div>
</div>
</div>
<div class="row animated">
<div class="col-sm-12">
<div class="sc_pricing_table columns_3 alignCenter sc_table_style_custom1">
<div class="sc_pricing_columns sc_pricing_column_1">
<ul class="columnsAnimate">
<li class="sc_pricing_data sc_pricing_title"> PLAN-1</li>
<li class="sc_pricing_data sc_pricing_price">
<div class="sc_price_item">
<span class="sc_price_currency">&#8377</span>
<div class="sc_price_money">49</div>
<div class="sc_price_info">
<div class="sc_price_penny"></div>
<div class="sc_price_period">MONTHLY</div>
</div>
</div>
</li>
<li class="sc_pricing_data">
<strong>50</strong> -1 General Knowledge Mock</li>
<li class="sc_pricing_data">
<strong>50</strong> -1 Arithmetic Ability Mock </li>
<li class="sc_pricing_data">
<strong>50</strong> -1 General Intelligence Mock</li>
<li class="sc_pricing_data">
<strong>50</strong> -1 General Science Mock </li>
<li class="sc_pricing_data">
<strong>300</strong> -3 Real Mock Exams   </li>
<li class="sc_pricing_data sc_pricing_footer">
<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge margin_bottom_small ico">
<a href="#modal-overlay-signup" data-toggle="modal" class="inherit" data-z="1" data-hover-z="2" data-animated>Submit!</a>
</div>
</li>
</ul>
</div>
<div class="sc_pricing_columns sc_pricing_column_2 highlight">
<ul class="columnsAnimate">
<li class="sc_pricing_data sc_pricing_title">PLAN-2</li>
<li class="sc_pricing_data sc_pricing_price">
<div class="sc_price_item">
<span class="sc_price_currency">&#8377</span>
<div class="sc_price_money">99</div>
<div class="sc_price_info">
<div class="sc_price_penny"></div>
<div class="sc_price_period">monthly</div>
</div>
</div>
</li>
<li class="sc_pricing_data">
<strong>100</strong> -1 General Knowledge Mock</li>
<li class="sc_pricing_data">
<strong>100</strong> -1 Arithmetic Ability Mock </li>
<li class="sc_pricing_data">
<strong>100</strong> -1 General Intelligence Mock</li>
<li class="sc_pricing_data">
<strong>100</strong>  -1 General Science Mock  </li>
<li class="sc_pricing_data">
<strong>600</strong> -6 Real Mock Exams   </li>
<li class="sc_pricing_data sc_pricing_footer">
<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge margin_bottom_small ico">
<a href="#modal-overlay-signup2" data-toggle="modal" class="inherit" data-z="1" data-hover-z="2" data-animated>Submit!</a>
</div>
</li>
</ul>
</div>
<div class="sc_pricing_columns sc_pricing_column_3">
<ul class="columnsAnimate">
<li class="sc_pricing_data sc_pricing_title">PLAN-3 </li>
<li class="sc_pricing_data sc_pricing_price">
<div class="sc_price_item">
<span class="sc_price_currency">&#8377</span>
<div class="sc_price_money">149</div>
<div class="sc_price_info">
<div class="sc_price_penny"></div>
<div class="sc_price_period">monthly</div>
</div>
</div>
</li>
<li class="sc_pricing_data">
<strong>200</strong> -1 General Knowledge Mock</li>
<li class="sc_pricing_data">
<strong>20</strong>  -1 Arithmetic Ability Mock</li>
<li class="sc_pricing_data">
<strong>200</strong> -1 General Intelligence Mock</li>
<li class="sc_pricing_data">
<strong>200</strong> -1 General Science Mock</li>
<li class="sc_pricing_data">
<strong>1000</strong>  -10 Real Mock Exams </li>
<li class="sc_pricing_data sc_pricing_footer">
<div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge margin_bottom_small ico">
  <a href="#modal-overlay-signup3" data-toggle="modal" class="inherit" data-z="1" data-hover-z="2" data-animated>Submit!</a>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
<div class="modal grow modal-overlay modal-backdrop-body fade" id="modal-overlay-signup">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <div class="modal-dialog">
        <div class="v-cell">
          <div class="modal-content">
            <div class="modal-body">

              <div class="wizard-container wizard-1" id="wizard-demo-1">
             
                <form action="#" method="post" data-toggle="wizard" class="max-width-400 h-center">
                  <fieldset class="step relative paper-shadow" data-z="2">
                    <div class="page-section-heading">
                      <h2 class="text-h3 margin-v-0" align="center">Payment Details</h2>
                      <h3 class="text-h4 margin-v-10 text-grey-400" align="center">You may pay using PayUMoney</h3>
					  </div>
                    
                    <div class="form-group form-control-material">
                      <input class="form-control" type="text" id="wiz-phone" placeholder="Name" required="" />
                      <label for="wiz-phone">Name:</label>
                    </div>
                 <div class="form-group form-control-material">
                      <input class="form-control" type="text" id="wiz-phone" placeholder="Email" required="" />
                      <label for="wiz-phone">Email:</label>
                    </div>
                 <div class="form-group form-control-material">
                      <input class="form-control" type="text" id="wiz-phone" placeholder="Mobile Number" required="" />
                      <label for="wiz-phone">Mobile No.:</label>
					  </div>
					  <div class="form-group form-control-material">
                      <input class="form-control" type="hidden" name="success_url" id="wiz-phone" value="" />
                      <input class="form-control" type="hidden" name="failure_url" id="wiz-phone" value="" />
                      
                    </div>
					   <div class="row">
                      <div class="col-xs-6">
                      
                      </div>
					 <div class="col-xs-6 text-right">
                        <button type="submit" class="wiz-step btn btn-primary" name="submit1" data-target="0"><img src="https://www.payumoney.com//media/images/payby_payumoney/buttons/111.png" /></button>
                      </div>
                     
                    </div>
                
                  </fieldset>

                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
<div class="modal grow modal-overlay modal-backdrop-body fade" id="modal-overlay-signup2">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <div class="modal-dialog">
        <div class="v-cell">
          <div class="modal-content">
            <div class="modal-body">

              <div class="wizard-container wizard-1" id="wizard-demo-1">
             
                <form action="#" method="post" data-toggle="wizard" class="max-width-400 h-center">
                  <fieldset class="step relative paper-shadow" data-z="2">
                    <div class="page-section-heading">
                      <h2 class="text-h3 margin-v-0" align="center">Payment Details</h2>
                      <h3 class="text-h4 margin-v-10 text-grey-400" align="center">You may pay using PayUMoney</h3>
					  </div>
                  
                    <div class="form-group form-control-material">
                      <input class="form-control" type="text" id="wiz-phone" placeholder="Name" required="" />
                      <label for="wiz-phone">Name:</label>
                    </div>
                 <div class="form-group form-control-material">
                      <input class="form-control" type="text" id="wiz-phone" placeholder="Email" required="" />
                      <label for="wiz-phone">Email:</label>
                    </div>
                 <div class="form-group form-control-material">
                      <input class="form-control" type="text" id="wiz-phone" placeholder="Mobile Number" required="" />
                      <label for="wiz-phone">Mobile No.:</label>
					  </div>
					  <div class="form-group form-control-material">
                      <input class="form-control" type="hidden" name="success_url" id="wiz-phone" value="" />
                      <input class="form-control" type="hidden" name="failure_url" id="wiz-phone" value="" />
                      
                    </div>
					    <div class="row">
                      <div class="col-xs-6">
                      
                      </div>
					 <div class="col-xs-6 text-right">
                        <button type="submit" class="wiz-step btn btn-primary" name="submit2" data-target="0"><img src="https://www.payumoney.com//media/images/payby_payumoney/buttons/111.png" /></button>
                      </div>
                     
                    </div>
                
                  </fieldset>

                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
	<div class="modal grow modal-overlay modal-backdrop-body fade" id="modal-overlay-signup3">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <div class="modal-dialog">
        <div class="v-cell">
          <div class="modal-content">
            <div class="modal-body">

              <div class="wizard-container wizard-1" id="wizard-demo-1">
             
                <form action="pricing.php" method="post" data-toggle="wizard" class="max-width-400 h-center">
                  <fieldset class="step relative paper-shadow" data-z="2">
                    <div class="page-section-heading">
                      <h2 class="text-h3 margin-v-0" align="center">Payment Details</h2>
                      <h3 class="text-h4 margin-v-10 text-grey-400" align="center">You may pay using PayUMoney</h3>
					  </div>
                   
                    <div class="form-group form-control-material">
                      <input class="form-control" type="text" id="wiz-phone" placeholder="Name" required="" />
                      <label for="wiz-phone">Name:</label>
                    </div>
                 <div class="form-group form-control-material">
                      <input class="form-control" type="text" id="wiz-phone" placeholder="Email" required="" />
                      <label for="wiz-phone">Email:</label>
                    </div>
                 <div class="form-group form-control-material">
                      <input class="form-control" type="text" id="wiz-phone" placeholder="Mobile Number" required="" />
                      <label for="wiz-phone">Mobile No.:</label>
					  </div>
					  <div class="form-group form-control-material">
                      
                      <input type="hidden" value="plan3" name="plan3">
                    </div>
                 <div class="row">
                      <div class="col-xs-6">
                      
                      </div>
					 <div class="col-xs-6 text-right">
                        <button type="submit" class="wiz-step btn btn-primary" name="submit3" data-target="0"><img src="https://www.payumoney.com//media/images/payby_payumoney/buttons/111.png" /></button>
                      </div>
                     
                    </div>
                  </fieldset>

                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>



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

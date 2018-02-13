<?php

include('header.php');
error_reporting(0);
session_start();
include_once 'oesdb.php';


/************************** Step 1 *************************/
if(!isset($_SESSION['stdname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <head>
    <meta charset="UTF-8"/>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Nandha InfoTech | Edit User Profile</title>
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
    <script type="text/javascript" src="validate.js" ></script>
	  <script>
$.noConflict();
jQuery(document).ready(function(){
    jQuery("button").click(function(){
        jQuery("p").text("jQuery is still working!");
    });
});
</script>

      <style>
body  {
    background-image: url("image/001+background+pattern+designs.jpg");
    background-color: #cccccc;
}
</style>
      
    </head>
  <body>
       <?php

        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
         <?php
                       
 /************************** Step 3 - Case 1 *************************/
        // Default Mode - Displays the saved information.
                        $result=executeQuery("select stdid,stdname,stdpassword as stdpass ,emailid,contactno,address,city,pincode,image from student where stdname='".$_SESSION['stdname']."';");
	  
                        if(mysql_num_rows($result)==0) {
							echo "<script>alert('User Not Identified');</script>";
                           header('Location: index.php');
                        } 
                        else if($r=mysql_fetch_array($result))
                        {
                           //editing components
                 ?>
          <section class="yellow_section">
<div class="container">
	
<div class="text-center animated">
    
    <h2 class="sc_title sc_title_big sc_title_regular">Hi!</h2>
    <h1 class="sc_title sc_title_big sc_title_regular"><?php echo $r['stdname']; ?></h1>
    <br/>
   <div class="sc_title_icon sc_title_top sc_size_huge inherit">
<img src="<?php echo $r['image']; ?>" alt=""/>
	   <?php $img=$r['image']; ?>
</div>
    <br/>
    <h3><a href="#upd">Update Your Profile</a></h3>
		</div>
    </div>
			  

</section> 
      <section>
		  <div class="fancy">
		  <div id="container" align="center">
 
          
                                                        <form action="addexec.php" method="post" enctype="multipart/form-data" name="addroom">
         
                        <?php if(isset($_SESSION['stdname'])) {
                         // Navigations
                         ?>
                        
                        
            
      
       <div class="col-rs-4">
          
                            <div class="sec-box" align="center">
          
           <table class="table" >
              <tr>
                  <td>User Name</td>
                  <td><input type="text" name="cname" value="<?php echo $r['stdname']; ?>" size="16" onkeyup="isalphanum(this)" class="form-control"/></td>

              </tr>

                      <tr>
                  <td>Password</td>
                  <td><input type="password" name="password" value="<?php echo $r['stdpass']; ?>" size="16" onkeyup="isalphanum(this)" class="form-control"/></td>
                 
              </tr>

              <tr>
                  <td>E-mail ID</td>
                  <td><input type="text" name="email" value="<?php echo $r['emailid']; ?>" size="16" class="form-control" readonly=""/></td>
              </tr>
                       <tr>
                  <td>Contact No</td>
                  <td><input type="text" name="contactno" value="<?php echo $r['contactno']; ?>" size="16" onkeyup="isnum(this)" class="form-control"/></td>
              </tr>

                  <tr>
                  <td>Address</td>
                  <td><textarea name="address" cols="20" rows="3" class="form-control"><?php echo $r['address']; ?></textarea></td>
              </tr>
                       <tr>
                  <td>City</td>
                  <td><input type="text" name="city" value="<?php echo $r['city']; ?>" size="16" onkeyup="isalpha(this)" class="form-control"/></td>
              </tr>
                       <tr>
                  <td>PIN Code</td>
                  <td><input type="hidden" name="student" value="<?php echo $r['stdid']; ?>"/><input type="text" name="pin" value="<?php echo $r['pincode']; ?>" size="16" onkeyup="isnum(this)" class="form-control"/></td>
              </tr>
               <tr>
                  <td>Profile Image</td>
                  <td><input type="file" name="image" class="" value="<?php echo $r['image']; ?>"/></td>
              </tr>
               
            </table>
               </div>
               </div>
                                
           <div class="col-xs-12">
                            <div class="sec-box">
          <table class="table">
          <tr><input type="submit" value="Save" class="form-control" title="Save the changes"/></tr>
</table>
               </div></div>
<?php
                        closedb();
                        }
                        
                        }
  ?>
      
           </form>
      
			  </div></div>
      </section>
      <?php require('footer.php'); ?>
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

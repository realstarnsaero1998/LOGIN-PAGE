<?php
require('header.php');
error_reporting(0);
session_start();
extract($_GET);
include_once 'oesdb.php';
$session=$_SESSION['stdname'];
if($session==''){
	header("Location: invalid.php");
}
if (!isset($_SESSION['stdname'])) {
    $_GLOBALS['message'] = "Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
} else if (isset($_SESSION['starttime'])) {
    header('Location: testconducter.php');
} else if (isset($_REQUEST['logout'])) {
    //Log out and redirect login page
    unset($_SESSION['stdname']);
    header('Location: index.php');
} else if (isset($_REQUEST['dashboard'])) {
    //redirect to dashboard
    //
    header('Location: stdwelcome.php');
} else if (isset($_REQUEST['starttest'])) {
    //Prepare the parameters needed for Test Conducter and redirect to test conducter
    if (!empty($_REQUEST['tc'])) {
        $result = executeQuery("select DECODE(testcode,'oespass') as tcode from test where testid=" . $_SESSION['testid'] . ";");

        if ($r = mysql_fetch_array($result)) {
            if (strcmp(htmlspecialchars_decode($r['tcode'], ENT_QUOTES), htmlspecialchars($_REQUEST['tc'], ENT_QUOTES)) != 0) {
              //  $display = true;
                //$_GLOBALS['message'] = "You have entered an Invalid Test Code.Try again";
				echo "alert('Invalid Test Code')";
				header("Location: main_subject.php");
            } else {
                //now prepare parameters for Test Conducter and redirect to it.
                //first step: Insert the questions into table

                $result = executeQuery("select * from question where testid=" . $_SESSION['testid'] . " order by qnid;");
                if (mysql_num_rows($result) == 0) {
                    $_GLOBALS['message'] = "Tests questions cannot be selected.Please Try after some time!";
                } else {
                  //  executeQuery("COMMIT");
                    $error = false;
                //    executeQuery("delimiter |");
                 /*   if (!executeQuery("create event " . $_SESSION['stdname'] . time() . "
ON SCHEDULE AT (select endtime from studenttest where stdid=" . $_SESSION['stdid'] . " and testid=" . $_SESSION['testid'] . ") + INTERVAL (select duration from test where testid=" . $_SESSION['testid'] . ") MINUTE
DO update studenttest set correctlyanswered=(select count(*) from studentquestion as sq,question as q where sq.qnid=q.qnid and sq.testid=q.testid and sq.answered='answered' and sq.stdanswer=q.correctanswer and sq.stdid=" . $_SESSION['stdid'] . " and sq.testid=" . $_SESSION['testid'] . "),status='over' where stdid=" . $_SESSION['stdid'] . " and testid=" . $_SESSION['testid'] . "|"))
                        $_GLOBALS['message'] = "error" . mysql_error();
                    executeQuery("delimiter ;");*/
                    if (!executeQuery("insert into studenttest values(" . $_SESSION['stdid'] . "," . $_SESSION['testid'] . ",(select CURRENT_TIMESTAMP),date_add((select CURRENT_TIMESTAMP),INTERVAL (select duration from test where testid=" . $_SESSION['testid'] . ") MINUTE),0,'inprogress')"))
                        $_GLOBALS['message'] = "error" . mysql_error();
                    else {
                        while ($r = mysql_fetch_array($result)) {
                            if (!executeQuery("insert into studentquestion values(" . $_SESSION['stdid'] . "," . $_SESSION['testid'] . "," . $r['qnid'] . ",'unanswered',NULL)")) {
                                $_GLOBALS['message'] = "Failure while preparing questions for you.Try again";
                                $error = true;
                            }
                        }
                        if ($error == true) {
							//header("Location: invalid.php");
                      //      executeQuery("rollback;");
                        } else {
                            $result = executeQuery("select totalquestions,duration from test where testid=" . $_SESSION['testid'] . ";");
                            $r = mysql_fetch_array($result);
                            $_SESSION['tqn'] = htmlspecialchars_decode($r['totalquestions'], ENT_QUOTES);
                            $_SESSION['duration'] = htmlspecialchars_decode($r['duration'], ENT_QUOTES);
                            $result = executeQuery("select DATE_FORMAT(starttime,'%Y-%m-%d %H:%i:%s') as startt,DATE_FORMAT(endtime,'%Y-%m-%d %H:%i:%s') as endt from studenttest where testid=" . $_SESSION['testid'] . " and stdid=" . $_SESSION['stdid'] . ";");
                            $r = mysql_fetch_array($result);
                            $_SESSION['starttime'] = $r['startt'];
                            $_SESSION['endtime'] = $r['endt'];
                            $_SESSION['qn'] = 1;
                            header('Location: testconducter.php');
                        }
                    }
                }
            }
        } else {
    //        $display = true;
		echo"<script>alert('You have Entered Invalid Test Code');</script>";
			header("Location: main_subject");
     //  $_GLOBALS['message'] = "You have entered an Invalid Test Code.Try again.";
        }
    } else {
        $display = true;
      //  $_GLOBALS['message'] = "Enter the Test Code First!";
		echo "<script>alert('Enter The Test Code First');</script>";
    }
} else if (isset($_REQUEST['testcode'])) {
    //test code preparation
    if ($r = mysql_fetch_array($result = executeQuery("select testid from test where testname='" . htmlspecialchars($_REQUEST['testcode'], ENT_QUOTES) . "';"))) {
        $_SESSION['testname'] = $_REQUEST['testcode'];
        $_SESSION['testid'] = $r['testid'];
    }
} else if (isset($_REQUEST['savem'])) {
    //updating the modified values
    if (empty($_REQUEST['cname']) || empty($_REQUEST['password']) || empty($_REQUEST['email'])) {
        $_GLOBALS['message'] = "Some of the required Fields are Empty.Therefore Nothing is Updated";
    } else {
        $query = "update student set stdname='" . htmlspecialchars($_REQUEST['cname'], ENT_QUOTES) . "', stdpassword=ENCODE('" . htmlspecialchars($_REQUEST['password'], ENT_QUOTES) . "','oespass'),emailid='" . htmlspecialchars($_REQUEST['email'], ENT_QUOTES) . "',contactno='" . htmlspecialchars($_REQUEST['contactno'], ENT_QUOTES) . "',address='" . htmlspecialchars($_REQUEST['address'], ENT_QUOTES) . "',city='" . htmlspecialchars($_REQUEST['city'], ENT_QUOTES) . "',pincode='" . htmlspecialchars($_REQUEST['pin'], ENT_QUOTES) . "' where stdid='" . $_REQUEST['student'] . "';";
        if (!@executeQuery($query))
            $_GLOBALS['message'] = mysql_error();
        else
            $_GLOBALS['message'] = "Your Profile is Successfully Updated.";
    }
    closedb();
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Nandha InfoTech | Tests</title>
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
	<script>
$.noConflict();
jQuery(document).ready(function(){
    jQuery("button").click(function(){
        jQuery("p").text("jQuery is still working!");
    });
});
</script>
</head>
<body class="page fullscreen top_panel_above top_panel_opacity_transparent theme_skin_general usermenu_show">
     <?php
        if ($_GLOBALS['message']) {
            echo "<div class=\"message\">" . $_GLOBALS['message'] . "</div>";
        }
        ?>
<!--[if lt IE 9]>
	<div class="sc_infobox sc_infobox_style_error">
	<div style="text-align:center;">It looks like you're using an old version of Internet Explorer. For the best WordPress experience, please <a href="http://microsoft.com" style="color:#191919">update your browser</a> or learn how to <a href="http://browsehappy.com" style="color:#222222">browse happy</a>!</div>
	</div>	<![endif]-->
<div class="main_content">
<div class="boxedWrap">
<?php include('header.php'); ?>
<section class="dark_section">
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
    <form id="stdtest" action="stdtest.php" method="post">
         <?php
                        if (isset($_SESSION['stdname'])) {
                            // Navigations
                        ?>
         <?php
                            if (isset($_REQUEST['testcode'])) {
                                echo "<div class=\"pmsg\" style=\"text-align:center;\">What is the Code of " . $_SESSION['testname'] . " ? </div>";
                            } else {
                                echo "<div class=\"pmsg\" style=\"text-align:center;\">Offered Tests</div>";
                            }
                    ?>
                    <?php
                            if (isset($_REQUEST['testcode']) || $display == true) {
                    ?>
          <table cellpadding="30" cellspacing="10">
                                    <tr>
                                        <td>Enter Test Code</td>
                                        <td><input type="text" tabindex="1" name="tc" value="" size="16" /></td>
                                        <td><div class="help"><b>Note:</b><br/>Once you press start test<br/>button timer will be started</div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="col-md-4"  align="center">
                                            <input type="submit" tabindex="3" value="Start Test" name="starttest" class="subbtn" />
                                        </td>
                                    </tr>
                                </table>
         <?php
                            } else
							
							
							
							{
								
								
                                $result = executeQuery("select t.*,s.subname,DECODE(t.testcode,'oespass') as tcode from test as t, subject as s where s.subid=t.subid and t.subid=$subid and CURRENT_TIMESTAMP<t.testto and t.totalquestions=(select count(*) from question where testid=t.testid)");
                                 //editing components
                    ?>
      

   <?php
                                    while ($r = mysql_fetch_array($result)) {
                                        $i = $i + 1;
                                        if ($i % 2 == 0) {
                                            echo "";
                                        } else {
                                            echo "";
                                        }
                                        ?>
<div class="col-sm-4">
        
<div class="text-center">
<a class="sc_title_linked" href="#">
<div class="sc_title_icon sc_title_top sc_size_huge inherit">
<img src="admin/<?php  echo htmlspecialchars_decode($r['location'], ENT_QUOTES); ?>" alt=""/>
</div>
<h3 class="sc_title sc_title_iconed sc_title_bold margin_top_small"><?php  echo htmlspecialchars_decode($r['testname'], ENT_QUOTES); ?></h3>
</a>
	<div class="sc_section bg_tint_none sc_aligncenter">
<span class="sc_highlight sc_highlight_style_3">Test Code: <?php echo htmlspecialchars_decode($r['tcode'], ENT_QUOTES); ?></span>
</div> 
<div class="sc_section bg_tint_none sc_aligncenter">
<span class="sc_highlight sc_highlight_style_3"><?php echo htmlspecialchars_decode($r['testdesc'], ENT_QUOTES); ?></span>
</div>
    <div class="sc_section bg_tint_none sc_aligncenter">
<span class="sc_highlight sc_highlight_style_3">Package Name: <?php echo htmlspecialchars_decode($r['subname'], ENT_QUOTES); ?></span>
</div>
    <div class="sc_section bg_tint_none sc_aligncenter">
<span class="sc_highlight sc_highlight_style_3">Duration: <?php echo htmlspecialchars_decode($r['duration'], ENT_QUOTES); ?></span>
</div>
    <div class="sc_section bg_tint_none sc_aligncenter">
<span class="sc_highlight sc_highlight_style_3">Totla Questions: <?php echo htmlspecialchars_decode($r['totalquestions'], ENT_QUOTES); ?></span>
</div>
<div class="sc_button sc_button_style_global sc_button_size_medium squareButton global medium margin_top_small margin_bottom_middle ico">
<a title="Take Test" href="stdtest.php?testcode=<?= htmlspecialchars_decode($r['testname'], ENT_QUOTES); ?> ">Take Test</a>
</div>
</div>
    
</div>
 <?php } ?> 
</div>
        
   

<?php } 
                                
                                closedb();
                            }
                            
        ?> </form>
<!-----------------------------------------------/Testname---------------------------------------------------->
</div>
    
</section>
    </div>
<section class="yellow_section">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-7">
<h2 class="sc_title sc_title_bold sc_title_regular">Try our 30 days free services</h2>
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
</body>
</html>

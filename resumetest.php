<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php

require('header.php');

error_reporting(0);
session_start();
include_once 'oesdb.php';
if(!isset($_SESSION['stdname'])) {
    $_GLOBALS['message']="Session Timeout.Click here to <a href=\"index.php\">Re-LogIn</a>";
}
else if(isset($_REQUEST['logout'])) {
    //Log out and redirect login page
        unset($_SESSION['stdname']);
        header('Location: index.php');

    }
    else if(isset($_REQUEST['dashboard'])) {
        //redirect to dashboard
            header('Location: stdwelcome.php');

        }
        else if(isset($_REQUEST['resume'])) {
            //test code preparation
                if($r=mysql_fetch_array($result=executeQuery("select testname from test where testid=".$_REQUEST['resume'].";"))) {
                    $_SESSION['testname']=htmlspecialchars_decode($r['testname'],ENT_QUOTES);
                    $_SESSION['testid']=$_REQUEST['resume'];
                }
            }
            else if(isset($_REQUEST['resumetest'])) {
                //Prepare the parameters needed for Test Conducter and redirect to test conducter
                    if(!empty($_REQUEST['tc'])) {
                        $result=executeQuery("select DECODE(testcode,'oespass') as tcode from test where testid=".$_SESSION['testid'].";");

                        if($r=mysql_fetch_array($result)) {
                            if(strcmp(htmlspecialchars_decode($r['tcode'],ENT_QUOTES),htmlspecialchars($_REQUEST['tc'],ENT_QUOTES))!=0) {
                                //$display=true;
                                //$_GLOBALS['message']="You have entered an Invalid Test Code.Try again.";
								echo "<script>alert('You have Entered Invalide Test Code');</script>";
								
                            }
                            else {
                            //now prepare parameters for Test Conducter and redirect to it.

                                $result=executeQuery("select totalquestions,duration from test where testid=".$_SESSION['testid'].";");
                                $r=mysql_fetch_array($result);
                                $_SESSION['tqn']=htmlspecialchars_decode($r['totalquestions'],ENT_QUOTES);
                                $_SESSION['duration']=htmlspecialchars_decode($r['duration'],ENT_QUOTES);
                                $result=executeQuery("select DATE_FORMAT(starttime,'%Y-%m-%d %H:%i:%s') as startt,DATE_FORMAT(endtime,'%Y-%m-%d %H:%i:%s') as endt from studenttest where testid=".$_SESSION['testid']." and stdid=".$_SESSION['stdid'].";");
                                $r=mysql_fetch_array($result);
                                $_SESSION['starttime']=$r['startt'];
                                $_SESSION['endtime']=$r['endt'];
                                $_SESSION['qn']=1;
                                header('Location: testconducter.php');
                            }

                        }
                        else {
                            $display=true;
                            $_GLOBALS['message']="You have entered an Invalid Test Code.Try again.";
                        }
                    }
                    else {
                       // $display=true;
                       // $_GLOBALS['message']="Enter the Test Code First!";
                    echo "<script>alert('Enter the Test Code');</script>";
					}
                }


?>

<html>
    <head>
        <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Nandha InfoTech | Resume Test</title>
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
  <title>Learning</title>

  <link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">
<script>
$.noConflict();
jQuery(document).ready(function(){
    jQuery("button").click(function(){
        jQuery("p").text("jQuery is still working!");
    });
});
</script>        
        <script type="text/javascript" src="validate.js" ></script>
       <style>
		boxed {
  border: 1px solid green ;
}
		</style> 
    </head>
    <body>
        <section class="dark_section">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="text-center">
<h1 class="sc_title sc_title_regular sc_title_bold margin_top_large">TEST TO BE RESUMED</h1>
<h5 class="sc_highlight">Resume You'r Unfinished Test!</h5>
</div>
</div>
</div>

</div>
</section>
        <div class="container"></div>
        
<?php

if($_GLOBALS['message']) {
    echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
}
?>
        <div id="container">
           
            <form id="summary" action="resumetest.php" method="post">
                <div class="menubar">
                    
        <?php if(isset($_SESSION['stdname'])) {
// Navigations
    ?>
                    


                </div>
                <div class="page">

    <?php
    if(isset($_REQUEST['resume'])) {
        echo "<div class=\"pmsg\" style=\"text-align:center;\">What is the Code of ".$_SESSION['testname']." ? </div>";
    }
    else {
        echo "<div class=\"pmsg\" style=\"text-align:center;\">Tests to be Resumed</div>";
    }
    ?>
                        <?php

                        if(isset($_REQUEST['resume'])|| $display==true) {
                            ?>
                    <table cellpadding="30" cellspacing="10">
                        <tr>
                            <td>Enter Test Code</td>
                            <td><input type="text" tabindex="1" name="tc" value="" size="16" /></td>
                            <td><div class="help"><b>Note:</b><br/>Quickly enter Test Code and<br/> press Resume button to utilize<br/> Remaining time.</div></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <input type="submit" tabindex="3" value="Resume Test" name="resumetest" class="subbtn" />
                            </td>
                        </tr>
                    </table>


    <?php
    }
    else {   ?>
                    <div class="fancy">
                    <br/><br/><br/>
  <?php        $result=executeQuery("select t.testid,t.testname,DATE_FORMAT(st.starttime,'%d %M %Y %H:%i:%s') as startt,sub.subname as sname,TIMEDIFF(st.endtime,CURRENT_TIMESTAMP) as remainingtime from subject as sub,studenttest as st,test as t where sub.subid=t.subid and t.testid=st.testid and st.stdid=".$_SESSION['stdid']." and st.status='inprogress' order by st.starttime desc;");
        if(mysql_num_rows($result)==0) {
            echo"<h3 style=\"color:#0000cc;text-align:center;\">There are no incomplete exams, that needs to be resumed! Please Try Again..!</h3>";
        } 
          
          else {
        //editing components
            ?>
                    <table cellpadding="30" cellspacing="10" class="datatable">
                        <tr>
                            <th><strong>Date and Time</strong></th>
                            <th><strong>Test</strong></th>
                            <th><strong>Subject</strong></th>
                            <th><strong>Remaining Time</strong></th>
                            <th><strong>Resume</strong></th>
                        </tr>
                                <?php
                                while($r=mysql_fetch_array($result)) {
                                    $i=$i+1;
                                    if($r['remainingtime']<0) {
                //IF Suppose MySQL Event fails for some reasons to change status this condtion becomes true.

                //   executeQuery("update studenttest set status='over' where stdid=".$_SESSION['stdid']." and testid=".$r['testid'].";");
                //      continue ;
                }

                if($i%2==0) {
                    echo "<tr class=\"alt\">";
                                        }
                                        else { echo "<tr>";}
                                        echo "<td>".$r['startt']."</td><td>".htmlspecialchars_decode($r['testname'],ENT_QUOTES)."</td><td>".htmlspecialchars_decode($r['sname'],ENT_QUOTES)."</td><td>".$r['remainingtime']."</td>";
                                        echo"<td class=\"tddata\"><a title=\"Resume\" href=\"resumetest.php?resume=".$r['testid']."\"><img src=\"images/resume.png\" height=\"30\" width=\"60\" alt=\"Resume\" /></a></td></tr>";
                                    }

                                    ?>

                    </table>
                                <?php
                                }
        
                                            ?> 
                        <br/><br/><br/> </div>
                                        <?php

                            }

                            closedb();
                        }
                        ?>
                        
                </div>
            
            </form>
           
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


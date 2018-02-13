


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
    else if(isset($_REQUEST['back'])) {
        //redirect to View Result

            header('Location: viewresult.php');

        }
        else if(isset($_REQUEST['dashboard'])) {
        //redirect to dashboard

            header('Location: stdwelcome.php');

        } else if(isset($_REQUEST['print'])) {
        //redirect to dashboard

                      
            header('Location: fpdf_demo.php');

        }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="CACHE-CONTROL" content="NO-CACHE"/>
        <meta http-equiv="PRAGMA" content="NO-CACHE"/>
        <meta name="ROBOTS" content="NONE"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Nandha InfoTech | Scores</title>
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
        <link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
  <title>Learning</title>

  <link href="css/vendor/all.css" rel="stylesheet">
  <link href="css/app/app.css" rel="stylesheet">
    
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta http-equiv="CACHE-CONTROL" content="NO-CACHE"/>
        <meta http-equiv="PRAGMA" content="NO-CACHE"/>
        <meta name="ROBOTS" content="NONE"/>

    
        <script type="text/javascript" src="validate.js" ></script>
		<script>
		function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
		</script>
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
    background-image: url("image/bg4.png");
    background-color: #cccccc;
}
</style>
    </head>
    <body ><div class="container">
        <?php

        if($_GLOBALS['message']) {
            echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
        ?>
 
            <div class="page-section">
      <div class="row">

       
            
            <div class="tabbable paper-shadow relative" data-z="0.5">
            <form id="summary" action="viewresult.php" method="post">
                
                        <?php if(isset($_SESSION['stdname'])) {
                        // Navigations
                       
              ?>
                        
                <div class="page">

                        <?php

                        if(isset($_REQUEST['details'])) {
                            $result=executeQuery("select s.stdname,t.testname,sub.subname,DATE_FORMAT(st.starttime,'%d %M %Y %H:%i:%s') as stime,TIMEDIFF(st.endtime,st.starttime) as dur,(select sum(marks) from question where testid=".$_REQUEST['details'].") as tm,IFNULL((select sum(q.marks) from studentquestion as sq, question as q where sq.testid=q.testid and sq.qnid=q.qnid and sq.answered='answered' and sq.stdanswer=q.correctanswer and sq.stdid=".$_SESSION['stdid']." and sq.testid=".$_REQUEST['details']."),0) as om from student as s,test as t, subject as sub,studenttest as st where s.stdid=st.stdid and st.testid=t.testid and t.subid=sub.subid and st.stdid=".$_SESSION['stdid']." and st.testid=".$_REQUEST['details'].";") ;
                            if(mysql_num_rows($result)!=0) {

                                $r=mysql_fetch_array($result);
                                ?>
                    <div class="tab-content" id="printableArea">


						
						<div class="col-9">
							<div class="cart_totals" id="">	
								<a class="togglethis" ><font color="red"><h3 align="center">Nandha InfoTech</h3>
											<h6 align="center">The Online Examination System</h6></font>
										<h3 Align="center">Certificate</h3></a>
                                <h1 class="sc_title sc_title_regular sc_title_bold" align="center">Test Summary</h1>
                                <div class="panel panel-default">
                    <table class="table">
                        
                       
                        <tr>
                            <td><b>Student Name</b></td>
                            <td><?php echo htmlspecialchars_decode($r['stdname'],ENT_QUOTES); ?></td>
                        </tr>
                        <tr>
                            <td><b>Test</b></td>
                            <td><?php echo htmlspecialchars_decode($r['testname'],ENT_QUOTES); ?></td>
                        </tr>
                        <tr>
                            <td><b>Subject</b></td>
                            <td><?php echo htmlspecialchars_decode($r['subname'],ENT_QUOTES); ?></td>
                        </tr>
                        <tr>
                            <td><b>Date and Time</b></td>
                            <td><?php echo $r['stime']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Test Duration</b></td>
                            <td><?php echo $r['dur']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Max. Marks</b></td>
                            <td><?php echo $r['tm']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Obtained Marks</b></td>
                            <td><?php echo $r['om']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Percentage</b></td>
                            <td><?php echo (($r['om']/$r['tm'])*100)." %"; ?></td>
                        </tr>
                      
                    </table>
                                    
                                </div></div>
						

						</div>
						
					</div>
					<div class="animated text-center margin_top_small">
                        <div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge" >
                            <form method="post">
<?php
$result=executeQuery("select s.stdname,t.testname,sub.subname,DATE_FORMAT(st.starttime,'%d %M %Y %H:%i:%s') as stime,TIMEDIFF(st.endtime,st.starttime) as dur,(select sum(marks) from question where testid=".$_REQUEST['details'].") as tm,IFNULL((select sum(q.marks) from studentquestion as sq, question as q where sq.testid=q.testid and sq.qnid=q.qnid and sq.answered='answered' and sq.stdanswer=q.correctanswer and sq.stdid=".$_SESSION['stdid']." and sq.testid=".$_REQUEST['details']."),0) as om from student as s,test as t, subject as sub,studenttest as st where s.stdid=st.stdid and st.testid=t.testid and t.subid=sub.subid and st.stdid=".$_SESSION['stdid']." and st.testid=".$_REQUEST['details'].";") ;
                           

                                    $_SESSION['name']=htmlspecialchars_decode($r['stdname'],ENT_QUOTES);
                                    echo htmlspecialchars_decode($r['stdname'],ENT_QUOTES);
                            $_SESSION['testname']=htmlspecialchars_decode($r['testname'],ENT_QUOTES);
                            $_SESSION['subjectname']=htmlspecialchars_decode($r['subname'],ENT_QUOTES);
                            $_SESSION['start_time']=$r['stime'];
                            $_SESSION['duration']=$r['dur'];
                       $_SESSION['total_mark']=$r['tm'];
                       $_SESSION['obtained_mark']=$r['om'];
                        $_SESSION['percentage']=(($r['om']/$r['tm'])*100)." %";

?>
<input type="submit" name="print" value="Print" />
</form>
    </div></div>
				
					
                                    <?php

                                $result1=executeQuery("select q.qnid as questionid,q.question as quest,q.correctanswer as ca,sq.answered as status,sq.stdanswer as sa from studentquestion as sq,question as q where q.qnid=sq.qnid and sq.testid=q.testid and sq.testid=".$_REQUEST['details']." and sq.stdid=".$_SESSION['stdid']." order by q.qnid;" );

                                if(mysql_num_rows($result1)==0) {
                                    echo"<h3 style=\"color:#0000cc;text-align:center;\">1.Sorry because of some problems Individual questions Cannot be displayed.</h3>";
                                }
                                else {
                                    ?>
                    <div class="tab-content">


						
						
							<div class="cart_totals">	
                                <h1 class="sc_title sc_title_regular sc_title_bold" align="center">Test Information in Detail</h1>
                                <div class="panel panel-default">
                    <table class="table">
                        <tr>
                            <th><b>Q. No</b></th>
                            <th><b>Question</b></th>
                            <th><b>Correct Answer</b></th>
                            <th><b>Your Answer</b></th>
                            <th><b>Score</b></th>
                            <th>&nbsp;</th>
                        </tr>
                                        <?php
                                        while($r1=mysql_fetch_array($result1)) {

                                        if(is_null($r1['sa']))
                                        $r1['sa']="question"; //any valid field of question
                                           $result2=executeQuery("select ".$r1['ca']." as corans,IF('".$r1['status']."'='answered',(select ".$r1['sa']." from question where qnid=".$r1['questionid']." and testid=".$_REQUEST['details']."),'unanswered') as stdans, IF('".$r1['status']."'='answered',IFNULL((select q.marks from question as q, studentquestion as sq where q.qnid=sq.qnid and q.testid=sq.testid and q.correctanswer=sq.stdanswer and sq.stdid=".$_SESSION['stdid']." and q.qnid=".$r1['questionid']." and q.testid=".$_REQUEST['details']."),0),0) as stdmarks from question where qnid=".$r1['questionid']." and testid=".$_REQUEST['details'].";");

                                            if($r2=mysql_fetch_array($result2)) {
                                                ?>
                        <tr>
                            <td><?php echo $r1['questionid']; ?></td>
                            <td><?php echo htmlspecialchars_decode($r1['quest'],ENT_QUOTES); ?></td>
                            <td><?php echo htmlspecialchars_decode($r2['corans'],ENT_QUOTES); ?></td>
                            <td><?php echo htmlspecialchars_decode($r2['stdans'],ENT_QUOTES); ?></td>
                            <td><?php echo $r2['stdmarks']; ?></td>
                                                    <?php
                                                    if($r2['stdmarks']==0) {
                                                        echo"<td class=\"tddata\"><img src=\"images/wrong.png\" title=\"Wrong Answer\" height=\"30\" width=\"40\" alt=\"Wrong Answer\" /></td>";
                                                    }
                                                    else {
                                                        echo"<td class=\"tddata\"><img src=\"images/correct.png\" title=\"Correct Answer\" height=\"30\" width=\"40\" alt=\"Correct Answer\" /></td>";
                                                    }
                                                    ?>
                        </tr>
                            <?php
                                                }
                                                else {
                                                    echo"<h3 style=\"color:#0000cc;text-align:center;\">Sorry because of some problems Individual questions Cannot be displayed.</h3>".mysql_error();
                                                }
                                            }

                                        }
                                    }
                                    else {
                                        echo"<h3 style=\"color:#0000cc;text-align:center;\">Something went wrong. Please logout and Try again.</h3>".mysql_error();
                                    }
                                    ?>
                    </table>

                                </div>
                                <div class="row">
<div class="col-sm-12">
<div class="animated text-center margin_top_small">
                        <div class="sc_button sc_button_style_global sc_button_size_huge squareButton global huge" >
<a href="viewresult.php" class="">Results</a>
    </div></div></div>
</div></div></div>
                    <br/>
                    <br/>
                                <?php

                        }
                        else {


                            $result=executeQuery("select st.*,t.testname,t.testdesc,DATE_FORMAT(st.starttime,'%d %M %Y %H:%i:%s') as startt from studenttest as st,test as t where t.testid=st.testid and st.stdid=".$_SESSION['stdid']." and st.status='over' order by st.testid;");
                            if(mysql_num_rows($result)==0) {
                                echo"<h3 style=\"color:#0000cc;text-align:center;\">I Think You Haven't Attempted Any Exams Yet..! Please Try Again After Your Attempt.</h3>";
                            }
                            else {
                            //editing components
                                ?>
                    <!------------------------------------------------------------->
        
                    
                    <!-------------------------------------------------------------></div>
         <br>
            <br>
            <div class="tab-content">


						
						<div class="col-9">
							<div class="cart_totals">	
                                <h1 class="sc_title sc_title_regular sc_title_bold" align="center">Results</h1>
                                <div class="panel panel-default">
                                     
                    <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
                       <tbody>
                         <tr>
                             <th><b>Date and Time</b></th>
                             <th><b>Test Name</b></th>
                             <th><b>Max. Marks</b></th>
                             <th><b>Obtained Marks</b></th>
                             <th><b>Percentage</b></th>
                             <th><b>Details</b></th>
                        </tr>
            <?php
            while($r=mysql_fetch_array($result)) {
                                        $i=$i+1;
                                        $om=0;
                                        $tm=0;
                                        $result1=executeQuery("select sum(q.marks) as om from studentquestion as sq, question as q where sq.testid=q.testid and sq.qnid=q.qnid and sq.answered='answered' and sq.stdanswer=q.correctanswer and sq.stdid=".$_SESSION['stdid']." and sq.testid=".$r['testid']." order by sq.testid;");
                                        $r1=mysql_fetch_array($result1);
                                        $result2=executeQuery("select sum(marks) as tm from question where testid=".$r['testid'].";");
                                        $r2=mysql_fetch_array($result2);
                                        if($i%2==0) {
                                            echo "<tr class=\"alt\">";
                                        }
                                        else { echo "<tr>";}
                                        echo "<th>".$r['startt']."</th><th>".htmlspecialchars_decode($r['testname'],ENT_QUOTES)." : ".htmlspecialchars_decode($r['testdesc'],ENT_QUOTES)."</th>";
                                        if(is_null($r2['tm'])) {
                                            $tm=0;
                                            echo "<th>$tm</th>";
                                        }
                                        else {
                                            $tm=$r2['tm'];
                                            echo "<th>$tm</th>";
                                        }
                                        if(is_null($r1['om'])) {
                                            $om=0;
                                            echo "<th>$om</th>";
                                        }
                                        else {
                                            $om=$r1['om'];
                                            echo "<th>$om</th>";
                                        }
                                        if($tm==0) {
                                            echo "<th>0</th>";
                                        }
                                        else {
                                            echo "<th>".(($om/$tm)*100)." %</th>";
                                        }
                                        echo"<th class=\"tddata\"><a title=\"Details\" href=\"viewresult.php?details=".$r['testid']."\"><img src=\"images/Books.ico\" height=\"30\" width=\"40\" alt=\"Details\" /></a></th></tr>";
                                    }

                                    ?>
                        </tbody>
                    </table>
            </div></div></div>
                                </div>
        <?php
        }
                        }
                        closedb();
                    }
                    ?>

                </div>

            </form>
            
          </div></div></div></div>
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


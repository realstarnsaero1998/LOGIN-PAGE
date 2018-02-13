<?php
include("database.php");
session_start();
extract($_GET);
$student_id1=$_SESSION['stdid'];
$plan_val1=mysql_query("select *from payment_details where student_id='$student_id1'");

$plan_val_arr1=mysql_fetch_array($plan_val1);
$ids=$plan_val_arr1['id'];
$plan=$plan_val_arr1['plan'];
$plan_id=$plan_val_arr1['plan_id'];
$student_id=$plan_val_arr1['student_id'];
$subject_id=$plan_val_arr1['subject_id'];
$user_id=$plan_val_arr1['student_id'];
$date= date('Y-m-d', strtotime("+30 days"));
echo $plan;
echo $user_id;
echo $plan_id;
echo $student_id;
echo $subject_id;


$plan_val=mysql_query("select *from student_plan where student_id='$student_id' and sub_id='$subject_id'");
$count=mysql_num_rows($plan_val);
if($count>0){
while($plan_val_arr=mysql_fetch_array($plan_val)){
if($plan_val_arr['plan_id']!=$plan_id){
	mysql_query("update student_plan set plan_id='$plan_id' where student_id='$student_id' and sub_id='$subject_id'");
}	
}
}else{
mysql_query("INSERT INTO `student_plan`(`id`, `sub_id`, `plan_id`, `student_id`) VALUES (null,'$subject_id','$plan_id','$student_id')");

}
mysql_query("UPDATE `student` SET `ex_date`='$date',`payment`='$plan' WHERE `stdid`='$user_id'");
	
mysql_query("DELETE FROM `payment_details` WHERE id='$ids'");
	header('location: main_subject.php');


?>

<?php
/**
 *Thie is used to show the city by ajax on page
 *
 *
 * @package WordPress
 * @subpackage Swaransoft
 */


include('../include/dbConnect.inc.php');

    $status1 = $_REQUEST['jstatus'];
	$function = $_REQUEST['jfunction'];
	$title = $_REQUEST['title'];
	$salary = $_REQUEST['salary'];
	$skills = $_REQUEST['skills'];
	$qulification = $_REQUEST['qulification'];
	$experience = $_REQUEST['experience'];
	$start_date = $_REQUEST['start_date'];
	$location = $_REQUEST['loc'];
	$description = $_REQUEST['description'];
	$jobid = $_REQUEST['jobid'];
	$jlistid = $_REQUEST['jlistid'];

if($status1 == "Enable"){
  $j_status="1";
  }else{
   $j_status="0";
  }

//echo $jobid,$status1,$j_status,$function,$title,$salary,$skills,$qulification,$experience,$start_date,$description;
If($j_status=='1'){
$request = mysql_query("UPDATE career_job_details SET Title = '$title',Function = '$function',Qualification = '$qulification',Skills = '$skills',Experience = '$experience',Salary = '$salary',Description = '$description',Post_Date = '$start_date',disable_date = '' WHERE id='$jobid'" );

}else{
$request = mysql_query("UPDATE career_job_details SET Title = '$title',Function = '$function',Qualification = '$qulification',Skills = '$skills',Experience = '$experience',Salary = '$salary',Description = '$description',Post_Date = '$start_date',disable_date = now() WHERE id='$jobid'" );

}


If($request){
$request2 = mysql_query("UPDATE `career_job_list` SET Status = '$j_status' WHERE id='$jlistid'" );
}


If($request2){
	echo '<script language="javascript">';
    echo 'alert("Edit Done Successfully!")';
    echo '</script>';
//echo "<span style='color:green;text-align: center;'>"."Edit Done Successfully!"."<span>";
}else{
	echo '<script language="javascript">';
    echo 'alert("Edit not successfully.")';
    echo '</script>';
//echo "<span style='color:red'>"."Edit not successfully."."<span>";
}


?>
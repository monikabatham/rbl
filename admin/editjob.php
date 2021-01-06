<?php    session_start();
	error_reporting(0);
    // Call this function so your page
    // can access session variables
 
    if ($_SESSION['login_user'] != 'publisher') {
        // If the 'loggedin' session variable
        // is not equal to 1, then you must
        // not let the user see the page.
        // So, we'll redirect them to the
        // login page (login.php).
 
        header("Location: login.php");
        exit;
    }


  
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Konica Minolta</title>
 <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
 <script src="https://cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea', browser_spellcheck: true });</script>
  <style>
  
  .nicEdit-main {padding: 2% 4% 2% 2%; text-align:justify !important;}
  </style>
 
 
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  


<body>
<?php

include('../include/dbConnect.inc.php');

if(empty($_GET['id'])) {
   header('Location: login.php'); 
  }
  
  if (isset($_POST['submit-btn'])) {

    $status1 = $_POST['jstu'];
	$function = $_POST['function'];
	$title = $_POST['title'];
	$salary = $_POST['salary'];
	$skills = $_POST['skills'];
	$qulification = $_POST['qulification'];
	$experience = $_POST['experience'];
	$start_date = $_POST['start_date'];
	$location = $_POST['location'];
	$description = mysqli_real_escape_string($_POST['descrip']);
	$jobid = $_POST['jobid'];
	$jlistid = $_POST['jlistid'];

if($status1 == "Enable"){
  $j_status="1";
 
  }else{
   $j_status="0";
  
  }

//echo $jobid,$status1,$j_status,$function,$title,$salary,$skills,$qulification,$experience,$start_date,$description;
If($j_status=='1'){
$request = mysqli_query("UPDATE career_job_details SET Title = '$title',Function = '$function',Qualification = '$qulification',Skills = '$skills',Experience = '$experience',Salary = '$salary',Description = '$description',Post_Date = '$start_date',disable_date = '' WHERE id='$jobid'" );
}
else
{
$request = mysqli_query("UPDATE career_job_details SET Title = '$title',Function = '$function',Qualification = '$qulification',Skills = '$skills',Experience = '$experience',Salary = '$salary',Description = '$description',Post_Date = '$start_date',disable_date = now() WHERE id='$jobid'" );
}


If($request){
$request2 = mysqli_query("UPDATE `career_job_list` SET Status = '$j_status',location = '$location' WHERE id='$jlistid'" );
}


If($request2){
	echo '<script language="javascript">';
    echo 'alert("Edit Done Successfully!")';
    echo '</script>';

}else{
	echo '<script language="javascript">';
    echo 'alert("Edit not successfully.")';
    echo '</script>';

}
}
   $id = $_REQUEST['id'];

  $sql = "SELECT * FROM career_job_list WHERE id='". $id . "'";
   $result = $conn->query($sql);

  //$result = mysqli_query($sql)or die(mysqli_error());
  //$row = mysqli_fetch_array($result);
  $job_id = $row['Job_id'];
  $job_location = $row['location'];
  $job_status = $row['Status'];
  $Application_count = $row['Application_count'];

if($job_status == '1'){
  $j_status="Enable";

  }else{
   $j_status="Disable";

  }

 $sql2 = "SELECT * FROM career_job_details WHERE id='". $job_id . "'";
$result = $conn->query($sql2);

 //$result2 = mysqli_query($sql2)or die(mysqli_error());
  //$row2 = mysql_fetch_array($result2);

  $job_title = $row2['Title'];
  $job_function = $row2['Function'];
  $job_qualification = $row2['Qualification'];
  $job_skills = $row2['Skills'];
  $job_experience = $row2['Experience'];
  $job_salary = $row2['Salary'];
  $job_description = $row2['Description'];
  $job_post_date = $row2['Post_Date'];
 
//echo $j_status,$job_function;


?>
<div class="container main-outer">
<header>
<div class="page-header">
<a href="#"><img src="images/logo.jpg"></a>
<h5 align="right"><a href="logout.php">LogOut</a></h5>
</div>
</header>

<section>

<div class="col-md-3 table-bordered main-left">
<div class="row job-manager-h"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Job Manager</div>

<div class="row">
<div class="sidebar">
<ul class="nav nav-sidebar">
<li><a href="https://bt.konicaminolta.in/career/admin/newjob.php">Add Job</a></li>
<li><a href="https://bt.konicaminolta.in/career/admin/list_jobs.php">Jobs</a></li>
<li><a href="https://bt.konicaminolta.in/career/admin/applications.php">Applications</a></li>
<li><a href="https://bt.konicaminolta.in/career/admin/applications-without-opening.php">Application Without Opening</a></li>
</ul>
</div>
</div> 
</div>
<div class="col-md-9 table-bordered main-right">
<div class="bg-primary page-title row"><span></span>Edit</div> 

<form class="form-horizontal main-content" action="" method="post">
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Status</label>
<div class="col-sm-6">
<div class="row">
<div class="col-sm-7">
<input class="form-control" name="jstu" id="ss" type="text" value="<?php echo $j_status; ?>" readonly/></div>
<div class="col-sm-5">
<select id="single" class="form-control">
           <option value="">Edit Status -</option>
           <option value="Enable">Enable</option>
           <option value="Disable">Disable</option>
         </select></div>


</div>
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Fuction</label>
<div class="col-sm-6">

<div class="row">
<div class="col-sm-7">
<input class="form-control" name="function" id="ff" type="text" value="<?php echo $job_function; ?>" readonly/></div>
<div class="col-sm-5">
<select id="function" class="form-control">
		     <option value="">Edit Function -</option>
<option value="Corporate Sales">Corporate Sales</option>
<option value="Channel/Dealer Sales">Channel/Dealer Sales</option>
<option value="Technical/ Customer Service & Support">Technical/ Customer Service & Support</option>
<option value="Service Planning">Service Planning</option>
<option value="Technical Training">Technical Training</option>
<option value="Marketing Communication">Marketing Communication</option>
<option value="Product Management">Product Management</option>
<option value="Pre- Sales Support">Pre- Sales Support</option>
<option value="Logistics/ Supply Chain/Warehouse Management">Logistics/ Supply Chain/Warehouse Management</option>
<option value="Finance & Accounts">Finance & Accounts</option>
<option value="Credit & Collection">Credit & Collection</option>
<option value="Information Technology Support">Information Technology Support</option>
<option value="SAP Support">SAP Support</option>
<option value="Office Administration">Office Administration</option>
<option value="Human Resource">Human Resource</option>
<option value="Others">Others</option>
            </select></div>
</div>

</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Title</label>
<div class="col-sm-6">
<input type="text" class="form-control" name="title" value="<?php echo $job_title; ?>" required>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">CTC</label>
<div class="col-sm-6">
<input class="form-control" name="salary" type="text" value="<?php echo $job_salary; ?>" required/>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Skills</label>
<div class="col-sm-6">
<input class="form-control" name="skills" type="text" value="<?php echo $job_skills; ?>"  />
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Qulification</label>
<div class="col-sm-6">
<input class="form-control" name="qulification" type="text" value="<?php echo $job_qualification; ?>"  required/>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Experience</label>
<div class="col-sm-6">
<input class="form-control" name="experience" type="text" value="<?php echo $job_experience; ?>" required/>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Start Date</label>
<div class="col-sm-6">
<input class="form-control" id="datepicker-7" name="start_date" type="text" value="<?php echo $job_post_date; ?>"  required/>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Location</label>
<div class="col-sm-6">
<input class="form-control" name="location" type="text" value="<?php echo $job_location; ?>" required/>
</div>
</div>
<div class="form-group">
    <label for="exampleInputEmail1" class="col-sm-12">Job Information</label>
    <div class="col-sm-12">
	<textarea class="form-control" id="descrip" name="descrip" rows="8" ><?php echo $job_description; ?></textarea>
    </div>
  </div>
<div class="form-group">
<div class="col-sm-12">
<input name="jobid" type="hidden" value="<?php echo  $job_id; ?>" required/>
		<input name="jlistid" type="hidden" value="<?php echo  $id; ?>" required/>
		<input class="btn btn-primary" type="submit" id="edit-form" name="submit-btn" value="Save Changes" />
		
		<div id="edit"></div>

</div>
</div>
</form>        
</div>
</section>

<footer>
<div class="container">
</div>
</footer>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-7" ).datepicker({
               defaultDate:+9,
               dayNamesMin: [ "Su", "Mo", "Tu", "We", "Thu", "Fr", "Sa" ],
               duration: "slow"
            });
         });
      </script>
 <script>
$('#single').on('change', function () {
    stat = $(this).val();
    if (stat == 'Enable') { $('#ss').val('Enable');  }
    if (stat == 'Disable') { $('#ss').val('Disable'); }
   
});


$('#function').on('change', function () {
    func = $(this).val();
    if (func == 'Corporate Sales') { $('#ff').val('Corporate Sales');  }
    if (func == 'Channel/Dealer Sales') { $('#ff').val('Channel/Dealer Sales');  }
	if (func == 'Technical/ Customer Service & Support') { $('#ff').val('Technical/ Customer Service & Support');  }
    if (func == 'Service Planning') { $('#ff').val('Service Planning');  }
	if (func == 'Technical Training') { $('#ff').val('Technical Training');  }
    if (func == 'Marketing Communication') { $('#ff').val('Marketing Communication');  }
	if (func == 'Product Management') { $('#ff').val('Product Management');  }
    if (func == 'Pre- Sales Support') { $('#ff').val('Pre- Sales Support');  }
	if (func == 'Logistics/ Supply Chain/Warehouse Management') { $('#ff').val('Logistics/ Supply Chain/Warehouse Management');  }
    if (func == 'Finance & Accounts') { $('#ff').val('Finance & Accounts');  }
	if (func == 'Credit & Collection') { $('#ff').val('Credit & Collection');  }
    if (func == 'Information Technology Support') { $('#ff').val('Information Technology Support');  }
	if (func == 'SAP Support') { $('#ff').val('SAP Support');  }
    if (func == 'Office Administration') { $('#ff').val('Office Administration');  }
	if (func == 'Human Resource') { $('#ff').val('Human Resource');  }
    if (func == 'Others') { $('#ff').val('Others');  }
   
});

</script>
<?php


?>
</body>
</html>

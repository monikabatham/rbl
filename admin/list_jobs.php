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
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="https://bt.konicaminolta.in/career/css/simplePagination.css" type="text/css" rel="stylesheet"/>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://bt.konicaminolta.in/career/js/jquery.simplePagination.js"></script>
<script type="text/javascript">
jQuery(function($) {
    var items = $(".testpag");
    var numItems = items.length;
    var perPage = 15;
    items.slice(perPage).hide();
    $("#pagination").pagination({
    items: numItems,
    itemsOnPage: perPage,
    cssStyle: "light-theme",
    onPageClick: function(pageNumber) {
    var showFrom = perPage * (pageNumber - 1);
    var showTo = showFrom + perPage;
    items.hide();
    items.slice(showFrom, showTo).show();
    }
    });
    });    

	$(document).ready(function(){
	
			$('#textexcel').click(function(){
				 var t1 = document.getElementById('mytable');
				 var xl1 = t1.outerHTML;
				 window.open('data:application/vnd.ms-excel,' + encodeURIComponent(xl1));
			});
	
	});

</script>
</head>

<body>
<div class="container main-outer">
<header>
<div class="page-header">
<a href="#"><img src="images/logo.jpg"></a>
<h5 align="right"><a href="logout.php">LogOut</a></h5>
</div>
</header>

<section>

<div class="col-md-12 table-bordered">
<div class="row job-manager-h"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Job Manager</div>

<div class="row">
<div class="sidebar">
<ul class="nav nav-sidebar nav-pills">
<li><a href="https://bt.konicaminolta.in/career/admin/newjob.php">Add Job</a></li>
<li class="active"><a href="http://bt.konicaminolta.in/career/admin/list_jobs.php">Jobs</a></li>
<li><a href="https://bt.konicaminolta.in/career/admin/applications.php">Applications</a></li>
<li><a href="https://bt.konicaminolta.in/career/admin/applications-without-opening.php">Application Without Opening</a></li>
</ul>
</div>
</div> 
</div>
<div class="col-md-12 table-bordered">
<div class="bg-primary page-title row"><span></span>Jobs</div> 
<div class="main-content table-responsive">
<div style="padding:10px">
<form method="post" action="https://bt.konicaminolta.in/career/admin/list_jobs.php">
<div class="col-md-6 col-xs-12">
<input type="text" class="form-control input-sm" placeholder="Position .." name="keyword" required>
</div>
<div class="col-md-2 col-xs-12">
<input type="submit" name="Search" class="btn btn-default btn-sm" value="Search"/>
</div>
</form>
</div>
<span style="float:right;padding:4px" id="textexcel" class="left-down-b"><img src="images/download-icon.png" alt=""></span>

<?php 
include('../include/dbConnect.inc.php');

if (isset($_POST['Search'])) {

	$keyword = $_POST['keyword'];
	
$query = "SELECT career_job_details.Title,career_job_details.Function,career_job_list.location,career_job_list.id,career_job_list.Status,career_job_details.Post_Date,date_format( career_job_details.Create_Date , ' %m/ %d/ %Y ' ) as cdate FROM `career_job_details` INNER JOIN `career_job_list` on career_job_details.id = career_job_list.Job_id WHERE (career_job_details.Title LIKE '%" . $keyword . "%') ORDER BY id DESC";
echo "$query";

$result = $conn->query($query);

//$result = $wpdb->get_results($query, ARRAY_A);
//$num_row = count($result);


//$result = mysql_query($query)or die(mysql_error());
//$num_row = mysql_num_rows($result);

echo '<table id="mytable" class="table table-bordered">
<tr class="table-bg">
<td><strong>Job Id</strong></td>
<td><strong>Position</strong></td>
<td><strong>Function</strong></td>
<td><strong>Location</strong></td>
<td><strong>Status</strong></td>
<td><strong>Create date</strong></td>
<td><strong>Post date</strong></td>
<td><strong>Disable date</strong></td>
<td><strong>Edit</strong></td>
</tr>';


if($result->num_rows >=1 )
 {
while($row = $result->fetch_assoc()){
	$date = date_create($row['Apply_Date']);
        if($row['Status'] == 1){
           $j_status="Enable";
        }else{
        $j_status="Disable";
        }

?>

<tr class="testpag">
<td><?php echo $row['id']; ?></td>
<td class="job-title"><?php echo $row['Title']; ?></td>
<td><?php echo $row['Function']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $j_status; ?></td>
<td><?php echo $row['cdate']; ?></td>
<td><?php echo $row['Post_Date']; ?></td>
<td><?php echo $row['disabledate']; ?></td>
<td><a target="_blank" href="https://bt.konicaminolta.in/career/admin/editjob.php?id=<?php echo $row['id']; ?>"><u>Edit/Save</u></a></td>
</tr>

<?php } }else{ echo "<h5 style='color:red'>"."Results Not Found!"."</h5>";}?>
</table>

<?php
}else{
$query = "SELECT career_job_details.Title,career_job_details.Function,career_job_list.location,career_job_list.id,career_job_list.Status,career_job_details.Post_Date,date_format( career_job_details.Create_Date , ' %m/ %d/ %Y ' ) as cdate,date_format( career_job_details.disable_date , ' %m/ %d/ %Y ' ) as disabledate FROM `career_job_details` INNER JOIN `career_job_list` on career_job_details.id = career_job_list.Job_id ORDER BY id DESC";
//$result = mysqli_query($query)or die(mysqli_error());
//$result = $wpdb->get_results($query, ARRAY_A);
//$num_row = count($result);
$result = $conn->query($query);

//$num_row = mysqli_num_rows($result);

echo '<table id="mytable" class="table table-bordered">
<tr class="table-bg">
<td><strong>Job Id</strong></td>
<td><strong>Position</strong></td>
<td><strong>Function</strong></td>
<td><strong>Location</strong></td>
<td><strong>Status</strong></td>
<td><strong>Create date</strong></td>
<td><strong>Post date</strong></td>
<td><strong>Disable date</strong></td>
<td><strong>Edit</strong></td>
</tr>';
if( $result->num_rows >=1) {
while($row = $result->fetch_assoc()){

if($row['Status'] == 1){
  $j_status="Enable";
  }else{
   $j_status="Disable";
  }
   
?>
<tr class="testpag">
<td><?php echo $row['id']; ?></td>
<td class="job-title"><?php echo $row['Title']; ?></td>
<td><?php echo $row['Function']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $j_status; ?></td>
<td><?php echo $row['cdate']; ?></td>
<td><?php echo $row['Post_Date']; ?></td>
<td><?php echo $row['disabledate']; ?></td>
<td><a target="_blank" href="https://bt.konicaminolta.in/career/admin/editjob.php?id=<?php echo $row['id']; ?>"><u>Edit/Save</u></a></td>
</tr>
<?php } }else{?>
		
<div class="network-company-txt1">Result not found</div>


<?php } }?>
</table>
<div style="clear:both" id="pagination"></div>
</div> 

</div>

</section>

<footer>
<div class="container">
</div>
</footer>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
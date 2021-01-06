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
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link href="https://bt.konicaminolta.in/career/css/simplePagination.css" type="text/css" rel="stylesheet"/>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://bt.konicaminolta.in/career/js/jquery.simplePagination.js"></script>
<script type="text/javascript">
jQuery(function($) {
    var items = $(".testpag");
    var numItems = items.length;
    var perPage = 10;
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
<?php
include('../include/dbConnect.inc.php');

?>

<div class="container main-outer">
<header>
<div class="page-header"><img src="images/logo.jpg"></div>
<h5 align="right"><a href="logout.php">LogOut</a></h5>
</header>

<section>

<div class="col-md-12 table-bordered">
<div class="row job-manager-h"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Job Manager</div>

<div class="row">
<div class="sidebar">
<ul class="nav nav-sidebar nav-pills">
<li><a href="https://bt.konicaminolta.in/career/admin/newjob.php">Add Job</a></li>
<li><a href="https://bt.konicaminolta.in/career/admin/list_jobs.php">Jobs</a></li>
<li><a href="https://bt.konicaminolta.in/career/admin/applications.php">Applications</a></li>
<li class="active"><a href="https://bt.konicaminolta.in/career/admin/applications-without-opening.php">Application Without Opening</a></li>
</ul>
</div>
</div> 
</div>
<div class="col-md-12 table-bordered">
<div class="bg-primary page-title row"><span></span>Application Without Opening</div> 
<div class="main-content table-responsive">
<div style="padding:10px">
<form method="post" action="https://bt.konicaminolta.in/career/admin/applications-without-opening.php">
<div class="col-md-6 col-xs-12">
<input type="text" class="form-control input-sm" placeholder="Search .." name="keyword" required>
</div>
<div class="col-md-2 col-xs-12">
<input type="submit" name="Search" class="btn btn-default btn-sm" value="Search"/>
</div>
</form>
</div>
<span style="float:right;padding:4px" id="textexcel" class="left-down-b"><img src="images/download-icon.png" alt=""></span>
<?php
if (isset($_POST['Search'])) {

	$keyword = $_POST['keyword'];
	$function = $_POST['function'];

$query = "SELECT * FROM `career_applicant_list` where ((Function LIKE '%" . $keyword . "%' OR Position LIKE '%" . $keyword . "%' OR experience LIKE '%" . $keyword . "%' OR current_ctc LIKE '%" . $keyword . "%' OR pf_location LIKE '%" . $keyword . "%') AND (A_type='0')) ORDER BY id DESC";
$result = $conn->query($query);
//$query = "SELECT * FROM `career_applicant_list` where Function LIKE '%" . $keyword . "%' AND A_type='0' ORDER BY id DESC";
//$result = mysql_query($query)or die(mysql_error());
//$num_row = mysql_num_rows($result);


echo '<table id="mytable" class="table table-bordered" style="font-size:11.5px !important">
<tr class="table-bg">
<td><strong>Name</strong></td>
<td><strong>Email</strong></td>
<td><strong>Contact No</strong></td>
<td><strong>Current CTC</strong></td>
<td><strong>Current Company</strong></td>
<td><strong>Preferred Location</strong></td>
<td><strong>Experience</strong></td>
<td><strong>Qualification</strong></td>
<td><strong>Current Position</strong></td>
<td><strong>Function</strong></td>
<td><strong>Apply Date</strong></td>
<td><strong>Download CV</strong></td>
</tr>';
if( $result->num_rows >=1 ) {
  while($row = mysqli_fetch_array($result)){
	$date = date_create($row['Apply_Date']);
?>
<tr class="testpag">
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['Contact_no']; ?><br><?php echo $row['landline_no']; ?></td>
<td><?php echo $row['current_ctc']; ?></td>
<td><?php echo $row['company']; ?></td>
<td><?php echo $row['pf_location']; ?></td>
<td><?php echo $row['experience']; ?></td>
<td><?php echo $row['qualification']; ?></td>
<td><?php echo $row['Position']; ?></td>
<td><?php echo $row['Function']; ?></td>
<td><?php echo date_format($date, 'd/m/y'); ?></td>
<td><a target="_blank" href="https://bt.konicaminolta.in/career/uploads/<?php echo $row['CV_name']; ?>"><u>Download</u></a></td>
</tr>
<?php } }else{ echo "<h5 style='color:red'>"."Results Not Found!"."</h5>";}?>
</table>
<?php
}else{
$query = "SELECT * FROM `career_applicant_list` where A_type='0' ORDER BY id DESC";
$result = $conn->query($query);
//$result = mysql_query($query)or die(mysql_error());
//$num_row = mysqli_num_rows($result);

echo '<table id="mytable" class="table table-bordered" style="font-size:11.5px !important">
<tr class="table-bg">
<td><strong>Name</strong></td>
<td><strong>Email</strong></td>
<td><strong>Contact No</strong></td>
<td><strong>Current CTC</strong></td>
<td><strong>Current Company</strong></td>
<td><strong>Preferred Location</strong></td>
<td><strong>Experience</strong></td>
<td><strong>Qualification</strong></td>
<td><strong>Current Position</strong></td>
<td><strong>Function</strong></td>
<td><strong>Apply Date</strong></td>
<td><strong>Download CV</strong></td>
</tr>';
if($result->num_rows >=1) {
   while($row = mysqli_fetch_array($result)){
	$date = date_create($row['Apply_Date']);
?>
<tr class="testpag">
<td><?php echo $row['Name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['Contact_no']; ?><br><?php echo $row['landline_no']; ?></td>
<td><?php echo $row['current_ctc']; ?></td>
<td><?php echo $row['company']; ?></td>
<td><?php echo $row['pf_location']; ?></td>
<td><?php echo $row['experience']; ?></td>
<td><?php echo $row['qualification']; ?></td>
<td><?php echo $row['Position']; ?></td>
<td><?php echo $row['Function']; ?></td>
<td><?php echo date_format($date, 'd/m/y'); ?></td>
<td><a target="_blank" href="https://bt.konicaminolta.in/career/uploads/<?php echo $row['CV_name']; ?>"><u>Download</u></a></td>
</tr>
<?php } }}?>
</table>
<div id="pagination"></div>
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

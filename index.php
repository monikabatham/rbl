<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Konica Minolta</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="container">
<div class="row">

<div class="col-sm-9">
<div class="career-banner"><img src="images/carrrer-banner.jpg" class="img-responsive"></div>

<div class="jobApplication-header">Current Openings</div>
<div class="panel src-panel">
<div class="panel-body">
<div class="row">
<div class="col-md-6 col-xs-12">
<input type="text" class="form-control input-sm" placeholder="Keyword, Skills">
</div>
<div class="col-md-4 col-xs-12">
<select class="form-control input-sm">
<option>General function</option>
<option>-- Select 1 --</option>
<option>-- Select 2 --</option>
<option>-- Select 3 --</option>
</select>
</div>
<div class="col-md-2 col-xs-12">
<button type="submit" class="btn btn-default btn-sm">Search</button>
</div>
</div>
</div>
</div>
<div class="table-responsive">



<?php include('include/dbConnect.inc.php');

$query = "SELECT career_job_details.Title,career_job_details.Function,career_job_list.location,career_job_list.id,career_job_list.Status,career_job_details.Post_Date FROM `career_job_details` INNER JOIN `career_job_list` on career_job_details.id = career_job_list.Job_id";
$result = mysql_query($query)or die(mysql_error());
$num_row = mysql_num_rows($result);

echo '<table class="table table-bordered">
<tr class="table-bg">
<td><strong>Job Title</strong></td>
<td><strong>Function</strong></td>
<td><strong>Location</strong></td>
<td><strong>Post Date</strong></td>
<td><strong>Job details</strong></td>
</tr>';
if( $num_row >=1 ) {

while($row = mysql_fetch_array($result)){
   
?>
<tr>
<td class="job-title"><?php echo $row['Title']; ?></td>
<td><?php echo $row['Function']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $row['Post_Date']; ?></td>
<td><a target="_blank" href="http://swaransoft.co.in/btkonica/career/admin/editjob.php?id=<?php echo $row['id']; ?>"><u>View & Apply</u></a></td>
</tr>
<?php } }else{?>
</table>		
<div class="network-company-txt1">Result not found</div>
<?php } ?>




</div>
<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
<p class="job-bottom-text">Could not find a suitable position ?<br>
  <strong><a href="#">Click here</a></strong> to apply and we will revert back to you if a suitable position comes up.</p>
</div>

<div class="col-sm-3">
Right panel
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

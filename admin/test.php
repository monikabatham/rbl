
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Konica Minolta</title>
   <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    
<link href="http://bt.konicaminolta.in/career/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="http://bt.konicaminolta.in/career/admin/css/styles.css" rel="stylesheet">

  <script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <style>
  
  .nicEdit-main {padding: 2% 4% 2% 2%; text-align:justify !important;}
  </style>

</head>

<body>
  
<?php
include('../include/dbConnect.inc.php');

if($_SERVER['REQUEST_METHOD'] == 'POST')  {
if (isset($_POST['submit'])) {
	
	$function = $_POST['function'];
	$title = $_POST['title'];
	$salary = $_POST['salary'];
	$skills = $_POST['skills'];
	$qulification = $_POST['qulification'];
	$experience = $_POST['experience'];
	$start_date = $_POST['start_date'];
	$location = $_POST['location'];
	$description = mysql_real_escape_string($_POST['descrip']);
	echo $description;
//echo $function,$title,$salary,$skills,$qulification,$experience,$start_date,$description;
$sql_req = mysql_query("INSERT INTO `career_job_details` SET Title = '$title',Function = '$function',Qualification = '$qulification',Skills = '$skills',Experience = '$experience',Salary = '$salary',Description = '$description',Post_Date = '$start_date',Create_Date = now()" );
If($sql_req){
$sql = mysql_query("SELECT * FROM career_job_details WHERE id=(SELECT MAX(id) FROM career_job_details)" );

if (mysql_num_rows($sql) > 0) {
    while($row = mysql_fetch_assoc($sql)) {
        $ID= $row["id"];
    }
} 


foreach ($location as $loc)
{
$request = mysql_query("INSERT INTO `career_job_list` SET Job_id = '$ID',Function = '$function',Status = '1',location = '$loc'" );
}

If($request){
echo "<h5 style='color:green;text-align: center;'>"."Job Added Successfully!"."<h5>";
}
  
}



}}

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
<li class="active"><a href="http://bt.konicaminolta.in/career/admin/newjob.php">Add Job</a></li>
<li><a href="http://bt.konicaminolta.in/career/admin/list_jobs.php">Jobs</a></li>
<li><a href="http://bt.konicaminolta.in/career/admin/applications.php">Applications</a></li>
<li><a href="http://bt.konicaminolta.in/career/admin/applications-without-opening.php">Application Without Opening</a></li>
</ul>
</div>
</div> 
</div>
<div class="col-md-9 table-bordered main-right">
<div class="bg-primary page-title row"><span></span>Add New Job</div> 
<form class="form-horizontal main-content" action="#" method="post">
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Job ID</label>
<div class="col-sm-6">
<p class="form-control-static">New</p>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Function<span style="color:red">*</span></label>
<div class="col-sm-6">
<select class="form-control" name="function" required>
  		     <option value="">Select Function</option>
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
</select>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Title<span style="color:red">*</span></label>
<div class="col-sm-6">
<input class="form-control" id="inputEmail3" name="title" type="text" placeholder="i.e Software Engg." required/>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">CTC</label>
<div class="col-sm-6">
<!--<input class="form-control" id="inputEmail3" name="salary" type="text" placeholder="i.e 2 to 4 lac/a" />-->
<select name="salary" class="form-control" />
 <option value="">Select Annual Salary</option>
  <option value="0 to 2 Lac">Not Disclosed</option>
  <option value="0 to 2 Lac">0 to 2 Lac</option>
  <option value="2 to 4 Lac">2 to 4 Lac</option>
  <option value="4 to 6 Lac">4 to 6 Lac</option>
   <option value="6 to 8 Lac">6 to 8 Lac</option>
  <option value="8 to 10 Lac">8 to 10 Lac</option>
  <option value="10 to 12 Lac">10 to 12 Lac</option>
   <option value="12 to 14 Lac">12 to 14 Lac</option>
  <option value="14 to 16 Lac">14 to 16 Lac</option>
  <option value="16 to Above">16 to Above</option>
 </select>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Skills<span style="color:red">*</span></label>
<div class="col-sm-6">
<input class="form-control" id="inputEmail3" name="skills" type="text" placeholder="i.e HTML/JAVA/PHP"  required/>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Qualification<span style="color:red">*</span></label>
<div class="col-sm-6">
<input class="form-control" id="inputEmail3" name="qulification" type="text" placeholder="i.e B.tech"  required/>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Experience<span style="color:red">*</span></label>
<div class="col-sm-6">
<!--<input class="form-control" id="inputEmail3" name="experience" type="text" placeholder="i.e 1 -3 years"  required/>-->
<select name="experience" class="form-control" required/>
  <option value="">Select Experience Level</option>
  <option value="0-1 year">0-1 year</option>
  <option value="1-3 years">1-3 years</option>
  <option value="3-6 Years">3-6 Years</option>
  <option value="6-9 Years">6-9 Years</option>
  <option value="9-15 Years">9-15 Years</option>
  <option value="More than 15 Years">More than 15 Years</option>
</select>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Start Date<span style="color:red">*</span></label>
<div class="col-sm-6">
<input class="form-control" name="start_date" type="text" id="datepicker-7" required/>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Location<span style="color:red">*</span></label>
<div class="col-sm-6">
<select multiple class="form-control" name="location[ ]" required>
   <option value="">Select Locations-</option>
<optgroup label="Chandigarh Tricity">
<option value="Chandigarh">Chandigarh</option>
<option value="Mohali">Mohali</option>
<option value="Panchkula">Panchkula</option>
</optgroup><optgroup label="Mumbai (All)">
<option value="Mumbai">Mumbai</option>
<option value="Navi Mumbai">Navi Mumbai</option>
<option value="Thane">Thane</option></optgroup>
<optgroup label="Delhi/NCR">
<option value="Alwar">Alwar</option>
<option value="Baghpat">Baghpat</option>
<option value="Bahadurgarh">Bahadurgarh</option>
<option value="Bhiwadi">Bhiwadi</option>
<option value="Bulandshahr">Bulandshahr</option>
<option value="Delhi">Delhi</option>
<option value="Delhi - Other">Delhi - Other</option>
<option value="Faridabad">Faridabad</option>
<option value="Ghaziabad">Ghaziabad</option>
<option value="Greater Noida">Greater Noida</option>
<option value="Gurgaon">Gurgaon</option>
<option value="Hapur">Hapur</option>
<option value="Jhajjar">Jhajjar</option>
<option value="Karnal">Karnal</option>
<option value="Meerut">Meerut</option>
<option value="Neemrana">Neemrana</option>
<option value="Noida">Noida</option>
<option value="Panipat">Panipat</option>
<option value="Rohtak">Rohtak</option>
<option value="Sonepat">Sonepat</option>
</optgroup><optgroup label="Metro Cities">
<option value="Bangalore">Bangalore</option>
<option value="Chennai">Chennai</option>
<option value="Hyderabad">Hyderabad</option>
<option value="Kolkata">Kolkata</option>
<option value="Pune">Pune</option>
</optgroup><optgroup label="Andaman Nicobar Islands">
<option value="Andaman Nicobar Islands">Andaman Nicobar Islands</option>
</optgroup><optgroup label="Andhra Pradesh">
<option value="Anantapur">Anantapur</option>
<option value="Andhra Pradesh - Other">Andhra Pradesh - Other</option>
<option value="Chittoor">Chittoor</option>
<option value="East Godavari">East Godavari</option>
<option value="Guntur">Guntur</option>
<option value="Kadapa">Kadapa</option>
<option value="Kakinada">Kakinada</option>
<option value="Krishna">Krishna</option>
<option value="Kurnool">Kurnool</option>
<option value="Nellore">Nellore</option>
<option value="Prakasam">Prakasam</option>
<option value="Rajahmundry">Rajahmundry</option>
<option value="Tirupati">Tirupati</option>
<option value="Vijayawada">Vijayawada</option>
<option value="Visakhapatnam">Visakhapatnam</option>
<option value="Vizianagarams">Vizianagaram</option>
<option value="West Godavari">West Godavari</option>
</optgroup><optgroup label="Arunachal Pradesh">
<option value="Arunachal Pradesh - Other">Arunachal Pradesh - Other</option>
<option value="Itanagar">Itanagar</option></optgroup>
<optgroup label="Assam">
<option value="Assam - Other">Assam - Other</option>
<option value="Dibrugarh">Dibrugarh</option>
<option value="Dispur">Dispur</option>
<option value="Guwahati">Guwahati</option>
<option value="Jorhat">Jorhat</option>
<option value="Nagaon">Nagaon</option>
<option value="North Lakhimpur">North Lakhimpur</option>
<option value="Silchar">Silchar</option>
<option value="Tezpur">Tezpur</option>
</optgroup>
<optgroup label="Bihar">
<option value="Arrah">Arrah</option>
<option value="Bhagalpur">Bhagalpur</option>
<option value="Bihar - Other">Bihar - Other</option>
<option value="Gaya">Gaya</option>
<option value="Hajipur">Hajipur</option>
<option value="Muzaffarpur">Muzaffarpur</option>
<option value="Nalanda">Nalanda</option>
<option value="Patna">Patna</option>
<option value="Rajgir">Rajgir</option>
<option value="Vaishali">Vaishali</option>
</optgroup><optgroup label="Chandigarh">
<option value="Chandigarh">Chandigarh</option>
</optgroup><optgroup label="Chhattisgarh">
<option value="Bhilai">Bhilai</option>
<option value="BilasPur">BilasPur</option>
<option value="Bilaspur(CG)">Bilaspur(CG)</option>
<option value="Chhattisgarh - Other">Chhattisgarh - Other</option>
<option value="Chirimiri">Chirimiri</option>
<option value="Korba">Korba</option>
<option value="Raigarh">Raigarh</option>
<option value="Raipur">Raipur</option>
</optgroup>
<optgroup label="Dadra And Nagar Haveli">
<option value="Dadra And Nagar Haveli - Other">Dadra And Nagar Haveli - Other</option>
<option value="Silvassa">Silvassa</option>
</optgroup>
<optgroup label="Daman &amp; Diu">
<option value="Daman &amp; Diu">Daman &amp; Diu</option>
</optgroup>
<optgroup label="Delhi">
<option value="Delhi">Delhi</option>
<option value="Delhi - Other">Delhi - Other</option>
</optgroup>
<optgroup label="Goa">
<option value="Canacona">Canacona</option>
<option value="Goa - Other">Goa - Other</option>
<option value="Mapusa">Mapusa</option>
<option value="Margao">Margao</option>
<option value="Old Goa">Old Goa</option>
<option value="Panaji">Panaji</option>
<option value="Ponda">Ponda</option>
<option value="Vasco Da Gama">Vasco Da Gama</option>
</optgroup>
<optgroup label="Gujarat">
<option value="Adipur">Adipur</option>
<option value="Ahmedabad">Ahmedabad</option>
<option value="Anand">Anand</option>
<option value="Bharuch">Bharuch</option>
<option value="Bhavnagar">Bhavnagar</option>
<option value="Gandhidham">Gandhidham</option>
<option value="Gandhinagar">Gandhinagar</option>
<option value="Gujarat - Other">Gujarat - Other</option>
<option value="Jamnagar">Jamnagar</option>
<option value="Kutch District">Kutch District</option>
<option value="Navsari">Navsari</option>
<option value="Rajkot">Rajkot</option>
<option value="Surat">Surat</option>
<option value="Vadodara">Vadodara</option>
<option value="Vapi">Vapi</option>
</optgroup>
<optgroup label="Haryana">
<option value="Ambala">Ambala</option>
<option value="Bahadurgarh">Bahadurgarh</option>
<option value="Faridabad">Faridabad</option>
<option value="Gurgaon">Gurgaon</option>
<option value="Haryana - Other">Haryana - Other</option>
<option value="Hisar">Hisar</option>
<option value="Jhajjar">Jhajjar</option>
<option value="Kaithal">Kaithal</option>
<option value="Karnal">Karnal</option>
<option value="Kurukshetra">Kurukshetra</option>
<option value="Murthal">Murthal</option>
<option value="Panchkula">Panchkula</option>
<option value="Panipat">Panipat</option>
<option value="Rewari">Rewari</option>
<option value="Rohtak">Rohtak</option>
<option value="Sonepat">Sonepat</option>
<option value="Yamuna Nagar">Yamuna Nagar</option>
</optgroup>
<optgroup label="Himachal Pradesh">
<option value="Dharamsala">Dharamsala</option>
<option value="Hamirpur">Hamirpur</option>
<option value="Himachal Pradesh - Other">Himachal Pradesh - Other</option>
<option value="Kullu">Kullu</option>
<option value="Manali">Manali</option>
<option value="Mandi">Mandi</option>
<option value="Shimla">Shimla</option>
<option value="Sirmour">Sirmour</option>
<option value="Solan">Solan</option>
<option value="Una">Una</option>
</optgroup>
<optgroup label="Jammu and Kashmir">
<option value="Gulmarg">Gulmarg</option>
<option value="Jammu">Jammu</option>
<option value="Jammu &amp; Kashmir - Other">Jammu &amp; Kashmir - Other</option>
<option value="Ladakh">Ladakh</option>
<option value="Leh">Leh</option>
<option value="Pahalgam">Pahalgam</option>
<option value="Srinagar">Srinagar</option>
</optgroup>
<optgroup label="Jharkhand">
<option value="Bokaro Steel City">Bokaro Steel City</option>
<option value="Dhanbad">Dhanbad</option>
<option value="Hazaribagh">Hazaribagh</option>
<option value="Jamshedpur">Jamshedpur</option>
<option value="Jharkhand - Other">Jharkhand - Other</option>
<option value="Ramgarh">Ramgarh</option>
<option value="Ranchi">Ranchi</option>
</optgroup>
<optgroup label="Karnataka">
<option value="Bangalore">Bangalore</option>
<option value="Belgaum">Belgaum</option>
<option value="Bidar">Bidar</option>
<option value="Bijapur">Bijapur</option>
<option value="Chikballpura">Chikballpura</option>
<option value="Chitradurga">Chitradurga</option>
<option value="Coorg">Coorg</option>
<option value="Davangere">Davangere</option>
<option value="Dharwad">Dharwad</option>
<option value="Doballapura">Doballapura</option>
<option value="Gulbarga">Gulbarga</option>
<option value="Hampi">Hampi</option>
<option value="Hassan">Hassan</option>
<option value="Hoskote">Hoskote</option>
<option value="Hubli">Hubli</option>
<option value="Karnataka - Other">Karnataka - Other</option>
<option value="Mangalore">Mangalore</option>
<option value="Manipal">Manipal</option>
<option value="Mysore">Mysore</option>
<option value="Raichur">Raichur</option>
<option value="Shimoga">Shimoga</option>
<option value="Tumkur">Tumkur</option>
<option value="Udupi">Udupi</option>
</optgroup>
<optgroup label="Kerala">
<option value="Alleppey">Alleppey</option>
<option value="Amritapuri">Amritapuri</option>
<option value="Calicut">Calicut</option>
<option value="Ernakulum">Ernakulum</option>
<option value="Idukki">Idukki</option>
<option value="Kannur">Kannur</option>
<option value="Kasargode">Kasargode</option>
<option value="Kerala - Other">Kerala - Other</option>
<option value="Kochi">Kochi</option>
<option value="Kollam">Kollam</option>
<option value="Kottayam">Kottayam</option>
<option value="Kovalam">Kovalam</option>
<option value="Kozhikode">Kozhikode</option>
<option value="Kumarakom">Kumarakom</option>
<option value="Munnar">Munnar</option>
<option value="Palakkad">Palakkad</option>
<option value="Pathanamthitta">Pathanamthitta</option>
<option value="Thekkady">Thekkady</option>
<option value="Thiruvananthapuram">Thiruvananthapuram</option>
<option value="Thrissur">Thrissur</option>
<option value="Trivandrum">Trivandrum</option>
<option value="Wayanad">Wayanad</option>
</optgroup>
<optgroup label="Lakshadweep">
<option value="Lakshadweep">Lakshadweep</option>
</optgroup><optgroup label="Madhya Pradesh">
<option value="Bhopal">Bhopal</option>
<option value="Dewas">Dewas</option>
<option value="Gwalior">Gwalior</option>
<option value="Indore">Indore</option>
<option value="Jabalpur">Jabalpur</option>
<option value="Khajuraho">Khajuraho</option>
<option value="Madhya Pradesh - Other">Madhya Pradesh - Other</option>
<option value="Orchha">Orchha</option>
<option value="Sagar">Sagar</option>
<option value="Singrauli">Singrauli</option>
<option value="Ujjain">Ujjain</option>
</optgroup>
<optgroup label="Maharashtra">
<option value="Ahmednagar">Ahmednagar</option>
<option value="Akola">Akola</option>
<option value="Amravati">Amravati</option>
<option value="Aurangabad">Aurangabad</option>
<option value="Baramati">Baramati</option>
<option value="Chandrapur">Chandrapur</option>
<option value="Dhule">Dhule</option>
<option value="Jalgaon">Jalgaon</option>
<option value="Kolhapur">Kolhapur</option>
<option value="Latur">Latur</option>
<option value="Maharashtra - Other">Maharashtra - Other</option>
<option value="Mumbai">Mumbai</option>
<option value="Nagpur">Nagpur</option>
<option value="Nanded">Nanded</option>
<option value="Nashik">Nashik</option>
<option value="Navi Mumbai">Navi Mumbai</option>
<option value="Parbhani">Parbhani</option>
<option value="Pune">Pune</option>
<option value="Raigad">Raigad</option>
<option value="Raigarh Pen">Raigarh Pen</option>
<option value="Ratnagiri">Ratnagiri</option>
<option value="Sangli">Sangli</option>
<option value="Satara">Satara</option>
<option value="Shirpur">Shirpur</option>
<option value="Solapur">Solapur</option>
<option value="Thane">Thane</option>
<option value="Ulhasnagar">Ulhasnagar</option>
<option value="Wardha">Wardha</option>
<option value="Yavatmal">Yavatmal</option>
</optgroup>
<optgroup label="Manipur">
<option value="Imphal">Imphal</option>
<option value="Manipur - Other">Manipur - Other</option>
</optgroup>
<optgroup label="Meghalaya">
<option value="Meghalaya - Other">Meghalaya - Other</option>
<option value="Shillong">Shillong</option>
</optgroup>
<optgroup label="Mizoram">
<option value="Aizawl">Aizawl</option>
<option value="Mizoram - Other">Mizoram - Other</option>
</optgroup>
<optgroup label="Nagaland">
<option value="Kohima">Kohima</option>
<option value="Nagaland - Other">Nagaland - Other</option>
</optgroup>
<optgroup label="Orissa">
<option value="Angul">Angul</option>
<option value="Bhubaneswar">Bhubaneswar</option>
<option value="Brahmapur">Brahmapur</option>
<option value="Cuttack">Cuttack</option>
<option value="Ganjam">Ganjam</option>
<option value="Jajpur">Jajpur</option>
<option value="Konark">Konark</option>
<option value="Orissa - Other">Orissa - Other</option>
<option value="Puri">Puri</option>
<option value="Rourkela">Rourkela</option>
<option value="Sambalpur">Sambalpur</option>
</optgroup>
<optgroup label="Pondicherry">
<option value="172">Pondicherry</option>
</optgroup>
<optgroup label="Punjab">
<option value="Amritsar">Amritsar</option>
<option value="Bathinda">Bathinda</option>
<option value="Faridkot">Faridkot</option>
<option value="Ferozpur">Ferozpur</option>
<option value="Hoshiarpur">Hoshiarpur</option>
<option value="Jalandhar">Jalandhar</option>
<option value="Ludhiana">Ludhiana</option>
<option value="Moga">Moga</option>
<option value="Mohali">Mohali</option>
<option value="Muktsar">Muktsar</option>
<option value="Nangal">Nangal</option>
<option value="Nawanshahar">Nawanshahar</option>
<option value="Patiala">Patiala</option>
<option value="Phagwara">Phagwara</option>
<option value="Punjab - Other">Punjab - Other</option>
<option value="Ropar">Ropar</option>
</optgroup>
<optgroup label="Rajasthan">
<option value="Ajmer">Ajmer</option>
<option value="Alwar">Alwar</option>
<option value="Bharatpur">Bharatpur</option>
<option value="Bhilwara">Bhilwara</option>
<option value="Bhiwadi">Bhiwadi</option>
<option value="Bikaner">Bikaner</option>
<option value="Bundi">Bundi</option>
<option value="Jaipur">Jaipur</option>
<option value="Jaisalmer">Jaisalmer</option>
<option value="Jhunjhunu">Jhunjhunu</option>
<option value="Jodhpur">Jodhpur</option>
<option value="Kota">Kota</option>
<option value="Neemrana">Neemrana</option>
<option value="Pilani">Pilani</option>
<option value="Rajasthan - Other">Rajasthan - Other</option>
<option value="Ranakpur">Ranakpur</option>
<option value="Shekhawati">Shekhawati</option>
<option value="Sikar">Sikar</option>
<option value="Sriganaganagar">Sriganaganagar</option>
<option value="Udaipur">Udaipur</option>
</optgroup>
<optgroup label="Sikkim">
<option value="86">Gangtok</option>
<option value="187">Sikkim - Other</option>
</optgroup>
<optgroup label="Tamil Nadu">
<option value="Chennai">Chennai</option>
<option value="Coimbatore">Coimbatore</option>
<option value="Erode">Erode</option>
<option value="Hosur">Hosur</option>
<option value="Kanchipuram">Kanchipuram</option>
<option value="Kanyakumari">Kanyakumari</option>
<option value="Karaikudi">Karaikudi</option>
<option value="Karur">Karur</option>
<option value="Kodaikanal">Kodaikanal</option>
<option value="Madurai">Madurai</option>
<option value="Nagercoil">Nagercoil</option>
<option value="Namakkal">Namakkal</option>
<option value="Neyveli">Neyveli</option>
<option value="Ooty">Ooty</option>
<option value="Rameshwaram">Rameshwaram</option>
<option value="Salem">Salem</option>
<option value="Tamil Nadu - Other">Tamil Nadu - Other</option>
<option value="Thanjavur">Thanjavur</option>
<option value="Tiruchirappalli">Tiruchirappalli</option>
<option value="Tirunelveli">Tirunelveli</option>
<option value="Vellore">Vellore</option>
<option value="Virudhunagar">Virudhunagar</option>
</optgroup>
<optgroup label="Telangana">
<option value="Hyderabad">Hyderabad</option>
<option value="Karimnagar">Karimnagar</option>
<option value="Khammam">Khammam</option>
<option value="Medak">Medak</option>
<option value="Nalgonda">Nalgonda</option>
<option value="Nizamabad">Nizamabad</option>
<option value="Ranga Reddy">Ranga Reddy</option>
<option value="Secunderabad">Secunderabad</option>
<option value="Telangana-Other">Telangana-Other</option>
<option value="Warangal">Warangal</option>
</optgroup>
<optgroup label="Tripura">
<option value="Agartala">Agartala</option>
<option value="Tripura - Other">Tripura - Other</option>
</optgroup>
<optgroup label="Uttar Pradesh">
<option value="Agra">Agra</option>
<option value="Aligarh">Aligarh</option>
<option value="Allahabad">Allahabad</option>
<option value="Baghpat">Baghpat</option>
<option value="Bareilly">Bareilly</option>
<option value="Bulandshahr">Bulandshahr</option>
<option value="Dadri">Dadri</option>
<option value="Ghaziabad">Ghaziabad</option>
<option value="Ghazipur">Ghazipur</option>
<option value="Gorakhpur">Gorakhpur</option>
<option value="Greater Noida">Greater Noida</option>
<option value="Hapur">Hapur</option>
<option value="Jaunpur">Jaunpur</option>
<option value="Jhansi">Jhansi</option>
<option value="Kanpur">Kanpur</option>
<option value="Lucknow">Lucknow</option>
<option value="Mathura">Mathura</option>
<option value="Meerut">Meerut</option>
<option value="Modinagar">Modinagar</option>
<option value="Moradabad">Moradabad</option>
<option value="Muzaffarnagar">Muzaffarnagar</option>
<option value="Noida">Noida</option>
<option value="Saharanpur">Saharanpur</option>
<option value="Uttar Pradesh - Other">Uttar Pradesh - Other</option>
<option value="Varanasi">Varanasi</option>
</optgroup>
<optgroup label="Uttarakhand">
<option value="Dehradun">Dehradun</option>
<option value="Haldwani">Haldwani</option>
<option value="Haridwar">Haridwar</option>
<option value="Nainital">Nainital</option>
<option value="Rishikesh">Rishikesh</option>
<option value="Roorkee">Roorkee</option>
<option value="Rudrapur">Rudrapur</option>
<option value="Uttarakhand - Other">Uttarakhand - Other</option>
</optgroup>
<optgroup label="West Bengal">
<option value="Asansol">Asansol</option>
<option value="Bardhaman">Bardhaman</option>
<option value="Darjeeling">Darjeeling</option>
<option value="District 24 Parganas">District 24 Parganas</option>
<option value="Durgapur">Durgapur</option>
<option value="Haldia">Haldia</option>
<option value="Howrah">Howrah</option>
<option value="Kalyani">Kalyani</option>
<option value="Kharagpur">Kharagpur</option>
<option value="Kolkata">Kolkata</option>
<option value="Malda">Malda</option>
<option value="Midnapore">Midnapore</option>
<option value="Murshidabad">Murshidabad</option>
<option value="Naihati">Naihati</option>
<option value="Serampore">Serampore</option>
<option value="Siliguri">Siliguri</option>
<option value="West Bengal - Other">West Bengal - Other</option>
</optgroup>   
</select>
</div>
</div>
<div class="form-group">
    <label for="exampleInputEmail1" class="col-sm-12">Job Information</label>
    <div class="col-sm-12">
    <textarea class="form-control" name="descrip" rows="8" ></textarea>
    </div>
  </div>
<div class="form-group">
<div class="col-sm-12">
<input type="submit" class="btn btn-primary" name="submit" value="Create Job" />
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
<script src="http://bt.konicaminolta.in/career/admin/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-7" ).datepicker({
               defaultDate:+0,
               dayNamesMin: [ "Su", "Mo", "Tu", "We", "Thu", "Fr", "Sa" ],
               duration: "slow"
            });
         });
      </script>
</body>
</html>

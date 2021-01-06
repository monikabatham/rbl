
<?php
$server = "localhost";
    $db_user = "brandsro_testu"; 
    $db_pass = "test@user";  
    $db_name = "brandsro_testdb";
    if(!($db = @mysql_connect($server, $db_user, $db_pass)))
    die("Couldn't connect to the database1.");
    if(!@mysql_select_db($db_name, $db))
    die("Database doesn't exist!");
	$email="monika@swaaransoft.com";

$qry = mysqli_query("SELECT * FROM career_applicant_list");
$data = "";
while($row = mysqli_fetch_array($qry)) {
  $data .= $row['Name'].",".$row['Location'].",".$row['email'].",".$row['Function']."\n";
}

header('Content-Type: application/csv');
header('Content-Disposition: attachement; filename="filename.csv"');
echo $data; exit();
?>
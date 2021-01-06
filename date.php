
<?php

$server = "localhost";
    $db_user = "brandsro_testu"; 
    $db_pass = "test@user";  
    $db_name = "brandsro_testdb";
    if(!($db = @mysql_connect($server, $db_user, $db_pass)))
    die("Couldn't connect to the database1.");
    if(!@mysql_select_db($db_name, $db))
    die("Database doesn't exist!");
	$email="anandwebinfo12@gmail.com";

$query = "select * from `career_applicant_list` WHERE email = '". $email . "'";
$result = mysql_query($query)or die(mysql_error());
$num_row = mysql_num_rows($result);
if( $num_row >=1 ) {
while($row = mysql_fetch_array($result)){
$dt2=$row['Apply_Date'];
}}
$dt1 = date("Y-m-d h:i:s");
$date2 = new DateTime($dt1);
$date = new DateTime($dt2);


$diffInSeconds = $date2->getTimestamp() - $date->getTimestamp();
echo $diffInSeconds;


if($diffInSeconds < 15552000){
	?>
	  <script>
     alert("you are not eligible to apply more than one times within 6 months.");
      </script>
<?php
}

/*
$dt1 = date("Y-m-d h:i:s");
$date2 = new DateTime($dt1);
$date = new DateTime( '2009-10-05 18:07:13' );


$diffInSeconds = $date2->getTimestamp() - $date->getTimestamp();
echo $diffInSeconds;
*/
?>
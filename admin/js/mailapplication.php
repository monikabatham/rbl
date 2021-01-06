<?php

$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$email=$_REQUEST['email'];
$address=$_REQUEST['address'];
$city=$_REQUEST['city'];
$state=$_REQUEST['state'];
$phone=$_REQUEST['phone'];
$cctc=$_REQUEST['cctc'];
$experience=$_REQUEST['experience'];
$industry=$_REQUEST['industry'];
$message=$_REQUEST['message'];
$resume=$_REQUEST['resume'];
$rname1=$_REQUEST['rname1'];
$rfunction1=$_REQUEST['rfunction1'];
$rphone1=$_REQUEST['rphone1'];
$rname1=$_REQUEST['rname2'];
$rfunction1=$_REQUEST['rfunction2'];
$rphone1=$_REQUEST['rphone2'];
$rname1=$_REQUEST['rname3'];
$rfunction1=$_REQUEST['rfunction3'];
$rphone1=$_REQUEST['rphone3'];
$rname1=$_REQUEST['rname4'];
$rfunction1=$_REQUEST['rfunction4'];
$rphone1=$_REQUEST['rphone4'];
$rname1=$_REQUEST['rname5'];
$rfunction1=$_REQUEST['rfunction5'];
$rphone1=$_REQUEST['rphone5'];


$mailto="anand.mishra@swaransoft.com";
$subject="Application form";
$filename= $resume;
$path=$_SERVER['DOCUMENT_ROOT']."/btkonica/career/uploads/";
$file = $path.$filename;
$file_size = filesize($file);
$handle = fopen($file, "r");
$content = fread($handle, $file_size);
fclose($handle);
$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$name = basename($file);


$message="<table width='600' cellpadding='7' cellspacing='5' >
  <tr>
    <td ><strong>Name :</strong></td>
    <td >$fname</td>
  </tr>
  
  
  <tr>
    <td ><strong>Email Id :</strong></td>
    <td >$email</td>
  </tr>
  <tr>
    <td><strong>Contact No :</strong></td>
    <td>$phone</td>
  </tr>
  <tr>
    <td><strong>Address</strong></td>
    <td>$address</td>
  </tr>
  <tr>
    <td><strong>City</strong></td>
    <td>$city</td>
  </tr>
  <tr>
    <td><strong>State</strong></td>
    <td>$state</td>
  </tr>
  <tr>
    <td><strong>Current CTC:</strong></td>
    <td>$cctc</td>
  </tr>
  <tr>
    <td><strong>Experience</strong></td>
    <td>$experience</td>
  </tr>
  <tr>
    <td><strong>Message</strong></td>
    <td>$message</td>
  </tr>
</table>";  

// header
$header = "From: ".$fname." <".$email.">\r\n";
$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

// message & attachment
$nmessage = "--".$uid."\r\n";
$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= $message."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";

if (mail($mailto, $subject, $nmessage, $header)) { 
	echo $resume . "- Mail Sent successfully.";
 } else {
  return false;
} ?>
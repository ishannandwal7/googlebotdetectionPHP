<?php
$suspicious_level=0; 
//checking for windows 10/7 or apple
$useragent=$_SERVER['HTTP_USER_AGENT'];           //php method to get user agent
if(stripos($useragent,"Windows NT 10.0")>0 or stripos($useragent,"Windows NT 6.1")>0  or  stripos($useragent,"iPhone")>0 or  stripos($useragent,"Macintosh")>0){
    $suspicious_level--; 
}
else{
    header("location:bot_detected.php");         //change the location of page for bots.
    $suspicious_level++; //if user is not from windows or apple then suspicious level increases
}
// display resolution 
$width="<script>document.write(screen.width);</script>";   //to get the width of user screen 
$height="<script>document.write(screen.height);</script>";   //to get the height of user screen 
if($width==0 or $height==0){
    $suspicious_level++;
    header("location:bot_detected.php");         //change the location of page for bots.

}
// DNS lookup
$ipaddress=$_SERVER['REMOTE_ADDR'];          //to get the ip address of user or bot
$hostname = gethostbyaddr($ipaddress);       //to get the host name from ip address
if (stripos(strrev($hostname), strrev( 'googlebot.com')) === 0 or stripos(strrev($hostname),strrev('google.com')) === 0 ) 
{
    $suspicious_level++;
    header("location:bot_detected.php");         //change the location of page for bots.

}
//checking for google bot ip address
if($ipaddress=="64.68.90.1" or $ipaddress=="64.68.90.255" or $ipaddress=="64.233.173.193" or $ipaddress=="64.233.173.255" or $ipaddress=="66.249.64.1" or $ipaddress=="66.249.79.255" or $ipaddress=="216.239.33.96" or $ipaddress=="216.239.59.128"){
$suspicious_level++;
header("location:bot_detected.php");         //change the location of page for bots.

}
//checking user agent
if(stripos($useragent,"bot")>0){
    $suspicious_level++;
    header("location:bot_detected.php");         //change the location of page for bots.

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REAL-USER </title>


</head>
<body>
    <h1 >Webpage for real user</h1>
</body>
</html>
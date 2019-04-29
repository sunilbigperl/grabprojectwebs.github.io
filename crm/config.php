<?php
$urisegment=$_SERVER['HTTP_HOST'];
if($urisegment == "localhost"){
$link = mysqli_connect('localhost', 'root','','crm');
}else{
$link = mysqli_connect('localhost','grabwebs@123','admin@123','grabwebsdb');
}

if (!$link) {
    die('Not connected : ' . mysqli_error());
}
/*$link=mysqli_connect("crm.way2gps.com","c0crmway2gps","admin@123","c0crmway2gps");
if($link){
	echo "connected";
}else{
	echo "not connected";
}
//$res=mysqli_select_db($link,"c0crmway2gps"); */



/*$con=mysqli_connect("localhost","grabwebs@123","admin@123");

$link=mysqli_select_db($con,"grabwebsdb");*/
?>
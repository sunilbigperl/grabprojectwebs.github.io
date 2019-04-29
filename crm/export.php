<?php
error_reporting(0);
$urisegment=$_SERVER['HTTP_HOST'];
if($urisegment == "localhost"){
$connect = mysqli_connect('localhost', 'root','','bigperlt_bpearl');
define('CSV_PATH','C:/wamp/www/crm_bp/csvfiles/'); // specify CSV file path
}else{
$connect = mysqli_connect('localhost', 'bigperluser','bigperlpwd','bigperldb');
define('CSV_PATH','http://grabwebs.com/crm_bp/csvfiles/');
}
if (!$connect)
{
   die('Could not <span id="IL_AD1" class="IL_AD">
    connect to</span> MySQL: ' . mysql_error());
}
if(isset($_POST['file_upload']) && $_FILES['import']['name'] != ""){
$sssss = explode(".", $_FILES['import']['name']);

if($sssss[1] == 'csv'){
$image_file=rand().$_FILES['import']['name'];

$image_path='csvfiles/'.$image_file;

$temp=$_FILES['import']['tmp_name'];

copy($temp,$image_path);

fopen($_FILES["import"]["tmp_name"], 'r');


$csv_file = CSV_PATH . $image_file; // Name of your CSV file
$csvfile = fopen($csv_file, 'r');

$columns = fgets($csvfile);
$res1 =explode(',',$columns);
$res = array_shift($res1);
$columns = implode(',',$res1);
$i = 0;
$csv_array = array();
while (!feof($csvfile))
{
   $csv_data[] = fgets($csvfile, 1024);
   $csv_array = explode(",", $csv_data[$i]);
   $insert_csv = array();
    $insert_csv['Title'] = $csv_array[0];
    $insert_csv['Name'] = $csv_array[1];
	$insert_csv['email'] = $csv_array[2];
	$insert_csv['mobile'] = $csv_array[3];
	$insert_csv['Description'] = $csv_array[4];
	
   $res = implode(',', $insert_csv);
  
   
   $res1 = str_replace(',',"',",$res);
   $values = str_replace(',',",'",$res1);

   $query = "INSERT INTO `students_bp`(`Title`,`Name`, `Email`, `Mobile`,`Description`)
     VALUES('".$values."')";
	// echo $query; exit;
   $n=mysqli_query($connect, $query);
   $i++;
}

fclose($csvfile);
mysqli_close($connect); // closing connection
header("location:student.php?id=2");
}else{
header("location:student.php?id=2&status=wrong_extension");
}
}else{
header("location:student.php?id=2&status=failed");
}
?>
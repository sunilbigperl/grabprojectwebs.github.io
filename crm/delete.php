<?php 
require_once 'config.php'; 
$ids = json_decode($_POST['val1']);
$table= $_GET['table'];
for($i=0; $i< count($ids); $i++){ 
 $id = $ids[$i];
 mysqli_query($link, "delete from $table where id= '$id'");
 }
 echo "success";
?> 
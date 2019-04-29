<?php 
require_once 'config.php'; 

if(isset($_POST['id']) && $_POST['id'] >0){
$sql = mysqli_query($link,"UPDATE `students_bp` SET `Name`='$_POST[name]',
`Email`='$_POST[email]',`Mobile`=$_POST[phone] WHERE id = '$_POST[id]'");

}
else{

$sql = mysqli_query($link,"INSERT INTO `students_bp`(`Name`, `Email`, `Mobile`) VALUES
 ('$_POST[name]','$_POST[email]','$_POST[phone]')");
}
?> 
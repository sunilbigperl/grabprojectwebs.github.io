<?php 
include_once('config.php');
session_start();
    //echo "hi";
	echo $user=$_POST['username'];
	echo $pass=$_POST['password'];
	exit;
    $fetch=mysqli_query($link,"select * from crm_users where username='$user' and password='$pass'");
	//echo $fetch; exit;
    $count=mysqli_num_rows($fetch);
	$res = mysqli_fetch_array($fetch);
	
    if($res != '')
    {
	$_SESSION['login_id'] =  $res['user_id'];
    $_SESSION['login_username']=$res['firstname'];
	$_SESSION['type']=$res['type'];
	if($_POST['remember']) {
		setcookie('remember_me', $_POST['username'], $year);
	}
	elseif(!$_POST['remember']) {
		if(isset($_COOKIE['remember_me'])) {
			$past = time() - 100;
			setcookie(remember_me, gone, $past);
		}
	}
	header("Location:student.php");	
    }
    else
    {
	 
	 //  header('Location:index.php');
	   header('Location:index.php?status=failed');
	  // echo "invalid username and password";
	}
	
	
	


?>

<?php
include('config.php');

//if(isset($_POST['username']) && isset($_POST['password']))
     {
		  // Innitialize Variable
		  $result='';
	   	  $username ="admin"/* $_POST['username']*/;
          $password ="admin"/* $_POST['password']*/;
		  
		echo $q="select * from logintable  where username='".$username."' and password='".$password."'";
		  // Query database for row exist or not
          $query=mysql_query("select * from logintable  where username='".$username."' and password='".$password."'");
		  if(mysql_num_rows($query))
		  {
			$result = "true";
		  }
		  else
		  {
			$result = "false";
		  }
		  echo $result;
	}
?>
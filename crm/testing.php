<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="css/adminstyle.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/core.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
</head>

<body>
<?php session_start(); ?>
<div id="div_wrapper">
<div id="div_container">
<table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
   <tr>
            <td id="div-consol-topimg">
            	<span class="admin-txt-mintit">
                  Super Admin Console                                                   
                </span>
                <span style="float:right; color:#FFF; margin-right:31px;"><a  style="color: #FFF; text-decoration:none;" href='#'  >Home</a> | <?php if(isset($_SESSION['login_id'])){ ?>
				 <a href="#" style="color: #FFF; text-decoration:none;" >Welcome <?php echo $_SESSION['login_username']; ?> </a> |
				<a href="logout.php"   style="color: #FFF; text-decoration:none;" >LOGOUT</a>
</span>
            </td>
          </tr>
            <tr>
  
    <td>
  
  <table width="966"  border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#efefef; border-radius:8px;">
    <tr>
      <td width="580" valign="top"><div id="navjam" style="margin-top:0px;">
          <div id="navjam">
	<div class="tabs_width">
    <ul class="tabs1">
         <?php if($_SESSION['type'] == 'admin'){ ?>
        <li><a href="" id="tabs_active">Super Admin</a></li>
        <?php } else if($_SESSION['type'] == 'subadmin') {?>
       <li><a href="" id="tabs_active">Sub Admin</a></li>
	   <?php }else{
	   header('loaction:student.php');
	   } ?>
       
       </ul>
          
          <div id="navjam" style="margin-top:5px;">
			<ul class="tabs">
			 <?php if($_SESSION['type'] == 'admin'){ ?>
				<li><a href="register.php?type=sadmin"  id="tabs_active"  >Create SubAdmin</a></li>
					  
				<li><a  href="register.php?type=user" style="width:200px;">Create User</a></li>
				<?php }elseif($_SESSION['type'] == 'subadmin'){ ?>
				<li><a  href="register.php?type=user" style="width:200px;">Create User</a></li>
				<?php }else{
				header('loaction:student.php');
				} ?>	
			</ul>

</div>
        </div>
      
        
        <!-- tab "panes" -->
      </div>
    
      </div>
    
   
      <div class="rightpartbox">
       
        
                <div class="tablebox"  >
        <form method="post" name="admin_type" action="testing.php" enctype="multipart/form-data">
        
          <table width="100%" align="left" border="0" cellspacing="1" cellpadding="5" style="margin-left:10px;">
           
            <tr>
              <td class="colo-td" align="left">Admin Type:&nbsp;<font class="required">*</font></td>
			  <td class="colo-td">
				  <select name="admin_type" required>
				  <option value="">select admin type</option>
				   <option value="user">User</option>
				  <?php if($_SESSION['type'] == 'admin'){ ?>
				  <option value="sbadmin">Subadmin</option>
				  <?php }?>
				 
				  </select>
			  </td>
			  </tr>
			  <tr>
			  <td class="colo-td" align="left">Name:&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="name" size="30" value="" required /></td>
			  </tr>
			  <tr>
			  <td class="colo-td" align="left">Email:&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="text" name="email" size="30" value="" required /></td>
			  </tr>
			  <tr>
			  <td class="colo-td" align="left">Password:&nbsp;<font class="required">*</font></td>
              <td class="colo-td"><input type="password" name="password" size="30" value="" required /></td>
			  </tr>
               <td class="colo-td" align="center" colspan="2"><input type="submit" value="Add Admin User"  name="Add_admin"
              style="width:210px; border-radius:5px; height:35px; background-color:#517ba5; color:#fff;border:1px solid #ccc;"/></td>
              </br>              
             
            </tr>
           <?php 
		   include('config.php');
		   if(isset($_POST['Add_admin'])){
		  // echo "INSERT INTO `crm_users`(`firstname`, `email`, `password`, `type`) VALUES ('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[admin_type]')"; exit;
				$sql = mysqli_query($link, "INSERT INTO `crm_users`(`firstname`, `email`, `password`, `type`,'status') VALUES ('$_POST[name]','$_POST[email]','$_POST[password]','$_POST[admin_type]','1')");
				header('location:testing.php');
		   }
		   ?>
            
            <tr>
              <td class="colo-td" align="center" colspan="2">&nbsp;</td>
            </tr>
           
          </table>
          </form>
          
        </div>
               
<table align="right" width="100%" border="0" cellspacing="0" cellpadding="0" style="height:20px;">

  
 </table> 

  
 
 

      </div>
   
 <?php if($_SESSION['type'] == 'admin'){ 
 $result = mysqli_query($link,"select * from crm_users where type='subadmin' OR type ='user' AND status =1");
 }
 if($_SESSION['type'] == 'subadmin'){ 
 $result = mysqli_query($link,"select * from crm_users where type ='user' AND status =1"); 
 } ?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0" style="background-color:#E8E5E5">

  <tr>
  	<td align="center" class="admin-table-colo">No</td>
 	<td align="center" class="admin-table-colo">Admin Type</td>
	<td align="center" class="admin-table-colo">Name</td>
    <td align="center" class="admin-table-colo">Status</td>
        <td align="center" class="admin-table-colo">Action</td>
      </tr>
  
      
   <tr >
   <?php while($row = mysqli_fetch_array($result)){ ?>
  	<td align="center" class="admin-table-colo1"><?php echo $row['user_id']; ?></td>
    <td align="center" class="admin-table-colo1"><?php echo $row['type']; ?></td>
	 <td align="center" class="admin-table-colo1"><?php echo $row['firstname']; ?></td>
    <td align="center" class="admin-table-colo1">Active</td>
    
         <td align="center" class="admin-table-colo1">
        <a href="http://localhost/WDM/crs/admin/index.php/index/edit_admin_type/1">Edit</a> / 
          
         <a href="http://localhost/WDM/crs/admin/index.php/index/update_admin_type/1/1 ">Active</a> / 
    <a href="http://localhost/WDM/crs/admin/index.php/index/update_admin_type/1/0">InActive</a> /
     <span style="font-size:12px;"><a href="http://localhost/WDM/crs/admin/index.php/index/update_admin_type/1/2" onClick="return confirm('Are you sure you want to delete?')"><span style="color:#2485BE;">Delete</span></a> </span> 
     
       <!-- <a href="http://localhost/WDM/crs/admin/index.php/index/update_admin_type/1/2">Delete</a>--></td>
  	   </tr>
    
     <?php } ?>
  
 </table>
      </td>
    
      </tr>
    
  </table>
    </td>
  
    </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<div style="clear:both; height:30px;">&nbsp;</div>
</div>
</div>
</body>
</html>
<style>
.colo-td {
	font-family:Arial, Helvetica, sans-serif;
	font-size:15px;
	color:#000;
}
</style>
<?php }else{
header('loaction:index.php');
} ?>
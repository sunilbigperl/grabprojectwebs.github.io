<table width="80%" height="7%" align="center" style="margin-top: -40px;
margin-left: 170px;">
<tr>
<td>
<link href="StyleSheet3.css" rel="stylesheet" type="text/css" />
<!--<div align="center" style="background: rgb(0, 0, 0);">-->
<div align="center" style="margin-top:-80px;float:right;">
<!--<div align="center"> -->

<?php
if(isset($_GET['id']))
$id=$_GET['id'];
else
$id="1";
?>
<table style="align:center;background: rgb(0, 0, 0)" width="100%" height="4%">
<td>
<div id='cssmenu'>
<ul>
  
   <li <?php if($id=='1'){?>class='active'<?php } ?>><a href='client.php?id=1'><span>client</span></a></li>
   <li <?php if($id=='2'){?>class='active'<?php } ?>><a href='student.php?id=2'><span>student</span></a></li> 
    <li <?php if($id=='3'){?>class='active'<?php } ?>><a href='shine.php?id=3'><span>shine</span></a></li> 
	<li <?php if($id=='4'){?>class='active'<?php } ?>><a href='workshop.php?id=4'><span>Work shops</span></a></li>
	
 <!--  <li <?php if($id=='3'){?>class='active'<?php } ?>><a href='backgroundcolor.php?id=3'><span>Color Changing</span></a></li> 
  
   
  
    
   <li <?php if($id=='2'){?>class='active'<?php } ?>><a href='colorblock.php?id=5'><span>Color Picker</span></a><li> -->

</ul>
</div>
		
    <!-- end of menu -->
	
</td>
</table>
</div>

</td>
</tr>
</table>

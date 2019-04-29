<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WELCOME TO CRM</title>
<link href="css/adminstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
 <div id="div_wrapper">
 	<div id="div_container">
    	<form action="login.php" name="" method="post">
        <table width="392" align="center" border="0" cellpadding="0" cellspacing="0" style="margin-top:150px;">
          <tr>
            <td><img src="images/login-top-img1.jpg" style="margin-left:-1px"  border="0" /></td>
          </tr>
          <tr>
            <td valign="top" id="div-logcent-strip">
          		<table width="380" align="center" border="0" cellpadding="3" cellspacing="3">
                 <tr>
                    <td style="font-size:18px; text-align:left; color:#565656;padding-left:11px">
                    Username : <br /><input  id="email" name="username" type="text" value="" class="login-txtbox"  required/>
                     <font size="2px"></font>
                    </td>
                      
                  </tr>
            	<tr>
                    <td style="font-size:18px; text-align:left; color:#565656;padding-left:11px">
                    Password : <br /><input id="password" name="password" type="password" value="" class="login-txtbox" required /> <font size="2px"> </font>
                    </td>
                  </tr>
				  <tr><td><?php if(isset($_GET['status'])){echo "enter valid login details"; }?></td></tr>
                  <tr>
              
                  
                 
                    <td align="center"><input type="image" src="images/login-but1.png"  border="0" /></td>
                  </tr>
                 
                  
                   <tr>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <tr>
                  	<td style="font-size:12px; text-align:center; color:#565656;">Powered by : <a target="_blank" style="text-decoration:none; color:#565656" href="http://bigperl.com.com">Bigperl Solutions Pvt Ltd</a></td>
                  </tr>
                </table>
            </td>
          </tr>
          <tr>
            <td><img src="images/login-bottom-img1.jpg"  border="0" /></td>
          </tr>
        </table>

        </form>
 	</div>
 </div>
</body>
</html>

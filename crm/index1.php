
<html lang="en">
		<head>
			<meta charset="utf-8" />
			
			<link rel="stylesheet" type="text/css" href="css/index.css">
			
			
				<script>
				
				 var menu="";
					
					function highlight(menu)
					{
						document.getElementById(menu).src="images/"+menu+"1.png";
					
					
					}
				
					function undo_highlight(menu)
					{
						document.getElementById(menu).src="images/"+menu+".png";
						
					}
				
				</script>
			
		</head>
		
		
		
		<body align="center" bgcolor="white" >
		
			
			
				<div id="student" >
					<a href="student.php?id=2"><img src="images/a.png" id="a"   onmouseover="highlight('a')" onmouseout="undo_highlight('a')" style="margin-left:174"></a>
				</div>
				
				<div id="client" >
					<a href="client.php?id=1" ><img src="images/b.png" id="b"  onmouseover="highlight('b')" onmouseout="undo_highlight('b')" style="margin-left:223"  ></a>
				</div>
			
		</body>
</html>


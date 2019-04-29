<link rel="stylesheet" type="text/css" href="style.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<!--<link rel="stylesheet" type="text/css" href="cleditor-master/jquery.cleditor.css" />
<script type="text/javascript" src="cleditor-master/jquery.cleditor.js"></script>	-->

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<style>
.nicEdit-main {width:1347px !important;}
</style>
<script>
 
            $(".textarea").cleditor({
                width: 500, // width not including margins, borders or padding
                height: 250, // height not including margins, borders or padding
                controls: // controls to add to the toolbar
                    "bold italic underline strikethrough subscript superscript | font size " +
                    "style | color highlight removeformat | bullets numbering | outdent " +
                    "indent | alignleft center alignright justify | undo redo | " +
                    "rule image link unlink | cut copy paste pastetext | print source",
                colors: // colors in the color popup
                    "FFF FCC FC9 FF9 FFC 9F9 9FF CFF CCF FCF " +
                    "CCC F66 F96 FF6 FF3 6F9 3FF 6FF 99F F9F " +
                    "BBB F00 F90 FC6 FF0 3F3 6CC 3CF 66C C6C " +
                    "999 C00 F60 FC3 FC0 3C0 0CC 36F 63F C3C " +
                    "666 900 C60 C93 990 090 399 33F 60C 939 " +
                    "333 600 930 963 660 060 366 009 339 636 " +
                    "000 300 630 633 330 030 033 006 309 303",
                fonts: // font names in the font popup
                    "Arial,Arial Black,Comic Sans MS,Courier New,Narrow,Garamond," +
                    "Georgia,Impact,Sans Serif,Serif,Tahoma,Trebuchet MS,Verdana",
                sizes: // sizes in the font size popup
                    "1,2,3,4,5,6,7",
                styles: // styles in the style popup
                    [["Paragraph", "<p>"], ["Header 1", "<h1>"], ["Header 2", "<h2>"],
                    ["Header 3", "<h3>"],  ["Header 4","<h4>"],  ["Header 5","<h5>"],
                    ["Header 6","<h6>"]],
                useCSS: false, // use CSS to style HTML when possible (not supported in ie)
                docType: // Document type contained within the editor
                    '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
                docCSSFile: // CSS file used to style the document contained within the editor
                    "",
                bodyStyle: // style to assign to document body contained within the editor
                    "margin:4px; font:10pt Arial,Verdana; cursor:text"
            });
  
		</script>
<?php error_reporting(0); ?>
<h2 style="font-family:Britannic Bold"><span style="color:red">SEND</span><span style="color:green">MAIL</span></h2>	
	<form action="mail.php" method="post" name="form1" >
		<?php include("config.php");
		$templates = mysqli_query($link, "select * from mail_tamplates where attachment =0"); ?>
		<select name="subject" id="subject" required onchange='this.form.submit();'>
		<option value="">select subject</option>
		<?php while($row1 = mysqli_fetch_array($templates)){ ?> 
		<option value="<?php echo $row1['name']; ?>"><?php echo $row1['subject']; ?></option>
		<?php } ?>
		</select>
			<input type="hidden" name="check_list" value="<?php echo $_POST['values']; ?>"> 
			 <input type="hidden" name="table" value="<?php echo $_POST['table']; ?>"> 
			 
		<!--<input type="submit" value="select subject" name="ssubmit">-->
	</form>
	<?php if(isset($_POST['subject'])){
	$template = mysqli_query($link, "select * from mail_tamplates where name ='$_POST[subject]'");
			$row= mysqli_fetch_array($template); 
		?>
	<form action="mail/test.php" method="post">
	
			 <input type="hidden" name="check_list" value="<?php echo $_POST['check_list']; ?>"> 
			 <input type="hidden" name="table" value="<?php echo $_POST['table']; ?>"> 
			
	<br/>
	<select name="from" id="from" required>
	<option value="">select from address</option>
	<?php $from_info = mysqli_query($link, "select * from frominfo_bp"); 
		while($from = mysqli_fetch_array($from_info)){?>
		<option value="<?php echo $from['id'];?>"><?php echo $from['email'];?></option>
	<?php } ?>
	</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="mail_subject" value="<?php echo $row['subject']; ?>">
	<input type="submit" name="send_email" value="Send Email" onclick="nicEditors.findEditor('area1').saveContent();"
	style="margin-left:20px;"><br/><br/>
	 <textarea class="cleditor5" rows="3" id="area1" name="post_description" style="width: 1347px !important; height: 200px !important;">
	 <?php echo $row['body'];	 ?></textarea>
	</form>
<?php } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="css/adminstyle.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/core.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>


<link rel='stylesheet' href='css/jquery-ui-custom.css'/>
<link rel='stylesheet' href='css/ui.jqgrid.css'/>


<script src='js/jquery-1.9.0.min.js'></script>
<script src='js/grid.locale-en.js'></script>
<script src='js/jquery.jqGrid.min.js'></script>
<style>
@font-face{font-family: Lobster;src: url('css/Lobster.otf');}
body{width:100%;padding:0px;margin:0px;}
.wrapper{ margin: 20px 0 0 50px;}
.cvteste{color:#000;font-size:12px;font-family:verdana}
h1{text-align:center;font-family: Lobster;}
.ui-widget-content {margin-left:45px;}
.ui-widget{font-family:Arial; color:#fff;}
.ui-jqgrid .ui-jqgrid-hdiv {height:25px;}
.ui-jqgrid tr.jqgrow td{height:40px;}
.ui-jqgrid .ui-jqgrid-pager {height:40px;}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
  background: #4297d7;font-weight: bold;color:#000;font-size:13px;border: 1px solid #4297d7;}
.ui-widget-content{border: 1px solid #4297d7;}
.txt{width:250px;height:30px;border-radius:5px;border: 1px solid #4297d7;}
.myAltRowClass { background-color: #DDDDDC; background-image: none; }
.ui-icon-file {
  background-position: -32px -112px;
}
.header{
margin-top: -20px !important;
width: 1100px;
margin: 0 auto;
}
</style>
</head>
<?php session_start(); ?>

<body>
<div id="div_wrapper">
<div id="div_container">
<table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
   <tr>
            <td id="div-consol-topimg">
            	<span class="admin-txt-mintit">
                  STUDENT INFORMATION                                             
                </span>
                <span style="float:right; color:#FFF; margin-right:31px;"><a  style="color: #FFF; text-decoration:none;" href='#'  >Home</a> | 
				 <?php if(isset($_SESSION['login_id'])){ ?>
				 <a href="#" style="color: #FFF; text-decoration:none;" >Welcome <?php echo $_SESSION['login_username']; ?> </a> |
				<a href="logout.php"   style="color: #FFF; text-decoration:none;" >LOGOUT</a>
</span>
            </td>
          </tr>
     <tr>
  
    <td>
  
		
  
  <!-- upload,delete,send mail-->
	<div style="clear:both;"></div>
	<div style='width:800px;margin:0 auto;margin-top:20px;'>
	
		<form action="export.php" method="post" enctype="multipart/form-data" id="export_form" name="mail_form">
			<input type="file" name="import" id="import">
			<input type="submit" value="upload" name="file_upload">
			<?php if(isset($_GET['status']) && $_GET['status'] == 'failed'){ ?>
			<span style="color:red;"><?php echo "please upload the file"; ?></span>
			<?php } 
			else if(isset($_GET['status']) && $_GET['status'] == 'wrong_extension'){?>
			<span style="color:red;"><?php echo "only .csv files are allowed"; ?></span>
			<?php }else{ ?>
			<span style="color:red;"></span>
			<?php } ?>
		</form>
		<div style="float:right;margin-right: 30px;margin-top: -25px;">
		<input type="submit" id="add" class="add-new-row" name="add" value="add">
		<input type="submit" id="delete" name="delete" value="delete">
		<input type="submit" id="mail" name="send_mail" value="send mail"></div>
	</div>
	
	<!-- SEARCH PART -->
	<div style="clear:both;"></div>
	<div style='padding:20px 0 0 100px;'> Search : 
	  <input type="text" id="item" onkeydown="doSearch(arguments[0]||event)" placeholder='name' class='txt'/>
	  <input type="text" id="empid" onkeydown="doSearch(arguments[0]||event)" placeholder='Email' class='txt'/>
	</div>
	<!-- table grid-->
	  <div class='wrapper' style="margin-bottom:20px;">
		<table id="rowed2"></table> 
		<div id="prowed2"></div>
	  </div>
		
	<script>
$(function () {		
	var selectedRows = {};
	 var agentsGrid = jQuery("#rowed2");
	agentsGrid.jqGrid({
   	url:'student_server.php',
	datatype: "json",
	altRows:true,
	toppager:true,
	altclass:'myAltRowClass',
	 multiselect:true,
   	 colNames:['ID','NAME', 'EMAIL','PHONE','ACTIONS'], 
	   colModel:[ 
	   {name:'id',index:'id', width:100,classes: 'cvteste'}, 
	   {name:'name',index:'name', width:180,classes: 'cvteste',editable:true}, 
	   {name:'email',index:'email', width:200,classes: 'cvteste',editable:true},
	    {name:'phone',index:'phone', width:180,classes: 'cvteste',editable:true},
       {name:'act',index:'act', width:100,sortable:false}	   
	   ],
   	rowNum:10,
   	rowList:[10,20,30],
   	pager: '#prowed2',
   	sortname: 'id',
    viewrecords: true,
	height:'100%',
    sortorder: "desc",
	onSelectAll: function (rowIds, status) {
		if (status === true) {
			for (var i = 0; i < rowIds.length; i++) {
				selectedRows[rowIds[i]] = true;
			}
		} else {
			for (var i = 0; i < rowIds.length; i++) {
				delete selectedRows[rowIds[i]];
			}
		}
	},
	onSelectRow: function (rowId, status, e) {
		if (status === false) {
			delete selectedRows[rowId];
		} else {
			selectedRows[rowId] = status;
		}

	},
	
gridComplete: function () {
     $("tr.jqgrow:odd").css("background", "#DDDDDC");
		for (var rowId in selectedRows) {
			agentsGrid.setSelection(rowId, true);
		}
		
	var ids = jQuery("#rowed2").jqGrid('getDataIDs');
     for (var i = 0; i < ids.length; i++) {
         var itemId = ids[i];
         be = "<a href='#'  class='ui-icon ui-icon-pencil' onclick=\"$('#rowed2').editRow('" + itemId + "');\"  /></a>";
         se = "<a href='#'  type='button' class='ui-icon ui-icon-file' onclick=\"$('#rowed2').saveRow('" + itemId + "');\"  /></a>";
         ce = "<input  type='button' value='C' onclick=\"$('#rowed2').restoreRow('" + itemId + "');\" />";
         selector = "<input class='elist' type='checkbox' id='chk_" + itemId + "' value='" + itemId + "' />";
         $("#rowed2").jqGrid('setRowData', ids[i], { Select: selector, act: be + se });
     }
},


	editurl: "update.php"
	
});
//Navigation
jQuery("#rowed2").jqGrid('navGrid', "#prowed2", {
	add: false,
	edit: false,
	del:false,
	search:false,
	cloneToTop:true,
	closeOnEscape:true,
	 closeAfterAdd: true}
);

$("#delete").click(function(){
	var res = [];
	for (var rowId in selectedRows) {
	 res.push(rowId); 
	}
	if(res == ''){
	alert("please select the list");
	return false;
	}
	var json_ids = JSON.stringify(res, null);
	$.post('delete.php?table=students_bp', {
            val1 : json_ids,
        }, function(response){
			location.reload();
        });   
});
$(".add-new-row").on("click",function(){
    $("#rowed2").jqGrid('addRow',"new");
});
$("#mail").click(function(){
	var res = [];
	for (var rowId in selectedRows) {
	 res.push(rowId); 
	}
	if(res == ''){
	alert("please select the list");
	return false;
	}
	var json_ids = JSON.stringify(res, null);
	var redirectUrl = "mail.php";
var form = $('<form action="' + redirectUrl + '" method="post" id="mail_form" name="mail_form">' +
'<input type="hidden" name="values" value="' + res + '" />' +
'<input type="hidden" name="table" value="students_bp" />' +
'</form>');
$('body').append(form);
$(form).submit();
});		
});
var timeoutHnd; 
var flAuto = true;
 function doSearch(ev){ 
 if(!flAuto)return; 
 if(timeoutHnd) clearTimeout(timeoutHnd);
  timeoutHnd = setTimeout(gridReload,500);
 }
function gridReload(){
 var nm_mask = jQuery("#item").val();
 var cd_mask = jQuery("#empid").val();
jQuery("#rowed2").jqGrid('setGridParam',{url:"student_server.php?nm_mask="+nm_mask+"&cd_mask="+cd_mask,page:1}).trigger("reloadGrid");   
}	
   	   
	</script>

 <?php  } else{
  header('location:index.php');
  }?>
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

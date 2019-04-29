<!DOCTYPE HTML>

<html>

<head>

<title>workshop information</title>

<link rel='stylesheet' href='css/jquery-ui-custom.css'/>

<link rel='stylesheet' href='css/ui.jqgrid.css'/>





<script src='js/jquery-1.9.0.min.js'></script>

<script src='js/grid.locale-en.js'></script>

<script src='js/jquery.jqGrid.min.js'></script>





<style>

@font-face{font-family: Lobster;src: url('css/Lobster.otf');}

body{width:100%;padding:0px;margin:0px;}

.wrapper{ margin: 20px 0 0 250px;}

.cvteste{color:#000;font-size:12px;font-family:verdana}

h1{text-align:center;font-family: Lobster;}

.ui-widget-content {margin-left:-85px;}

.ui-widget{font-family:Arial; color:#fff;}

.ui-jqgrid .ui-jqgrid-hdiv {height:25px;}

.ui-jqgrid tr.jqgrow td{height:40px;}

.ui-jqgrid .ui-jqgrid-pager {height:40px;}

.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {

  background: #4297d7;font-weight: bold;color:#000;font-size:13px;border: 1px solid #4297d7;}

.ui-widget-content{border: 1px solid #4297d7;}

.txt{width:250px;height:30px;border-radius:5px;border: 1px solid #4297d7;}

.myAltRowClass { background-color: #DDDDDC; background-image: none; }

#editlogo {

  background-image: url(images/file_edit.png);

  background-repeat: no-repeat;

  display: block;

  margin: 0 auto;

  text-indent: -9999px;

  width: 20px;

  height: 20px;

}

.header{

margin-top: -20px !important;

width: 1100px;

margin: 0 auto;

}

</style>



</head>

<body>

	<div class="header">

		<img src="images/logo_grabwebs.png">

		<?php include('menu.php'); ?>

	</div>

  <h1>WORKSHOP INFORMATION</h1>

  

  <div style='padding:20px 0 0 370px;'> Search : 

  <input type="text" id="item" onkeydown="doSearch(arguments[0]||event)" placeholder='name' class='txt'/>

  <input type="text" id="empid" onkeydown="doSearch(arguments[0]||event)" placeholder='student/faculty' class='txt'/>



  </div>

  

  

  <div class='wrapper'>

<div style="margin-bottom:20px;float:right;margin-right:500px;">

<a href="admin/student.php?data=workshop">WORKSHOP REGISTER</a>

<a href="import.php?table=workshop">IMPORT</a>

</div>

	<input type="submit" id="delete" name="delete" value="delete">

	<input type="submit" id="mail" name="send_mail" value="send mail">

	<table id="rowed2"></table> 

	<div id="prowed2"></div>

	

  </div>

	

	<script>

$(function () {		

	var selectedRows = {};

	 var agentsGrid = jQuery("#rowed2");

	agentsGrid.jqGrid({

   	url:'server-workshop.php',

	datatype: "json",

	altRows:true,

	altclass:'myAltRowClass',

	 multiselect:true,

   	 colNames:['ID','NAME', 'GENDER', 'STUDENT/FACULTY','SEM','PHONE NO','EMAIL','COLLEGE','COURSE','DURATION','ACT'], 

	   colModel:[ 

	   {name:'id',index:'id', width:30,classes: 'cvteste'}, 

	   {name:'name',index:'name', width:150,classes: 'cvteste',editable:true}, 

	   {name:'gender',index:'gender', width:80, sortable:false,classes: 'cvteste',editable:true},

	   {name:'s-f',index:'s-f', width:100,classes: 'cvteste',editable:true},

	   {name:'sem',index:'sem', width:50,align:"center",classes: 'cvteste',editable:true},

       {name:'phone',index:'phone', width:100, sortable:false,classes: 'cvteste',editable:true},

	   {name:'email',index:'email', width:150, sortable:false,classes: 'cvteste',editable:true},

	   {name:'college',index:'college', width:80, sortable:false,classes: 'cvteste',editable:true},

	    {name:'course',index:'course', width:80, sortable:false,classes: 'cvteste',editable:true},

		{name:'duration',index:'duration', width:80, sortable:false,classes: 'cvteste',editable:true},

       {name:'act',index:'act', width:50,sortable:false}	   

	   ],

   	rowNum:10,

   	rowList:[10,20,30],

   	pager: '#prowed2',

   	sortname: 'id',

    viewrecords: true,

	height:'100%',

    sortorder: "asc",

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

	gridComplete: function(){

		$("tr.jqgrow:odd").css("background", "#DDDDDC");

		for (var rowId in selectedRows) {

			agentsGrid.setSelection(rowId, true);

		}

		

		var ids = jQuery("#rowed2").jqGrid('getDataIDs');

		

		for(var i=0;i<ids.length;i++){

			var cl = ids[i];

			be = "<a href='admin/student.php?data=editworkshop&page="+cl+"' id='editlogo'>EDIT</a>"; 

			 

			jQuery("#rowed2").jqGrid('setRowData',ids[i],{act:be});

		}	

	},

	editurl: "update.php"

	

});

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

	$.post('delete.php?table=workshop', {

            val1 : json_ids,

        }, function(response){

		//alert(response);

		location.reload();

        });   

});

$("#mail").click(function(){

	var res = [];

	for (var rowId in selectedRows) {

	 res.push(rowId); 

	}

	var json_ids = JSON.stringify(res, null);

	var redirectUrl = "mail.php";

var form = $('<form action="' + redirectUrl + '" method="post">' +

'<input type="hidden" name="values" value="' + res + '" />' +

'<input type="hidden" name="table" value="workshop" />' +

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

jQuery("#rowed2").jqGrid('setGridParam',{url:"server-workshop.php?nm_mask="+nm_mask+"&cd_mask="+cd_mask,page:1}).trigger("reloadGrid");   

}	

   	   

	</script>

</body>

</html>








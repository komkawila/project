<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
// Field  --------------------------------------------------------------------------------------//
$strField = "  
`type_id` ,
`type_name` ,
`type_detail` ,
`type_price` ";
									
// Insert  --------------------------------------------------------------------------------------//					
$strValue = "
'0', 
'".$_REQUEST['type_name']."', 
'".$_REQUEST['type_detail']."', 
'".$_REQUEST['type_price']."' "; 
							
$id = 'type_id';
$fld_name = 'type_name';
$strCheck = "$fld_name='".$_REQUEST['type_name']."'";
$msg_check = 'ข้อมูล';
		
// Update -------------------------------------------------------------------------------------//
$strCommand = "   
`type_name` = '".$_REQUEST['type_name']."', 
`type_detail` = '".$_REQUEST['type_detail']."', 
`type_price` = '".$_REQUEST['type_price']."'  ";

$strCondition = " $id ='".$_REQUEST['ID']."' ";
		
// Delelte -------------------------------------------------------------------------------------//

$strCondition = "$id ='".$_REQUEST['ID']."' ";

$page_Insert = "$Table.php?stt=add"; 
$page_Delelte = "$Table.php?stt=list";

$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//

	}else{ 
		// Result Table
		$ID = $rs['type_id'];	
		$name = $rs['type_name'];

		$type_id = $rs['type_id'];	
		$type_name = $rs['type_name'];
		$type_detail = $rs['type_detail'];
		$type_price = $rs['type_price'];

		} // End SQL
	
 ?>
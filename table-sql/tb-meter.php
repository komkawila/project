<?php	
 if(!empty($Sql)){
// Field  --------------------------------------------------------------------------------------//
$strField = "  
`meter_id` ,
`meter_utility_id` ,
`meter_room_id` ,
`meter_unit` ,
`meter_update` ";
									
// Insert  --------------------------------------------------------------------------------------//					
$strValue = "
'0', 
'".$_REQUEST['meter_utility_id']."', 
'".$_REQUEST['meter_room_id']."', 
'".$_REQUEST['meter_unit']."', 
'".$DateTime."' "; 
							
$id = 'meter_id';
$fld_name = 'meter_utility_id';
$strCheck = "meter_room_id='".$_REQUEST['meter_room_id']."' And meter_utility_id='".$_REQUEST['meter_utility_id']."'";
$msg_check = 'ข้อมูล';
		
// Update -------------------------------------------------------------------------------------//
$ID = $_REQUEST['ID'];
$strCommand = "   
`meter_utility_id` = '".$_REQUEST['meter_utility_id']."', 
`meter_room_id` = '".$_REQUEST['meter_room_id']."', 
`meter_unit` = '".$_REQUEST['meter_unit']."', 
`meter_update` = '".$DateTime."'  ";

$strCondition = " $id ='".$ID."' ";
		
// Delelte -------------------------------------------------------------------------------------//
$strCondition = "$id ='".$ID."'";
$page_Insert = 'meter.php?stt=list'; 
$page_Delelte = 'meter.php?stt=list';
$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
	}else{ 
		// Field Table
	 	$ID = $rs['meter_id'];
		$name = $rs['meter_room_id'];
		

	 	$meter_utility_id = $rs['meter_utility_id'];
		$meter_room_id = $rs['meter_room_id'];
		$meter_unit = $rs['meter_unit'];
		$meter_update = $rs['meter_update'];

		} // End SQL
	
 ?>
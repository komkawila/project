<?php	
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
		$strField = "  `utility_id` ,
							`utility_name` ,
							`utility_unit_price` ";
									
// Insert  --------------------------------------------------------------------------------------//					
	
	$strValue = " '0', 
						'".$_REQUEST['utility_name']."', 
						'".$_REQUEST['utility_unit_price']."' "; 
							
		$id = 'utility_id';
		$fld_name = 'utility_name';
		$strCheck = "$fld_name='".$_REQUEST['utility_name']."'";
		$msg_check = 'ข้อมูล';
		
// Update -------------------------------------------------------------------------------------//
		$ID = $_REQUEST['ID'];
		$strCommand = "   `utility_name` = '".$_REQUEST['utility_name']."', 
									`utility_unit_price` = '".$_REQUEST['utility_unit_price']."'  ";
								
		$strCondition = " $id ='".$ID."' ";
		
// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$ID."'";
		$page_Insert = 'utility.php'; 
		$page_Delelte = 'utility.php?stt=list';
		$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
	}else{ 
		// Field Table
		$ID = $rs['utility_id'];
		$name = $rs['utility_name'];
		
		$utility_id = $rs['utility_id'];
		$utility_name = $rs['utility_name'];
		$utility_unit_price = $rs['utility_unit_price'];
		
		
	//  Tb bill_detail --------------------------------------------------------------------//
		$bl_bill_id = $rs['bl_bill_id'];
		$bl_utility_id = $rs['bl_utility_id'];	
		$bl_utility_name = $rs['bl_utility_name'];	
		$bl_num = $rs['bl_num'];
		$bl_price = $rs['bl_price'];
		
		
$sql_utility_id = mysqli_query($con,"Select * From meter Where meter_utility_id=$utility_id and meter_room_id='".$room_id."'");
		$rs = mysqli_fetch_array($sql_utility_id);
		$meter_id = $rs['meter_id'];
 		$meter_utility_id = $rs['meter_utility_id'];
	 	 $meter_room_id = $rs['meter_room_id'];
		$meter_unit = $rs['meter_unit'];
		$meter_update = $rs['meter_update'];


		
		} // End SQL
	
 ?>
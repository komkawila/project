<?php	
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
	$strField = "	`pkg_id` ,
						`pkg_zone_id` ,
						`pkg_province` ,
						`pkg_name` ,
						`pkg_detail` ,
						`pkg_price` ,
						`pkg_num` ,
						`pkg_go` ,
						`pkg_return` ,
						`pkg_photo` ,
						`pkg_status` ";
							
// Text Field -------------------------------------------------------------------------------//
 
			
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['pkg_zone_id']."', 
						'".$_REQUEST['pkg_province']."', 
						'".$_REQUEST['pkg_name']."', 
						'".$_REQUEST['pkg_detail']."', 
						'".$_REQUEST['pkg_price']."', 
						'".$_REQUEST['pkg_num']."', 
						'".$_REQUEST['pkg_go']."', 
						'".$_REQUEST['pkg_return']."', 
						'".$_REQUEST['pkg_photo']."', 
						'".$_REQUEST['pkg_status']."' "; 

		$id = 'pkg_id';
		$fld_name = 'pkg_name';
		$fld_name2 = 'pkg_province';
		$strCheck = "$fld_name='".$pkg_name."' And $fld_name2='".$pkg_province."'";
		$msg_check = 'ข้อมูล';
// Update -------------------------------------------------------------------------------------//
	$strCommand = "  `pkg_zone_id` = '".$_REQUEST['pkg_zone_id']."', 
								`pkg_province` = '".$_REQUEST['pkg_province']."', 
								`pkg_name` = '".$_REQUEST['pkg_name']."', 
								`pkg_detail` = '".$_REQUEST['pkg_detail']."', 
								`pkg_price` = '".$_REQUEST['pkg_price']."', 
								`pkg_num` = '".$_REQUEST['pkg_num']."', 
								`pkg_go` = '".$_REQUEST['pkg_go']."', 
								`pkg_return` = '".$_REQUEST['pkg_return']."', 
								`pkg_photo` =  '".$_REQUEST['pkg_photo']."'  ";
								
		$strCondition = " $id ='".$ID."' ";
		
// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$ID."'";
		$page_Insert = 'bank.php'; 
		$page_Delelte = 'bank.php?stt=list';
		$msg_Insert = 'บันทึกข้อมูลการลงทะเบียน';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
	}else{ 
		// Field Table
	$ID = $rs['p_id'];
	$bn_id = $rs['bn_id'];
	$bn_bank = $rs['bn_bank'];
	$bn_name = $rs['bn_name'];
	$bn_number = $rs['bn_number'];
	$bn_branch = $rs['bn_branch'];
	$bn_photo = $rs['bn_photo'];
	} // End SQL
 ?>
 
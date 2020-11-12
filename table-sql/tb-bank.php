<?php	
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
	$strField = "	`bn_id` ,
						`bn_bank` ,
						`bn_name` ,
						`bn_number` ,
						`bn_branch` ,
						`bn_photo`";
							
// Text Field -------------------------------------------------------------------------------//
	$ID = $_REQUEST['ID'];
	$bn_bank = $_REQUEST['bn_bank'];
	$bn_name = $_REQUEST['bn_name'];
	$bn_number = $_REQUEST['bn_number'];
	$bn_branch = $_REQUEST['bn_branch'];
	$bn_photo = $_REQUEST['bn_photo'];
			
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$bn_bank."', 
						'".$bn_name."', 
						'".$bn_number."', 
						'".$bn_branch."', 
						'".$bn_photo."' "; 

		$id = 'bn_id';
		$fld_name = 'bn_bank';
		$fld_name2 = 'bn_bank';
		$strCheck = "$fld_name='".$bn_bank."' And $fld_name2='".$bn_number."'";
		$msg_check = 'ข้อมูล';
// Update -------------------------------------------------------------------------------------//
	$strCommand = "  `bn_bank` =  '".$bn_bank."',
								`bn_name` =  '".$bn_name."',
								`bn_number` =  '".$bn_number."',
								`bn_branch` =  '".$bn_branch."',
								`bn_photo` =  '".$bn_photo."'  ";
								
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
	$ID = $rs['bn_id'];
	$bn_id = $rs['bn_id'];
	$bn_bank = $rs['bn_bank'];
	$bn_name = $rs['bn_name'];
	$bn_number = $rs['bn_number'];
	$bn_branch = $rs['bn_branch'];
	$bn_photo = $rs['bn_photo'];
	} // End SQL
 ?>
 
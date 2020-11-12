<?php	
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
		$strField = "  `mb_id` ,
							`mb_user` ,
							`mb_pass` ,
							`mb_name` ,
							`mb_card_id` ,
							`mb_address` ,
							`mb_district` ,
							`mb_province` ,
							`mb_zipcode` ,
							`mb_tel` ,
							`mb_email` ";
									
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['mb_user']."', 
						'".$_REQUEST['mb_pass']."', 
						'".$_REQUEST['mb_name']."', 
						'".$_REQUEST['mb_card_id']."', 
						'".$_REQUEST['mb_address']."', 
						'".$_REQUEST['mb_district']."', 
						'".$_REQUEST['mb_province']."', 
						'".$_REQUEST['mb_zipcode']."', 
						'".$_REQUEST['mb_tel']."', 
						'".$_REQUEST['mb_email']."' "; 
							
		$id = 'mb_id';
		$fld_name = 'mb_user';
		$strCheck = "$fld_name='".$mb_user."'";
		$msg_check = 'ชื่อใช้ Login';
 

	// Update -------------------------------------------------------------------------------------//
		$strCommand = "
								`mb_name` = '".$_REQUEST['mb_name']."', 
								`mb_address` = '".$_REQUEST['mb_address']."', 
								`mb_district` = '".$_REQUEST['mb_district']."', 
								`mb_province` = '".$_REQUEST['mb_province']."', 
								`mb_zipcode` = '".$_REQUEST['mb_zipcode']."', 
								`mb_tel` = '".$_REQUEST['mb_tel']."', 
								`mb_email` = '".$_REQUEST['mb_email']."'  ";
								

// Delelte Update -------------------------------------------------------------------------------------//
		$strCondition =  " mb_id='".$_REQUEST['ID']."' ";
		
		$page_Insert = 'index.php'; 
		$page_Delelte = 'member.php?stt=list';
		$msg_Insert = 'บันทึกข้อมูลการลงทะเบียน';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		
// Start switch case  ==================================================//
	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Repass':
		// ----------------------------------------------------------------------------------------//
		
		if(strlen($_POST['txt_newpass'])<4){
				exit("<script>alert('รหัสผ่านไม่ควรน้อยกว่า 4 ตัวอักษร !');(history.back());</script>");
				}
	
		$sql = mysqli_query($con,"Select * FROM ".$Table." WHERE mb_pass='".$_REQUEST['txt_oldpass']."' AND mb_id='".$_SESSION['sess_mb_id']."'");
		$numrs_am = mysqli_num_rows($sql);
			if($numrs_am==1){
				$sql_update = mysqli_query($con,"Update ".$Table." SET mb_pass='".$_REQUEST['txt_newpass']."' WHERE mb_id='".$_SESSION['sess_mb_id']."'");
				if($sql_update){
						exit("<script>alert('ระบบได้เปลี่ยนรหัสผ่านใหม่แล้ว');window.location='member.php?stt=profile';</script>");	
							}else{
							exit("<script>alert('error : ไม่สามารถเปลี่ยนรหัสผ่านได้!');(history.back());</script>");
							}
				}else{
					exit("<script>alert('error : รหัสผ่านไม่ถูกต้อง!');(history.back());</script>");
					}
					
		break;
		
		// ----------------------------------------------------------------------------------------//
		default:
		// ----------------------------------------------------------------------------------------//
		}
// END switch case  ==================================================//	 

// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//
	}else{ 
		// Field Table
		$ID = $rs['mb_id'];
		$mb_id = $rs['mb_id'];
		$mb_user = $rs['mb_user'];
		$mb_pass = $rs['mb_pass'];
		$mb_name = $rs['mb_name'];
		$mb_card_id = $rs['mb_card_id'];
		$mb_address = $rs['mb_address'];
		$mb_district = $rs['mb_district'];
		$mb_province = $rs['mb_province'];
		$mb_zipcode = $rs['mb_zipcode'];
		$mb_tel = $rs['mb_tel'];
		$mb_email = $rs['mb_email'];
		} // End SQL
	
 ?>
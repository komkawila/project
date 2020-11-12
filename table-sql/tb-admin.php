<?php	
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
		$strField = "  `am_id` ,
							`am_user` ,
							`am_pass` ,
							`am_name` ,
							`am_tel` ,
							`am_email` ,
							`am_status` ";
									
// Insert  --------------------------------------------------------------------------------------//					
	$strValue = " '0', 
						'".$_REQUEST['am_user']."', 
						'".$_REQUEST['am_pass']."', 
						'".$_REQUEST['am_name']."', 
						'".$_REQUEST['am_tel']."', 
						'".$_REQUEST['am_email']."', 
						'".$_REQUEST['am_status']."' "; 
							
		$id = 'am_id';
		$fld_name = 'am_user';
		$strCheck = "$fld_name='".$mb_user."'";
		$msg_check = 'ชื่อใช้ Login';
// Update -------------------------------------------------------------------------------------//
		$strCommand = "   `am_name` = '".$_REQUEST['am_name']."', 
									`am_tel` = '".$_REQUEST['am_tel']."', 
									`am_tel` = '".$_REQUEST['am_tel']."', 
									`am_email` = '".$_REQUEST['am_email']."'  ";
								
		$strCondition = "$id ='".$_REQUEST['ID']."'";
		
// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$_REQUEST['ID']."'";
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
	
		$sql = mysqli_query($con,"Select * FROM ".$Table." WHERE am_pass='".$_REQUEST['txt_oldpass']."' AND am_id='".$_SESSION['sess_am_id']."'");
		$numrs_am = mysqli_num_rows($sql);
			if($numrs_am==1){
				$sql_update = mysqli_query($con,"Update ".$Table." SET am_pass='".$_REQUEST['txt_newpass']."' WHERE am_id='".$_SESSION['sess_am_id']."'");
				if($sql_update){
						exit("<script>alert('ระบบได้เปลี่ยนรหัสผ่านใหม่แล้ว');window.location='admin.php?stt=profile';</script>");	
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
	$ID = $rs['am_id'];
	$am_id = $rs['am_id'];
	$am_user = $rs['am_user'];
	$am_pass = $rs['am_pass'];
	$am_name = $rs['am_name'];
	$am_tel = $rs['am_tel'];
	$am_email = $rs['am_email'];
	$am_status = $rs['am_status'];
		} // End SQL
	
 ?>
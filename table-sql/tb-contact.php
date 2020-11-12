<?php	
 if(!empty($Sql)){
// Field  --------------------------------------------------------------------------------------//
$strField = "  
`contact_id` ,
`contact_name` ,
`contact_tel` ,
`contact_email` ,
`contact_title` ,
`contact_detail` ,
`contact_date` ,
`contact_status` ";
									
// Insert  --------------------------------------------------------------------------------------//					
$TxtDetail = eregi_replace(chr(13),"<br>",$_REQUEST['contact_detail']);
$strValue = "
'0', 
'".$_REQUEST['contact_name']."', 
'".$_REQUEST['contact_tel']."', 
'".$_REQUEST['contact_email']."', 
'".$_REQUEST['contact_title']."', 
'".$TxtDetail."', 
'".$DateTime."', 
'1' "; 
							
$id = 'contact_id';
$fld_name = 'contact_name';
$strCheck = "$fld_name='".$_REQUEST['contact_title']."'";
$msg_check = 'ข้อมูล';
	
		
// Delelte -------------------------------------------------------------------------------------//
$strCondition = "contact_id= '".$_REQUEST['ID']."' ";
$page_Insert = 'index.php?stt=home'; 
$page_Delelte = 'contact.php?stt=list';
$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		
// Insert Update Delelte --------------------------------------------------------------------//
	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//


	}else{ 
		// Field Table
		$name = $rs['contact_name'];
		
		$ID = $rs['contact_id'];
		$contact_name = $rs['contact_name'];
		$contact_tel = $rs['contact_tel'];
		$contact_email = $rs['contact_email'];
		$contact_title = $rs['contact_title'];
		$contact_detail = $rs['contact_detail'];
		$contact_date = $rs['contact_date'];
		$contact_status = $rs['contact_status'];
		
		if($contact_status==1){
			$contact_status='ข้อความใหม่';
			
		}else{
			$contact_status='อ่านแล้ว';
		}
		
		} // End SQL
	
 ?>
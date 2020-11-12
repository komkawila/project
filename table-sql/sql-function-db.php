<?php
// Start switch case  ==================================================//
	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Insert':
		// ----------------------------------------------------------------------------------------//
		
		//ดึงข้อมูลในตาราง มาตรวจว่ามีข้อมูล่ซ่ำกันหรือไม่
		$sql = mysqli_query($con,"SELECT * FROM ".$Table." WHERE $strCheck");
		if(@mysqli_num_rows($sql)>= 1){
			$rs = mysqli_fetch_array($sql);
				$name = $rs[$fld_name];
				exit("<script>alert('มีข้อมูลนี้ในระบบแล้ว');(history.back());</script>"); 
				}
	 
		//เพิ่มข้อมูลลงในตาราง 
		$sql_Insert = mysqli_query($con,"INSERT INTO ".$Table." ($strField) VALUES ($strValue) ");
		if($sql_Insert){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='".$page_Insert."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}
 
		break;
	 
		// ----------------------------------------------------------------------------------------//
		case 'Update':
		// ----------------------------------------------------------------------------------------//
		$sql_Update = mysqli_query($con,"Update ".$Table." Set  $strCommand Where $strCondition ");
		if($sql_Update){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');(history.back());</script>");
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}	
 
		break;
		
		// ----------------------------------------------------------------------------------------//
		case 'Delete': 
		// ----------------------------------------------------------------------------------------//
		
		// ลบข้อมูลตามรหัสที่ส่งมา 
			$sql_delete = mysqli_query($con,"Delete FROM ".$Table." WHERE $strCondition");
 
			if($sql_delete){
			exit("<script>window.location='".$page_Delelte."';</script>");	
			}else{
			exit("<script>alert('error : ลบข้อมูลไม่ได้!');(history.back());</script>");
			}	
		break;
		
		
		
		// ----------------------------------------------------------------------------------------//
		default:
		// ----------------------------------------------------------------------------------------//
		exit("<script>alert('ไม่พบ SQL Action -> ".$Sql." ที่ส่งมาจากฟอร์ม!');(history.back());</script>");
		}
// END switch case  ==================================================//	 

//######### -- สคริปใช้บ่อย --- #########//
$TxtMsG = "สคริปใช้บ่อย";
if(empty($TxtMsG)){
	exit("<script>alert(' ข้อความ !');(history.back());</script>");
	exit("<script>alert('ข้อความ');window.location='PageLink.php';</script>");	
	exit("<script>window.location='PageLink.php';</script>");	
	}
//######### -- สคริปใช้บ่อย --- #########//
?>
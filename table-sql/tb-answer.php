<?php
		
 if(!empty($Sql)){
 // Start switch case  ==================================================//
		 // Text Field -------------------------------------------------------------------------------//
 		$ID = $_REQUEST['ID'];
		$ans_topic_id = $_REQUEST['ans_topic_id'];
		$ans_name = $_REQUEST['ans_name'];
		$ans_email = $_REQUEST['ans_email'];
		$ans_detail = $_REQUEST['ans_detail'];
		$ans_date = $_REQUEST['ans_date'];

		
		// Insert --------------------------------------------------------------------------------------//
		$id = 'ans_id';
		$strField = "  `ans_id` ,
							`ans_topic_id` ,
							`ans_name` ,
							`ans_email` ,
							`ans_detail` ,
							`ans_date`";
				
		$strValue = " '0', 
							'".$ans_topic_id."', 
							'".$ans_name."', 
							'".$ans_email."', 
							'".$ans_detail."', 
							'".$ans_date."' "; 
						
		$strCheck = "ans_name='".$ans_name."'";
		$pageInsert = 'answer.php?stt=list';
		
		// Update -------------------------------------------------------------------------------------//
		$strCommand = "  `ans_topic_id` =  '".$ans_topic_id."',
									`ans_name` =  '".$ans_name."',
									`ans_email` =  '".$ans_email."',
									`ans_detail` =  '".$ans_detail."',
									`ans_date` =  '".$ans_date."'  ";
								
		$strCondition = " $id ='".$ID."' ";

 		// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$ID."'";
		$pageDelelte = 'customer.php?stt=list';
		
	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'Insert':
		// ----------------------------------------------------------------------------------------//
		
		//ดึงข้อมูลในตาราง มาตรวจว่ามีข้อมูล่ซ่ำกันหรือไม่
		$sql = mysqli_query($con,"SELECT * FROM ".$Table." WHERE $strCheck");
		if(@mysqli_num_rows($sql)>= 1){
			$rs = mysqli_fetch_array($sql);
				$name = $rs[$fl_name];
				exit("<script>alert('ข้อมูล [ ".$name." ] มีในระบบแล้ว');(history.back());</script>"); 
				}
	 
		//เพิ่มข้อมูลลงในตาราง 
		$sql_Insert = mysqli_query($con,"INSERT INTO ".$Table." ($strField) VALUES ($strValue) ");
		if($sql_Insert){
			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='".$pageInsert."';</script>");	
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
			exit("<script>window.location='".$pageDelelte."';</script>");	
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
	 
	}else{ 
		// Field Table
		$ID = $rs['ans_id'];
		$ans_id = $rs['ans_id'];
		$ans_topic_id = $rs['ans_topic_id'];
		$ans_name = $rs['ans_name'];
		$ans_email = $rs['ans_email'];
		$ans_detail = $rs['ans_detail'];
		$ans_date = $rs['ans_date'];
		} // End SQL
	
 ?>
 
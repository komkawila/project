<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
$Date = date("Y-m-d");
 if(!empty($Sql)){
 
// Field  --------------------------------------------------------------------------------------//
		$strField = "  `room_id` ,
							`room_type_id` ,
							`room_name` ,
							`room_status` ";
									
// Insert  --------------------------------------------------------------------------------------//					
	
	$strValue = " '0', 
						'".$_REQUEST['room_type_id']."', 
						'".$_REQUEST['room_name']."', 
						'".$_REQUEST['room_status']."' "; 
							
		$id = 'room_id';
		$fld_name = 'room_name';
		$strCheck = "$fld_name='".$_REQUEST['room_name']."'";
		$msg_check = 'ข้อมูล';
		
// Update -------------------------------------------------------------------------------------//
		$ID = $_REQUEST['ID'];
		$strCommand = "   `room_type_id` = '".$_REQUEST['room_type_id']."', 
									`room_name` = '".$_REQUEST['room_name']."', 
									`room_status` = '".$_REQUEST['room_status']."'  ";
								
		$strCondition = " $id ='".$ID."' ";
		
// Delelte -------------------------------------------------------------------------------------//
		$strCondition = "$id ='".$ID."'";
		$page_Insert = 'room.php'; 
		$page_Delelte = 'room.php?stt=list';
		$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
		
// Insert Update Delelte --------------------------------------------------------------------//
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
				
		 $sql = mysqli_query($con,"Select * From $utility");
	 
		//เพิ่มข้อมูลลงในตาราง 
		$sql_Insert = mysqli_query($con,"INSERT INTO ".$Table." ($strField) VALUES ($strValue)");
		if($sql_Insert){
			$list_id = mysqli_insert_id($con);
			
				$sql = mysqli_query($con,"Select * From $utility");
					while($rs = mysqli_fetch_array($sql)){
								$utility_id = $rs['utility_id'];
								$utility_name = $rs['utility_name'];
								$utility_unit_price = $rs['utility_unit_price'];
								
							$strField = "  
								`meter_id` ,
								`meter_utility_id` ,
								`meter_room_id` ,
								`meter_unit` ,
								`meter_update` ";
																	
								// Insert  --------------------------------------------------------------------------------------//					
								$meter_unit = 0;
								$strValue = "
								'0', 
								'".$utility_id."', 
								'".$list_id."', 
								'".$meter_unit."', 
								'".$Date."' "; 
								$sql_Insert = mysqli_query($con,"INSERT INTO meter ($strField) VALUES ($strValue)");
						}
			

			exit("<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');window.location='".$page_Insert."';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}

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
					@mysqli_query($con,"Delete FROM ".$meter." WHERE meter_room_id='".$_REQUEST['ID']."'");
					$sql = mysqli_query($con,"Select * From $rent Where rent_room_id='".$_REQUEST['ID']."'");
					$rs = mysqli_fetch_array($sql);
							$rent_id = $rs['rent_id'];	
							$rent_mb_id = $rs['rent_mb_id'];
							$rent_room_id = $rs['rent_room_id'];
							$rent_deposits = $rs['rent_deposits'];
							$rent_check_in = $rs['rent_check_in'];
							$rent_status = $rs['rent_status'];
					
					 @mysqli_query($con,"Delete FROM ".$bill." WHERE bill_rent_id='".$rent_id."'");
					 @mysqli_query($con,"Delete FROM ".$bill_detail." WHERE bl_bill_id='".$rent_id."'");
					 @mysqli_query($con,"Delete FROM ".$rent." WHERE rent_room_id='".$rent_room_id."'");
					 @mysqli_query($con,"Delete FROM ".$member." WHERE mb_id='".$rent_mb_id."'");
	
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
	
// Insert Update Delelte --------------------------------------------------------------------//

	}else{ 
		// Field Table
		$ID = $rs['room_id'];
		$name = $rs['room_name'];
		
		$room_id = $rs['room_id'];
		$room_name = $rs['room_name'];
		$room_type_id = $rs['room_type_id'];
		$room_status = $rs['room_status'];
		} // End SQL
	
 ?>
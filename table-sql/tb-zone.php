<?php
		
 if(!empty($Sql)){
 // Start switch case  ==================================================//
		 // Text Field -------------------------------------------------------------------------------//
 		$ID = $_REQUEST['ID'];
		$Cus_Name = $_REQUEST['Cus_Name'];
		$Cus_Surname = $_REQUEST['Cus_Surname'];
		$Cus_Office = $_REQUEST['Cus_Office'];
		$Cus_Address = $_REQUEST['Cus_Address'];
		$Cus_District = $_REQUEST['Cus_District'];
		$Cus_Province = $_REQUEST['Cus_Province'];
		$Cus_Zipcode = $_REQUEST['Cus_Zipcode'];
		$Cus_Tel = $_REQUEST['Cus_Tel'];
		$Cus_Moblie = $_REQUEST['Cus_Moblie'];
		$Cus_Fax = $_REQUEST['Cus_Fax'];
		$Cus_Email = $_REQUEST['Cus_Email'];
		
		// Insert --------------------------------------------------------------------------------------//
		$id = 'Cus_ID';
		$strField = "  `Cus_ID` ,
							`Cus_Name` ,
							`Cus_Surname` ,
							`Cus_Office` ,
							`Cus_Address` ,
							`Cus_District` ,
							`Cus_Province` ,
							`Cus_Zipcode` ,
							`Cus_Tel` ,
							`Cus_Moblie` ,
							`Cus_Fax` ,
							`Cus_Email` ";
				
		$strValue = " '0', 
							'".$Cus_Name."', 
							'".$Cus_Surname."', 
							'".$Cus_Office."', 
							'".$Cus_Address."', 
							'".$Cus_District."', 
							'".$Cus_Province."', 
							'".$Cus_Zipcode."', 
							'".$Cus_Tel."', 
							'".$Cus_Moblie."', 
							'".$Cus_Fax."', 
							'".$Cus_Email."' "; 
						
		$strCheck = "Sup_Name='".$Sup_Name."'";
		$pageInsert = 'customer.php?stt=list';
		
		// Update -------------------------------------------------------------------------------------//
		$strCommand = "  `Cus_Name` =  '".$Cus_Name."',
									`Cus_Surname` =  '".$Cus_Surname."',
									`Cus_Office` =  '".$Cus_Office."',
									`Cus_Address` =  '".$Cus_Address."',
									`Cus_District` =  '".$Cus_District."',
									`Cus_Province` =  '".$Cus_Province."',
									`Cus_Zipcode` =  '".$Cus_Zipcode."',
									`Cus_Tel` =  '".$Cus_Tel."',
									`Cus_Moblie` =  '".$Cus_Moblie."',
									`Cus_Fax` =  '".$Cus_Fax."',
									`Cus_Email` =  '".$Cus_Email."'  ";
								
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
		$ID = $rs['Cus_ID'];
		$Cus_ID = $rs['Cus_ID'];
		$Cus_Name = $rs['Cus_Name'];
		$Cus_Surname = $rs['Cus_Surname'];
		$Cus_Office = $rs['Cus_Office'];
		$Cus_Address = $rs['Cus_Address'];
		$Cus_District = $rs['Cus_District'];
		$Cus_Province = $rs['Cus_Province'];
		$Cus_Zipcode = $rs['Cus_Zipcode'];
		$Cus_Tel = $rs['Cus_Tel'];
		$Cus_Moblie = $rs['Cus_Moblie'];
		$Cus_Fax = $rs['Cus_Fax'];
		$Cus_Email = $rs['Cus_Email'];
		} // End SQL
	
 ?>
 
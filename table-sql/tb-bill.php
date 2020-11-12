<?php	
$DateTime = date("Y-m-d H:i:s", mktime(date("H")+0, date("i")+0, date("s")+0, date("m")+0 , date("d")+0, date("Y")+0));
  $Date = date("Y-m-d");
 if(!empty($Sql)){

						
		
// Update -------------------------------------------------------------------------------------//
$strCommand = "   
`type_name` = '".$_REQUEST['type_name']."', 
`type_detail` = '".$_REQUEST['type_detail']."', 
`type_price` = '".$_REQUEST['type_price']."'  ";

$strCondition = " $id ='".$_REQUEST['ID']."' ";
		
// Delelte -------------------------------------------------------------------------------------//

$strCondition = "$id ='".$_REQUEST['ID']."' ";

$page_Insert = "$Table.php?stt=add"; 
$page_Delelte = "$Table.php?stt=list";

$msg_Insert = 'บันทึกข้อมูลเรียบร้อยแล้ว';
$msg_Update = 'บันทึกข้อมูลเรียบร้อยแล้ว';
 
// Start switch case  ==================================================//
	switch($_REQUEST['btn_Confirm']){
		// ----------------------------------------------------------------------------------------//
		case 'Calculate':
		// ----------------------------------------------------------------------------------------//
			 	$n = count($_REQUEST['meter_id']);
				for($i=0; $i<$n; $i++){
 
			    $_REQUEST['meter_id'][$i];
			 	$meter_id = $_REQUEST['meter_id'][$i];
				   $meter_unit_update  = $_REQUEST['meter_unit_'.$meter_id];
				 
					$sql = mysqli_query($con,"Select * From $meter Where meter_id='".$meter_id."'");
					$rs = mysqli_fetch_array($sql);
						$meter_utility_id = $rs['meter_utility_id'];
						$meter_room_id = $rs['meter_room_id'];
						$meter_unit = $rs['meter_unit'];	
					
			 		$sql_utility_id = mysqli_query($con,"Select * From utility Where utility_id=$meter_utility_id");
			 		$rs = mysqli_fetch_array($sql_utility_id);
						$utility_id = $rs['utility_id'];
						$utility_name = $rs['utility_name'];
					 	$utility_unit_price = $rs['utility_unit_price'];
							
							if(!is_numeric($meter_unit_update)){ 
 



								unset($_SESSION['meter_unit_'.$meter_id]);
								unset($_SESSION['unit'.$meter_id]);
								unset($_SESSION['unit_price'.$meter_id]);
								exit("<script>alert('กรุณากรอกข้อมูลให้ถูกด้วยนะ');(history.back());</script>"); 
 
								}else if(strpos($meter_unit_update,".") !== false){
								unset($_SESSION['meter_unit_'.$meter_id]);
								unset($_SESSION['unit'.$meter_id]);
								unset($_SESSION['unit_price'.$meter_id]);
								exit("<script>alert('กรุณากรอกข้อมูลให้ถูกด้วยนะ');(history.back());</script>"); 
	 
								}else if($meter_unit_update<$meter_unit){
								unset($_SESSION['meter_unit_'.$meter_id]);
								unset($_SESSION['unit'.$meter_id]);
								unset($_SESSION['unit_price'.$meter_id]);
								exit("<script>alert('กรุณากรอกข้อมูลให้ถูกด้วยนะ');(history.back());</script>"); 
							
								}else{
							 	 $_SESSION['meter_unit_'.$meter_id]=$meter_unit_update;
								 $_SESSION['unit'.$meter_id] = ($_SESSION['meter_unit_'.$meter_id]-$meter_unit);
								 $_SESSION['unit_price'.$meter_id] = ($_SESSION['unit'.$meter_id]*$utility_unit_price);
								 }
				}
 				exit("<script>window.location='bill.php?stt=add&ID=".$_REQUEST['ID']."#fo';</script>");
		break;
		
		// ----------------------------------------------------------------------------------------//
		case 'Confirm':
		// ----------------------------------------------------------------------------------------//
	 	 $n = count($_REQUEST['meter_id']);
			for($i=0; $i<$n; $i++){
					$meter_id = $_REQUEST['meter_id'][$i];
				 	if((empty($_SESSION['meter_unit_'.$meter_id])) and (empty($_SESSION['unit'.$meter_id])) and (empty($_SESSION['unit_price'.$meter_id]))){
					 exit("<script>alert('กรุณาทำรายการให้ถูกต้องด้วยนะ!');(history.back());</script>");
					 }
				}



	$sql = mysqli_query($con,"Select * From $rent Where rent_id='".$_REQUEST['ID']."'");
			$rs = mysqli_fetch_array($sql);
		 		$rent_id = $rs['rent_id'];
		 		$rent_room_id = $rs['rent_room_id'];
				$rent_mb_id = $rs['rent_mb_id'];
				
	$sql = mysqli_query($con,"Select * From $member Where mb_id='".$rent_mb_id."'");
	$rs = mysqli_fetch_array($sql);
			$mb_id = $rs['mb_id'];
			$mb_name = $rs['mb_name'];
 
// Field  --------------------------------------------------------------------------------------//
$strField = "  
`bill_id` ,
`bill_rent_id` ,
`bill_mb_id` ,
`bill_name` ,
`bill_total` ,
`bill_date` ,
`bill_status` ";
									
// Insert  --------------------------------------------------------------------------------------//		
$bill_status = '1';			
$strValue = "
'0', 
'".$rent_id."', 
'".$mb_id."', 
'".$mb_name."', 
'".$_REQUEST['total']."', 
'".$DateTime."', 
'".$bill_status."' "; 
		  
//เพิ่มข้อมูลลงในตาราง 
		$sql_Insert = mysqli_query($con,"INSERT INTO ".$Table." ($strField) VALUES ($strValue) ");
		if($sql_Insert){
		$list_id = mysqli_insert_id($con);
		
		
		$n = count($_REQUEST['meter_id']);
			for($i=0; $i<$n; $i++){
				$meter_id = $_REQUEST['meter_id'][$i];
				
				$sql = mysqli_query($con,"Select * From $meter Where meter_id='".$meter_id."'");
					$rs = mysqli_fetch_array($sql);
						$meter_utility_id = $rs['meter_utility_id'];
						$meter_room_id = $rs['meter_room_id'];
						$meter_unit = $rs['meter_unit'];	
					
			 		$sql_utility_id = mysqli_query($con,"Select * From utility Where utility_id=$meter_utility_id");
			 		$rs = mysqli_fetch_array($sql_utility_id);
						$utility_id = $rs['utility_id'];
						$utility_name = $rs['utility_name'];
					 	$utility_unit_price = $rs['utility_unit_price'];
	
			$strField = "  
			`bl_bill_id` ,
			`bl_utility_id` ,
			`bl_utility_name` ,
			`bl_num` ,
			`bl_price` ";
					 
			$strValue = "
				'".$list_id."', 
				'".$utility_id."', 
				'".$utility_name."', 
				'".$_SESSION['unit'.$meter_id]."', 
				'".$utility_unit_price."' "; 

				$sql_Insert = mysqli_query($con,"INSERT INTO ".$bill_detail." ($strField) VALUES ($strValue) ");

				$update_unit = $_SESSION['meter_unit_'.$meter_id];
				@mysqli_query($con,"Update ".$meter." Set meter_unit='".$update_unit."' Where meter_id='".$meter_id."'");
	
				
			}
			@mysqli_query($con,"Update ".$meter." Set meter_unit='0' Where meter_utility_id=3");
		$n = count($_REQUEST['meter_id']);
					for($i=0; $i<$n; $i++){
						$meter_id = $_REQUEST['meter_id'][$i];
						unset($_SESSION['meter_unit_'.$meter_id]);
						unset($_SESSION['unit'.$meter_id]);
						unset($_SESSION['unit_price'.$meter_id]); 
					}
		 	exit("<script>window.location='bill.php?stt=report&ID=".$_REQUEST['ID']."#fo';</script>");	
			}else{
			exit("<script>alert('บันทึกข้อมูลไม่ได้!');(history.back());</script>");
			}
		 
		break;
		
		// ----------------------------------------------------------------------------------------//
		case 'Cancel':
		// ----------------------------------------------------------------------------------------//
		
			$n = count($_REQUEST['meter_id']);
			for($i=0; $i<$n; $i++){
				$meter_id = $_REQUEST['meter_id'][$i];
				unset($_SESSION['meter_unit_'.$meter_id]);
				unset($_SESSION['unit'.$meter_id]);
				unset($_SESSION['unit_price'.$meter_id]);
			}
			exit("<script>window.location='bill.php?stt=add&ID=".$_REQUEST['ID']."#fo';</script>");	
		break;
		
		
		// ----------------------------------------------------------------------------------------//
		default: 
		// ----------------------------------------------------------------------------------------//
		exit("<script>alert('ไม่พบ SQL Action -> ".$Sql." ที่ส่งมาจากฟอร์ม!');(history.back());</script>");
		
		}
// END switch case  ==================================================//	 
// Insert Update Delelte --------------------------------------------------------------------//
//	include "sql-function-db.php";
// Insert Update Delelte --------------------------------------------------------------------//

	}else{ 
		// Result Table
		
		$ID = $rs['bill_id'];	
		$name = $rs['bill_name'];
 
		$bill_id = $rs['bill_id'];	
		$bill_name = $rs['bill_name'];
		$bill_rent_id = $rs['bill_rent_id'];
		$bill_mb_id = $rs['bill_mb_id'];
		$bill_total = $rs['bill_total'];
		$bill_date = $rs['bill_date'];
		
		
		

		

		} // End SQL
	
 ?>
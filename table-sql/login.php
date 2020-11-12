 <?php
 if(!empty($Sql)){
 
 // Start switch case  ==================================================//
	switch($Sql){
		// ----------------------------------------------------------------------------------------//
		case 'chk_login':
		// ----------------------------------------------------------------------------------------//
		 
			$user = $_POST['txt_user'];
			$pass = $_POST['txt_pass'];
			
				//เลือกข้อมูล เพื่อตรวจสอบการเข้าใช้ระบบ
				$am = mysqli_query($con,"SELECT * FROM ".$admin." WHERE am_user='".$user."' AND am_pass='".$pass."'");
				  $num1 = mysqli_num_rows($am);
				  
				$mb = mysqli_query($con,"SELECT * FROM ".$member." WHERE mb_user='".$user."' AND mb_pass='".$pass."'");
				  $num2 = mysqli_num_rows($mb);
				
				//ตรวจสอบการเข้าใช้ระบบส่วนของ ผู้ดูแลระบบ แล้วเก็บข้อมูล session ตามผู้ใช้งาน
					if($num1==1){
					$rs = mysqli_fetch_array($am);
					$_SESSION['sess_am_id'] = $rs['am_id'];
					$_SESSION['sess_am_userid'] = session_id();
					$fname = $rs['am_name'];
					exit("<script>alert('ยินดีต้อนรับคุณ [ ".$fname." ] เข้าระบบ');window.location='main.php?stt=list&rnt=1';</script>");	
					
					}else if($num2==1){
					$rs = mysqli_fetch_array($mb);
					$_SESSION['sess_mb_id'] = $rs['mb_id'];
					$_SESSION['sess_mb_userid'] = session_id();
					$fname = $rs['mb_name'];
					exit("<script>alert('ยินดีต้อนรับคุณ [ ".$fname." ] เข้าระบบ');window.location='index.php';</script>");	
			}else{
			exit("<script>alert('Username หรือ Password ไม่ถูกต้อง');(history.back());</script>");
			}
		break;
		}
// END switch case  ==================================================//	 
	}else{ //***  ----  จบ Check SQL ---- ***  //	
		exit("<script>alert('ตัวแปร SQL ไม่มีข้อมูล!');(history.back());</script>");
		} // End SQL
		

 ?>

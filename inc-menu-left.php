<?php 
$login = "";
if($_GET['stt']=='register'){
	$login = 1;
	}else if(!empty($_SESSION['sess_mb_id'])){ 
	$login = 1;
	}else if(!empty($_SESSION['sess_am_id'])){ 
	$login = 1;
	} 
 if(empty($login)){
?>
 
	<div id="login-left">
	<h2 id="title-txt">PLEAS LOGIN</h2>	
      <form method="post" action="<?php echo $Action; ?>" name="form2"  id="form2" onSubmit="return ChckTxT();" style="margin-bottom: 5px; padding:0px;">
        <script language="javascript">
				  	function ChckTxT(){
							if(document.form2.txt_user.value==""){
									alert("กรุณากรอกข้อมูล Login เข้าใช้ระบบก่อนนะ");
									document.form2.txt_user.focus();
									return false;
							}
							else if(document.form2.txt_pass.value==""){
									alert("กรุณากรอกข้อมูล รหัสผ่าน ด้วยนะ");
									document.form2.txt_pass.focus();
									return false;
							} else {
									return true;
							}
					}
				  </script>
	<fieldset>
    <label>Username(รหัสบัตรประชาชน) <input name="txt_user" type="text" class="frm" id="txt_user" placeholder="Username" style="width: 175px; margin-top: 5px;">
    </label>
	<label>Password <input name="txt_pass" type="password" class="frm" id="txt_pass" placeholder="password" style="width: 175px; margin-top: 5px;">
	</label>
	<button type="submit" class="btn">Login</button>
	<input type="hidden" name="Table" value="login" />
	<input type="hidden" name="Sql" value="chk_login" />		
	</fieldset>
	</form>
	</div>
 
<?php } ?>

<?php if(!empty($login_am_id)){ ?>

	<div id="title-profile"> 
	<div style="margin: 10px 0px 10px 0px; font-size: 18px;">ยินดีต้อนรับผู้ดูแลระบบ</div>
		<div id="profile">
			<p>คุณ : <? echo $login_am_name; ?></p>
		</div>	
	</div>
 
<div id="box-content-left"> 
	<form action="<?=$_SERVER['PHP_SELF']?>?stt=<?=$_GET['stt']?>" method="post" name="form1" class="form-inline" style="margin: 0px; padding: 0px;">
	<input name="Search" type="text" class="input-small" placeholder="Search" style="margin-left: 0px; width: 120px;"> <button type="submit" class="btn">ค้นหา</button>
	</form><?=$_POST['Search']?>
	</div>
	
<div id="login-left" style="margin-top: 5px;">
	<h2 id="title-txt">ข้อมูลเช่าห้องพัก </h2>	
		<ul id="menu-left">
			 <li><a href="rent.php?stt=list&rnt=1"><span><i class="icon-user"></i> ข้อมูลผู้เช่าห้องพัก</span></a></li>
			 <li><a href="rent.php?stt=list&rnt=2"><span><i class="icon-off"></i> ประวัติการเช่าห้องพัก</span></a></li>
		</ul>
	</div>
	
<div id="login-left" style="margin-top: 5px;">
	<h2 id="title-txt">ข้อมูลห้องเช่า </h2>	
		<ul id="menu-left">
			 <li><a href="room.php?stt=list&rnt=1"><span><i class="icon-ok"></i> ห้องว่างให้เช่า</span></a></li>
			 <li><a href="room.php?stt=list&rnt=2"><span><i class="icon-refresh"></i> ห้องเช่าแล้ว</span></a></li>
		</ul>
	</div>

	
<? }else if($login_mb_id){ ?>
	<div id="box-content-left"> 
	<div id="login-left" style="margin-top: 5px;">
	<h2  id="title-txt" style="margin: 10px 0px 10px 0px; font-size: 16px;"><i class="icon-user"></i>  ยินดีต้อนรับ สมาชิก</h2>
		<div id="profile">
		<ul id="menu-left" style="text-align:left;">
		<li>คุณ : <? echo $login_mb_name; ?></li>
		<li><a href="member.php?stt=profile"><i class="icon-edit"></i>  ข้อมูลส่วนตัว</a></li>
		<li><a href="member.php?stt=repass"><i class="icon-refresh"></i>  เปลี่ยนรหัสผ่าน </a></li>
		<li><a href="logout.php"><i class="icon-off"></i> ออกจากระบบ</a></li>
		</ul>
		</div>	
	</div>
	</div>
	
<div id="box-content-left"> 
	<h2 id="title-txt">ข้อมูลห้องเช่า </h2>	
		<ul id="menu-left">
			 <li><a href="rent.php?stt=derail&ID=<?=$rent_id?>"><span><i class="icon-th-list"></i> ข้อมูลการเช่า</span></a></li>
			 <li><a href="bill.php?stt=report&ID=<?=$rent_id?>"><span><i class="icon-repeat"></i> รายงานบิลค่าเช่า</span></a></li>
 
		</ul>
	</div>
	
<? } ?>

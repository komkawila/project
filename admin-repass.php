<div id="selection">
				  
<form action="<?php echo $Action; ?>" method="post" enctype="multipart/form-data" name="form3" onsubmit="return chk_pass();" class="form-horizontal">
<script language="javascript">
function chk_pass(){
	if(document.form3.txt_oldpass.value==""){
		alert("กรุณากรอก รหัสผ่านเดิม ด้วยนะ");
		document.form3.txt_oldpass.focus();
		return false;
	}
	else if(document.form3.txt_newpass.value=="") {
		alert("กรุณากรอก รหัสผ่าน ด้วยนะ");
		document.form3.txt_newpass.focus();
		return false;
	}
	else if(document.form3.txt_repass.value=="") {
		alert("กรุณากรอก รหัสผ่าน ด้วยนะ");
		document.form3.txt_repass.focus();
		return false;
	}
	else if((document.form3.txt_newpass.value)!=(document.form3.txt_repass.value )){
		alert("กรุณากรอก รหัสผ่านให้เหมือนกัน ด้วยนะ");
		return false;		
	}
	else {
	return true;
	}

}
</script>
<!-- // ---------------------------------------------- // -->
<h2 id="title-txt"><?=$sql_title?></h2> 
<!-- // ---------------------------------------------- // -->
     <div class="control-group">
    <label class="control-label" for="inputEmail">รหัสผ่านเดิม</label>
    <div class="controls">
     <input  name="txt_oldpass" type="password" id="txt" />
    </div>
  </div>
      <div class="control-group">
    <label class="control-label" for="inputEmail">รหัสผ่านใหม่</label>
    <div class="controls">
	 <input  name="txt_newpass" type="password" id="txt" />
    </div>
  </div>
      <div class="control-group">
    <label class="control-label" for="inputEmail">รหัสผ่านใหมอีกครั้ง</label>
    <div class="controls">
     <input  name="txt_repass" type="password" id="txt" />
    </div>
  </div>

		<div class="control-group">
			<div class="controls">
			<button type="submit" class="btn">บันทึกข้อมูล</button>
			<button type="button" class="btn" onclick="(history.back())">ย้อนกลับ</button>
			<?php include "inc-button.php"; ?>
			</div>
		</div> 
</form>		
</div> 
 
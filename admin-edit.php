<div id="selection">
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
	<?php include "inc_chk_txt_from.php"; ?>
		  <?php
		  		if(!empty($_GET['ID'])){
					$sql= mysqli_query($con,"Select * From $admin Where am_id='".$_SESSION['sess_am_id']."'");
					$rs = mysqli_fetch_array($sql);
					include $inc_table;
					// add_title edit_title
					}
		  ?>

<!-- // ---------------------------------------------- // -->
<h2 id="title-txt"><?=$sql_title?></h2> 
<!-- // ---------------------------------------------- // -->
	
		<div class="control-group">
		<label class="control-label">ชื่อผู้ใช้ Login</label>
			<div class="controls">
			<input disabled="disabled"  name="am_user" type="text" id="txt" style="width: 150px;" value="<?=$am_user?>"  />
			</div>
		</div>
 
		<div class="control-group">
		<label class="control-label">ชื่อ - นามสกุล </label>
			<div class="controls">
			<input  type="text" id="txt" style="width: 200px;" name="am_name" value="<?=$am_name?>"  />
			</div>
		</div>
 
		<div class="control-group">
		<label class="control-label">เบอร์โทรศัพท์</label>
			<div class="controls">
			<input type="text" id="txt" style="width: 110px;" name="am_tel"  value="<?=$am_tel?>" maxlength="10"  />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">อีเมล์</label>
			<div class="controls">
			<input type="text" id="txt" style="width: 250px;" name="am_email" value="<?=$am_email?>"  />
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
 
<div id="selection">
<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
	<?php include "inc_chk_txt_from.php"; ?>
		  <?php
		  		if(!empty($_GET['ID'])){
					$sql= mysqli_query($con,"SELECT * FROM ".$Table." WHERE $fl_id='".$_GET['ID']."'");
					$rs = mysqli_fetch_array($sql);
					include $inc_table;
					// add_title edit_title
					}
		  ?>
		  
		<!-- // ---------------------------------------------- // -->
		<h2 id="title-txt"><?php echo $add_title; ?></h2> 
		<!-- // ---------------------------------------------- // -->
		
		<div class="control-group">
		<label class="control-label">ชื่อ-นามสกุล </label>
			<div class="controls">
			<input  type="text" id="txt" style="width: 200px;" name="contact_name" value="<?=$contact_name?>"  />
			</div>
		</div>
		
		<div class="control-group">
		<label class="control-label">เบอร์โทรศัพท์</label>
			<div class="controls">
			<input type="text" id="txt" style="width: 110px;" name="contact_tel" value="<?=$contact_tel?>" maxlength="10"  />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">อีเมล์</label>
			<div class="controls">
			<input type="text" id="txt" style="width: 250px;" name="contact_email" value="<?=$contact_email?>"  />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">ติดต่อเรื่อง</label>
			<div class="controls">
			<input type="text" id="txt" style="width: 250px;" name="contact_title" value="<?=$contact_title?>"  />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">รายละเอียด</label>
			<div class="controls">
			<textarea rows="5" name="contact_detail" style="width: 90%;"><?=$contact_detail?></textarea>
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
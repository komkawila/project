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
	<h2 id="title-txt"><?php echo $add_title; ?></h2> 
		<div class="control-group">
		<label class="control-label">ชื่อผู้ใช้ Login</label>
			<div class="controls">
			<input  name="mb_user" type="text" id="txt" style="width: 150px;" value="<?=$mb_user?>"  />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">รหัสผ่าน</label>
			<div class="controls">
			<input  name="mb_pass" type="text" id="txt" style="width:150px;" value="<?=$mb_pass?>"  />
			</div>
		</div>
		
		<div class="control-group">
		<label class="control-label">ชื่อ - นามสกุล </label>
			<div class="controls">
			<input  type="text" id="txt" style="width: 200px;" name="mb_name" value="<?=$mb_name?>"  />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">เลขบัตรประชาชน </label>
			<div class="controls">
			<input name="mb_card_id" type="text" id="txt" style="width: 110px;" value="<?=$mb_card_id?>" maxlength="13"  />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">ที่อยู่/ตำบล</label>
			<div class="controls">
			<input type="text" id="txt" style="width: 250px;" name="mb_address" value="<?=$mb_address?>"  />
			</div>
		</div>
		
		<div class="control-group">
		<label class="control-label">อำเภอ</label>
			<div class="controls">
			<input type="text" id="txt" style="width: 200px;" name="mb_district" value="<?=$mb_district?>"  />
			</div>
		</div>
		
		<div class="control-group">
		<label class="control-label">จังหวัด</label>
			<div class="controls">
			<select  name="mb_province" id="txt" style="width: 211px;">
			<option value="" selected="selected">----เลือกข้อมูล----</option>
				<?php
					$sql = mysqli_query($con,"SELECT * FROM ".$province."");
					while($rs=mysqli_fetch_array($sql)) {
							$TxtID =$rs['province_id'];
							$TxtName =$rs['province_name'];
							
						if($mb_province==$TxtName){
								echo  "<option value =".$TxtName." selected>".$TxtName."</option>";
								}else{
								echo  "<option value = ".$TxtName.">".$TxtName."</option>";
								}					
							}
				?>
			</select>
			</div>
		</div>
		
		<div class="control-group">
		<label class="control-label">รหัสไปรษณีย์</label>
			<div class="controls">
			<input name="mb_zipcode" type="text" id="txt" style="width: 70px;" value="<?=$mb_zipcode?>" maxlength="5"  />
			</div>
		</div>
		
		<div class="control-group">
		<label class="control-label">เบอร์โทรศัพท์</label>
			<div class="controls">
			<input name="mb_tel" type="text" id="txt" style="width: 110px;" value="<?=$mb_tel?>" maxlength="10"  />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">อีเมล์</label>
			<div class="controls">
			<input type="text" id="txt" style="width: 250px;" name="mb_email" value="<?=$mb_email?>"  />
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
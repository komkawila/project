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
	<h2 id="title-txt"><?php echo $edit_title; ?></h2> 
<!-- // ---------------------------------------------- // -->
		
		<div class="control-group">
		<label class="control-label">สาธารณูปโภค</label>
			<div class="controls">
			<select  name="meter_utility_id" id="txt" style="width: 211px;">
			<option value="" selected="selected">----เลือกข้อมูล----</option>
				<?php
					$sql = mysqli_query($con,"SELECT * FROM ".$utility."");
					while($rs=mysqli_fetch_array($sql)) {
							$TxtID =$rs['utility_id'];
							$TxtName =$rs['utility_name'];
							
						if($meter_utility_id==$TxtID){
								echo  "<option value =".$TxtID." selected>".$TxtName."</option>";
								}else{
								echo  "<option value = ".$TxtID.">".$TxtName."</option>";
								}					
							}
				?>
			</select>
			</div>
		</div>
		
		<div class="control-group">
		<label class="control-label">ห้องพัก</label>
			<div class="controls">
			<select  name="meter_room_id" id="txt" style="width: 211px;">
			<option value="" selected="selected">----เลือกข้อมูล----</option>
				<?php
					$sql = mysqli_query($con,"SELECT * FROM ".$room."");
					while($rs=mysqli_fetch_array($sql)) {
							$TxtID =$rs['room_id'];
							$TxtName =$rs['room_name'];
							
						if($meter_room_id==$TxtID){
								echo  "<option value =".$TxtID." selected>".$TxtName."</option>";
								}else{
								echo  "<option value = ".$TxtID.">".$TxtName."</option>";
								}					
							}
				?>
			</select>
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">หน่วยเริ่มต้น </label>
			<div class="controls">
			<input  type="text" id="txt" style="width: 100px;" name="meter_unit" value="<?=$meter_unit?>"  />
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
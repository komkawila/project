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
	<h2 id="title-txt"><?php echo $sql_title; ?></h2> 
<!-- // ---------------------------------------------- // -->

		<div class="control-group">
		<label class="control-label">ประเภทห้อง </label>
			<div class="controls">
			<select  name="room_type_id" id="txt" style="width: auto;">
			<option value="" selected="selected">----เลือกข้อมูล----</option>
				<?php
					$sql = mysqli_query($con,"SELECT * FROM ".$room_type."");
					while($rs=mysqli_fetch_array($sql)) {
							$TxtID =$rs['type_id'];
							$TxtName =$rs['type_name'];
							$TxtPrice = $rs['type_price'];
						if($room_type_id==$TxtID){
								echo  "<option value =".$TxtID." selected>".$TxtName." ราคา(".number_format($TxtPrice,2).")</option>";
								}else{
								echo  "<option value = ".$TxtID.">".$TxtName." ราคา(".number_format($TxtPrice,2).")</option>";
								}					
							}
				?>
			</select>
			</div>
		</div>
		
		<div class="control-group">
		<label class="control-label">ชื่อห้อง</label>
			<div class="controls">
			<input  type="text" id="txt" style="width: 100px;" name="room_name" value="<?=$room_name?>"  />
			</div>
		</div>
		
		<div class="control-group">
		<label class="control-label">สถานะ</label>
			<div class="controls">
			<select name="room_status" id="txt" style="width: 150px;">
                        <option value="" selected="selected">---- เลือกข้อมูล ----</option>
                        <?PHP
											// จัดเก็บข้อมูลในรูปแบบ array 
											$Array_txt = array("ห้องว่าง", "ห้องเช่าแล้ว");
											for($i=0; $i < count($Array_txt); $i++){
													$TxtName = $Array_txt[$i];
												if($room_status==$TxtName){
														echo "<option value=".$TxtName." selected='selected'>".$TxtName."</option>";
													}else{
														echo "<option value=".$TxtName.">".$TxtName."</option>";
													}
											}
									   ?>
                      </select>
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
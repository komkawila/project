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
			<select  name="rent_mb_id" id="txt" style="width: auto;" onchange="window.location='<?=$_SERVER['PHP_SELF']?>?stt=edit&ID=<?=$_GET['ID']?>&type_id='+this.value+'#fo'" >
			<option  value="<?=$type_id?>"><?php echo $type_name."ราคา(".number_format($type_price,2).")"; ?></option>
				<?php
					$sql = mysqli_query($con,"SELECT * FROM ".$room_type." Where type_id Not In('$type_id')");
					while($rs=mysqli_fetch_array($sql)) {
							$TxtID =$rs['type_id'];
							$TxtName =$rs['type_name'];
							$TxtPrice = $rs['type_price'];
							if($_GET['type_id']==$TxtID){
								echo  "<option value =".$TxtID." selected=selected>".$TxtName." ราคา(".number_format($TxtPrice,2).")</option>";
								}else{
								echo  "<option value = ".$TxtID.">".$TxtName." ราคา(".number_format($TxtPrice,2).")</option>";
								}					
							}
				?>
			</select>
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">ห้องเช่า</label>
			<div class="controls">
			<select  name="rent_room_id" id="txt" style="width: auto;">
				<?php if(empty($_GET['type_id'])){  ?>
				<option value="<?=$room_id?>" selected="selected">ห้อง <?=$room_name?> เช่า</option>
				<?php }else if($type_id == $_GET['type_id']){ ?>
				<option value="<?=$room_id?>" selected="selected">ห้อง <?=$room_name?> เช่า</option>
				<? }else{
					$type_id = $_GET['type_id'];
					} ?>
	
				<?php
					$sql = mysqli_query($con,"SELECT * FROM ".$room." Where room_type_id='".$type_id."' And room_status='ห้องว่าง' Order By room_id Asc");
				 	$numrs = mysqli_num_rows($sql);
					if($numrs==0){
						echo "<option value =''> ไม่มีห้องว่าง</option>";
					}else{
					while($rs=mysqli_fetch_array($sql)) {
							$TxtID =$rs['room_id'];
							$TxtName =$rs['room_name'];
							if($room_type_id==$TxtID){
									echo  "<option value =".$TxtID." selected> ห้อง ".$TxtName." ว่าง</option>";
									}else{
									echo  "<option value = ".$TxtID."> ห้อง ".$TxtName." ว่าง</option>";
									}					
							}
						}
				?>
			</select>
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">ค่ามัดจำ</label>
			<div class="controls">
			<input  type="text" id="txt" style="width: 100px;" name="rent_deposits" value="<?=$rent_deposits?>"  />
			</div>
		</div>
		
 	<div class="control-group">
		<label class="control-label">เข้าพักวันที่</label>
			<div class="controls">
			<input  type="text" i id="datepicker-now" style="width: 100px;" name="rent_check_in" value="<?=$InputDate?>"  />
			</div>
		</div>
 <!-- // ----------------------------------------------  
		<div class="control-group">
		<label class="control-label">สถานะ</label>
			<div class="controls">
			<select name="rent_status" id="txt" style="width: 150px;">
                        <option value="" selected="selected">---- เลือกข้อมูล ----</option>
                        <?PHP
											// จัดเก็บข้อมูลในรูปแบบ array 
											$Array_txt = array("ใช้บริการ", "เลิกใช้บริการ");
											for($i=0; $i < count($Array_txt); $i++){
													$TxtName = $Array_txt[$i];
												if($rent_status==$TxtName){
														echo "<option value=".$TxtName." selected='selected'>".$TxtName."</option>";
													}else{
														echo "<option value=".$TxtName.">".$TxtName."</option>";
													}
											}
									   ?>
                      </select>
			</div>
		</div>
 ---------------------------------------------- // -->
<br />

<!-- // ---------------------------------------------- // -->
	<h2 id="title-txt">ข้อมูลผู้เช่าห้อง</h2> 
<!-- // ---------------------------------------------- // -->

		<div class="control-group">
		<label class="control-label">เลขบัตรประชาชน</label>
			<div class="controls">
			<input name="mb_user" type="text" id="txt" style="width: 150px;" value="<?=$mb_user?>" maxlength="13"  />
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
<!-- // ---------------------------------------------- // 
		<div class="control-group">
		<label class="control-label">เลขบัตรประชาชน </label>
			<div class="controls">
			<input name="mb_card_id" type="text" id="txt" style="width: 110px;" value="<?=$mb_card_id?>" maxlength="13"  />
			</div>
		</div>
 // ---------------------------------------------- // -->
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
 			<input type="hidden" name="mb_id" value="<?=$mb_id?>" />
			<input type="hidden" name="chk_user" value="<?=$mb_user?>" />
			</div>
		</div> 
</form>		
</div> 
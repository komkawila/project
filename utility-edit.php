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
		<label class="control-label">ชื่อสาธารณูปโภค</label>
			<div class="controls">
			<input  type="text" id="txt" style="width: 250px;" name="utility_name" value="<?=$utility_name?>"  />
			</div>
		</div>

		<div class="control-group">
		<label class="control-label">ราคาต่อหน่วย </label>
			<div class="controls">
			<input  type="text" id="txt" style="width: 100px;" name="utility_unit_price" value="<?=$utility_unit_price?>"  />
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
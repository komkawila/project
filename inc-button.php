 <?php	 if($_GET['stt']=='edit'){ ?>
			<input type="hidden" name="Table" value="<?=$Table; ?>" />
			<input type="hidden" name="Sql" value="Update" />	
			<input type="hidden" name="ID" value="<?=$ID?>" />
			
<?php }else if($_GET['stt']=='add'){ ?>
			<input type="hidden" name="Table" value="<?=$Table?>" />
			<input type="hidden" name="Sql" value="Insert" />	

<?php }else if($_GET['stt']=='register'){ ?>
			<input type="hidden" name="Table" value="<?=$Table?>" />
			<input type="hidden" name="Sql" value="Insert" />	

<?php }else if($_GET['stt']=='contact'){  ?>
			<input type="hidden" name="Table" value="<?=$Table?>" />
			<input type="hidden" name="Sql" value="Insert" />	
			
<?php }else if($_GET['stt']=='rent'){ ?>
			<input type="hidden" name="Table" value="<?=$Table?>" />
			<input type="hidden" name="Sql" value="Insert" />	
			
<?php }else if($_GET['stt']=='repass'){ ?>
			<input type="hidden" name="Table" value="<?=$Table?>" />
			<input type="hidden" name="Sql" value="Repass" />
			
<?php }else{ ?>
			<a type="button" class="btn" href="?stt=add" style="margin-bottom: 10px;"><i class="icon-plus-sign"></i> เพิ่มข้อมูล</a>
			<button type="button" class="btn" onClick="(history.back())" style="margin-bottom: 10px;"><i class="icon-circle-arrow-left"></i> ย้อนกลับ</button>
<?php }   
// echo " ID= ".$ID."<br />";	
/// echo " Table = ". $Table; ?>
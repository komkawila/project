<?php
$sql = mysqli_query($con,"Select * From $contact Where contact_id='".$_REQUEST['ID']."'");
$rs = mysqli_fetch_array($sql);
 if($rs['contact_status']==1){
	$update = mysqli_query($con,"Update ".$contact." Set contact_status='2' Where contact_id='".$_REQUEST['ID']."'");
	}
include 'table-sql/tb-'.$contact.'.php'; 
 


?>
<div id="selection">
<!-- // ---------------------------------------------- // -->
<h2 id="title-txt">เรื่อง <?=$contact_title?></h2> 
<!-- // ---------------------------------------------- // -->

<table  class="table table-bordered table-condensed" style="width: 100%; ">
  <tr>
    <td style="padding: 5px;">
	<b>รายละเอียด</b><br/>
	<?=$contact_detail?></td>
  </tr>
</table>
 
<!-- // ---------------------------------------------- // -->
<h2 id="title-txt">โดยคุณ <?=$contact_name?></h2> 
<!-- // ---------------------------------------------- // -->
<table  class="table table-bordered table-condensed" style="width: 100%;">
  <tr>
    <td width="15%"><label>เบอร์โทรศัพท์</label></td>
    <td width="85%"><?=$contact_tel?></td>
  </tr>
  <tr>
    <td><label>อีเมล์</label></td>
    <td><?=$contact_email?></td>
  </tr>
</table>
			<div style="text-align:right;">
  <button type="button" class="btn"  onclick="parent.location='<?php echo $Action; ?>?Table=<?php echo $Table; ?>&Sql=Delete&ID=<?=$ID?>'" onclick="return confirm('ยืนยันลบข้อมูล <?=$name?> ออกจากระบบ')'"><i class="icon-trash"></i> ลบข้อความ</button>
  <button type="button" class="btn" onClick="(history.back())"><i class="icon-circle-arrow-left"></i> ย้อนกลับ</button>
			</div>
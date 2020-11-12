<?php
$sql = mysqli_query($con,"Select * From $member Where mb_id='".$_SESSION['sess_mb_id']."'");
$rs = mysqli_fetch_array($sql);
include $inc_table;
?>

<div id="selection">


<!-- // ---------------------------------------------- // -->
<h2 id="title-txt">ข้อมูลส่วนตัว คุณ<?=$mb_name?></h2> 
<!-- // ---------------------------------------------- // -->

<table  class="table table-bordered table-condensed" style="width: 100%;">
  <tr>
    <td width="217"><strong>เลขบัตรประชาชน</strong></td>
    <td width="1061"><?=$mb_user?> </td>
    </tr>
  <tr>
    <td><strong> ที่อยู่</strong></td>
    <td> <?=$mb_address?> อำเภอ <?=$mb_district?> จังหวัด <?=$mb_province?> รหัสไปรษณีย์ <?=$mb_zipcode?></td>
    </tr>
  <tr>
    <td><strong>เบอร์โทรศัพท์</strong></td>
    <td><?=$mb_tel?></td>
  </tr>
  <tr>
    <td><strong>อีเมล์</strong></td>
    <td><?=$mb_email?></td>
  </tr>
</table> 

<!-- // ---------------------------------------------- // -->
 <div style="text-align:right;">
  <button type="button" class="btn"  onclick="parent.location='?stt=edit&ID=<?=$_SESSION['sess_mb_id']?>'"><i class="icon-edit"></i> แก้ไขข้อมูล</button>
  <button type="button" class="btn" onClick="(history.back())"><i class="icon-circle-arrow-left"></i> ย้อนกลับ</button>
  </div>
<!-- // ---------------------------------------------- // -->
</div>
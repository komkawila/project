<?php
$sql = mysqli_query($con,"Select * From $admin Where am_id='".$_SESSION['sess_am_id']."'");
$rs = mysqli_fetch_array($sql);
include 'table-sql/tb-'.$admin.'.php'; 
 
?>
<div id="selection">
<!-- // ---------------------------------------------- // -->
<h2 id="title-txt"><?=$sql_title?></h2> 
<!-- // ---------------------------------------------- // -->

<table  class="table table-bordered table-condensed" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <td width="15%">Login</td>
    <td width="85%"><?=$am_user?></td>
  </tr>
  <tr>
    <td>ชื่อ - นามสกุล	</td>
    <td><?=$am_name?></td>
  </tr>
  <tr>
    <td>อีเมล์</td>
    <td><?=$am_email?></td>
  </tr>
  <tr>
    <td>สถานะ</td>
    <td><?=$am_status?></td>
  </tr>
</table>
 <div style="text-align:right;">
  <button type="button" class="btn"  onclick="parent.location='?stt=edit&ID=<?=$_SESSION['sess_am_id']?>'"><i class="icon-edit"></i> แก้ไขข้อมูล</button>
  <button type="button" class="btn" onClick="(history.back())"><i class="icon-circle-arrow-left"></i> ย้อนกลับ</button>
  </div>
</div>
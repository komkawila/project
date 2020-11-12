<?php
$sql = mysqli_query($con,"Select * From $rent Where rent_id='".$_REQUEST['ID']."'");
$rs = mysqli_fetch_array($sql);
include $inc_table;
?>

<div id="selection">

<!-- // ---------------------------------------------- // -->
<h2 id="title-txt"><?=$sql_title?>( <?=$room_name?> )</h2> 
<!-- // ---------------------------------------------- // -->

<table  class="table table-bordered table-condensed" style="width: 100%;">
  <tr>
    <td width="230" ><strong>ประเภทห้องเช่า</strong></td>
    <td width="1048"><?=$type_name?> <strong>ราคา</strong> <?=number_format($type_price,2)?></td>
    </tr>
  <tr>
    <td><strong>ข้อมูลผู้เช่า</strong></td>
    <td> คุณ      <?=$mb_name?></td>
    </tr>
  <tr>
    <td><strong>วันที่เข้าพัก</strong></td>
    <td><?=fcDate($rent_check_in)?></td>
    </tr>
  <tr>
    <td><strong>สถานะการเช่าห้อง</strong></td>
    <td><?=$rent_status?></td>
  </tr>
</table>

 

<!-- // ---------------------------------------------- // -->
<h2 id="title-txt">ข้อมูลบิลค่าเช่า</h2> 
<!-- // ---------------------------------------------- // -->

<table  class="table table-bordered table-condensed" style="width: 100%;">
  <tr>
    <td width="124" style="text-align:center;"><strong>รหัสบิล </strong></td>
    <td width="409">ข้อมูลผู้เช่า</td>
    <td width="372">ข้อมูลห้องเช่า</td>
    <td width="231" style="text-align:center;">วัน/เดือน/ปี</td>
    <td width="130" style="text-align:center;">ราคารวม </td>
    </tr>
  <tr>
    <td><strong> </strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp; </td>
    </tr>
  <tr>
    <td><strong> </strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp; </td>
  </tr>
  <tr>
    <td><strong> </strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp; </td>
  </tr>
</table>


 <button type="button" class="btn"  onclick="parent.location='print-rent.php?stt=rent&ID=<?=$_GET['ID']?>'"><i class="icon-print"></i> พิมพ์รายงาน</button>
<button type="button" class="btn" onClick="(history.back())"><i class="icon-circle-arrow-left"></i> ย้อนกลับ</button>

</div>
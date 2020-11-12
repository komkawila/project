<?php
$sql = mysqli_query($con,"Select * From $rent Where rent_id='".$_REQUEST['ID']."'");
$rs = mysqli_fetch_array($sql);
include $inc_table;
?>

<div id="selection">


<!-- // ---------------------------------------------- // -->
<h2 id="title-txt">ข้อมูลผู้เช่า คุณ<?=$mb_name?></h2> 
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
<h2 id="title-txt"><?=$sql_title?>( <?=$room_name?> )</h2> 
<!-- // ---------------------------------------------- // -->

<table  class="table table-bordered table-condensed" style="width: 100%;">
  <tr>
    <td width="230" ><strong>ประเภทห้องเช่า</strong></td>
    <td width="1048"><?=$type_name?> <strong>ราคา</strong> <?=number_format($type_price,2)?></td>
    </tr>
  <tr>
    <td><strong>รายละเอียด</strong></td>
    <td><?=$type_detail?></td>
    </tr>
  <tr>
    <td><strong>ค่ามัดจำ</strong></td>
    <td><?=number_format($rent_deposits,2)?></td>
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

 


 <button type="button" class="btn"  onclick="parent.location='bill.php?stt=report&ID=<?=$_GET['ID']?>#fo'"><i class="icon-list"></i> รายงานค่าเช่า</button>
  <button type="button" class="btn"  onclick="parent.location='print-rent.php?stt=rent&ID=<?=$_GET['ID']?>'"><i class="icon-print"></i> พิมพ์ใบเช่า</button>
<button type="button" class="btn" onClick="(history.back())"><i class="icon-circle-arrow-left"></i> ย้อนกลับ</button>

</div>
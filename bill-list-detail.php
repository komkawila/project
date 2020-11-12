<?php
$sql = mysqli_query($con,"Select * From $bill Where bill_id='".$_REQUEST['ID']."'");
$rs = mysqli_fetch_array($sql);
include 'table-sql/tb-'.$bill.'.php'; 
 
$sql = mysqli_query($con,"Select * From $rent Where rent_id='".$bill_rent_id."'");
$rs = mysqli_fetch_array($sql);
include 'table-sql/tb-'.$rent.'.php'; 
?>
<div id="selection">
<!-- // ---------------------------------------------- // -->
<h2 id="title-txt"><?=$list_title?>( <?=$room_name?> )</h2> 
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
    <td><strong>เบอร์โทร</strong></td>
    <td>  <?=$mb_tel?></td>
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
<h2 id="title-txt"> รายละเอียดบิลค่าเช่า </h2> 
<!-- // ---------------------------------------------- // -->
<?
$sql = mysqli_query($con,"Select * From $bill Where bill_id='".$_REQUEST['ID']."'");
$rs = mysqli_fetch_array($sql);
include 'table-sql/tb-'.$bill.'.php'; 
?>
<table  class="table table-bordered table-condensed" style="width: 100%; margin-bottom: 5px;">
        <tr>
          <td width="11%" align="center" valign="middle" class="txt_top1" style="text-align:center;"><strong>รหัสบิล</strong></td>
          <td width="15%" align="left" valign="middle" class="txt_top1" style="text-align:center;"><strong>ห้องเช่า</strong></td>
          <td width="32%" align="left" valign="middle" class="txt_top1" style="text-align:center;"><strong>ชื่อผู้เช่าห้องพัก</strong></td>
          <td width="25%" align="left" valign="middle" class="txt_top1" style="text-align:center;"><strong>ค่าเช่าวันที่</strong></td>
          <td width="17%" align="center" valign="middle" class="txt_top1" style="text-align:center;"><strong> </i>ราคารวม</strong> </td>
       </tr>
		
         <tr class="report">
          <td width="11%" align="center" valign="middle" class="txt_report-1" style="text-align:center;"><?=sprintf("%05d",$bill_id)?></td>
          <td align="left" valign="middle" class="txt_report-1" style="text-align:center;">ห้อง <?=$room_name?></td>
          <td align="left" valign="middle" class="txt_report-1">คุณ <?=$mb_name?></td>
          <td align="left" valign="middle" class="txt_report-1" style="text-align:center;"><?=fcDate($bill_date)?></td>
          <td align="center" valign="middle" class="link1"  style="text-align:right;"><?=number_format($bill_total,2)?></td>
       </tr>
      </table>
 
	<?php include "inc_chk_txt_from.php"; ?>
<table  class="table table-bordered table-condensed" style="width: 100%; margin-bottom: 5px;">
  <tr>
    <td width="259" style="text-align:left;"><strong>ข้อมูลสาธารณูปโภค </strong></td>
    <td width="246" style="text-align:center;"><strong>หน่วยครั้งก่อน</strong></td>
    <td width="206" style="text-align:center;"><strong>หน่วยล่าสุด</strong></td>
    <td width="202" style="text-align:center;"><strong>หน่วนที่ใช้</strong></td>
    <td width="209" style="text-align:center;"><strong>ราคา/หน่วย</strong></td>
    <td width="154" style="text-align:center;"><strong>ราคารวม</strong></td>
    </tr>
<style type="text/css">
	input#num_mt{
	width: 80%; height: 100%; padding: 0px 5px 0px 5px; margin: 0px 2px 0px 2px; font-size:15px;
	}
</style>
<?php
 
$sql = mysqli_query($con,"Select * From $utility, $bill_detail Where utility_id=bl_utility_id And bl_bill_id='".$bill_id."'");
while($rs = mysqli_fetch_array($sql)){
include "table-sql/tb-utility.php";
 $meter_unit_list = $meter_unit - $bl_num;
 $unit_price = $bl_num*$bl_price;
 if($meter_unit_list <= -1){
 	$meter_unit_list = '-';
	$meter_unit = $bl_num;
 }
 ?> 
  <tr style="padding: 0px;">
    <td valign="middle" style="text-align:left;"><strong> - <?=$utility_name?> </strong></td>
    <td valign="middle" style="text-align:left;"><?=$meter_unit_list?></td>
    <td valign="middle" style="text-align:center; padding:2px;"> <?=$meter_unit?></td>
    <td valign="middle" style="text-align:center;"><?=$bl_num?> </td>
    <td valign="middle" style="text-align:right;"><?=number_format($bl_price,2)?></td>
    <td valign="middle" style="text-align:right;"><?=number_format($unit_price,2)?></td>
    </tr>
	<?php

		$total_unit=($total_unit+$unit_price);
		 } 
		$total = ($total_unit+$type_price);
 
	?>
<tr>
    <td colspan="5" valign="middle" style="text-align:right;"><strong>ค่า<?=$type_name?> <?=$room_name?> </strong></td>
    <td valign="middle" style="text-align:right;"><?=number_format($type_price,2)?> </td>
    </tr>
<tr>
  <td colspan="5" valign="middle" style="text-align:right;"><strong>รวมยอดชำระค่าเช่า</strong></td>
  <td valign="middle" style="text-align:right;"><?=number_format($total,2)?> </td>
</tr>
</table>
			<div style="text-align:right;">
  <button type="button" class="btn"  onclick="parent.location='print-bill.php?stt=rent&ID=<?=$_GET['ID']?>'"><i class="icon-print"></i> พิมพ์ค่าเช่า</button>
  <button type="button" class="btn" onClick="(history.back())"><i class="icon-circle-arrow-left"></i> ย้อนกลับ</button>
			</div>
 
 
</div>

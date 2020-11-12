<?php include "session-start.php"; ?>
<?php
$sql = mysqli_query($con,"Select * From $bill Where bill_id='".$_REQUEST['ID']."'");
$rs = mysqli_fetch_array($sql);
include 'table-sql/tb-'.$bill.'.php'; 
 
$sql = mysqli_query($con,"Select * From $rent Where rent_id='".$bill_rent_id."'");
$rs = mysqli_fetch_array($sql);
include 'table-sql/tb-'.$rent.'.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="images/template-js.css" />
<link rel="stylesheet" type="text/css" href="images/template.css" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="css/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="css/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
			<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);
		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)
		    $("input#datepicker-now").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, minDate: '-7d', maxDate: '+0d', dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
     		    $("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});
		    	$("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });
			});
		</script>
		<style type="text/css">
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		
 
.ui-datepicker{  
    width:250px;  
    font-family:tahoma;  
    font-size:13px;  
}  
 
-->
        </style>	
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family:Tahoma, Vernada, Arial, Helvetica, sans-serif;
 
}
#report-box{
	width: 750px;
	margin: 10px auto 10px  auto;
	height: auto;
	box-shadow:  0px  0px 5px 0px #ddd;
	border-radius: 0px;
	padding: 10px;
	background:#fff;
}
 #report-head{
	width: 100%;
	height: auto;
	border-bottom: 1px dashed #aaa;
	text-align:center;
	margin-top: 10px;
 
}
#report-content{
	margin-top: 15px;
	width: 100%;
	height: auto;
}
#report-footer{
	width: 100%;
	height: auto;
	margin-top: 5px;
	padding: 10px 0px 10px 0px;
	border-top: 1px dashed #aaa;
	text-align:center;
 
}
#title-txt{
	font-size: 15px;
}
 -->
</style> 
<script>
function fcn_print(){
	a1=document.getElementById('print_rpt');
	a1.style.visibility = "hidden";

	window.print();
	//window.close();
	//window.location='index.php';
	window.location='mb_order.php';
	a1.style.visibility = "visible";
	}
	</script>
<title>Untitled Document</title>

</head>

 <body onload="window.print(); (history.back());">

<div id="report-box">
	<div id="report-head">
	
<h4>บิลค่าเช่าห้อง</h4> 
<h5>ระบบการจัดการห้องเช่า Apartment Management System</h5>
	</div>
	<div id="report-content">
<div id="selection">
<!-- // ---------------------------------------------- // -->
<h2 id="title-txt">บิลค่าเช่าห้อง( <?=$room_name?> )</h2> 
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

 
 
</div>
	</div>
	<div id="report-footer">
	<?php include "inc-print-footer.php"; ?>
	</div>
	
</div>
</body>
</html>
 
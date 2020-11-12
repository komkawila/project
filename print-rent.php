<?php include "session-start.php"; ?>
<?php
$sql = mysqli_query($con,"Select * From $rent Where rent_id='".$_REQUEST['ID']."'");
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

 <body onload="window.print();">

<div id="report-box">
	<div id="report-head">
	
<h4>ใบเช่าห้องพัก</h4> 
<h5>ระบบการจัดการห้องเช่าApartment Management System</h5>
	</div>
	<div id="report-content">
<div id="selection">

<!-- // ---------------------------------------------- // -->
<h2 id="title-txt"> ข้อมูลการเช่าห้องพัก( <?=$room_name?> )</h2> 
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

 

<!-- // ---------------------------------------------- // -->
<h2 id="title-txt">ข้อมูลผู้เช่า คุณ<?=$mb_name?></h2> 
<!-- // ---------------------------------------------- // -->

<table  class="table table-bordered table-condensed" style="width: 100%; margin-bottom: 5px;">
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
</div>
	</div>
	<div id="report-footer">
	<?php include "inc-print-footer.php"; ?>
	</div>
	
</div>
</body>
</html>
 
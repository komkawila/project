<?php include "session-start.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $TitlePage; ?></title>
<script type="text/javascript" src="images/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="slimbox/js/slimbox2.js"></script>
<link rel="stylesheet" href="slimbox/css/slimbox2.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="images/template-js.css" />
<link rel="stylesheet" type="text/css" href="images/template.css" />
<link rel="stylesheet" type="text/css" href="images/css-menu.css" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="css/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="css/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
			<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);
		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)
		    $("input#datepicker-now").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, minDate: '-0d', maxDate: '+2m', dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
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
		height: 210px;
		font-family:tahoma;  
		font-size:13px;  
	}  
-->
</style>	

</head>
<body>
<div id="Container-box">
<div id="header">
<?php include "inc-header.php"; ?>
</div>
<div id="menu">
		<?php include "inc-menu-top.php"; ?>
</div>
<div id="container">
	<div id="left-content">
		<?php include "inc-menu-left.php"; ?>
    </div>

<div id="right-content">  
 
 	<?php
	$title_p2 = 'ข้อมูลค่าเช่าห้อง';
	$Table = 'bill';
	$fl_id = 'bill_id';
	$inc_table = 'table-sql/tb-'.$Table.'.php'; 
	
	if(!empty($sql_page)){
	
		switch($sql_page){
			case 'add':
				$sql_title = ''.$title_p2;
				include $Table."-add.php";
			break;
			
			case 'edit':
				$sql_title = 'แก้ไขข้อ'.$title_p2;
				include  $Table."-edit.php";
			break;
			
			case 'list':
				$list_title = 'คิดค่าเช่าห้อง';
				include  $Table."-list.php";
			break;
			
			case 'bill':
				$list_title = 'รายงานค่าเช่า';
				include  $Table."-list-bill.php";
			break;

			case 'report':
				$list_title = 'รายงานค่าเช่า';
				include  $Table."-list-report.php";
			break;
			
			case 'detail':
				$list_title = 'รายงานค่าเช่า';
				include  $Table."-list-detail.php";
			break;
			
			case'bill-report':
				$list_title = 'สรุปยอดรวมค่าเช่า';
				include  $Table."-list-report2.php";
			break;
			
			
			}

		}
	
//	$list_title = $title_p2;
//	include  $Table."-list.php";
	?> 

</div>

	<div id="clear-both"></div>
  </div>
<div id="footer">
<?php include "inc-footer.php"; ?>
</div>
</div>
</body>
</html>

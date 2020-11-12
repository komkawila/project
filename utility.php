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
	$page = $_GET['stt'];
	$title_tb = 'ข้อมูลสาธารณูปโภค ';
	$Table = $utility;
	$fl_id = 'utility_id';
	$inc_table = 'table-sql/tb-utility.php'; 
	if(!empty($page)){
		switch($page){
			case 'add':
				$add_title = 'เพิ่ม'.$title_tb;
				include "utility-add.php";
			break;
			
			case 'edit':
				$edit_title = 'แก้ไข'.$title_tb;
				include "utility-edit.php";
			break;
		}
	}
$list_title = $title_tb;
include "utility-list.php";
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

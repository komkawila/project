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
	if(!empty($sql_page)){
		$title_p2 = 'ข้อมูลค่าเช่าห้อง';
		$Table = 'bill';
		$fl_id = 'bill_id';
		$inc_table = 'table-sql/tb-'.$Table.'.php'; 
	
		switch($sql_page){
			case 'list':
				$list_title = 'ข้อมูลบิลค่าเช่า';
				include  $Table."-list.php";
			break;
		}	
	}
 
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

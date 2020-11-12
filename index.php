<?php session_start(); include "config.inc.php"; ?>
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
	if(!empty($page)){
		switch($page){
		
			case 'home':
				include "home.php";
			break;

			case 'about':
				include "about.php";
			break;
			
			case 'room':
			 	include "room-index.php";
			break;
			
			case 'map':
				include "map.php";
			break;
			
			case 'contact':
				$Table = $contact;
				$add_title = 'Contact';
				$inc_table = 'table-sql/tb-contact.php'; 
				include "contact-add.php";
			break;
			
		}
	}else{
		include "home.php";
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

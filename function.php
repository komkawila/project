<?php
function displaydate_eng($x) {
	$thai_m=array("January","February","March","April","May","June","July","August","September","October","November","December");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
	$date_array=explode("-",$txt);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];
	
	$m=$thai_m[$m];
	$y=$y;

	$displaydate_eng="$d $m $y / $time";
	return $displaydate_eng;
}

function displaydate($x) {

	$thai_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.", "พ.ย.","ธ.ค.");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
	$date_array=explode("-",$txt);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];

	
	$m=$thai_m[$m];
	$y=$y+543;
	$displaydate_th="$d $m $y";
	if($displaydate_th==543){
	return $displaydate_th="ไม่มีข้อมูลวันที่";
	}else{
	return $displaydate_th;
	}

	
	
}

function datetime($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
	$date_array=explode("-",$txt);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];

	$m=$thai_m[$m];
	$y=$y+543;

	//$datetime="$d $m $y เวลา $time วินาที";
		$datetime="<b style='color: red;'>$d</b> $m <b style='color: red;'>$y</b>";
	return $datetime;
}

function datetime1($x) {
	$thai_m=array("ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.", "พ.ย.","ธ.ค.");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10,6); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
	$date_array=explode("-",$txt);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];

	$m=$thai_m[$m];
	$y=$y+543;

	$datetime1="$d $m $y   เวลา  $time นาที";

	return $datetime1;
}

function datetime_full($x) {
$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
	$date_array=explode("-",$txt);
	$y=$date_array[0];
	$m=$date_array[1]-1;
	$d=$date_array[2];

	$m=$thai_m[$m];
	$y=$y+543;

	$datetime1="<b>$d</b> $m $y <b>เวลา</b>$time";

	return $datetime1;
}

function fcDate($x) {
	$thai_m=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	$txt = substr($x,0,10); //ตัดข้อความ เวลาออก 2012-08-05 17:35:20
	$time = substr($x,10); //ตัดข้อความ วันที่ออก 2012-08-05 17:35:20
	$date_array=explode("-",$txt);
	$y=$date_array[0]+543;
	$m=$date_array[1]-1;
	$d=$date_array[2];

	$m=$thai_m[$m];
	$y=$y;

		$datetime="$d $m $y";
		return $datetime;
}

function checkemail($checkemail){
	if(ereg( "^[^@]+@([a-zA-Z0-9\-]+\.)+([a-zA-z0-9\-](2)|net|com|gov|mil|org|edu|int|co.th)$",$checkemail)){
		return true ;
		
	}else{
		exit("<script>alert('รูปแบบ e-mail ไม่ถูกต้อง');(history.back());</script>");
		return  false;
	}
}

////////////////// 	คำนวนอายุ ///////////////////////////

	function calage($pbday){
	$today = date("d/m/Y");
	list($bady , $bmonth , $byear) = explode("/" , $pbday);
	list($tday , $tmonth , $tyear) = explode("/" , $today);
	
	if($byear < 1970){
		$yearad = 1970 - $byear;
		$byear = 1970;
	}else{
		$yearad = 0;
	}
	
	$mbirth = mktime(0,0,0,$bmonth,$bday,$byear);
	$mnow = mktime(0,0,0,$tmonth,$tday,$tyear);
	
	$mage= ($mnow - $mbirth);
	$age = (date("Y",$mage)-1970 + $yearad)." ปี / ".(date("m", $mage)-1)." เดือน / ".(date("d", $mage)-15)." วัน " ; return($age);

	}
	
//// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++//
function calage_year($pbday){ // เอาเฉพาะปี
	$today = date("d/m/Y");
	list($bady , $bmonth , $byear) = explode("/" , $pbday);
	list($tday , $tmonth , $tyear) = explode("/" , $today);
	
	if($byear < 1970){
		$yearad = 1970 - $byear;
		$byear = 1970;
	}else{
		$yearad = 0;
	}
	
	$mbirth = mktime(0,0,0,$bmonth,$bday,$byear);
	$mnow = mktime(0,0,0,$tmonth,$tday,$tyear);
	
	$mage= ($mnow - $mbirth);
	$age = (date("Y",$mage)-1970 + $yearad); return($age); // เอาเฉพาะปี

	}

?>

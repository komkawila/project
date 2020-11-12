<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
		<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

		    $("#datepicker-start").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, minDate: '-12M', maxDate: '1M', dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
			  
			  $("#datepicker-stop").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, minDate: '-11M', maxDate: 0, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
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
label.control-label{
width: 100px;
}
-->
</style>	

 <table width="97%" border="0" cellpadding="0" cellspacing="0" style="padding:10px; margin:10px; border: 1px dashed #666;">
		<form action="<?=$Link_server?>" method="post" name="form1" id="form1" onsubmit="return chk_txt();" >
				  <script language="JavaScript" type="text/javascript">
				  	function chk_txt(){
							if(document.form1.txtDate1.value==""){
									alert("เลือกช่วงวันเวลา ด้วยนะ");
									document.form1.txtDate1.focus();
									return false;
							}
							else if(document.form1.txtDate2.value==""){
									alert("เลือกช่วงวันเวลา ด้วยนะ");
									document.form1.txtDate2.focus();
									return false;
							}
							else {
									return true;
							}
						
					}
				  </script>
          <tr>
            <td height="35" colspan="3" align="left" valign="middle">
			<div style="padding:0px; padding-left: 85px; text-align:left;">
<? if($_POST){
 //แยกวัน เดือน ปี ออกจากกัน
 
$date_ary = explode("/", $_POST['txtDate1']);
$day = $date_ary[0];
$month = $date_ary[1];
$year = $date_ary[2]-543;
$txtDate1 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	
 
 
$date_ary = explode("/", $_POST['txtDate2']);
$day = $date_ary[0];
$month = $date_ary[1];
$year = $date_ary[2]-543;
$txtDate2 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	
				
 ?>
				



				 
				  
 <? }else{
$date_back = date("Y-m-d");
$date_ary = explode("-", $date_back);
$day = $date_ary[2];
$month = $date_ary[1];
$year = $date_ary[0];
$day1 ="01";
$txtDate1 =  $year."-".$month."-".$day1; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	
$txtDate2 =  $year."-".$month."-".$day; // ทำให้เป็นรูปแบบวันเดือนปีที่ใช้งานได้จริง	

 ?>		 
 
				
	
			     </div>  
                <? } ?>
              </div>
			<div style="padding: 5px; border-bottom: 1px solid #ddd; margin-bottom: 5px;"><img src="images/page1_32.png" width="32" height="32" /><strong> 
			เลือกช่วงเวลาดูรายงาน
			 </strong></div>			</td>
          </tr>
          <tr>
            <td width="22%" height="27" align="right" valign="middle"><strong>ตั้งแต่วันที่ &nbsp;</strong></td>
            <td width="12%" height="27" valign="middle"><input type="text" style="width: 100px;" id="datepicker-start" name="txtDate1" value="<?=$_POST['txtDate1']?>" /></td>
            <td width="66%" height="27" valign="middle"><strong>&nbsp;ถึง </strong>
              <input type="text" style="width: 100px;" id="datepicker-stop" name="txtDate2" value="<?=$_POST['txtDate2']?>" />
			  <button type="submit" name="submit" class="btn btn-info" style=" margin-bottom:3px;"><i class="icon-time"></i> เรียกดูรายงาน</button>
 <?php if($_POST){ ?>  
 <button type="button" class="btn btn-info"  style=" margin-bottom:3px;" onclick="parent.location='print-<?=$_GET['stt']?>.php?Date1=<?=$txtDate1?>&Date2=<?=$txtDate2?>'"> <i class="icon-print"></i> พิมพ์รายงาน</button>
 <?php } ?>
			</td>
          </tr>
          <tr>
            <td height="27" colspan="3" align="center" valign="middle">
			<!--
			<strong> รายงาน</strong> วันที่ <samp style="color:red;"> <?=fcDate($txtDate1)?> </samp> ถึง <samp style="color:red;"><?=fcDate($txtDate2)?> </samp> 
			<button type="button" class="btn  btn-info" onclick="parent.location='print-report-orders.php?Date1=<?=$txtDate1?>&Date2=<?=$txtDate2?>'"> <i class="icon-print"></i> พิมพ์รายงาน</button>
			 -->
						</td>
            </tr>
		  </form>
        </table>
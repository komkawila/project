<?php
$sql = mysqli_query($con,"Select * From $rent Where rent_id='".$_REQUEST['ID']."'");
$rs = mysqli_fetch_array($sql);
include 'table-sql/tb-'.$rent.'.php'; 
?>
<div id="selection">
<!-- // ---------------------------------------------- // -->
<h2 id="title-txt"><?=$sql_title?>( <?=$room_name?> )</h2> 
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
    <td><strong>วันที่เข้าพัก</strong></td>
    <td><?=fcDate($rent_check_in)?></td>
    </tr>
  <tr>
    <td><strong>สถานะการเช่าห้อง</strong></td>
    <td><?=$rent_status?></td>
  </tr>
</table>

 

<!-- // ---------------------------------------------- // -->
<h2 id="title-txt">คำนวนค่าเช่าห้อง วันที่ <?=fcDate(date("Y-m-d"))?></h2> 
<!-- // ---------------------------------------------- // -->


<form method="post" action="<?php echo $Action; ?>" name="form1"  id="form1" onSubmit="return check_text();" style="margin-bottom: 5px; padding:0px;" class="form-horizontal">
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
 
$sql = mysqli_query($con,"Select * From $utility");
while($rs = mysqli_fetch_array($sql)){
include "table-sql/tb-utility.php";
 
 ?> 
  <tr style="padding: 0px;">
    <td valign="middle" style="text-align:left;"><strong> - <?=$utility_name?> </strong></td>
    <td valign="middle" style="text-align:left;"><?=$meter_unit?></td>
    <td valign="middle" style="text-align:center; padding:2px;">
	<input type="text" id="num_mt" name="meter_unit_<?=$meter_id?>" value="<?=$_SESSION['meter_unit_'.$meter_id]?>"  />	
	<input type="hidden" name="meter_id[]" value="<?=$meter_id?>" />
	</td>
    <td valign="middle" style="text-align:center;"><?=$_SESSION['unit'.$meter_id]?></td>
    <td valign="middle" style="text-align:right;"><?=number_format($utility_unit_price,2)?></td>
    <td valign="middle" style="text-align:right;"><?=number_format($_SESSION['unit_price'.$meter_id],2)?></td>
    </tr>
	<?php
		$total_unit=($total_unit+$_SESSION['unit_price'.$meter_id]);
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
			<button type="submit"class="btn" name="btn_Confirm"  value="Calculate">คำนวณค่าเช่า</button>
			<button type="submit"class="btn" name="btn_Confirm"  value="Confirm">ออกบิลค่าเช่า</button>
			<button type="submit"class="btn" name="btn_Confirm"  value="Cancel" Onclick="return fcnCancel()">ยกเลิก</button>
 			<input type="hidden" name="Table" value="<?=$Table?>" />
			<input type="hidden" name="Sql" value="Calculate" />	 
			<input type="hidden" name="ID" value="<?=$_GET['ID']?>" />	 
			<input type="hidden" name="total" value="<?=$total?>" />	 
			</div>
  </form>
 <script language="javascript">
		function fcnCancel(){
			return confirm("ยกเลิกการทำรายการ");
		}
</script>

 


</div>

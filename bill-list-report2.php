<?php
include "inc-calendar.php";
$inc_table = 'table-sql/tb-'.$rent.'.php'; 


$tableSql = "bill";

$into = "Where (date(bill_date) BETWEEN '".$txtDate1."' AND '".$txtDate2."')  and bill_status In('1')";

  if(!empty($_SESSION['sess_am_userid'])) { 
 
	 $q="SELECT * FROM $tableSql $into"; 		
	 
	 }

/*
 if($_POST){
 
	 	$Keyword = trim($_POST['Search']); //ตัดซ่องวางของสตริง
		
		$sql = mysqli_query($con,"Select * From $room WHERE(room_name LIKE '%".$Keyword."%') ");
		$rs = mysqli_fetch_array($sql);
		$room_id = $rs['room_id'];
		
		$q="SELECT * FROM ".$rent." WHERE(rent_room_id LIKE '%".$room_id."%') ORDER BY rent_id ASC";  
	 }else{
	 
		$rnt = "'ใช้บริการ'";
		 $q="SELECT * FROM ".$rent."  WHERE rent_status In(".$rnt.") ORDER BY rent_id Desc";   
	 }
	 */
?>

<div id="selection">
  <div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
  
	 <label id="title-h2"><?php echo $list_title; ?></label> 

  </div>
	
<?php  
$qr=mysqli_query($con,$q);  
$totalp_list=$total=mysqli_num_rows($qr);  
$e_page=10; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า     

if(!isset($_GET['s_page'])){     
    	$_GET['s_page']=0;     
		
		}else{     
    		$chk_page=$_GET['s_page'];       
 			   $_GET['s_page']=$_GET['s_page']*$e_page;     
		}  
			   
	$q.=" LIMIT ".$_GET['s_page'].",$e_page";  
	$qr=mysqli_query($con,$q);
	  
	if(mysqli_num_rows($qr)>=1){     
    $plus_p=($chk_page*$e_page)+mysqli_num_rows($qr);     
		}else{     
    $plus_p=($chk_page*$e_page);         //$plus_p มีค่าอยู่ที่ 100
	}    
	 
$total_p=ceil($total/$e_page);     
$before_p=($chk_page*$e_page)+1;    //$before_p มีค่าอยู่ที่ 50
?>
<?php  //	ถ้าไม่มีข้อมูล
		if($total==0){
			echo "<div style='padding-top: 20px; color: red;'><h1>ไม่มีข้อมูล</h1></div>";
				}else{
		?>

	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-condensed  table-hover">
        <tr>
          <td width="19%" align="center" valign="middle" class="txt_top1"><strong>ชื่อห้อง</strong></td>
          <td width="31%" align="left" valign="middle" class="txt_top1"><strong>ชื่อผู้เช่าห้อง</strong></td>
          <td width="28%" align="center" valign="middle" class="txt_top1"> <strong>บิลค่าเช่าวันที่</strong></td>
          <td id="f-right" width="22%" align="right" valign="middle" class="txt_top1"><strong>รวมค่าเช่า</strong></td>
        </tr>
		
 <?
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=0;

while($rs=mysqli_fetch_array($qr)){  
$i;

$ID = $rs['bill_id'];	
		$name = $rs['bill_name'];
 
		$bill_id = $rs['bill_id'];	
		$bill_name = $rs['bill_name'];
		$bill_rent_id = $rs['bill_rent_id'];
		$bill_mb_id = $rs['bill_mb_id'];
		$bill_total = $rs['bill_total'];
		$bill_date = $rs['bill_date'];
		
		
		$ID = $rs['bill_rent_id'];	
		$name = $rs['bill_mb_id'];
		
			$DateT = explode("-",$rs['rent_check_in']);
			$InputDate = $DateT[2].'/'.$DateT[1].'/'.($DateT[0]+543);

		$rent_id = $rs['bill_rent_id'];	
		$rent_mb_id = $rs['bill_mb_id'];
		$rent_room_id = $rs['bill_mb_id'];
		$rent_deposits = $rs['rent_deposits'];
		$rent_check_in = $rs['rent_check_in'];
		$rent_status = $rs['rent_status'];
		
$sql = mysqli_query($con,"Select * From $member Where mb_id='".$rent_mb_id."'");
$rs = mysqli_fetch_array($sql);
		$mb_id = $rs['mb_id'];
		$mb_user = $rs['mb_user'];
		$mb_pass = $rs['mb_pass'];
		$mb_name = $rs['mb_name'];
		$mb_card_id = $rs['mb_card_id'];
		$mb_address = $rs['mb_address'];
		$mb_district = $rs['mb_district'];
		$mb_province = $rs['mb_province'];
		$mb_zipcode = $rs['mb_zipcode'];
		$mb_tel = $rs['mb_tel'];
		$mb_email = $rs['mb_email'];

$sql = mysqli_query($con,"Select * From $room Where room_id='".$rent_room_id."'");
$rs = mysqli_fetch_array($sql);
		$room_id = $rs['room_id'];
		$room_name = $rs['room_name'];
		$room_type_id = $rs['room_type_id'];
		$room_status = $rs['room_status'];
		
$sql = mysqli_query($con,"Select * From $room_type Where type_id='".$room_type_id."'");
$rs = mysqli_fetch_array($sql);
		$type_id = $rs['type_id'];	
		$type_name = $rs['type_name'];
		$type_detail = $rs['type_detail'];
		$type_price = $rs['type_price'];
		
$sql = mysqli_query($con,"Select * From $bill Where bill_rent_id='".$rent_id."' Order By bill_id Desc ");
  $numrs_bill = mysqli_num_rows($sql);

if($numrs_bill==0){
		 	$bill_date = "ไม่มีข้อมูล";
		}else{
$rs = mysqli_fetch_array($sql);		
		$bill_id = $rs['bill_id'];	
		$bill_rent_id = $rs['bill_rent_id'];
		$bill_mb_id = $rs['bill_mb_id'];
		$bill_name = $rs['bill_name'];
		$bill_total = $rs['bill_total'];
		$bill_date = $rs['bill_date'];
		$bill_status = $rs['bill_status'];
	}	
		



?>
		
         <tr class="report">
          <td width="19%" align="center" valign="middle" class="txt_report-1">ห้อง <a  href="bill.php?stt=report&amp;ID=<?=$ID?>#fo"><?=$room_name?></a></td>
          <td align="left" valign="middle" class="txt_report-1"><?=$mb_name?></td>
          <td width="28%" align="center" valign="middle" class="link1"><?=displaydate($bill_date)?></td>
          <td id="f-right" width="22%" align="right" valign="middle" class="link1"><?=number_format($bill_total,2)?></td>
        </tr>
         
		<?PHP $no++; $i++?>
            <?php
			$total_price=($total_price+$bill_total);
			 } ?>
			<?php if($totalp_list > 0){ ?>
			<tr class="list-hover">
           <td colspan="3" align="center" valign="middle" id="f-right"><strong>ยอดรวม</strong></td>
           <td id="f-right" align="left" valign="middle"><b id="blue"><?=number_format($total_price,2)?></b></td>
          </tr>
		  <?php }else{ ?>
			<tr class="list-hover">
			  <td colspan="4" align="center" valign="middle" id="f-right"><h3 id="red">ไม่พบข้อมูล</h3></td>
		  </tr>
		  <?php } ?>
      </table>

<?php if($total > $e_page){ ?>
<div class="browse_page">
<?php     
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า     
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);       
?>
</div>
<?php } ?>
 
</div>
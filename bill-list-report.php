<?php
$sql = mysqli_query($con,"Select * From $rent Where rent_id='".$_REQUEST['ID']."'");
$rs = mysqli_fetch_array($sql);
include 'table-sql/tb-'.$rent.'.php'; 
?>
<div id="selection">
<!-- // ---------------------------------------------- // -->
<h2 id="title-txt"><?=$list_title?>( <?=$room_name?> )</h2> 
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
<h2 id="title-txt">รายงานบิลค่าเช่า</h2> 
<!-- // ---------------------------------------------- // -->
 
 <?php
 if(!empty($_POST['Search'])){
 
	 	$Keyword = trim($_POST['Search']); //ตัดซ่องวางของสตริง
		
		$sql = mysqli_query($con,"Select * From $room WHERE(room_name LIKE '%".$Keyword."%') ");
		$rs = mysqli_fetch_array($sql);
		$room_id = $rs['room_id'];
		
		$q="SELECT * FROM ".$bill." WHERE(bill_date LIKE '%".$room_id."%') ORDER BY bill_date Desc";   
	 }else{
	 
		 if($_GET['rnt']==1){
				$rnt = "'ใช้บริการ'";
				$list_title = 'ข้อมูลผู้เช่าห้องพัก';
				}else if($_GET['rnt']==2){ 
				$rnt = "'เลิกใช้บริการ'";
				$list_title = 'ประวัติการเช่าห้องพัก';
				}else{
				$rnt = "'ใช้บริการ','เลิกใช้บริการ'";
				}
		
		 $q="SELECT * FROM ".$bill."  WHERE bill_rent_id In(".$rent_id.") ORDER BY bill_date Desc";   
	 }
?>

 
 
<?php  
$qr=mysqli_query($con,$q);  
$total=mysqli_num_rows($qr);  
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

	 <table  class="table table-bordered table-condensed" style="width: 100%; margin-bottom: 5px;">
        <tr>
          <td width="10%" align="center" valign="middle" class="txt_top1" style="text-align:center;"><strong>รหัสบิล</strong></td>
          <td width="13%" align="left" valign="middle" class="txt_top1" style="text-align:center;"><strong>ห้องเช่า</strong></td>
          <td width="29%" align="left" valign="middle" class="txt_top1" style="text-align:center;"><strong>ชื่อผู้เช่าห้องพัก</strong></td>
          <td width="18%" align="left" valign="middle" class="txt_top1" style="text-align:center;"><strong>ค่าเช่าวันที่</strong></td>
          <td width="17%" align="center" valign="middle" class="txt_top1" style="text-align:center;"><strong> </i>ราคารวม</strong></td>
          <td width="13%" align="center" valign="middle" class="txt_top1" style="text-align:center;"><i class="icon-chevron-down"></i> <strong> ออกบิล</strong></td>
       </tr>
		
 <?
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=0;

while($rs=mysqli_fetch_array($qr)){  
$i;

include 'table-sql/tb-bill.php'; 

?>
		
         <tr class="report">
          <td width="10%" align="center" valign="middle" class="txt_report-1" style="text-align:center;"><?=sprintf("%05d",$bill_id)?></td>
          <td align="left" valign="middle" class="txt_report-1" style="text-align:center;">ห้อง <?=$room_name?></td>
          <td align="left" valign="middle" class="txt_report-1">คุณ <?=$mb_name?></td>
          <td align="left" valign="middle" class="txt_report-1" style="text-align:center;"><?=displaydate($bill_date)?></td>
          <td width="17%" align="center" valign="middle" class="link1"  style="text-align:right;"><?=number_format($bill_total,2)?></td>
          <td width="13%" align="center" valign="middle" class="link1" style="text-align:center;">
		  <a  href="?stt=detail&ID=<?=$ID?>"><i class="icon-print"></i> <strong> ออกบิล</strong></a> </td>
       </tr>
         
		<?PHP $no++; $i++?>
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

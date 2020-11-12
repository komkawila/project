<?php
$inc_table = 'table-sql/tb-'.$rent.'.php'; 
 if(!empty($_POST['Search'])){
 
	 	$Keyword = trim($_POST['Search']); //ตัดซ่องวางของสตริง
		
		$sql = mysqli_query($con,"Select * From $room WHERE(room_name LIKE '%".$Keyword."%') ");
		$rs = mysqli_fetch_array($sql);
		$room_id = $rs['room_id'];
		
		$q="SELECT * FROM ".$rent." WHERE(rent_room_id LIKE '%".$room_id."%') ORDER BY rent_id ASC";  
	 }else{
	 
		$rnt = "'ใช้บริการ'";
		 $q="SELECT * FROM ".$rent."  WHERE rent_status In(".$rnt.") ORDER BY rent_id Desc";   
	 }
?>

<div id="selection">
  <div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
  
	 <label id="title-h2"><?php echo $list_title; ?></label> 

  </div>
	
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

	  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-condensed  table-hover">
        <tr>
          <td width="9%" align="center" valign="middle" class="txt_top1"><strong>ชื่อห้อง</strong></td>
          <td width="21%" align="left" valign="middle" class="txt_top1"><strong>ชื่อผู้เช่าห้อง</strong></td>
          <td width="14%" align="left" valign="middle" class="txt_top1"><strong>วันที่เข้าพัก</strong></td>
          <td width="12%" align="left" valign="middle" class="txt_top1"><strong>สถานะ</strong></td>
          <td width="16%" align="center" valign="middle" class="txt_top1"> <strong>บิลค่าเช่า</strong></td>
          <td width="14%" align="center" valign="middle" class="txt_top1"><strong>รวมค่าเช่า</strong></td>
          <td width="14%" align="center" valign="middle" class="txt_top2"><i class="icon-print"></i> <strong>ข้อมูล</strong></td>
        </tr>
		
 <?
	}							
  $no = $before_p; // ใช้ตัวนี้เป็นตัวแสดงลำดับ
  $i=0;

while($rs=mysqli_fetch_array($qr)){  
$i;
include $inc_table;



?>
		
         <tr class="report">
          <td width="9%" align="center" valign="middle" class="txt_report-1">ห้อง <?=$room_name?></td>
          <td align="left" valign="middle" class="txt_report-1"><?=$mb_name?></td>
          <td align="left" valign="middle" class="txt_report-1"><?=displaydate($rent_check_in)?></td>
          <td align="left" valign="middle" class="txt_report-1"><?=$rent_status?>  </td>
          <td width="16%" align="center" valign="middle" class="link1"><?=displaydate($bill_date)?></td>
          <td width="14%" align="center" valign="middle" class="link1"><?=number_format($bill_total,2)?></td>
          <td width="14%" align="center" valign="middle" class="link2"><a  href="bill.php?stt=report&ID=<?=$ID?>#fo"><i class="icon-print"></i> <strong>ข้อมูล</strong></a></td>
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
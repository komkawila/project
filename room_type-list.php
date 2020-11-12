<div id="selection">
  <div id="title-txt" style="margin-top: 10px; margin-bottom: 0px;">
	 <label id="title-h2">
	 <?php echo $list_title; ?>
	 </label> 
	 <?php include "inc-button.php"; ?> 
  </div>
	
<?php  
$q="SELECT * FROM ".$Table." ORDER BY $fl_id ASC";  
 
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
          <td width="5%" align="center" valign="middle" class="txt_top1"><strong>ลำดับ</strong></td>
          <td width="23%" align="center" valign="middle" class="txt_top1"><strong>ประเภทห้อง</strong></td>
          <td width="40%" align="left" valign="middle" class="txt_top1"><strong>รายละเอียด</strong></td>
          <td width="12%" align="left" valign="middle" class="txt_top1"><strong>ราคา</strong></td>
          <td width="10%" align="center" valign="middle" class="txt_top1"><i class="icon-edit"></i> <strong>  แก้ไข</strong></td>
          <td width="10%" align="center" valign="middle" class="txt_top2"><i class="icon-trash"></i> <strong> ลบ</strong></td>
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
           <td width="5%" align="center" valign="middle" class="txt_report-1"><?=$no?></td>
          <td width="23%" align="center" valign="middle" class="txt_report-1" style="font-size: 13px;"><?=$type_name?></td>
          <td align="left" valign="middle" class="txt_report-1" style="font-size: 13px;"><?=$type_detail?></td>
          <td align="left" valign="middle" class="txt_report-1"><?=number_format($type_price,2)?></td>
          <td width="10%" align="center" valign="middle" class="link1">
		  <a  href="?stt=edit&ID=<?=$ID?>"><i class="icon-edit"></i> แก้ไข</a> </td>
          <td width="10%" align="center" valign="middle" class="link2"> 
		  <a   href="<?php echo $Action; ?>?Table=<?php echo $Table; ?>&Sql=Delete&ID=<?=$ID?>" onclick="return confirm('ยืนยันลบข้อมูล <?=$name?> ออกจากระบบ')"><i class="icon-trash"></i> ลบ</a>		  </td>
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
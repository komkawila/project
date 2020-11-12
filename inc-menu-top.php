<a name="fo" id="fo"></a>
<? if(!empty($login_am_id)){ ?>
	<div id="ul-box">
<div id='cssmenu'>
	<ul>
	<li><a href="main.php?stt=list&rnt=1"><span><i class="icon-home"></i> หน้าหลัก </span></a></li>   
	<li><a href="rent.php?stt=add#fo"><span><i class="icon-plus-sign"></i> ลงทะเบียนเช่าห้อง </span></a></li>   
	
	<!-- //====================================================// -->
		 
	   <li class='has-sub'><a href='#' id="curser"><span><i class="icon-chevron-down"></i> ระบบห้องเช่า</span></a>
		  <ul style="width:180px;">
		  	 <li><a href="room_type.php?stt=list"><span><i class="icon-plus-sign"></i> ข้อมูลประเภทห้องเช่า</span></a></li>
			 <li><a href="utility.php?stt=list"><span><i class="icon-plus-sign"></i> ข้อมูลสาธารณูปโภค</span></a></li>
			 <li><a href="room.php?stt=list"><span><i class="icon-plus-sign"></i> ข้อมูลห้องเช่า</span></a></li>
			 <li><a href="meter.php?stt=list"><span><i class="icon-plus-sign"></i> ข้อมูลมิเตอร์</span></a></li>
		  </ul>
	   </li>

	  <!-- //====================================================// -->
		 
	    <!-- <li class='has-sub'><a href='bill.php?stt=list&rnt=1' id="curser"><span><i class="icon-print"></i> ออกบิลค่าเช่า</span></a></li> 
	   	<!-- //====================================================// -->
		 
	   <li class='has-sub'><a href='#' id="curser"><span><i class="icon-chevron-down"></i> ระบบค่าเช่าห้อง</span></a>
		  <ul>
		  	 <li><a href='bill.php?stt=list&rnt=1' id="curser"><span><i class="icon-plus-sign"></i> คิดค่าเช่าห้อง</span></a></li>
			 <li><a href="bill.php?stt=bill"><span><i class="icon-print"></i> รายงานค่าเช่า</span></a></li>
			 <li><a href="bill.php?stt=bill-report"><span><i class="icon-print"></i> สรุปยอดรวมค่าเช่า</span></a></li>
		  </ul>
	   </li>
	   
	   
 
	   <li class='has-sub'><a href='#' id="curser"><span><i class="icon-chevron-down"></i> ข้อมูลการติดต่อ</span></a>
		  <ul>
		  	 <li><a href="contact.php?stt=list&st=1" id="curser"><span><i class="icon-envelope"></i> ข้อความใหม่</span></a></li>
			 <li><a href="contact.php?stt=list&st=2"><span><i class="icon-ok-circle"></i> ข้อความอ่านแล้ว</span></a></li>
		  </ul>
	   </li>
	   
		<li><a href="rent.php?stt=list&rnt=1"><span><i class="icon-list"></i> ข้อมูลผู้เช่าห้องพัก</span></a></li>
			 <!-- //====================================================// -->
		 
	   <li class='has-sub'><a href='#' id="curser"><span><i class="icon-user"></i> Admin</span></a>
		  <ul>
			 <li><a href="admin.php?stt=profile"><span><i class="icon-edit"></i> ข้อมูลส่วนตัว</span></a></li>
			 <li><a href="admin.php?stt=repass"><span><i class="icon-refresh"></i> เปลี่ยนรหัสผ่าน</span></a></li>
			 <li><a href="logout.php"><span><i class="icon-off"></i> ออกจากระบบ</span></a></li>
		  </ul>
	   </li>   
	   
	</ul>
	</div>
	</div>
<? }else{ ?>
	<div id="ul-box">
	<div id='cssmenu'>    
		<ul>
		<li><a href="index.php?stt=home"><span><i class="icon-home"></i> หน้าแรก </span></a></li>
		<li><a href="index.php?stt=about"><span><i class="iconm , -retweet"></i> เกี่ยวกับเรา </span></a></li>
		<li><a href="index.php?stt=room"><span><i class="icon-tag"></i> ห้องพัก</span></a></li>
		<li><a href="index.php?stt=map"><span><i class="icon-map-marker"></i> แผนที่</span></a></li>
		<li><a href="index.php?stt=contact"><span><i class="icon-comment"></i> ติดต่อเรา</span></a></li>
 
		</ul>
		</div>		
	</div>
	<? } ?>
	
 

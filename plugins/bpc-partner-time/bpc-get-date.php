<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");
$datenow = $_GET['datenow']; 

	$partner_id = 77332; 
	$datepiece = explode("/", $datenow); // 22/01/2017 -dd/mm/yyyy
	$datetofetch = $datepiece[2].'-'.$datepiece[1].'-'.$datepiece[0]; //2017-01-16 - yyyy-mm-dd

	$mydb = new wpdb('dbo639369002','1qazxsw2!QAZXSW@','db639369002','db639369002.db.1and1.com');
	$rows = $mydb->get_results("SELECT * FROM wp_bpc_appointment_settings WHERE partner_id = $partner_id 
			&& date = '$datetofetch'");
	echo "<ul>";
		foreach ($rows as $obj) :
		 //    echo "<li>Partner ID: ".$obj->partner_id."</li>";
		 //    echo "<li>Date: ".$obj->date."</li>";
			// echo "<li>Open From: ".$obj->open_from."</li>";
			$date = $obj->date;
			$open_from = $obj->open_from;
			$open_to = $obj->open_to;
			// echo "<li>Open To: ".$obj->open_to."</li>";
			// echo "<li>Call Back Length: ".$obj->call_back_length."</li>";
			$call_back_length = $obj->call_back_length;
			// echo "<li>Call Back Delay: ".$obj->call_back_delay."</li>";
			$call_back_delay = $obj->call_back_delay;
			$updated_at = $obj->updated_at;
			// echo "<li>Updated at: ".$updated_at."</li>";
			$updatepiece = explode(" ", $updated_at); // 2017-01-21 16:44:31 -yyyy-mm-dd hh:mm:ss
			$updateddate = $updatepiece[0]; //2017-01-21
			$updatedpiece = $updatepiece[1]; //16:44:31
			$updatetimepiece = explode(":", $updatedpiece);
			$updatedtime = $updatetimepiece[0].':'.$updatetimepiece[1];
			// echo "<li>Updated Date: ".$updateddate."</li>";
			// echo "<li>Updated Time: ".$updatedtime."</li>";
		endforeach;
	echo "</ul>";
	?>
	<div class="home-time-box">
          <div class="home-time-box-heading">
            <div class="home-time-box-heading-left">
              <h3><a href="#">Earlier</a></h3>
            </div>
            <div class="home-time-box-heading-right">
              <h3><a href="#">Later</a></h3>
            </div>
          </div>
          <div class="home-time-content">
            <div class="e3ve-home-time">            





        <?php
        
		$begin = new DateTime($open_from);
		$end   = new DateTime($open_to);
		$interval = DateInterval::createFromDateString($call_back_length);
		$times    = new DatePeriod($begin, $interval, $end);
		?>
		<ul class="left-time">
		<?php
		$currenttime = date('H:i');
		$currentdate = date("Y-m-d");
		$callbackdelayandcurrenttime = strtotime($call_back_delay, strtotime($updatedtime));
		$callbackdelayandupdatedtimetotal = date('H:i', $callbackdelayandcurrenttime);
		// echo 'Updated Time: '.$updatedtime.'<br>';	
		// echo 'Total of Call Back Delay Time: '.$callbackdelayandupdatedtimetotal.'<br>';	
		// echo 'Current Time: '.$currenttime.'<br>';	
		$container = 0;
  
		foreach ($times as $time) {


			if(($time->format('H:i') >= $currenttime) and ($time->format('H:i') <= '12:59') and ($date == $currentdate))
			{
				if( ($updateddate == $currentdate) and ($time->format('H:i') >= $updatedtime) and ($time->format('H:i') <= $callbackdelayandupdatedtimetotal) )
				{
					//echo 'In between the Call Back Delay';
				} else {		
					$container = 1; 		
				?>
				<li><input name="time" value="<?php echo $time->format('H:i A');?>" type="radio" id="e3ve-time" class="e3ve-cl-time" onclick=timeFunction()><span class="e3ve-cl-times"><?php echo $time->format('H:i A'); ?></span></li>
				<?php
				}
			} else if(($time->format('H:i') <= '12:59') and ($date <> $currentdate)) {
				?>
				<li><input name="time" value="<?php echo $time->format('H:i A');?>" type="radio" id="left-time" class="e3ve-cl-time" onclick=timeFunction()><span class="e3ve-cl-times"><?php echo $time->format('H:i A'); ?></span></li>
				<?php
			}
		    // echo $time->format('H:i'), '-', 
		    //      $time->add($interval)->format('H:i'), "<br>";
		}
		?>
		</ul>
		<ul class="right-time">
		<?php
		foreach ($times as $time) {
			if(($time->format('H:i') >= $currenttime) and ($time->format('H:i') > '12:59') and ($date == $currentdate)){
				if( ($updateddate == $currentdate) and ($time->format('H:i') >= $updatedtime) and ($time->format('H:i') <= $callbackdelayandupdatedtimetotal) )
				{
					//echo 'In between the Call Back Delay';
				} else {
					$container = 1;
				?>
				<li><input name="time" value="<?php echo $time->format('h:i A');?>" type="radio" id="e3ve-time" class="e3ve-cl-time" onclick=timeFunction()><span class="e3ve-cl-times"><?php echo $time->format('h:i A'); ?></span></li>
				<?php
				}
			} else if (($time->format('H:i') > '12:59') and ($date <> $currentdate)) {
				?>
				<li><input name="time" value="<?php echo $time->format('h:i A');?>" type="radio" id="e3ve-time" class="e3ve-cl-time" onclick=timeFunction()><span class="e3ve-cl-times"><?php echo $time->format('h:i A'); ?></span></li>
				<?php
			} 
		}

		?> 
		
		</ul>
            </div>
          </div>
        </div>
        <script>
        	function timeFunction()
			{ 
				if ( $("#callbackdate").val().length > 0 ) {
		 			document.getElementById('datepicked').innerHTML = $datenow;
		 			document.getElementById('timeselected').innerHTML = ($("input[name=time]:checked").val());
		 			jQuery('.home-step-2').delay(500).slideDown(500);
					jQuery('.home-step-1').delay(500).slideUp(500);
					jQuery('.home-step-3').delay(500).slideUp(500);
					jQuery('.home-step-4').delay(500).slideUp(500);
 				}	
			}
			// $('.e3ve-cl-times').click(function() {
			//     $(this).css('background', 'url(http://bookphonecall.com/wp-content/uploads/2017/01/time-button-with-tick.png)');
			// });
        </script>
        <?php


			
	

	


<script>
jQuery(document).ready(function(){

 	jQuery('input:radio[name=time]').click(function(){ 		
 		if ( $("#callbackdate").val().length > 0 ) {
 			document.getElementById('datepicked').innerHTML = $datenow;
 			document.getElementById('timeselected').innerHTML = ($("input[name=time]:checked").val());
 			jQuery('.home-step-2').delay(1500).slideDown(500);
			jQuery('.home-step-1').delay(1500).slideUp(500);
			jQuery('.home-step-3').delay(1500).slideUp(500);
			jQuery('.home-step-4').delay(1500).slideUp(500);
 		}		
	});

	function timeFunction()
	{ 
		if ( $("#callbackdate").val().length > 0 ) {
		 	document.getElementById('datepicked').innerHTML = $datenow;
		 	document.getElementById('timeselected').innerHTML = ($("input[name=time]:checked").val());
		 	jQuery('.home-step-2').delay(1500).slideDown(500);
			jQuery('.home-step-1').delay(1500).slideUp(500);
			jQuery('.home-step-3').delay(1500).slideUp(500);
			jQuery('.home-step-4').delay(1500).slideUp(500);
 		}	
	}

	/*jQuery('.proceed-btn-1').click(function(){
		jQuery('.home-step-2').delay(1500).slideDown(500);
		jQuery('.home-step-1').delay(1500).slideUp(500);
		jQuery('.home-step-3').delay(1500).slideUp(500);
		jQuery('.home-step-4').delay(1500).slideUp(500);
	});*/
	jQuery('.proceed-btn-2').click(function(){
		if ( $("#callbackdate").val().length > 0 ) {
			document.getElementById('datepicked2').innerHTML = $datenow;
			document.getElementById('timeselected2').innerHTML = ($("input[name=time]:checked").val());
			jQuery('.home-step-4').delay(1500).slideDown(500);
			jQuery('.home-step-1').delay(1500).slideUp(500);
			jQuery('.home-step-2').delay(1500).slideUp(500);
			jQuery('.home-step-3').delay(1500).slideUp(500);
		}
	});
	
	jQuery('.proceed-btn-3').click(function(){
		if ( $("#callbackdate").val().length > 0 ) {
			document.getElementById('datepicked1').innerHTML = $datenow;
			document.getElementById('timeselected1').innerHTML = ($("input[name=time]:checked").val());
			jQuery('.home-step-3').delay(1500).slideDown(500);
			jQuery('.home-step-1').delay(1500).slideUp(500);
			jQuery('.home-step-2').delay(1500).slideUp(500);
			jQuery('.home-step-4').delay(1500).slideUp(500);
		}
	});
	jQuery('#name_not_listed').click(function(){
		if ( $("#callbackdate").val().length > 0 ) {
			document.getElementById('datepicked1').innerHTML = $datenow;
			document.getElementById('timeselected1').innerHTML = ($("input[name=time]:checked").val());
			jQuery('.home-step-3').delay(1500).slideDown(500);
			jQuery('.home-step-1').delay(1500).slideUp(500);
			jQuery('.home-step-2').delay(1500).slideUp(500);
			jQuery('.home-step-4').delay(1500).slideUp(500);
		}
	});
	jQuery('.step-1-prev-btn').click(function(){
			jQuery('.home-step-1').delay(1500).slideDown(500);
			jQuery('.home-step-2').delay(1500).slideUp(500);
			jQuery('.home-step-3').delay(1500).slideUp(500);
			jQuery('.home-step-4').delay(1500).slideUp(500);
	});
	jQuery('.step-2-prev-btn').click(function(){
		jQuery('.home-step-2').delay(1500).slideDown(500);
		jQuery('.home-step-1').delay(1500).slideUp(500);
		jQuery('.home-step-3').delay(1500).slideUp(500);
		jQuery('.home-step-4').delay(1500).slideUp(500);
	});
	jQuery('.step-3-prev-btn').click(function(){
		jQuery('.home-step-3').delay(1500).slideDown(500);
		jQuery('.home-step-1').delay(1500).slideUp(500);
		jQuery('.home-step-2').delay(1500).slideUp(500);
		jQuery('.home-step-4').delay(1500).slideUp(500);
	});



	console.log("click now");

	$( '.proceed-btn-2' ).trigger( "click" );
});

//Page Resizing
function autoResizeDiv()
        {
            document.getElementById('e3ve-gridContainer').style.height = window.innerHeight +'px';
        }
        window.onresize = autoResizeDiv;
        autoResizeDiv();
		
function autoResizeDiv()
        {
            document.getElementById('home-content').style.height = window.innerHeight +'px';
        }
        window.onresize = autoResizeDiv;
        autoResizeDiv();

</script>
<div id="footer">
  <div id="inner-wrapper"><?php echo get_option('of_footer-text') ?></div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
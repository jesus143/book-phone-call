//Calendar

 $directorList = '';

  $( function() {
    $( "#datepicker" ).datepicker({ minDate: 0, firstDay: 1});
    $('#datepicker a.ui-state-active').removeClass('ui-state-active');
    $('#datepicker a.ui-state-hover').removeClass('ui-state-hover');
  });

  $(document).on("change", "#datepicker", function () {
      $datenow = $.datepicker.formatDate("dd/mm/yy", $(this).datepicker("getDate"));
      document.getElementById('callbackdate').value = $datenow;
      document.getElementById('home-arrow-1').innerHTML = '<img src="http://bookphonecall.com/wp-content/themes/BookPhoneCall/images/home-arrow.png" alt="" width="" height="">';
      $.get( "/wp-content/plugins/bpc-partner-time/bpc-get-date.php?datenow="+$datenow, function( data ) {
      $( "#bpc-select-date-response" ).html(data);
    });
  })  

  //Facebook
    // function statusChangeCallback(response) {
    //   console.log('statusChangeCallback');
    //   console.log(response);
    //   if (response.status === 'connected') {
    //     bpc_getFBUser();
    //   } else if (response.status === 'not_authorized') {
    //     document.getElementById('status').innerHTML = 'Please log ' +
    //       'into this app.';
    //   } else {
    //     document.getElementById('status').innerHTML = 'Please log ' +
    //       'into Facebook.';
    //   }
    // }
    // function checkLoginState() {
    //   FB.getLoginStatus(function(response) {
    //     statusChangeCallback(response);
    //   });
    // }
    // window.fbAsyncInit = function() {
    // FB.init({
    //   appId      : '1844321809114387',
    //   cookie     : true,  
    //   xfbml      : true,  
    //   version    : 'v2.8' 
    // });
    // FB.getLoginStatus(function(response) {
    //   statusChangeCallback(response);
    // });
    // };
    // (function(d, s, id) {
    //   var js, fjs = d.getElementsByTagName(s)[0];
    //   if (d.getElementById(id)) return;
    //   js = d.createElement(s); js.id = id;
    //   js.src = "//connect.facebook.net/en_US/sdk.js";
    //   fjs.parentNode.insertBefore(js, fjs);
    // }(document, 'script', 'facebook-jssdk'));
    // function bpc_getFBUser() {
    //   console.log('Welcome!  Fetching your information.... ');
    //   FB.api('/me?fields=id,first_name,last_name,email,gender,birthday', function(response) {
    //     console.log('Successful login for: ' + response.first_name + ' ' + response.last_name + response.email + response.gender + response.birthday);
    //     document.getElementById('fb-status').innerHTML =
    //       '<p>See Facebook user information below:</p> ' + 
    //       'Full Name: ' + response.first_name + ' ' + response.last_name + '<br>Email Address: ' + response.email + '<br>Gender: ' + response.gender + '<br>Birthday: ' + response.birthday;
    //     document.getElementById('e3ve-first-name').value = response.first_name;
    //     document.getElementById('e3ve-last-name').value = response.last_name;
    //     document.getElementById('e3ve-email').value = response.email;
    //     document.getElementById('e3ve-fbemail').value = response.email;
    //     document.getElementById('e3ve-gender').value = response.gender;
    //     document.getElementById('e3ve-birthday').value = response.birthday;
    //     if (response.gender == 'male') {
    //       document.getElementById('e3ve-title').value = 'Mr';
    //     } else if (response.gender == 'female') { 
    //       document.getElementById('e3ve-title').value = 'Ms';
    //     }
    //   });
    // }

//Call Me On

 /*
  function bpccheckvalue1(val)
  {
      if(val==="mobilecontact1")
        document.getElementById('contact11').style.display='inline';
      else if(val==="homecontact1")
        document.getElementById('contact11').style.display='inline';
      else if(val==="officecontact1")
        document.getElementById('contact11').style.display='inline';
  }
  function bpccheckvalue2(val)
  {
      if(val==="mobilecontact2")
        document.getElementById('contact22').style.display='inline';
      else if(val==="homecontact2")
        document.getElementById('contact22').style.display='inline';
      else if(val==="officecontact2")
        document.getElementById('contact22').style.display='inline'; 
  }
  function bpccheckvalue3(val)
  {
      if(val==="mobilecontact3")
        document.getElementById('contact33').style.display='inline';
      else if(val==="homecontact3")
        document.getElementById('contact33').style.display='inline';
      else if(val==="officecontact3")
        document.getElementById('contact33').style.display='inline'; 
  }

*/

  

$(document).ready(function(){
document.getElementById('company_name_step3').innerHTML = document.getElementById('company_name').value; 
  $( "#company" ).keyup(function(e) {
    var query = $(this).val(); 
    $( "#company" ).autocomplete({
      source: "cha/company.php?query="+query,
      minLength: 2,
      open: function(event, ui) {
      //$("ul.ui-autocomplete.ui-menu .ui-menu-item:odd").css("background-color","#dedede");
        var url = "<li id='nocompany'> Can't Find Your Company? <span id='gotoOrganisation' onclick=gotoOrganisationFunction() style='text-decoration:underline; color: #0000FF; cursor: pointer;'>click here ></a></li>";
        $("ul.ui-autocomplete.ui-menu").append(url);
      },
      select: function (event, ui) {

        // hide the Are you a Director of this Company?
        $("#director_column_q, #name_container, #director_name_container").css('display', 'none');




        var company_number = (JSON.stringify(ui.item.company_number));
        var address_snippet = (JSON.stringify(ui.item.address_snippet));
        document.getElementById('company_number').value = company_number.replace(/\"/g, "");   
        address_snippet_split = address_snippet.replace(/,/g, '<br>'); 
        document.getElementById('address_snippet').innerHTML = '<strong>Address:</strong> <br>' + address_snippet_split.replace(/\"/g, "");
        document.getElementById('verify_company_container').style.display='block';  
        $('#director_name').val('');
        document.getElementById('director_yes').checked = false;
        document.getElementById('director_no').checked = false;
        document.getElementById('company_officers_name').innerHTML = '';
        var company_number_for_officer = document.getElementById('company_number').value;
        $.get('cha/companyofficers.php?term=' + company_number_for_officer, function(data){
          data = JSON.parse(data);
          // console.log(data);

            // This will transfer the director information to a global variable
            // This is set because we need it to set selected director in step 4
            $directorList = data;


            for (var i = 0; i < data.length; i++) {
            var  t =  data[i]['namesss'];

            var n = t.indexOf("'");
              function ucFirst(string) {
                  return string.substring(0, 1).toUpperCase() + string.substring(1).toLowerCase();
                }

                var capitalize_officers = ucFirst(data[i]['namesss']);
                var format_change_officers = capitalize_officers.split(',')[0];
                var format_change_officers_after = capitalize_officers.split(',')[1] + ' ' + capitalize_officers.split(',')[0];
              
              if( n === -1) {
                document.getElementById('company_officers_name').innerHTML += "<p style='cursor: pointer; text-transform: capitalize;' name='officersname' id='company_officers_name_radio' onclick=myFunction('"+i+"') /><img src='http://bookphonecall.com/wp-content/uploads/2016/12/ltd-company.png' width='15' />" + format_change_officers_after +  "</p>";
                document.getElementById('company_officers_name').innerHTML += "<input type='hidden' style='text-transform: capitalize;' value='"+ format_change_officers_after + "' id='company_officers_name_text_"+i+"' />";     
              } else {
                var strnameString = t.replace(/'/g, "&#8217;");
                var capitalize_officers_converted_quote = ucFirst(strnameString);
                var format_change_officers_converted_quote = capitalize_officers_converted_quote.split(',')[0];
                var format_change_officers_after_converted_quote = capitalize_officers_converted_quote.split(',')[1] + ' ' + capitalize_officers_converted_quote.split(',')[0];
                document.getElementById('company_officers_name').innerHTML += "<p style='cursor: pointer; text-transform: capitalize;' name='officersname' id='company_officers_name_radio' onclick=myFunction('"+i+"') /><img src='http://bookphonecall.com/wp-content/uploads/2016/12/ltd-company.png' width='15' />" + format_change_officers_after + "</p>";
                document.getElementById('company_officers_name').innerHTML += "<input type='hidden' style='text-transform: capitalize;' value='"+ format_change_officers_after_converted_quote + "' id='company_officers_name_text_"+i+"' />";         
              }
            }
        });
      },
    }); 
  }); 


  // Submit button disabled
  $("#bookphonecallsubmit").attr("disabled","disabled");
  $("#agreement").click(function(){
    if($("#agreement").is(":checked")){
      $("#bookphonecallsubmit").removeAttr("disabled");   
    }
    else{
      $("#bookphonecallsubmit").attr("disabled","disabled");
    }
  });


  $("input[name='enquiry']").click(function(){



    if($("#consumer").is(":checked")){ 
      document.getElementById('organisationname_column').style.display='none';
      document.getElementById('director_column').style.display='none'; 
      document.getElementById('director_column_q').style.display='none';
      document.getElementById('director_name_container').style.display='none'; 
      document.getElementById('name_container').style.display='none';
      document.getElementById('company_officers_name').style.display='none';
      document.getElementById('name_not_listed').style.display='none';
      document.getElementById('tablediv').style.display='none';  
      document.getElementById('tablediv2').style.display='none'; 
      //emptied field
      $('#company').val('');
      $('#address_snippet').empty();
      document.getElementById('verify_company_container').style.display='none';
      //document.getElementById('verifycompany').checked = false;
      document.getElementById('director_yes').checked = false;
      document.getElementById('director_no').checked = false;
      $('#director_name').val('');    

          setTimeout(function(){
              if ( $("#callbackdate").val().length > 0 ) {
                document.getElementById('datepicked1').innerHTML = $datenow;
                document.getElementById('timeselected1').innerHTML = ($("input[name=time]:checked").val());
                jQuery('.home-step-3').delay(500).slideDown(500);
                jQuery('.home-step-1').delay(500).slideUp(500);
                jQuery('.home-step-2').delay(500).slideUp(500);
                jQuery('.home-step-4').delay(500).slideUp(500);
              }
            }, 500);

    }
    else if($("#ltdcompany").is(":checked")){
      document.getElementById('organisationname_column').style.display='none';
      document.getElementById('director_column').style.display='block';   
      document.getElementById('tablediv').style.display='block';  
      document.getElementById('tablediv2').style.display='block';  
          // if($("#verifycompany").is(":checked")){ 
          //   document.getElementById('director_column_q').style.display='block';
          // }
          if($("#director_yes").is(":checked")){



            document.getElementById('director_name_container').style.display='block'; 
          }
    }
    else if($("#organisation").is(":checked")){
      document.getElementById('organisationname_column').style.display='block';
      document.getElementById('director_column').style.display='none'; 
      document.getElementById('director_column_q').style.display='none';
      document.getElementById('director_name_container').style.display='none'; 
      document.getElementById('name_container').style.display='none';
      document.getElementById('company_officers_name').style.display='none';
      document.getElementById('name_not_listed').style.display='none';
      document.getElementById('tablediv').style.display='none';  
      document.getElementById('tablediv2').style.display='none';
      //emptied field
      $('#company').val('');
      $('#address_snippet').empty();
      document.getElementById('verify_company_container').style.display='none';
      // document.getElementById('verifycompany').checked = false;
      document.getElementById('director_yes').checked = false;
      document.getElementById('director_no').checked = false;
      $('#director_name').val(''); 
    }
  });

  $("#verifycompany").click(function(){
    document.getElementById('director_column_q').style.display='block';
  });

  $("input[name='director']").click(function(){
    if($("#director_yes").is(":checked")){

      // hide the tick yes/no,, image and the question "Are you a Director of this Company?"
      $("#director_column_q").css('display', 'none');
      $("#director_name_container").css('margin-top', '12px');

      document.getElementById('director_name_container').style.display='block'; 
      document.getElementById('name_container').style.display='block';
      document.getElementById('company_officers_name').style.display='block';
      document.getElementById('name_not_listed').setAttribute("style", "display: block; cursor: pointer; border-top: 1px #7a7a7a solid; padding-top: 5px;");
    } else {
      document.getElementById('director_name_container').style.display='none'; 
      document.getElementById('name_container').style.display='none';
      document.getElementById('company_officers_name').style.display='none';
      document.getElementById('name_not_listed').style.display='none';

        setTimeout(function(){
          if ( $("#callbackdate").val().length > 0 ) {
            document.getElementById('datepicked1').innerHTML = $datenow;
            document.getElementById('timeselected1').innerHTML = ($("input[name=time]:checked").val());
            jQuery('.home-step-3').delay(500).slideDown(500);
            jQuery('.home-step-1').delay(500).slideUp(500);
            jQuery('.home-step-2').delay(500).slideUp(500);
            jQuery('.home-step-4').delay(500).slideUp(500);
          }
        }, 500);

    }
  });


}) //end of document ready


function myFunction(id)
{
  var fname = '';
  var lname = '';

  var dname = $("#company_officers_name_text_"+id).val();
  $('#director_name').val(dname);

  // console.log($("#company_officers_name_text_"+id).val() );
  setTimeout(function(){
    if ( $("#callbackdate").val().length > 0 ) {
      document.getElementById('datepicked1').innerHTML = $datenow;
      document.getElementById('timeselected1').innerHTML = ($("input[name=time]:checked").val());
      jQuery('.home-step-3').delay(500).slideDown(500);
      jQuery('.home-step-1').delay(500).slideUp(500);
      jQuery('.home-step-2').delay(500).slideUp(500);
      jQuery('.home-step-4').delay(500).slideUp(500);
    }
  }, 500);


  // get lastname
  directorSelectedFullName = $directorList[id]['namesss'];
  lname =  directorSelectedFullName.split(',')[0];
  lname = lname.substring(0, 1).toUpperCase() + lname.substring(1).toLowerCase();

  // get first name
  fname =  directorSelectedFullName.split(',')[1];
  fname = fname.split(' ');
  if(fname.length > 1) {
     fname = fname[1];
  }

  // add value to step 4 first name and lastname
  $("#e3ve-last-name").val(lname);
  $("#e3ve-first-name").val(fname);


}


function gotoOrganisationFunction()
{ 
  document.getElementById('organisation').checked = true;
  document.getElementById('organisationname_column').style.display='block';
  document.getElementById('director_column').style.display='none'; 
  document.getElementById('director_column_q').style.display='none';
  document.getElementById('director_name_container').style.display='none'; 
  document.getElementById('name_container').style.display='none';
  document.getElementById('company_officers_name').style.display='none';
  document.getElementById('name_not_listed').style.display='none';
  document.getElementById('tablediv').style.display='none';  
  document.getElementById('tablediv2').style.display='none';
  //emptied field
  $('#company').val('');
  $('#address_snippet').empty();
  document.getElementById('verify_company_container').style.display='none';
  // document.getElementById('verifycompany').checked = false;
  document.getElementById('director_yes').checked = false;
  document.getElementById('director_no').checked = false;
  $('#director_name').val(''); 
}

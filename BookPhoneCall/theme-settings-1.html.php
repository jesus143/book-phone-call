<h3>I am making this enquiry as a…</h3>
<div class="home-step-3-form">
    <div class="home-step-3-form-wrapper">
        <div class="home-step-3-form-img" style="margin:0 auto 20px;"><img src="http://bookphonecall.com/wp-content/uploads/2016/12/CONSUMER.png" style="display:block; margin:0 auto;" width="100" height="100"></div>
        <!-- <div class="home-step-3-form-input">
          <input name="enquiry" value="consumer" type="radio" id="consumer">
         </div>  -->
        <div class="home-step-3-form-label" style="text-align: center;"> <input name="enquiry" value="consumer" type="radio" id="consumer"> Consumer</div>
    </div>
    <div class="home-step-3-form-wrapper">
        <div class="home-step-3-form-img" style="margin:0 auto 20px;"><img src="http://bookphonecall.com/wp-content/uploads/2017/01/business-org.png" style="display:block; margin:0 auto;" width="100" height="100"></div>
        <!-- <div class="home-step-3-form-input">
          <input name="enquiry" value="ltdcompany" type="radio" id="ltdcompany" style="margin-left: 60px;">
        </div> -->
        <div class="home-step-3-form-label" style="text-align: center;"> <input name="enquiry" value="ltdcompany" type="radio" id="ltdcompany"> On Behalf of a Limited Company</div>
    </div>
    <div class="home-step-3-form-wrapper">
        <div class="home-step-3-form-img" style="margin:0 auto 20px;"><img src="http://bookphonecall.com/wp-content/uploads/2016/12/business-org.png" style="display:block; margin:0 auto;" width="100" height="100"></div>
        <!-- <div class="home-step-3-form-input">
          <input name="enquiry" value="organisation" type="radio" id="organisation" style="margin-left: 25px;">
        </div> -->
        <div class="home-step-3-form-label" style="text-align: center;"> <input name="enquiry" value="organisation" type="radio" id="organisation"> Business or Organisation (not Ltd company)</div>
    </div>
</div>
<div class="home-step-3-form">
    <table style="width: 100%; margin: 0 auto;"><tr><td>
                <div id="tablediv" style="border-bottom:1px solid; width: 100%; display: none;"> </div>
                <table style="width: 80%; margin: 0 auto;">
                    <tr>
                        <td style="width: 50%;">
                            <div class="home-step-3-form-wrapper" style="display:none;" id="director_column">
                                <p>Company Name: <input id="company" name="company" value="" autocomplete="off" placeholder=">> Enter Your Ltd Company Name Here <<" style="width: 70%;" /><input type="hidden" id="company_number" name="company_number" value="" /></p>
                                <div id="address_snippet"></div>
                                <p id="verify_company_container" style="display: none;"><img id="verifycompany" src="http://bookphonecall.com/wp-content/uploads/2017/01/workcompany.png" style="cursor: pointer;"><!-- <input type="checkbox" id="verifycompany" name="verifycompany" value="verifycompany"> Yes. I work for this Company. --></p>
                            </div>
                        </td>
                        <td style="width: 50%;">
                            <div class="home-step-3-form-wrapper" id="directordiv">
                                <div style="display:none;" id="director_column_q">
                                    <!-- <div class="home-step-3-form-img" style="margin:0 auto 20px;">
                                      <img src="http://bookphonecall.com/wp-content/uploads/2016/12/ltd-company.png" style="display:block; margin:0 auto;" width="100" height="100">
                                    </div> -->
                                    <div class="home-step-3-form-label"><p>Are you a Director of this Company?</p></div>
                                    <p style="clear: both;">
                                        <input id="director_yes" name="director" value="Yes" type="radio">Yes
                                        <input id="director_no" name="director" value="No" type="radio">No
                                    </p>
                                </div>
                                <p id="director_name_container" style="display:none;">Officers Name: <input id="director_name" name="director_name" value="" autocomplete="off" placeholder=">> Enter Your Name Here <<" style="width: 70%; text-transform: capitalize;" /></p>
                                <div id="name_container" style="display:none;">
                                    <p id="company_officers_name" style="display:none;"></p>
                                    <p id="name_not_listed" style="display:none;"><img src="http://bookphonecall.com/wp-content/uploads/2017/01/icon-question.png">  My Name is Not Listed Here >></p>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
                <div id="tablediv2" style="border-bottom:1px solid; width: 100%; display: none;"> </div>
            </td></tr></table>
</div>
<div class="home-step-3-form" style="display:none;  margin: 10px auto !important" id="organisationname_column">
    <div class="home-step-3-form-wrapper" style="float: right; width: 40%;">Organisation Name: <input id="organisationname" name="organisationname" value="" placeholder=">> Enter Your Organisation Name Here <<" style="width: 60%;" />
    </div>
</div>

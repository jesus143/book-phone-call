

// init data and array
$dropdowns = ['Please Select...', 'Mobile Phone', 'Home Phone', 'Office Phone'];
$selectedOption = [];

// show 2,3 dropdown when 1 dropdown contact field added with contactact number
function bpc_contact_ino_dd_field_1(value)
{
    $('#bpc_backup_number_text').css('display', 'block');
    $("#contact2").css('display', 'block');
    $("#contact3").css('display', 'block');
}

/**
 * clear select option
 * @param id
 */
function bpc_clear_dropdown_options(id)
{
    $(id).html("");
}

/**
 * add select options
 * @param id
 * @param options
 * @param val
 */
function bpc_add_dropdown_options(id, options, val) {
    for(var i = 0; i < options.length; i++ ) {
        var isAddOption = true;
        for(j=0; j< val.length; j++) {
            if(val[j] == options[i])  {
                isAddOption = false;
            }
        }
        if(isAddOption) {
            $(id).append($(new Option(options[i], options[i])));
        }
    }
}

/**
 * make the field display and in line position
 * @param id
 */
function bpc_display_inline(id) {
    document.getElementById(id).style.display='inline';
}

/**
 * Change first dropdown for contact
 * @param val
 */
function bpccheckvalue1(val)
{
    // store value to array
    $selectedOption[0] = val;

    // restore selected option in 2,3
    bpc_clear_dropdown_options("#contact2, #contact3");

    // add option dropdown in 2 and 3  ;
    bpc_add_dropdown_options("#contact2, #contact3", $dropdowns, $selectedOption);

    // display field number
    bpc_display_inline('contact11');
}

/**
 * select second dropdown for contact
 * @param val
 */
function bpccheckvalue2(val)
{
    // store value to array
    $selectedOption[1] = val;

    // display
    bpc_display_inline('contact22');

    // restore selected option in 2,3
    bpc_clear_dropdown_options("#contact3");

    // add option dropdown in 2 and 3  ;
    bpc_add_dropdown_options("#contact3", $dropdowns, $selectedOption);

}

/**
 * select 3rd dropdown for contact
 * @param val
 */
function bpccheckvalue3(val)
{
    // display
    bpc_display_inline('contact33');
}
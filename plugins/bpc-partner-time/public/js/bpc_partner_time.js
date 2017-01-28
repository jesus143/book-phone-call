function pbc_home_time_show(idNum) {
    for(var i =0; i<10; i++) {
        $("#bpc-home-time-box-display-"+i).css('display','none');
    }
    $("#bpc-home-time-box-display-"+idNum).css('display','block');
}

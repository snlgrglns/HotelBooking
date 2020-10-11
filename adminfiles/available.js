var check_in_str = $('#check_in').val();
var check_in = new Date(check_in_str);
var check_out_str = $('#check_out').val();
var check_out = new Date(check_out_str);
var nights = (check_out - check_in) / (1000 * 60 * 60 * 24);
$('.check').live("click", function() {
    var sn = $(this).val();
    var drop = $('#room'+sn);
    if($('#check'+sn).is(':checked')){
        var room_price = $("#room_price"+sn).html();
        var room_no = drop.val();
        $("#total"+sn).html(room_price*room_no);
        drop.change(function(){
            var room_no = drop.val();
            $("#total"+sn).html(room_price*room_no);
        });
    }
    else{
        $("#total"+sn).html(null);
    }
    var row_total = 0;
    $('.total').each(function(){
        var total = $(this).html();
        row_total = +row_total + +total;
    });
    var mul_nights = row_total*nights;
    $("#mul_nights").html(mul_nights.toFixed(2));
    var mul_service = mul_nights+mul_nights*10/100;
    var with_service = $("#with_service").html();
    $("#with_service").html(mul_service.toFixed(2));
    var with_tax = mul_service+mul_service*13/100;
    $("#with_tax").html(with_tax.toFixed(2));
    drop.change(function(){
        var row_total = 0;
        $('.total').each(function(){
            var total = $(this).html();
            row_total = +row_total + +total;
        });
        var mul_nights = row_total*nights;
        $("#mul_nights").html(mul_nights.toFixed(2));
        var mul_service = mul_nights+mul_nights*10/100;
        $("#with_service").html(mul_service.toFixed(2));
        var with_tax = mul_service+mul_service*13/100;
        $("#with_tax").html(with_tax.toFixed(2));
    });

});

function getVal(){
    $('#ava').submit(function(){
        if(!$('#ava input[type="checkbox"]').is(':checked')){
            alert('Please Select At Least One Room To Proceed!!!');
            return false;
        }
        var check = document.getElementsByName("check");
        var textArray = [];
        for(var c = 0; c < check.length;c++){
            if(check[c].checked){
                var check_val = check[c].value;
                var checked_room_id = document.getElementById("hid"+check_val).value;
                var room_type = document.getElementById("room_type"+check_val).innerHTML;
                var room_no = document.getElementById("room"+check_val).value;
                var adult = document.getElementById("adult"+check_val).value;
                var child = document.getElementById("child"+check_val).value;
                var no_per_hold = document.getElementById("no_per_hold"+check_val).value;
                textArray .push(checked_room_id+'=>'+room_no+'=>'+adult+'=>'+child);
                var total_person = +adult + +child;
                if(total_person<=0) {
                    alert('Select At Least One Person For Selected ('+room_type+') Room');
                    return false;
                }
                if(total_person>(room_no*no_per_hold)){
                    alert('Only '+no_per_hold+' Persons Per Room Can Be Accomodated In Selected ('+room_type+') Room!!! As Your Present Request, maximum number of person is "'+(room_no*no_per_hold)+'" for selected number of room "' +room_no+'"');
                    return false;
                }
            }
        }
        $('#room_data').val(textArray);
    });
}
/**
 * Created by SANIL on 9/11/2015.
 */
$( "#arrival" ).datepicker({ dateFormat: "yy-mm-dd", minDate: +1,
    onSelect: function (dateStr) {
        var min = $(this).datepicker('getDate'); // Get selected date
        var bbb = $("#arrival").val();
        var aaa = new Date(new Date(bbb).getTime()+86400000);
        $("#departure").datepicker('option', 'minDate', aaa); // Set other min, default to today
    }
});
$( "#departure" ).datepicker({ dateFormat: "yy-mm-dd", minDate: +1,
    onSelect: function (dateStr) {
        var max = $(this).datepicker('getDate'); // Get selected date
        $('#datepicker').datepicker('option', 'maxDate', max || '+1Y+6M'); // Set other max, default to +18 months
    }
});

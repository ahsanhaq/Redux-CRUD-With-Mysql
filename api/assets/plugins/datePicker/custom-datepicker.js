$(document).ready(function () {   
    //DatePicker
    /*$('.datepicker').datepicker();
    $('#purchasedate').datepicker('setEndDate', 'd');
    $('#firmwarelastupdated').datepicker('setEndDate', 'd');*/
    //$('.datepicker').datetimepicker({   format: 'YYYY-MM-DD HH:mm:ss'  });
	//$('.datepicker').datetimepicker({   format: 'YYYY-MM-DD HH:mm:ss', minDate: new Date() });
	var date = new Date();
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
	$('#eventstartdate,#eventenddate').datetimepicker({
                useCurrent: false,
				format: 'YYYY-MM-DD',
               
            });
            $('#eventstartdate').datetimepicker().on('dp.change', function (e) {
				
                var incrementDay = moment(new Date(e.date));
                incrementDay.add(0, 'days');
                $('#eventenddate').data('DateTimePicker').minDate(incrementDay);
                $(this).data("DateTimePicker").hide();
            });

            $('#eventenddate').datetimepicker().on('dp.change', function (e) {
				
                var decrementDay = moment(new Date(e.date));
                decrementDay.subtract(0, 'days');
                $('#eventstartdate').data('DateTimePicker').maxDate(decrementDay);
                 $(this).data("DateTimePicker").hide();
            });
	
	
	
    $('.timepicker').datetimepicker({ 
        format: 'HH:mm'  });
    
});
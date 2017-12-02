$(document).ready(function() {
    $('.bookingForm').on('change', '#number-adult, #number-child', function() {
        var numAdult = $('#number-adult').val();
        $.get('/plan/booking/adult',{ 'numAdult' : numAdult }, function(data) {
            if (numAdult) {
                $('.number-adult').html(numAdult);
                $('#guest-adult').html('');

                for (var i = 2; i <= numAdult; i++) {
                    $('#guest-adult').append(data);
                }
            }
        });

        var numChild = $('#number-child').val();
        $.get('/plan/booking/child',{ 'numChild' : numChild }, function(data) {
            if (numChild) {
                $('.number-child').html(numChild);
                $('#guest-child').html('');

                for (var i = 1; i <= numChild; i++) {
                    $('#guest-child').append(data);
                }
            }
        });

        var price =  $('#number-adult').data('price');
        var priceTotal = numAdult*price + numChild*price/2;
        $('.Total').html('$ ' + priceTotal);
        $('.total_amount').val(priceTotal);
        var numTotal = numAdult*1 + numChild*1;
        $('#total-number').val(numTotal);
    });
});

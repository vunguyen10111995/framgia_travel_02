$(document).ready(function() {  
    $('.star').click(function(e) {
        var id = $(this).attr('plan-id');
        e.preventDefault();
        $.ajax({
            method: 'get',
            url: '/plan/' + id + '/rate',
            data: $(this).serialize(),
            success: function(response) {
               $('.info').html(response);
            },
        });
    }); 
});

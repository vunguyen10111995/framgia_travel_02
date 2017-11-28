$(document).ready(function() {
    $('#comment-form').submit(function(e) {
        var id = $('#plan_id').attr('data-id');
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/plan/'+ id + '/comment',
            data:  $(this).serialize(),
            success: function(response) {
                $('.show-comment').prepend(response);
                $('.text-comment').val('');
            },
        });
    });
});

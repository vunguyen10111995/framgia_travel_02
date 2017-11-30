$(document).ready(function() {
    $(document).on('click', '#list_fork', function(e) {
        e.preventDefault();
        let id = $(this).attr('value');
        $.ajax({
            url: '/dashboard/'+ id +'/list-fork',
            type: 'GET',
        }).done(function(data) {
            $('#show_info').html(data);
        });
    });

    $(function() {   
        $('.select2').select2();
    });

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });

    $(function () {
        $('.timepicker').datetimepicker({
            format: 'LT'
        });
    });
});

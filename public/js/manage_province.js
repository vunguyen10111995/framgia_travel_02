$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getPosts(page);
        }
    }
});

$(document).ready(function() {
    $(document).on('click', '.pagination li a', function(e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        getPosts(page);
        $('html').animate({
            scrollTop: 0
        }, 0);
    });
});

function getPosts(page) {
    $.ajax({
        type : 'get',
        url: '/admin/province?page=' + page,
        }).done(function (data) {
        $('.ibox').html(data);
    });
}

$(document).ready(function() {
    $(document).on('click', '.view_detail', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/province/showData',
            dataType: 'json',
            type: 'GET',
            data: {
                id: id,
            }
        }).done(function(data) {
            console.log(data);
            $('#form-2 #image').attr('src', data.image);
            $('#form-2 #id').val(data.id);
            $('#form-2 #name').val(data.name);
            $('#form-2 #description').val(data.description);
        });
    });

    $(document).on('click', '.createValue', function(e){
        e.preventDefault();
        var form = $('#form-1')[0];
        var formData = new FormData(form);
        $.ajax({
            url: '/admin/province',
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false, 
        }).done(function(data) {
            $('#addValue').modal('hide');
        });
    });

    $(document).on('click', '.updateValue', function(e){
        e.preventDefault();
        $.ajax({
            url: '/admin/province/update',
            data: {
                _token: $('input[name=_token]').val(),
                id: $('#form-2 #id').val(),
                name: $('#form-2 #name').val(),
                status: $('#form-2 #select_status').val(),
            },
            type: 'POST',
        }).done(function(data) {
            $('#viewModal').modal('hide');
        });
    });
});

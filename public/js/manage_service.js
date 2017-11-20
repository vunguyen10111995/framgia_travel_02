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
        url: '/admin/service?page=' + page,
        }).done(function (data) {
        $('.ibox').html(data);
    });
}

$(document).ready(function() {
    $(document).on('click', '.view_detail', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/service/showData',
            dataType: 'json',
            type: 'GET',
            data: {
                id: id,
            }
        }).done(function(data) {
            $('#form-2 #images').attr('src', data.image);
            $('#form-2 #name').val(data.name);
            $('#form-2 #category').val(data.category.name);
            $('#form-2 #province').val(data.province.name);
            $('#form-2 #price').val(data.price);
            $('#form-2 #rate').val(data.rate);
            $('#form-2 #description').val(data.description);
        });
    });

    $("#search_service").keyup(function() {
    var key = $(this).val();
        setTimeout(function() {
            $.ajax({
                url: '/service/search',
                type: 'GET',
                data: {
                    key : key,
                },
                success: function(response) {
                    $('tbody').html(response);
                }   
            })  
        }, 1000);
    });
});

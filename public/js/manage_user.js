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
        $('body,html').animate({
            scrollTop: 0
        }, 0);
    });
});
function getPosts(page) {
    $.ajax({
        type : 'get',
        url: '/admin/user?page=' + page,
        }).done(function (data) {
        $('.ibox').html(data);
    });
}

$(document).ready(function() {
    $('.change_level').click(function() {
        $('#edit_permission').hide();
        $('.select_permission').hide();
        $('#edit_level').show();
        $('.select_level').show();
    });
    $('.change_permission').click(function() {
        $('#edit_level').hide();
        $('.select_level').hide();
        $('#edit_permission').show();
        $('.select_permission').show();
    });
});

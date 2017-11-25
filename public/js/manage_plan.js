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

$(document).on('click', '.pagination li a', function(e) {
    e.preventDefault();
    let page = $(this).attr('href').split('page=')[1];
    getPosts(page);
    $('html').animate({
        scrollTop: 0
    }, 0);
});

function getPosts(page) {
    $.ajax({
        type : 'get',
        url: '/admin/plan?page=' + page,
        }).done(function (data) {
        $('.ibox').html(data);
    });
}

$(document).ready(function() {
    $(document).on('click', '.change_permission', function() {
    var status = config['status'];
        var selected = '';
        for(var i in status) {
            selected += "<option value= '" + status[i] + "'" ;
            if(status[i] == $(this).attr('value')) {
                selected += "selected";
            }
            selected += '>' + i + '</option>';
        }
        $('#select_permission').html(selected);
        var id = $(this).attr('data');
        $('#select_permission').attr('data-id', id);
    });

    $(document).on('click', '.updateStatus', function(e) {
        e.preventDefault();
        var id = $('#select_permission').attr('data-id');
        var status = $('#select_permission').val();
        $.ajax({
            url: '/admin/plan/' + id,
            type: 'POST',
            data: {
                _token: $('input[name=_token]').val(),
                id: id,
                status: status,
            }
        }).done(function(data) {
            $('#myModal').modal('hide');
        })
    });

    $(document).on('change', '#filter_data', function(e) {
        e.preventDefault();
        $.get('/plan/filter', { key: $(this).val() } , function(response){
            $('tbody').html(response);
        });
    });

    $("#search_plan").keyup(function() {
        var key = $(this).val();
        setTimeout(function() {
            $.ajax({
                url: '/plan/search',
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
    
    $('.select_province').selectpicker();
    $(document).on('click', '.createValue', function(e) {
        e.preventDefault();
        if($('#select_province').val() != '') {
            $.ajax({
                url: '/admin/plan',
                method:"POST",
                _token: $('input[name=_token]').val(),
                data: {
                    _token: $('input[name=_token]').val(),
                    title: $('#title').val(),
                    description: $('#description').val(),
                    start_at: $('#start_at').val(),
                    end_at: $('#end_at').val(),
                    province: $('#select_province').val(),
                },
                success:function(data) {
                    $('#select_province').val('');
                    $('.select_province').selectpicker('val', '');
                    $('#addValue').modal('hide');
                }
            })
        }
    });

    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});

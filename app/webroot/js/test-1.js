function like_video(id) {

    id_article = id;
    $.ajax({
        url: '/STOCK_PHOTO_teamC/videos/like',
        type: "POST",
        data: {id_article : id_article},
        dataType : 'json',
       
        success: function(data) {
            console.log(data);
            if (data.is_like == true) {
                $('button#'+id).removeClass('btn-default');
                $('button#'+id).addClass('btn-danger');
            }
            else {
                $('button#'+id).removeClass('btn-danger');
                $('button#'+id).addClass('btn-default');
            }
            $('#'+id+'.like_count').empty();
            $('#'+id+'.like_count').text(data.like_count);

        },
        error: function( xhr, status, errorThrown ) {
            if (errorThrown == 'Forbidden') {
                var url = "/STOCK_PHOTO_teamC/users/login";
                $(location).attr('href',url);
            }
        },
    })
}
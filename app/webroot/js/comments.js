function delete_comment(id) {

    id = id;
    $.ajax({
        url: '/STOCK_PHOTO_teamC/comments/delete',
        type: "POST",
        data: {id : id},
        dataType : 'json',
       
        success: function(data) {
            console.log(data);
            $('#'+id).fadeOut();
        }
    });
}  

function comment(image_id, user_id) {
    $.ajax({
        url: '/STOCK_PHOTO_teamC/comments/add',
        type: "POST",
        data: {message: $('.comment-input').val(), image_id: image_id, user_id: user_id},
        dataType : 'json',
        
        success: function(data) {
            console.log(data);
            $('.show-comment').append('<div class="comment" id="' + data.comment.Comment.id + '">' + 
                '<b>' +  data.comment.User.name + '</b><br>' + 
                '<p style="font-size: 18px;">' + data.comment.Comment.message + '<p>' + 
                '<i style="font-size: 12px;">' + data.comment.Comment.created + '</i></div>'
                );
            $('.comment-input').val('');
        }
    });
}  

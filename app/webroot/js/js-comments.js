function comment(image_id, user_id) {
    $.ajax({
        url: '/STOCK_PHOTO_teamC/comments/add',
        type: "POST",
        data: {message: $('.comment-input').val(), image_id: image_id, user_id: user_id},
        dataType : 'json',
        
        success: function(data) {
            console.log('sasa');
            console.log(data);
            $('.show-comment').append('<div class="comment" id="comment-' + data.comment.Comment.id + '">' + 
                '<b>' +  data.comment.User.name + '</b><br>' + 
                '<p style="font-size: 16px;">' + data.comment.Comment.message + '<p>' + 
                '<i style="font-size: 10px;">' + data.comment.Comment.created + '</i> ' +
                '<a href="javascript:void(0)" onclick="delete_comment(' + data.comment.Comment.id + ');">Delete</a>' +
                '</div>'
                );
            $('.comment-input').val('');
        },
    });
}

function delete_comment(id) {
	id = id;
	if (confirm("Are you sure?")) {
	    $.ajax({
	        url: '/STOCK_PHOTO_teamC/comments/delete',
	        type: "POST",
	        data: {id : id},
	        dataType : 'json',
	       
	        success: function(data) {
	            $('#comment-'+data.result).remove();
	        },
	    });
	}
	return false;
}

function delete_comment(id) {

    id = id;
    $.ajax({
        url: '/STOCK_PHOTO_teamC/comments/delete',
        type: "POST",
        data: {id : id},
        dataType : 'json',
       
        success: function(data) {
            console.log(data);
        }
    });
}  


    

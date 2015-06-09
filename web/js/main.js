$('.datepicker').datepicker();

$('.preview').on('click', function(){
    var src = $(this).attr('src');
    $('#myPreview .modal-content').html('<img src="'+src+'" width="600px">');
    $('#myPreview').modal();
});

$('.operations .view').on('click', function(){
    var url = $(this).attr('href');
    var id = $(this).attr('key');
    $.ajax({
        type: 'post',
        url: url,
        data: id,
        success: function(data){
            $('#myModal .modal-body').html(data);
            $('#myModal').modal();
        },
        error: function(err){
            console.log(err);
        }
    });
    return false;
});
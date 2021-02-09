$('#cvphoto-modify').change(function() {
    var input = $(this);
    var url = $(this).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input[0].files && input[0].files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
    {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('#cvphoto-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input[0].files[0]);
    }
    else
    {
        $('#cvphoto-preview').attr('src', '../../images/avatar-placehold.png');
    }
});
setTimeout(function(){
    $('.alert-modal').css('display', 'none');
}, 5000);

$('.close-alert-modal').click(function() {
    $(this).parent().css('display', 'none');
});
$('#faqButton').click(function() {
    $('html, body').animate({
        scrollTop: $("#faq").offset().top
    }, 1000);
});

$('#modelCvButton').click(function() {
    $('html, body').animate({
        scrollTop: $("#modelCvList").offset().top
    }, 1000);
});
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

$('#faqButtonMobile').click(function() {
    var responsive = $(".responsive-mobile-drawer--west");
    var obfuscator = $(".responsive-overlay");
    console.log(responsive, obfuscator);

    responsive.removeClass("is-active");
    obfuscator.removeClass("is-active");

    $('html, body').animate({
        scrollTop: $("#faq").offset().top
    }, 1000);
});

$('#modelCvButtonMobile').click(function() {
    var responsive = $(".responsive-mobile-drawer--west");
    var obfuscator = $(".responsive-overlay");
    console.log(responsive, obfuscator);

    responsive.removeClass("is-active");
    obfuscator.removeClass("is-active");

    $('html, body').animate({
        scrollTop: $("#modelCvList").offset().top
    }, 1000);
});
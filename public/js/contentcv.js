/*-- Formulaire xp form --*/

$('#form-xp__display').click(function() {
    $('#form-xp__display').css('display', 'none');
    $('#form-xp__todisplay').css('display', 'block');
});

$('#form-xp__outdisplay').click(function() {
    $('#form-xp__display').css('display', 'block');
    $('#form-xp__todisplay').css('display', 'none');
    $('html, body').animate({
        scrollTop: ($('#is-load').offset().top)
    },500);
});

$(document).on('click', '#form-xp__update', function() {
    var xpId = $(this).data('xpedit');
    $('#form-xp__toedit' + xpId).css('display', 'block');
    $('#form-xp__display').css('display', 'none');
    $('#form-xp__todisplay').css('display', 'none');
});

$(document).on('click', '#form-xpedit__outdisplay', function() {
    var xpId = $(this).data('close-xpedit');
    $('#form-xp__toedit' + xpId).css('display', 'none');
    $('#form-xp__display').css('display', 'block');
});

/*-- Formulaire education form --*/

$('#form-educ__display').click(function() {
    $('#form-educ__display').css('display', 'none');
    $('#form-educ__todisplay').css('display', 'block');
});

$('#form-educ__outdisplay').click(function() {
    $('#form-educ__display').css('display', 'block');
    $('#form-educ__todisplay').css('display', 'none');
    $('html, body').animate({
        scrollTop: ($('#is-load').offset().top)
    },500);
});

$(document).on('click', '#form-educ__update', function() {
    var educId = $(this).data('educedit');
    $('#form-educ__toedit' + educId).css('display', 'block');
    $('#form-educ__display').css('display', 'none');
    $('#form-educ__todisplay').css('display', 'none');
});

$(document).on('click', '#form-educedit__outdisplay', function() {
    var educId = $(this).data('close-educedit');
    $('#form-educ__toedit' + educId).css('display', 'none');
    $('#form-educ__display').css('display', 'block');
});

/*-- Formulaire compétences form --*/

$('#form-comp__display').click(function() {
    $('#form-comp__display').css('display', 'none');
    $('#form-comp__todisplay').css('display', 'block');
});

$('#form-comp__outdisplay').click(function() {
    $('#form-comp__display').css('display', 'block');
    $('#form-comp__todisplay').css('display', 'none');
    $('html, body').animate({
        scrollTop: ($('#is-load').offset().top)
    },500);
});

$(document).on('click', '#form-comp__update', function() {
    var compEdit = $(this).data('compedit');
    $('#form-comp__toedit' + compEdit).css('display', 'block');
    $('#form-comp__display').css('display', 'none');
    $('#form-comp__todisplay').css('display', 'none');
});

$(document).on('click', '#form-comp__outdisplay', function() {
    var compId = $(this).data('close-compedit');
    $('#form-comp__toedit' + compId).css('display', 'none');
    $('#form-comp__todisplay').css('display', 'none');
    $('#form-comp__display').css('display', 'block');
});

/*-- Formulaire Hobbies form --*/

$('#form-hobbies__display').click(function() {
    $('#form-hobbies__display').css('display', 'none');
    $('#form-hobbies__todisplay').css('display', 'block');
});

$('#form-hobbies__outdisplay').click(function() {
    $('#form-hobbies__display').css('display', 'block');
    $('#form-hobbies__todisplay').css('display', 'none');
    $('html, body').animate({
        scrollTop: ($('#is-load').offset().top)
    },500);
});

$(document).on('click', '#form-hobbie__update', function() {
    var hobbieEdit = $(this).data('hobbieedit');
    $('#form-hobbie__toedit' + hobbieEdit).css('display', 'block');
    $('#form-hobbies__display').css('display', 'none');
    $('#form-hobbies__todisplay').css('display', 'none');
});

$(document).on('click', '#form-hobbie__outdisplay', function() {
    var hobbieId = $(this).data('close-hobbieedit');
    $('#form-hobbie__toedit' + hobbieId).css('display', 'none');
    $('#form-hobbies__todisplay').css('display', 'none');
    $('#form-hobbies__display').css('display', 'block');
});

/*-- Formulaire Lang form --*/

$('#form-langs__display').click(function() {
    $('#form-langs__display').css('display', 'none');
    $('#form-langs__todisplay').css('display', 'block');
});

$('#form-langs__outdisplay').click(function() {
    $('#form-langs__display').css('display', 'block');
    $('#form-langs__todisplay').css('display', 'none');
    $('html, body').animate({
        scrollTop: ($('#is-load').offset().top)
    },500);
});

$(document).on('click', '#form-lang__update', function() {
    var langId = $(this).data('langedit');
    $('#form-lang__toedit' + langId).css('display', 'block');
    $('#form-langs__display').css('display', 'none');
    $('#form-langs__todisplay').css('display', 'none');
});

$(document).on('click', '#form-lang__outdisplay', function() {
    var langId = $(this).data('close-hobbieedit');
    $('#form-lang__toedit' + langId).css('display', 'none');
    $('#form-langs__todisplay').css('display', 'none');
    $('#form-langs__display').css('display', 'block');
});

/*-- Formulaire Ref form --*/

$('#form-refs__display').click(function() {
    $('#form-refs__display').css('display', 'none');
    $('#form-refs__todisplay').css('display', 'block');
});

$('#form-refs__outdisplay').click(function() {
    $('#form-refs__display').css('display', 'block');
    $('#form-refs__todisplay').css('display', 'none');
    $('html, body').animate({
        scrollTop: ($('#is-load').offset().top)
    },500);
});

$(document).on('click', '#form-ref__update', function() {
    var refId = $(this).data('refedit');
    $('#form-ref__toedit' + refId).css('display', 'block');
    $('#form-refs__display').css('display', 'none');
    $('#form-refs__todisplay').css('display', 'none');
});

$(document).on('click', '#form-ref__outdisplay', function() {
    var refId = $(this).data('close-hobbieedit');
    $('#form-ref__toedit' + refId).css('display', 'none');
    $('#form-refs__todisplay').css('display', 'none');
    $('#form-refs__display').css('display', 'block');
});
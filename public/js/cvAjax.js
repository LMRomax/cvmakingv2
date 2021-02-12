/*
*   Call ajax for form cv
*/

/*-- Ajax form description --*/

$('#form-description__validate').click(function() {
    var form = $('#description-form');
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/description',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            $('#description__form-error').css('display', 'none');
            form.children().removeClass('is-invalid');
            $('#description__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            console.log(resultat);
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "description__form-error") {
                    $('#description__form-error').css('display', 'block');
                    $('#description__form-error').find('strong').text(error);
                }
                else {
                    $(field).addClass('is-invalid');
                    $('#'+field+'__error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/*-- Ajax form XP --*/

/* xp store */

$(document).on('click','#form-xp__validate',function(e) {
    var form = $('#xp-form');
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/xp/store',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.find(':input:not(select)').val("");
            $("#xps-lists").load(" #xps-lists > *");
            $('#form-xp__todisplay').css('display', 'none');
            $('#form-xp__display').css('display', 'block');
            $('#xp__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
            //$.getScript("public/js/contentCvSummernote.js");
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "xp__form-error") {
                    $('#xp__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $(field).addClass('is-invalid');
                    $('#'+field+'__error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* xp update */

$(document).on('click','#form-xpedit__validate',function(e) {
    var xp_id = $(this).attr("data-submit-editform");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    var form = $('#form-xp__toedit' + xp_id);
    $.ajax({
        url: '/validate/cv/xp/'+xp_id+'/update',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.css('display', 'none');
            $("#xps-lists").load(" #xps-lists > *");
            $.getScript("http://127.0.0.1:8000/js/contentCvSummernote.js");
            $('#form-xp__todisplay').css('display', 'none');
            $('#form-xp__display').css('display', 'block');
            $('#xp__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
            //$('#xp' +xp_id).children('.xps-title-date').children('div').text(data.Title['contentcv_xp_poste']);
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                console.log(error);
                if(field === "xp__form-error") {
                    $('#xp__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $('#'+field+xp_id).addClass('is-invalid');
                    $('#xp__form-error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* xp delete */

$(document).on('click','#form-xp__delete',function(e) {
    var xp_id = $(this).attr("data-xpdelete");
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    e.preventDefault();
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/xp/'+xp_id+'/delete',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $(this).serialize(),
        success : function(data) {
            $('#xp'+xp_id).slideUp();
            $('#xp__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            if(erreur === "Internal Servor Error") {
                $('#xp__form-error').css('display', 'block').find('strong').text(erreur);
            }
            else {
                $.each(resultat.responseJSON.errors, function (field ,error) {
                    $('#xp__form-error').css('display', 'block').find('strong').text(error);
                });
            }
        },
    });
});

/*-- Ajax form Education --*/

/* Educ store */

$(document).on('click','#form-educ__validate',function(e) {
    var form = $('#educ-form');
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/educ/store',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.find(':input:not(select)').val("");
            $("#educs-lists").load(" #educs-lists > *");
            $('#form-educ__todisplay').css('display', 'none');
            $('#form-educ__display').css('display', 'block');
            $('#educ__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "educ__form-error") {
                    $('#educ__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $(field).addClass('is-invalid');
                    $('#'+field+'__error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Educ update */

$(document).on('click','#form-educedit__validate',function(e) {
    var educ_id = $(this).attr("data-submit-educedit");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    var form = $('#form-educ__toedit' + educ_id);
    $.ajax({
        url: '/validate/cv/educ/'+educ_id+'/update',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.css('display', 'none');
            $("#educs-lists").load(" #educs-lists > *");
            $.getScript("http://127.0.0.1:8000/js/contentCvSummernote.js");
            $('#form-educ__todisplay').css('display', 'none');
            $('#form-educ__display').css('display', 'block');
            $('#educ__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
            //$('#educ' + educ_id).children('.xps-title-date').children('div').text(data.Title['contentcv_educ_formation']);
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "educ__form-error") {
                    $('#educ__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $('#'+field+educ_id).addClass('is-invalid');
                    $('#educ__form-error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Educ delete */

$(document).on('click','#form-educ__delete',function(e) {
    var educ_id = $(this).attr("data-educdelete");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/educ/'+educ_id+'/delete',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $(this).serialize(),
        success : function(data) {
            $('#educ'+educ_id).slideUp();
            $('#educ__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            if(erreur === "Internal Servor Error") {
                $('#educ__form-error').css('display', 'block').find('strong').text(erreur);
            }
            else {
                $.each(resultat.responseJSON.errors, function (field ,error) {
                    $('#educ__form-error').css('display', 'block').find('strong').text(error);
                });
            }
        },
    });
});

/*-- Ajax form Compétences --*/

/* Comp store */

$(document).on('click','#form-comp__validate',function(e) {
    var form = $('#comp-form');
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/comp/store',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.find(':input:not(select)').val("");
            $("#comps-lists").load(" #comps-lists > *");
            $('#form-comp__todisplay').css('display', 'none');
            $('#form-comp__display').css('display', 'block');
            $('#comp__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "comp__form-error") {
                    $('#comp__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $(field).addClass('is-invalid');
                    $('#'+field+'__error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Comp edit */

$(document).on('click','#form-compedit__validate',function(e) {
    var comp_id = $(this).attr("data-submit-compedit");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    var form = $('#form-comp__toedit' + comp_id);
    $.ajax({
        url: '/validate/cv/comp/'+comp_id+'/update',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.css('display', 'none');
            $("#comps-lists").load(" #comps-lists > *");
            $('#form-comp__todisplay').css('display', 'none');
            $('#form-comp__display').css('display', 'block');
            $('#comp__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "comp__form-error") {
                    $('#comp__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $('#'+field+comp_id).addClass('is-invalid');
                    $('#comp__form-error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Comp delete */

$(document).on('click','#form-comp__delete',function(e) {
    var comp_id = $(this).attr("data-compdelete");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/comp/'+comp_id+'/delete',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $(this).serialize(),
        success : function(data) {
            $('#comp'+comp_id).slideUp();
            $('#comp__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            if(erreur === "Internal Servor Error") {
                $('#comp__form-error').css('display', 'block').find('strong').text(erreur);
            }
            else {
                $.each(resultat.responseJSON.errors, function (field ,error) {
                    $('#comp__form-error').css('display', 'block').find('strong').text(error);
                });
            }
        },
    });
});

/*-- Ajax form Hobbies --*/

/* Hobby store */

$(document).on('click','#form-hobbies__validate',function(e) {
    var form = $('#hobbies-form');
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/hobbies/store',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.find(':input:not(select)').val("");
            $("#hobbies-lists").load(" #hobbies-lists > *");
            $('#form-hobbies__todisplay').css('display', 'none');
            $('#form-hobbies__display').css('display', 'block');
            $('#hobbies__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "comp__form-error") {
                    $('#hobbies__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $(field).addClass('is-invalid');
                    $('#'+field+'__error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Hobby edit */

$(document).on('click','#form-hobbieedit__validate',function(e) {
    var hobbie_id = $(this).attr("data-submit-hobbieedit");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    var form = $('#form-hobbie__toedit' + hobbie_id);
    $.ajax({
        url: '/validate/cv/hobbies/'+hobbie_id+'/update',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.css('display', 'none');
            $("#hobbies-lists").load(" #hobbies-lists > *");
            $('#form-hobbies__todisplay').css('display', 'none');
            $('#form-hobbies__display').css('display', 'block');
            $('#hobbies__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "hobbies__form-error") {
                    $('#hobbies__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $('#'+field+hobbie_id).addClass('is-invalid');
                    $('#hobbies__form-error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Hobby delete */

$(document).on('click','#form-hobbie__delete',function(e) {
    var hobbie_id = $(this).attr("data-hobbiedelete");
    console.log(hobbie_id);
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/hobbies/'+hobbie_id+'/delete',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $(this).serialize(),
        success : function(data) {
            $('#hobbie'+hobbie_id).slideUp();
            $('#hobbies__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            if(erreur === "Internal Servor Error") {
                $('#hobbies__form-error').css('display', 'block').find('strong').text(erreur);
            }
            else {
                $.each(resultat.responseJSON.errors, function (field ,error) {
                    $('#hobbies__form-error').css('display', 'block').find('strong').text(error);
                });
            }
        },
    });
});

/*-- Ajax form Lang --*/

/* Lang store */

$(document).on('click','#form-langs__validate',function(e) {
    var form = $('#langs-form');
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/langs/store',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.find(':input:not(select)').val("");
            $("#langs-lists").load(" #langs-lists > *");
            $('#form-langs__todisplay').css('display', 'none');
            $('#form-langs__display').css('display', 'block');
            $('#langs__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "lang__form-error") {
                    $('#langs__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $(field).addClass('is-invalid');
                    $('#'+field+'__error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Lang edit */

$(document).on('click','#form-langedit__validate',function(e) {
    var lang_id = $(this).attr("data-submit-langedit");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    var form = $('#form-lang__toedit' + lang_id);
    $.ajax({
        url: '/validate/cv/langs/'+lang_id+'/update',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.css('display', 'none');
            $("#langs-lists").load(" #langs-lists > *");
            $('#form-langs__todisplay').css('display', 'none');
            $('#form-langs__display').css('display', 'block');
            $('#langs__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "lang__form-error") {
                    $('#langs__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $('#'+field+lang_id).addClass('is-invalid');
                    $('#langs__form-error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Lang delete */

$(document).on('click','#form-lang__delete',function(e) {
    var lang_id = $(this).attr("data-langdelete");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/langs/'+lang_id+'/delete',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $(this).serialize(),
        success : function(data) {
            $('#lang'+lang_id).slideUp();
            $('#langs__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            if(erreur === "Internal Servor Error") {
                $('#langs__form-error').css('display', 'block').find('strong').text(erreur);
            }
            else {
                $.each(resultat.responseJSON.errors, function (field ,error) {
                    $('#langs__form-error').css('display', 'block').find('strong').text(error);
                });
            }
        },
    });
});

/*-- Ajax form Ref --*/

/* Ref store */

$(document).on('click','#form-refs__validate',function(e) {
    var form = $('#refs-form');
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/refs/store',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.find(':input:not(select)').val("");
            $("#refs-lists").load(" #refs-lists > *");
            $('#form-refs__todisplay').css('display', 'none');
            $('#form-refs__display').css('display', 'block');
            $('#refs__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "ref__form-error") {
                    $('#refs__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $(field).addClass('is-invalid');
                    $('#'+field+'__error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Ref edit */

$(document).on('click','#form-refedit__validate',function(e) {
    var ref_id = $(this).attr("data-submit-refedit");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    var form = $('#form-ref__toedit' + ref_id);
    $.ajax({
        url: '/validate/cv/refs/'+ref_id+'/update',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: form.find(':input').serialize(),
        success : function(data) {
            form.css('display', 'none');
            $("#refs-lists").load(" #refs-lists > *");
            $('#form-refs__todisplay').css('display', 'none');
            $('#form-refs__display').css('display', 'block');
            $('#refs__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            $.each(resultat.responseJSON.errors, function (field ,error) {
                if(field === "ref__form-error") {
                    $('#refs__form-error').find('strong').text(error).css('display', 'block');
                }
                else {
                    $('#'+field+ref_id).addClass('is-invalid');
                    $('#refs__form-error').css('display', 'block').find('strong').text(error);
                }
            });
        },
    });
});

/* Ref delete */

$(document).on('click','#form-ref__delete',function(e) {
    var ref_id = $(this).attr("data-refdelete");
    e.preventDefault();
    $('.iframe-isload').css('display', 'flex');
    $('.preview--inner').css('display', 'none');
    /* Call Ajax */
    $.ajax({
        url: '/validate/cv/refs/'+ref_id+'/delete',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: $(this).serialize(),
        success : function(data) {
            $('#ref'+ref_id).slideUp();
            $('#refs__form-error').css('display', 'none');
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            if(erreur === "Internal Servor Error") {
                $('#refs__form-error').css('display', 'block').find('strong').text(erreur);
            }
            else {
                $.each(resultat.responseJSON.errors, function (field ,error) {
                    $('#refs__form-error').css('display', 'block').find('strong').text(error);
                });
            }
        },
    });
});

$(document).on('click', '.color-btn', function(e) {
    var color = $(this).attr('data-color');
    e.preventDefault();
    $.ajax({
        url: '/validate/cv/color/chosen',
        type : 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            "color": color
        },
        success : function(data) {
            $('#previewCVIframe').attr('src', $('#previewCVIframe').attr('src'));
            $('#previewCVIframeModal').attr('src', $('#previewCVIframeModal').attr('src'));
            $('.iframe-isload').css('display', 'none');
            $('.preview--inner').css('display', 'inline-block');
        },
        error : function(resultat, statut, erreur){
            if(erreur === "Internal Servor Error") {
                $('#refs__form-error').css('display', 'block').find('strong').text(erreur);
            }
            else {
                $.each(resultat.responseJSON.errors, function (field ,error) {
                    $('#refs__form-error').css('display', 'block').find('strong').text(error);
                });
            }
        },
    });
});
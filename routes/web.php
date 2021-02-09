<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],  function() {

    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/making-my-cv', 'CVController@makingMyCv')->name('making-cv');

    Route::post('/making-my-cv/post', 'CVController@handleBasics')->name('post-basics');

    Route::get('/select-design', 'CVController@selectDesign')->name('select-design');

    Route::post('/select-design/post', 'CVController@selectedDesignPost')->name('selected-design');

    Route::get('/content-cv', 'CVController@indexContentCV')->name('content-cv');

    Route::get('/payment', 'CVController@Payment')->name('payment');

    Route::post('/handle-payment', 'CVController@handlePayment')->name('handle-payment');

    Route::get('/payment-done', 'CVController@donePayment')->name('payment-done');

    Route::get('/preview-pdf', 'CVController@PDF')->name('pdf');

    Route::get('/download-pdf', 'CVController@downloadPDF')->name('download-pdf');
    
    /******Route Footer******/
    
    Route::name('footer.')->group(function () {
        Route::get('/contact', function() {
            return view('footer.contact');
        })->name('contact');
    
        Route::post('/contact/email', 'ContactController@sendEmail')->name('contact-post');
    
        Route::get('/terms-conditions', function() {
            return view('footer.cgu');
        })->name('cgu');
        
        Route::get('/privacy-policy', function() {
            return view('footer.polconfident');
        })->name('polconfident');
    });

    /*-----Route pour vérifier design cv------*/

    Route::get('/barkley', function () {
        return view('pdf.barkley');
    });
});

/*----- Route Ajax -----*/

Route::group(['middleware' => ['ajax']], function () {
    Route::post('/validate/cv/description', 'CVAjaxController@handleDescription');

    Route::post('/validate/cv/xp/store', 'CVAjaxController@storeXP');
    Route::post('/validate/cv/xp/{id}/update', 'CVAjaxController@updateXP');
    Route::post('/validate/cv/xp/{id}/delete', 'CVAjaxController@deleteXP');

    Route::post('/validate/cv/educ/store', 'CVAjaxController@storeEduc');
    Route::post('/validate/cv/educ/{id}/update', 'CVAjaxController@updateEduc');
    Route::post('/validate/cv/educ/{id}/delete', 'CVAjaxController@deleteEduc');

    Route::post('/validate/cv/comp/store', 'CVAjaxController@storeComp');
    Route::post('/validate/cv/comp/{id}/update', 'CVAjaxController@updateComp');
    Route::post('/validate/cv/comp/{id}/delete', 'CVAjaxController@deleteComp');

    Route::post('/validate/cv/hobbies/store', 'CVAjaxController@storeHobbies');
    Route::post('/validate/cv/hobbies/{id}/update', 'CVAjaxController@updateHobbies');
    Route::post('/validate/cv/hobbies/{id}/delete', 'CVAjaxController@deleteHobbies');

    Route::post('/validate/cv/langs/store', 'CVAjaxController@storeLang');
    Route::post('/validate/cv/langs/{id}/update', 'CVAjaxController@updateLang');
    Route::post('/validate/cv/langs/{id}/delete', 'CVAjaxController@deleteLang');

    Route::post('/validate/cv/refs/store', 'CVAjaxController@storeRef');
    Route::post('/validate/cv/refs/{id}/update', 'CVAjaxController@updateRef');
    Route::post('/validate/cv/refs/{id}/delete', 'CVAjaxController@deleteRef');

    Route::post('/validate/cv/color/chosen', 'CVAjaxController@colorChosen');
});

<div class="contentcard-accordion-faq">
    <button class="contentcard-accordion">
        <div>
            <i class="fas fa-globe"></i> {{__('translations.contentcv.lang_title')}}
        </div>
        <i class="fas fa-sort-down"></i></button>
    <div class="contentcard-panel">
        <div id="langs-form" class="contentcv-form">

            <span id="langs__form-error" class="json-invalid-feedback invalid-feedback" role="alert">
                <strong></strong>
            </span>

            @include('contentCvForms.listsCvContent.listslangs')

            <a href="javascript:void(0);" id="form-langs__display" class="contentcard-button__add">
                <i class="fas fa-plus"></i> 
                {{__('translations.contentcv.button_lang')}}
            </a>
            <div id="form-langs__todisplay" class="form-contentcv">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                        <label for="contentcv_lang_name">{{__('translations.contentcv.label_lang_name')}}</label>
    
                        <input type="text" id="contentcv_lang_name" class="form-control @error('contentcv_lang_name') is-invalid @enderror" ref="contentcv_lang_name" name="contentcv_lang_name" placeholder="{{__('translations.contentcv.placeholder_lang_name')}}" required>
                        
                            @error('contentcv_lang_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">

                            <label for="contentcv_lang_level">{{__('translations.contentcv.label_lang_level')}}</label>
    
                            <select name="contentcv_lang_level" id="contentcv_lang_level" class="form-control @error('contentcv_lang_level') is-invalid @enderror" name="contentcv_lang_level" required>
                                <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                <option value="100">{{__('translations.contentcv.maternal_lang')}}</option>
                                <option value="75">{{__('translations.contentcv.current_lang')}}</option>
                                <option value="50">{{__('translations.contentcv.ok_lang')}}</option>
                                <option value="25">{{__('translations.contentcv.middle_lang')}}</option>
                                <option value="15">{{__('translations.contentcv.elementary_lang')}}</option>
                            </select>
                        
                            @error('contentcv_lang_level')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-right">
                        <a href="javascript:void(0);" id="form-lang__outdisplay" class="form-contentcv__outdisplay">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-langs__validate" class="btn btn-contentcv-validate">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
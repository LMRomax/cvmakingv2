<div class="contentcard-accordion-faq">
    <button class="contentcard-accordion">
        <div>
            <i class="fas fa-palette"></i> {{__('translations.contentcv.hobbies_title')}}
        </div>
        <i class="fas fa-sort-down"></i>
    </button>
    <div class="contentcard-panel">
        <div id="hobbies-form" class="contentcv-form">

            <span id="hobbies__form-error" class="json-invalid-feedback invalid-feedback" role="alert">
                <strong></strong>
            </span>

            @include('contentCvForms.listsCvContent.listshobbies')

            <a href="javascript:void(0);" id="form-hobbies__display" class="contentcard-button__add">
                <i class="fas fa-plus"></i> 
                {{__('translations.contentcv.button_hobbies')}}
            </a>
            <div id="form-hobbies__todisplay" class="form-contentcv">
                <div class="col">
                    <div class="form-group">

                        <label for="contentcv_hobbies_hobby">{{__('translations.contentcv.label_hobbies_hobby')}}</label>

                        <input type="text" id="contentcv_hobbies_hobby" class="form-control @error('contentcv_hobbies_hobby') is-invalid @enderror" ref="contentcv_hobbies_hobby" name="contentcv_hobbies_hobby" placeholder="{{__('translations.contentcv.placeholder_hobbies_hobby')}}" required>
                    
                        @error('contentcv_hobbies_hobby')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-right">
                        <a href="javascript:void(0);" id="form-hobbies__outdisplay" class="form-contentcv__outdisplay">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-hobbies__validate" class="btn btn-contentcv-validate">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
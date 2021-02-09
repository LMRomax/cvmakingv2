<div class="contentcard-accordion-faq">
    <button class="contentcard-accordion">
        <div>
            <i class="fas fa-comment-dots"></i> {{__('translations.contentcv.ref_title')}}
        </div>
        <i class="fas fa-sort-down"></i></button>
    <div class="contentcard-panel">
        <div id="refs-form" class="contentcv-form">

            <span id="refs__form-error" class="json-invalid-feedback invalid-feedback" role="alert">
                <strong></strong>
            </span>

            @include('contentCvForms.listsCvContent.listsrefs')

            <a href="javascript:void(0);" id="form-refs__display" class="contentcard-button__add">
                <i class="fas fa-plus"></i> 
                {{__('translations.contentcv.button_ref')}}
            </a>
            <div id="form-refs__todisplay" class="form-contentcv">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                            <label for="contentcv_ref_name">{{__('translations.contentcv.label_ref_name')}}</label>
    
                            <input type="text" id="contentcv_ref_name" class="form-control @error('contentcv_ref_name') is-invalid @enderror" ref="contentcv_ref_name" name="contentcv_ref_name" required>
                        
                            @error('contentcv_ref_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">

                            <label for="contentcv_ref_contact">{{__('translations.contentcv.label_ref_contact')}}</label>
    
                            <input type="text" id="contentcv_ref_contact" class="form-control @error('contentcv_ref_contact') is-invalid @enderror" ref="contentcv_ref_contact" name="contentcv_ref_contact" required>
                        
                            @error('contentcv_ref_contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-right">
                        <a href="javascript:void(0);" id="form-refs__outdisplay" class="form-contentcv__outdisplay">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-refs__validate" class="btn btn-contentcv-validate">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
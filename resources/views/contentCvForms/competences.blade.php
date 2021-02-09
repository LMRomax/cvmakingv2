<div class="contentcard-accordion-faq">
    <button class="contentcard-accordion">
        <div>
            <i class="fas fa-mouse-pointer"></i> {{__('translations.contentcv.comp_title')}}
        </div>
        <i class="fas fa-sort-down"></i></button>
    <div class="contentcard-panel">
        <div id="comp-form" class="contentcv-form">

            <span id="comp__form-error" class="json-invalid-feedback invalid-feedback" role="alert">
                <strong></strong>
            </span>

            @include('contentCvForms.listsCvContent.listscomp')

            <a href="javascript:void(0);" id="form-comp__display" class="contentcard-button__add">
                <i class="fas fa-plus"></i> 
                {{__('translations.contentcv.button_comp')}}
            </a>

            <div id="form-comp__todisplay" class="form-contentcv">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                        <label for="contentcv_comp_name">{{__('translations.contentcv.label_comp_name')}}</label>
    
                        <input type="text" id="contentcv_comp_name" class="form-control @error('contentcv_comp_name') is-invalid @enderror" ref="contentcv_comp_name" name="contentcv_comp_name" placeholder="{{__('translations.contentcv.placeholder_comp_name')}}" required>
                        
                            @error('contentcv_comp_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">

                            <label for="contentcv_comp_level">{{__('translations.contentcv.label_comp_level')}}</label>
    
                            <select name="contentcv_comp_level" id="contentcv_comp_level" class="form-control @error('contentcv_comp_level') is-invalid @enderror" name="contentcv_comp_level" required>
                                <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                <option value="100">{{__('translations.contentcv.very_good')}}</option>
                                <option value="75">{{__('translations.contentcv.good')}}</option>
                                <option value="50">{{__('translations.contentcv.middle')}}</option>
                                <option value="25">{{__('translations.contentcv.elementary')}}</option>
                            </select>
                        
                            @error('contentcv_educ_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-right">
                        <a href="javascript:void(0);" id="form-comp__outdisplay" class="form-contentcv__outdisplay">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-comp__validate" class="btn btn-contentcv-validate">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
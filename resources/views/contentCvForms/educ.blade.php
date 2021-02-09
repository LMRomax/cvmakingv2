<div class="contentcard-accordion-faq">
    <button class="contentcard-accordion">
        <div>
            <i class="fas fa-graduation-cap"></i> {{__('translations.contentcv.educ_title')}}
        </div>
        <i class="fas fa-sort-down"></i>
    </button>
    <div class="contentcard-panel">
        <div id="educ-form" class="contentcv-form">

            <span id="educ__form-error" class="json-invalid-feedback invalid-feedback" role="alert">
                <strong></strong>
            </span>

            @include('contentCvForms.listsCvContent.listseduc')

            <a href="javascript:void(0);" id="form-educ__display" class="contentcard-button__add">
                <i class="fas fa-plus"></i> {{__('translations.contentcv.button_formation')}}
            </a>

            <div id="form-educ__todisplay" class="form-contentcv">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                        <label for="contentcv_educ_formation">{{__('translations.contentcv.label_educ_formation')}}</label>
    
                        <input type="text" id="contentcv_educ_formation" class="form-control @error('contentcv_educ_formation') is-invalid @enderror" ref="contentcv_educ_formation" name="contentcv_educ_formation" placeholder="{{__('translations.contentcv.placeholder_educ_formation')}}" required>
                        
                            @error('contentcv_educ_formation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">

                            <label for="contentcv_educ_city">{{__('translations.contentcv.label_educ_city')}}</label>
    
                            <input type="text" id="contentcv_educ_city" class="form-control @error('contentcv_educ_city') is-invalid @enderror" ref="contentcv_educ_city" name="contentcv_educ_city" placeholder="{{__('translations.contentcv.placeholder_educ_city')}}" required>
                        
                            @error('contentcv_educ_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">

                        <label for="contentcv_educ_institution">{{__('translations.contentcv.label_educ_institution')}}</label>

                        <input type="text" id="contentcv_educ_institution" class="form-control @error('contentcv_educ_institution') is-invalid @enderror" ref="contentcv_educ_institution" name="contentcv_educ_institution" placeholder="{{__('translations.contentcv.placeholder_educ_institution')}}" required>
                    
                        @error('contentcv_educ_institution')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">

                        <label for="contentcv_educ_since">{{__('translations.contentcv.label_educ_start')}}</label>

                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-12 col-md-7 select_date__adjustpadding">
                                <div class="form-group">
                                    <select name="educ_start_month" id="educ_start_month" class="form-control @error('educ_start_month') is-invalid @enderror">
                                        <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                        <option value="01">{{__('translations.contentcv.jan')}}</option>
                                        <option value="02">{{__('translations.contentcv.feb')}}</option>
                                        <option value="03">{{__('translations.contentcv.mar')}}</option>
                                        <option value="04">{{__('translations.contentcv.avr')}}</option>
                                        <option value="05">{{__('translations.contentcv.mai')}}</option>
                                        <option value="06">{{__('translations.contentcv.juin')}}</option>
                                        <option value="07">{{__('translations.contentcv.jui')}}</option>
                                        <option value="08">{{__('translations.contentcv.aout')}}</option>
                                        <option value="09">{{__('translations.contentcv.sept')}}</option>
                                        <option value="10">{{__('translations.contentcv.oct')}}</option>
                                        <option value="11">{{__('translations.contentcv.nov')}}</option>
                                        <option value="12">{{__('translations.contentcv.dec')}}</option>
                                    </select>
                                </div>
                                @error('educ_start_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-xl-5 col-lg-12 col-md-5 select_date__adjustpadding">
                                <div class="form-group">
                                    <select name="educ_start_year" id="educ_start_year" class="form-control @error('educ_start_year') is-invalid @enderror">
                                        @for($i = date('Y'); $i >= date('Y') - 30; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                @error('educ_start_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        
                    </div>

                    <div class="col-md-6 col-12">
                        <label for="contentcv_educ_until">{{__('translations.contentcv.label_educ_end')}}</label>

                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-12 col-md-7 select_date__adjustpadding">
                                <div class="form-group">
                                    <select name="educ_end_month" id="educ_end_month" class="form-control @error('educ_end_month') is-invalid @enderror">
                                        <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                        <option value="01">{{__('translations.contentcv.jan')}}</option>
                                        <option value="02">{{__('translations.contentcv.feb')}}</option>
                                        <option value="03">{{__('translations.contentcv.mar')}}</option>
                                        <option value="04">{{__('translations.contentcv.avr')}}</option>
                                        <option value="05">{{__('translations.contentcv.mai')}}</option>
                                        <option value="06">{{__('translations.contentcv.juin')}}</option>
                                        <option value="07">{{__('translations.contentcv.jui')}}</option>
                                        <option value="08">{{__('translations.contentcv.aout')}}</option>
                                        <option value="09">{{__('translations.contentcv.sept')}}</option>
                                        <option value="10">{{__('translations.contentcv.oct')}}</option>
                                        <option value="11">{{__('translations.contentcv.nov')}}</option>
                                        <option value="12">{{__('translations.contentcv.dec')}}</option>
                                    </select>
                                </div>
                                @error('xp_end_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-xl-5 col-lg-12 col-md-5 select_date__adjustpadding">
                                <div class="form-group">
                                    <select name="educ_end_year" id="educ_end_year" class="form-control @error('educ_end_year') is-invalid @enderror">
                                        @for($i = date('Y'); $i >= date('Y') - 30; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                @error('educ_end_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">

                        <label for="contentcv_educ_description">{{__('translations.contentcv.label_educ_description')}}</label>

                        <textarea id="contentcv_educ_description" class="form-control @error('contentcv_educ_description') is-invalid @enderror" ref="contentcv_educ_description" name="contentcv_educ_description"></textarea>
                    
                        @error('contentcv_educ_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-right">
                        <a href="javascript:void(0);" id="form-educ__outdisplay" class="form-contentcv__outdisplay">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-educ__validate" class="btn btn-contentcv-validate">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="contentcard-accordion-faq">
    <button class="contentcard-accordion">
        <div>
            <i class="fas fa-suitcase"></i> {{__('translations.contentcv.xp_title')}}
        </div>
        <i class="fas fa-sort-down"></i>
    </button>
    <div class="contentcard-panel">
        <div id="xp-form" class="contentcv-form">

            <span id="xp__form-error" class="json-invalid-feedback invalid-feedback" role="alert">
                <strong></strong>
            </span>

            @include('contentCvForms.listsCvContent.listsxp')

            <a href="javascript:void(0);" id="form-xp__display" class="contentcard-button__add"><i class="fas fa-plus"></i> {{__('translations.contentcv.button_addxp')}}</a>
            <div id="form-xp__todisplay" class="form-contentcv">

                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                        <label for="contentcv_xp_poste">{{__('translations.contentcv.label_xp_poste')}}</label>
    
                        <input type="text" id="contentcv_xp_poste" class="form-control @error('contentcv_xp_poste') is-invalid @enderror" ref="contentcv_xp_poste" name="contentcv_xp_poste" placeholder="{{__('translations.contentcv.placeholder_xp_poste')}}" required>
                        
                            @error('contentcv_xp_poste')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">

                            <label for="contentcv_xp_city">{{__('translations.contentcv.label_xp_city')}}</label>
    
                            <input type="text" id="contentcv_xp_city" class="form-control @error('contentcv_xp_city') is-invalid @enderror" ref="contentcv_xp_city" name="contentcv_xp_city" placeholder="{{__('translations.contentcv.placeholder_xp_city')}}" required>
                        
                            @error('contentcv_xp_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">

                        <label for="contentcv_xp_employer">{{__('translations.contentcv.label_xp_employer')}}</label>

                        <input type="text" id="contentcv_xp_employer" class="form-control @error('contentcv_xp_employer') is-invalid @enderror" ref="contentcv_xp_employer" name="contentcv_xp_employer" placeholder="{{__('translations.contentcv.placeholder_xp_employer')}}" required>
                    
                        @error('contentcv_xp_employer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">

                        <label for="contentcv_xp_since">{{__('translations.contentcv.label_xp_start')}}</label>

                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-12 col-md-7 select_date__adjustpadding">
                                <div class="form-group">
                                    <select name="xp_start_month" id="xp_start_month" class="form-control @error('xp_start_month') is-invalid @enderror">
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
                                @error('xp_start_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-xl-5 col-lg-12 col-md-5 select_date__adjustpadding">
                                <div class="form-group">
                                    <select name="xp_start_year" id="xp_start_year" class="form-control @error('xp_start_year') is-invalid @enderror">
                                        @for($i = date('Y'); $i >= date('Y') - 30; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                @error('xp_start_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        
                    </div>

                    <div class="col-md-6 col-12">
                        <label for="contentcv_xp_until">{{__('translations.contentcv.label_xp_end')}}</label>

                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-12 col-md-7 select_date__adjustpadding">
                                <div class="form-group">
                                    <select name="xp_end_month" id="xp_start_month" class="form-control @error('xp_end_month') is-invalid @enderror">
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
                                    <select name="xp_end_year" id="xp_end_year" class="form-control @error('xp_end_year') is-invalid @enderror">
                                        @for($i = date('Y'); $i >= date('Y') - 30; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                @error('xp_end_year')
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

                        <label for="contentcv_xp_description">{{__('translations.contentcv.label_xp_description')}}</label>

                        <textarea type="text" id="contentcv_xp_description" class="form-control @error('contentcv_xp_description') is-invalid @enderror" ref="contentcv_xp_description" name="contentcv_xp_description" required></textarea>
                    
                        @error('contentcv_xp_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-right">
                        <a href="javascript:void(0);" id="form-xp__outdisplay" class="form-contentcv__outdisplay">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-xp__validate" class="btn btn-contentcv-validate">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
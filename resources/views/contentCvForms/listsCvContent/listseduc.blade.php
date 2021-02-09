<div id="educs-lists" class="xps-cards-create">
    @if($cv_educs != null)
        @foreach($cv_educs as $index => $cv_educ)
            <div id="educ{{ $index }}" class="xps-card-inner">
                <div class="xps-title-date">
                    <div>
                        {{ $cv_educ->contentcv_educ_formation }}
                    </div>
                    <small>
                        {{__('translations.contentcv.xpcard_fromdate')}}
                        @if($cv_educ->educ_start_month == "01")
                            {{__('translations.contentcv.jan')}}
                        @elseif($cv_educ->educ_start_month == "02")
                            {{__('translations.contentcv.feb')}}
                        @elseif($cv_educ->educ_start_month == "03")
                            {{__('translations.contentcv.mar')}}
                        @elseif($cv_educ->educ_start_month == "04")
                            {{__('translations.contentcv.avr')}}
                        @elseif($cv_educ->educ_start_month == "05")
                            {{__('translations.contentcv.mai')}}
                        @elseif($cv_educ->educ_start_month == "06")
                            {{__('translations.contentcv.juin')}}
                        @elseif($cv_educ->educ_start_month == "07")
                            {{__('translations.contentcv.jui')}}
                        @elseif($cv_educ->educ_start_month == "08")
                            {{__('translations.contentcv.aout')}}
                        @elseif($cv_educ->educ_start_month == "09")
                            {{__('translations.contentcv.sept')}}
                        @elseif($cv_educ->educ_start_month == "10")
                            {{__('translations.contentcv.oct')}}
                        @elseif($cv_educ->educ_start_month == "11")
                            {{__('translations.contentcv.nov')}}
                        @elseif($cv_educ->educ_start_month == "12")
                            {{__('translations.contentcv.dec')}}
                        @endif
                        {{ $cv_educ->educ_start_year }}
                        {{__('translations.contentcv.xpcard_todate')}}
                        @if($cv_educ->educ_end_month == "01")
                        {{__('translations.contentcv.jan')}}
                        @elseif($cv_educ->educ_end_month == "02")
                            {{__('translations.contentcv.feb')}}
                        @elseif($cv_educ->educ_end_month == "03")
                            {{__('translations.contentcv.mar')}}
                        @elseif($cv_educ->educ_end_month == "04")
                            {{__('translations.contentcv.avr')}}
                        @elseif($cv_educ->educ_end_month == "05")
                            {{__('translations.contentcv.mai')}}
                        @elseif($cv_educ->educ_end_month == "06")
                            {{__('translations.contentcv.juin')}}
                        @elseif($cv_educ->educ_end_month == "07")
                            {{__('translations.contentcv.jui')}}
                        @elseif($cv_educ->educ_end_month == "08")
                            {{__('translations.contentcv.aout')}}
                        @elseif($cv_educ->educ_end_month == "09")
                            {{__('translations.contentcv.sept')}}
                        @elseif($cv_educ->educ_end_month == "10")
                            {{__('translations.contentcv.oct')}}
                        @elseif($cv_educ->educ_end_month == "11")
                            {{__('translations.contentcv.nov')}}
                        @elseif($cv_educ->educ_end_month == "12")
                            {{__('translations.contentcv.dec')}}
                        @endif
                        {{ $cv_educ->educ_end_year }}
                    </small>
                </div>
                <div class="buttons-tools">
                    <button id="form-educ__update" data-educedit="{{ $index }}"><i class="fas fa-edit"></i></button>
                    <button id="form-educ__delete" data-educdelete="{{ $index }}"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div id="form-educ__toedit{{ $index }}" class="form-contentcv__toedit" data-educedit-form ="{{ $index }}">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                        <label for="contentcv_educ_formation">{{__('translations.contentcv.label_educ_formation')}}</label>
    
                        <input type="text" id="contentcv_educ_formation{{ $index }}" class="form-control @error('contentcv_educ_formation') is-invalid @enderror" 
                        ref="contentcv_educ_formation" name="contentcv_educ_formation" value="{{ $cv_educ->contentcv_educ_formation }}" 
                        required>
                        
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
    
                            <input type="text" id="contentcv_educ_city{{ $index }}" class="form-control @error('contentcv_educ_city') is-invalid @enderror" 
                            ref="contentcv_educ_city" name="contentcv_educ_city" 
                            value="{{ $cv_educ->contentcv_educ_city }}" 
                            placeholder="{{__('translations.contentcv.placeholder_educ_city')}}" required>
                        
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

                        <input type="text" id="contentcv_educ_institution{{ $index }}" 
                        class="form-control @error('contentcv_educ_institution') is-invalid @enderror" ref="contentcv_educ_institution" 
                        name="contentcv_educ_institution" value="{{ $cv_educ->contentcv_educ_institution }}" 
                        placeholder="{{__('translations.contentcv.placeholder_educ_institution')}}" required>
                    
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
                                    <select name="educ_start_month" id="educ_start_month{{ $index }}" class="form-control @error('educ_start_month') is-invalid @enderror">
                                        <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                        <option value="01" @if($cv_educ->educ_start_month == "01") selected @endif>
                                            {{__('translations.contentcv.jan')}}
                                        </option>
                                        <option value="02" @if($cv_educ->educ_start_month == "02") selected @endif>
                                            {{__('translations.contentcv.feb')}}
                                        </option>
                                        <option value="03" @if($cv_educ->educ_start_month == "03") selected @endif>
                                            {{__('translations.contentcv.mar')}}
                                        </option>
                                        <option value="04" @if($cv_educ->educ_start_month == "04") selected @endif>
                                            {{__('translations.contentcv.avr')}}
                                        </option>
                                        <option value="05" @if($cv_educ->educ_start_month == "05") selected @endif>
                                            {{__('translations.contentcv.mai')}}
                                        </option>
                                        <option value="06" @if($cv_educ->educ_start_month == "06") selected @endif>
                                            {{__('translations.contentcv.juin')}}
                                        </option>
                                        <option value="07" @if($cv_educ->educ_start_month == "07") selected @endif>
                                            {{__('translations.contentcv.jui')}}
                                        </option>
                                        <option value="08" @if($cv_educ->educ_start_month == "08") selected @endif>
                                            {{__('translations.contentcv.aout')}}
                                        </option>
                                        <option value="09" @if($cv_educ->educ_start_month == "09") selected @endif>
                                            {{__('translations.contentcv.sept')}}
                                        </option>
                                        <option value="10" @if($cv_educ->educ_start_month == "10") selected @endif>
                                            {{__('translations.contentcv.oct')}}
                                        </option>
                                        <option value="11" @if($cv_educ->educ_start_month == "11") selected @endif>
                                            {{__('translations.contentcv.nov')}}
                                        </option>
                                        <option value="12" @if($cv_educ->educ_start_month == "12") selected @endif>
                                            {{__('translations.contentcv.dec')}}
                                        </option>
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
                                    <select name="educ_start_year" id="educ_start_year{{ $index }}" class="form-control @error('educ_start_year') is-invalid @enderror">
                                        @for($i = date('Y'); $i >= date('Y') - 30; $i--)
                                            <option value="{{ $i }}" @if($cv_educ->educ_start_year == $i) selected @endif>
                                                {{ $i }}
                                            </option>
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
                                    <select name="educ_end_month" id="educ_end_month{{ $index }}" class="form-control @error('educ_end_month') is-invalid @enderror">
                                        <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                        <option value="01" @if($cv_educ->educ_end_month == "01") selected @endif>
                                            {{__('translations.contentcv.jan')}}
                                        </option>
                                        <option value="02" @if($cv_educ->educ_end_month == "02") selected @endif>
                                            {{__('translations.contentcv.feb')}}
                                        </option>
                                        <option value="03" @if($cv_educ->educ_end_month == "03") selected @endif>
                                            {{__('translations.contentcv.mar')}}
                                        </option>
                                        <option value="04" @if($cv_educ->educ_end_month == "04") selected @endif>
                                            {{__('translations.contentcv.avr')}}
                                        </option>
                                        <option value="05" @if($cv_educ->educ_end_month == "05") selected @endif>
                                            {{__('translations.contentcv.mai')}}
                                        </option>
                                        <option value="06" @if($cv_educ->educ_end_month == "06") selected @endif>
                                            {{__('translations.contentcv.juin')}}
                                        </option>
                                        <option value="07" @if($cv_educ->educ_end_month == "07") selected @endif>
                                            {{__('translations.contentcv.jui')}}
                                        </option>
                                        <option value="08" @if($cv_educ->educ_end_month == "08") selected @endif>
                                            {{__('translations.contentcv.aout')}}
                                        </option>
                                        <option value="09" @if($cv_educ->educ_end_month == "09") selected @endif>
                                            {{__('translations.contentcv.sept')}}
                                        </option>
                                        <option value="10" @if($cv_educ->educ_end_month == "10") selected @endif>
                                            {{__('translations.contentcv.oct')}}
                                        </option>
                                        <option value="11" @if($cv_educ->educ_end_month == "11") selected @endif>
                                            {{__('translations.contentcv.nov')}}
                                        </option>
                                        <option value="12" @if($cv_educ->educ_end_month == "12") selected @endif>
                                            {{__('translations.contentcv.dec')}}
                                        </option>
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
                                    <select name="educ_end_year" id="educ_end_year{{ $index }}" class="form-control @error('educ_end_year') is-invalid @enderror">
                                        @for($i = date('Y'); $i >= date('Y') - 30; $i--)
                                            <option value="{{ $i }}" @if($cv_educ->educ_end_year == $i) selected @endif>
                                                {{ $i }}
                                            </option>
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

                        <textarea class="form-control @error('contentcv_educ_description') is-invalid @enderror contentcv_educedit_description" 
                        ref="contentcv_educ_description" name="contentcv_educ_description">{{ $cv_educ->contentcv_educ_description }}</textarea>
                    
                        @error('contentcv_educ_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-right">
                        <a href="javascript:void(0);" id="form-educedit__outdisplay" class="form-contentcv__outdisplay" data-close-educedit="{{ $index }}">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-educedit__validate" class="btn btn-contentcv-validate" data-submit-educedit="{{ $index }}">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
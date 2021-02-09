<div id="xps-lists" class="xps-cards-create">
    @if($cv_xps != null)
        @foreach($cv_xps as $index => $cv_xp)
            <div id="xp{{ $index }}" class="xps-card-inner">
                <div class="xps-title-date">
                    <div>
                        {{ $cv_xp->contentcv_xp_poste }}
                    </div>
                    <small>
                        {{__('translations.contentcv.xpcard_fromdate')}}
                        @if($cv_xp->xp_start_month == "01")
                            {{__('translations.contentcv.jan')}}
                        @elseif($cv_xp->xp_start_month == "02")
                            {{__('translations.contentcv.feb')}}
                        @elseif($cv_xp->xp_start_month == "03")
                            {{__('translations.contentcv.mar')}}
                        @elseif($cv_xp->xp_start_month == "04")
                            {{__('translations.contentcv.avr')}}
                        @elseif($cv_xp->xp_start_month == "05")
                            {{__('translations.contentcv.mai')}}
                        @elseif($cv_xp->xp_start_month == "06")
                            {{__('translations.contentcv.juin')}}
                        @elseif($cv_xp->xp_start_month == "07")
                            {{__('translations.contentcv.jui')}}
                        @elseif($cv_xp->xp_start_month == "08")
                            {{__('translations.contentcv.aout')}}
                        @elseif($cv_xp->xp_start_month == "09")
                            {{__('translations.contentcv.sept')}}
                        @elseif($cv_xp->xp_start_month == "10")
                            {{__('translations.contentcv.oct')}}
                        @elseif($cv_xp->xp_start_month == "11")
                            {{__('translations.contentcv.nov')}}
                        @elseif($cv_xp->xp_start_month == "12")
                            {{__('translations.contentcv.dec')}}
                        @endif
                        {{ $cv_xp->xp_start_year }}
                        {{__('translations.contentcv.xpcard_todate')}}
                        @if($cv_xp->xp_end_month == "01")
                        {{__('translations.contentcv.jan')}}
                        @elseif($cv_xp->xp_end_month == "02")
                            {{__('translations.contentcv.feb')}}
                        @elseif($cv_xp->xp_end_month == "03")
                            {{__('translations.contentcv.mar')}}
                        @elseif($cv_xp->xp_end_month == "04")
                            {{__('translations.contentcv.avr')}}
                        @elseif($cv_xp->xp_end_month == "05")
                            {{__('translations.contentcv.mai')}}
                        @elseif($cv_xp->xp_end_month == "06")
                            {{__('translations.contentcv.juin')}}
                        @elseif($cv_xp->xp_end_month == "07")
                            {{__('translations.contentcv.jui')}}
                        @elseif($cv_xp->xp_end_month == "08")
                            {{__('translations.contentcv.aout')}}
                        @elseif($cv_xp->xp_end_month == "09")
                            {{__('translations.contentcv.sept')}}
                        @elseif($cv_xp->xp_end_month == "10")
                            {{__('translations.contentcv.oct')}}
                        @elseif($cv_xp->xp_end_month == "11")
                            {{__('translations.contentcv.nov')}}
                        @elseif($cv_xp->xp_end_month == "12")
                            {{__('translations.contentcv.dec')}}
                        @endif
                        {{ $cv_xp->xp_end_year }}
                    </small>
                </div>
                <div class="buttons-tools">
                    <button id="form-xp__update" data-xpedit="{{ $index }}"><i class="fas fa-edit"></i></button>
                    <button id="form-xp__delete" data-xpdelete="{{ $index }}"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div id="form-xp__toedit{{ $index }}" class="form-contentcv__toedit" data-xpedit-form ="{{ $index }}">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                        <label for="contentcv_xp_poste">{{__('translations.contentcv.label_xp_poste')}}</label>
    
                        <input type="text" id="contentcv_xp_poste{{ $index }}" class="form-control @error('contentcv_xp_poste') is-invalid @enderror" ref="contentcv_xp_poste" 
                        name="contentcv_xp_poste" value="{{ $cv_xp->contentcv_xp_poste }}" required>
                        
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
    
                            <input type="text" id="contentcv_xp_city{{ $index }}" class="form-control @error('contentcv_xp_city') is-invalid @enderror" 
                            ref="contentcv_xp_city" name="contentcv_xp_city" 
                            value="{{ $cv_xp->contentcv_xp_city }}" required>
                        
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

                        <input type="text" id="contentcv_xp_employer{{ $index }}" class="form-control @error('contentcv_xp_employer') is-invalid @enderror" 
                        ref="contentcv_xp_employer" name="contentcv_xp_employer" 
                        value="{{ $cv_xp->contentcv_xp_employer }}" required>
                    
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
                                    <select name="xp_start_month" id="xpedit_start_month{{ $index }}" class="form-control @error('xp_start_month') is-invalid @enderror">
                                        <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                        <option value="01" @if($cv_xp->xp_start_month == "01") selected @endif>
                                            {{__('translations.contentcv.jan')}}
                                        </option>
                                        <option value="02" @if($cv_xp->xp_start_month == "02") selected @endif>
                                            {{__('translations.contentcv.feb')}}
                                        </option>
                                        <option value="03" @if($cv_xp->xp_start_month == "03") selected @endif>
                                            {{__('translations.contentcv.mar')}}
                                        </option>
                                        <option value="04" @if($cv_xp->xp_start_month == "04") selected @endif>
                                            {{__('translations.contentcv.avr')}}
                                        </option>
                                        <option value="05" @if($cv_xp->xp_start_month == "05") selected @endif>
                                            {{__('translations.contentcv.mai')}}
                                        </option>
                                        <option value="06" @if($cv_xp->xp_start_month == "06") selected @endif>
                                            {{__('translations.contentcv.juin')}}
                                        </option>
                                        <option value="07" @if($cv_xp->xp_start_month == "07") selected @endif>
                                            {{__('translations.contentcv.jui')}}
                                        </option>
                                        <option value="08" @if($cv_xp->xp_start_month == "08") selected @endif>
                                            {{__('translations.contentcv.aout')}}
                                        </option>
                                        <option value="09" @if($cv_xp->xp_start_month == "09") selected @endif>
                                            {{__('translations.contentcv.sept')}}
                                        </option>
                                        <option value="10" @if($cv_xp->xp_start_month == "10") selected @endif>
                                            {{__('translations.contentcv.oct')}}
                                        </option>
                                        <option value="11" @if($cv_xp->xp_start_month == "11") selected @endif>
                                            {{__('translations.contentcv.nov')}}
                                        </option>
                                        <option value="12" @if($cv_xp->xp_start_month == "12") selected @endif>
                                            {{__('translations.contentcv.dec')}}
                                        </option>
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
                                    <select name="xp_start_year" id="xpedit_start_year{{ $index }}" class="form-control @error('xp_start_year') is-invalid @enderror">
                                        @for($i = date('Y'); $i >= date('Y') - 30; $i--)
                                            <option value="{{ $i }}" @if($cv_xp->xp_start_year == $i) selected @endif>
                                                {{ $i }}
                                            </option>
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
                                    <select name="xp_end_month" id="xpedit_end_month{{ $index }}" class="form-control @error('xp_end_month') is-invalid @enderror">
                                        <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                        <option value="01" @if($cv_xp->xp_end_month == "01") selected @endif>
                                            {{__('translations.contentcv.jan')}}
                                        </option>
                                        <option value="02" @if($cv_xp->xp_end_month == "02") selected @endif>
                                            {{__('translations.contentcv.feb')}}
                                        </option>
                                        <option value="03" @if($cv_xp->xp_end_month == "03") selected @endif>
                                            {{__('translations.contentcv.mar')}}
                                        </option>
                                        <option value="04" @if($cv_xp->xp_end_month == "04") selected @endif>
                                            {{__('translations.contentcv.avr')}}
                                        </option>
                                        <option value="05" @if($cv_xp->xp_end_month == "05") selected @endif>
                                            {{__('translations.contentcv.mai')}}
                                        </option>
                                        <option value="06" @if($cv_xp->xp_end_month == "06") selected @endif>
                                            {{__('translations.contentcv.juin')}}
                                        </option>
                                        <option value="07" @if($cv_xp->xp_end_month == "07") selected @endif>
                                            {{__('translations.contentcv.jui')}}
                                        </option>
                                        <option value="08" @if($cv_xp->xp_end_month == "08") selected @endif>
                                            {{__('translations.contentcv.aout')}}
                                        </option>
                                        <option value="09" @if($cv_xp->xp_end_month == "09") selected @endif>
                                            {{__('translations.contentcv.sept')}}
                                        </option>
                                        <option value="10" @if($cv_xp->xp_end_month == "10") selected @endif>
                                            {{__('translations.contentcv.oct')}}
                                        </option>
                                        <option value="11" @if($cv_xp->xp_end_month == "11") selected @endif>
                                            {{__('translations.contentcv.nov')}}
                                        </option>
                                        <option value="12" @if($cv_xp->xp_end_month == "12") selected @endif>
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
                                    <select name="xp_end_year" id="xpedit_end_year{{ $index }}" class="form-control @error('xp_end_year') is-invalid @enderror">
                                        @for($i = date('Y'); $i >= date('Y') - 30; $i--)
                                            <option value="{{ $i }}" @if($cv_xp->xp_start_year == $i) selected @endif>
                                                {{ $i }}
                                            </option>
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

                        <textarea type="text" id="contentcv_xp_description{{ $index }}" class="contentcv_xpedit_description form-control @error('contentcv_xp_description') is-invalid @enderror contentcv_xp_description" ref="contentcv_xp_description" name="contentcv_xp_description" required>
                            @if($cv_xp->contentcv_xp_description)
                                {{ $cv_xp->contentcv_xp_description }}   
                            @endif
                        </textarea>
                    
                        @error('contentcv_xp_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-right">
                        <a href="javascript:void(0);" id="form-xpedit__outdisplay" class="form-contentcv__outdisplay" data-close-xpedit="{{ $index }}">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-xpedit__validate" class="btn btn-contentcv-validate" data-submit-editform="{{ $index }}">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
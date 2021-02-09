<div id="comps-lists" class="xps-cards-create">
    @if($cv_comps != null)
        @foreach($cv_comps as $index => $cv_comp)
            <div id="comp{{ $index }}" class="xps-card-inner">
                <div class="xps-title-date">
                    <div>
                        {{ $cv_comp->contentcv_comp_name }}
                    </div>
                    <small class="small-dark">
                        @if($cv_comp->contentcv_comp_level == 25)
                            {{__('translations.contentcv.elementary')}}
                        @elseif($cv_comp->contentcv_comp_level == 50)
                            {{__('translations.contentcv.middle')}}
                        @elseif($cv_comp->contentcv_comp_level == 75)
                            {{__('translations.contentcv.good')}}
                        @elseif($cv_comp->contentcv_comp_level == 100)
                            {{__('translations.contentcv.very_good')}}
                        @endif
                    </small>
                </div>
                <div class="buttons-tools">
                    <button id="form-comp__update" data-compedit="{{ $index }}"><i class="fas fa-edit"></i></button>
                    <button id="form-comp__delete" data-compdelete="{{ $index }}"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div id="form-comp__toedit{{ $index }}" class="form-contentcv__toedit" data-compedit-form ="{{ $index }}">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                        <label for="contentcv_comp_name">{{__('translations.contentcv.label_comp_name')}}</label>
    
                        <input type="text" id="contentcv_comp_name{{ $index }}" 
                        class="form-control @error('contentcv_comp_name') is-invalid @enderror" ref="contentcv_comp_name" 
                        name="contentcv_comp_name" placeholder="{{__('translations.contentcv.placeholder_comp_name')}}" 
                        value="{{ $cv_comp->contentcv_comp_name }}" required>
                        
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
    
                            <select name="contentcv_comp_level" id="contentcv_comp_level{{ $index }}" class="form-control @error('contentcv_comp_level') is-invalid @enderror" name="contentcv_comp_level" required>
                                <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                <option value="100" @if($cv_comp->contentcv_comp_level == "100") selected @endif>
                                    {{__('translations.contentcv.very_good')}}
                                </option>
                                <option value="75" @if($cv_comp->contentcv_comp_level == "75") selected @endif>
                                    {{__('translations.contentcv.good')}}
                                </option>
                                <option value="50" @if($cv_comp->contentcv_comp_level == "50") selected @endif>
                                    {{__('translations.contentcv.middle')}}
                                </option>
                                <option value="25" @if($cv_comp->contentcv_comp_level == "25") selected @endif>
                                    {{__('translations.contentcv.elementary')}}
                                </option>
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
                        <a href="javascript:void(0);" id="form-comp__outdisplay" class="form-contentcv__outdisplay" data-close-compedit="{{ $index }}">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-compedit__validate" class="btn btn-contentcv-validate" data-submit-compedit="{{ $index }}">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
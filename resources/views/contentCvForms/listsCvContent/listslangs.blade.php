<div id="langs-lists" class="xps-cards-create">
    @if($cv_langs != null)
        @foreach($cv_langs as $index => $cv_lang)
            <div id="lang{{ $index }}" class="xps-card-inner">
                <div class="xps-title-date">
                    <div>
                        {{ $cv_lang->contentcv_lang_name }}
                    </div>
                    <small class="small-dark">
                        @if($cv_lang->contentcv_lang_level == "100")
                            {{__('translations.contentcv.maternal_lang')}}
                        @elseif($cv_lang->contentcv_lang_level == "75")
                            {{__('translations.contentcv.current_lang')}}
                        @elseif($cv_lang->contentcv_lang_level == "50")
                            {{__('translations.contentcv.ok_lang')}}
                        @elseif($cv_lang->contentcv_lang_level == "25")
                            {{__('translations.contentcv.middle_lang')}}
                        @elseif($cv_lang->contentcv_lang_level == "15")
                            {{__('translations.contentcv.elementary_lang')}}
                        @endif
                    </small>
                </div>
                <div class="buttons-tools">
                    <button id="form-lang__update" data-langedit="{{ $index }}"><i class="fas fa-edit"></i></button>
                    <button id="form-lang__delete" data-langdelete="{{ $index }}"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div id="form-lang__toedit{{ $index }}" class="form-contentcv__toedit" data-langedit-form ="{{ $index }}">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                        <label for="contentcv_lang_name">{{__('translations.contentcv.label_lang_name')}}</label>
    
                        <input type="text" id="contentcv_lang_name{{ $index }}" class="form-control @error('contentcv_lang_name') is-invalid @enderror" 
                        ref="contentcv_lang_name" name="contentcv_lang_name" placeholder="{{__('translations.contentcv.placeholder_lang_name')}}" 
                        value="{{ $cv_lang->contentcv_lang_name }}" required>
                        
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
    
                            <select name="contentcv_lang_level{{ $index }}" id="contentcv_lang_level" class="form-control @error('contentcv_lang_level') is-invalid @enderror" 
                            name="contentcv_lang_level" required>
                                <option>{{__('translations.contentcv.select_option_choose')}}</option>
                                <option value="100" @if($cv_lang->contentcv_lang_level == "100") selected @endif>
                                    {{__('translations.contentcv.maternal_lang')}}
                                </option>
                                <option value="75" @if($cv_lang->contentcv_lang_level == "75") selected @endif>
                                    {{__('translations.contentcv.current_lang')}}
                                </option>
                                <option value="50" @if($cv_lang->contentcv_lang_level == "50") selected @endif>
                                    {{__('translations.contentcv.ok_lang')}}
                                </option>
                                <option value="25" @if($cv_lang->contentcv_lang_level == "25") selected @endif>
                                    {{__('translations.contentcv.middle_lang')}}
                                </option>
                                <option value="15" @if($cv_lang->contentcv_lang_level == "15") selected @endif>
                                    {{__('translations.contentcv.elementary_lang')}}
                                </option>
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
                        <a href="javascript:void(0);" id="form-langs__outdisplay" class="form-contentcv__outdisplay" data-close-langedit="{{ $index }}">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-langedit__validate" class="btn btn-contentcv-validate" data-submit-langedit="{{ $index }}">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
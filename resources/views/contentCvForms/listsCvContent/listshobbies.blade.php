<div id="hobbies-lists" class="xps-cards-create">
    @if($cv_hobbies != null)
        @foreach($cv_hobbies as $index => $cv_hobbie)
            <div id="hobbie{{ $index }}" class="xps-card-inner">
                <div class="xps-title-date">
                    <div>
                        {{ $cv_hobbie->contentcv_hobbies_hobby }}
                    </div>
                </div>
                <div class="buttons-tools">
                    <button id="form-hobbie__update" data-hobbieedit="{{ $index }}"><i class="fas fa-edit"></i></button>
                    <button id="form-hobbie__delete" data-hobbiedelete="{{ $index }}"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div id="form-hobbie__toedit{{ $index }}" class="form-contentcv__toedit" data-hobbieedit-form ="{{ $index }}">
                <div class="col">
                    <div class="form-group">

                        <label for="contentcv_hobbies_hobby">{{__('translations.contentcv.label_hobbies_hobby')}}</label>

                        <input type="text" id="contentcv_hobbies_hobby{{ $index }}" class="form-control @error('contentcv_hobbies_hobby') is-invalid @enderror" 
                        ref="contentcv_hobbies_hobby" name="contentcv_hobbies_hobby" placeholder="{{__('translations.contentcv.placeholder_hobbies_hobby')}}" 
                        value="{{ $cv_hobbie->contentcv_hobbies_hobby }}" required>
                    
                        @error('contentcv_hobbies_hobby')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="btn-right">
                        <a href="javascript:void(0);" id="form-hobbies__outdisplay" class="form-contentcv__outdisplay" data-close-hobbieedit="{{ $index }}">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-hobbieedit__validate" class="btn btn-contentcv-validate" data-submit-hobbieedit="{{ $index }}">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
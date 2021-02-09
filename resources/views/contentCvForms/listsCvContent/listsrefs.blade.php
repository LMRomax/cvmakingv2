<div id="refs-lists" class="xps-cards-create">
    @if($cv_refs != null)
        @foreach($cv_refs as $index => $cv_ref)
            <div id="ref{{ $index }}" class="xps-card-inner">
                <div class="xps-title-date">
                    <div>
                        {{ $cv_ref->contentcv_ref_name }}
                    </div>
                    <small class="small-dark">
                        {{ $cv_ref->contentcv_ref_contact }}
                    </small>
                </div>
                <div class="buttons-tools">
                    <button id="form-ref__update" data-refedit="{{ $index }}"><i class="fas fa-edit"></i></button>
                    <button id="form-ref__delete" data-refdelete="{{ $index }}"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div id="form-ref__toedit{{ $index }}" class="form-contentcv__toedit" data-refedit-form ="{{ $index }}">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
                        <div class="form-group">

                            <label for="contentcv_ref_name">{{__('translations.contentcv.label_ref_name')}}</label>
    
                            <input type="text" id="contentcv_ref_name{{ $index }}" class="form-control @error('contentcv_ref_name') is-invalid @enderror" 
                            ref="contentcv_ref_name" name="contentcv_ref_name" value="{{ $cv_ref->contentcv_ref_name }}" required>
                        
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
    
                            <input type="text" id="contentcv_ref_contact{{ $index }}" class="form-control @error('contentcv_ref_contact') is-invalid @enderror" 
                            ref="contentcv_ref_contact" name="contentcv_ref_contact" value="{{ $cv_ref->contentcv_ref_contact }}" required>
                        
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
                        <a href="javascript:void(0);" id="form-refs__outdisplay" class="form-contentcv__outdisplay" data-close-refedit="{{ $index }}">
                            <i class="fas fa-times"></i> {{__('translations.contentcv.button_cancel')}}
                        </a>
                        <button type="submit" id="form-refedit__validate" class="btn btn-contentcv-validate" data-submit-refedit="{{ $index }}">
                            <i class="fas fa-save"></i>
                            {{__('translations.contentcv.button_validate')}} 
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
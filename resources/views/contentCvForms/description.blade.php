<div class="contentcard-accordion-faq">
    <button class="contentcard-accordion">
        <div>
            <i class="fas fa-user-circle"></i> {{__('translations.contentcv.description_title')}}
        </div>
        <i class="fas fa-sort-down"></i>
    </button>
    <div class="contentcard-panel">
        <div id="description-form" class="description-form">

            <span id="description__form-error" class="json-invalid-feedback invalid-feedback" role="alert">
                <strong></strong>
            </span>

            <div class="form-group">

                <textarea id="description_cv" class="form-control" ref="description_cv" name="description_cv" rows="20">@if($cv->description) {{ $cv->description }} @endif</textarea>

                <span id="description_cv__error" class="invalid-feedback" role="alert">
                    <strong></strong>
                </span>
            </div>

            <div class="form-group">
                <div class="btn-right">
                    <button type="submit" id="form-description__validate" class="btn btn-contentcv-validate">
                        <i class="fas fa-save"></i>
                        {{__('translations.contentcv.button_validate')}} 
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
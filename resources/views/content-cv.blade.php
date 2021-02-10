@extends('layouts.app')

@section('Banniere')
@stop

@section('content')
    <div id="loading" class="container-fluid loader-container-fluid">
        <div id="loader" class="loader"></div>
    </div>

    <div id="is-load" class="is-load">
        <div class="makingcv-deco"></div>

        <div class="container making-cv-steps">
            <div class="row justify-content-center">
                <div class="making-cv-step in-step">
                    <a href="{{ route('making-cv') }}">
                        <div class="making-cv-step-bubble step-in">
                            1
                        </div>
                        <div class="making-cv-step-text">
                            Mes données
                        </div>
                    </a>
                </div>

                <div class="making-cv-step in-step">
                    <a href="{{ route('select-design') }}">
                        <div class="making-cv-step-bubble step-in">
                            2
                        </div>
                        <div class="making-cv-step-text">
                            Choix du modèle
                        </div>
                    </a>
                </div>

                <div class="making-cv-step">
                    <a>
                        <div class="making-cv-step-bubble step-in">
                            3
                        </div>
                        <div class="making-cv-step-text">
                            Contenu
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="container-fluid content-cv-container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="content-card">
                        <div class="contentcard-accordion-wrapper">

                            @include('contentCvForms.description')

                            @include('contentCvForms.xp')

                            @include('contentCvForms.educ')

                            @include('contentCvForms.competences')

                            @include('contentCvForms.hobbies')

                            @include('contentCvForms.lang')

                            @include('contentCvForms.ref')

                        </div>
                    </div>
                </div>

                <div class="cvpreview col-lg-5">
                    <div class="cvpreview-container">
                        <div class="cvpreview-inner">
                            <div class="cvpreview-btncolor">
                                <a
                                    href="{{ route('select-design') }}">{{ __('translations.makingcv.btn_choosedesign') }}</a>
                                <div class="color--choice">
                                    <div class="color--choice__text">
                                        {{ __('translations.makingcv.choose_color') }} :
                                    </div>

                                    <div class="colors">
                                        <a href="javascript:void(0)" class="color-btn" data-color="#424954"
                                            style="color: #424954; background-color: #424954;">_</a>

                                        <a href="javascript:void(0)" class="color-btn" data-color="#c0392b"
                                            style="color: #c0392b; background-color: #c0392b;">_</a>

                                        <a href="javascript:void(0)" class="color-btn" data-color="#2980b9"
                                            style="color: #2980b9; background-color: #2980b9;">_</a>

                                        <a href="javascript:void(0)" class="color-btn" data-color="#27ae60"
                                            style="color: #27ae60; background-color: #27ae60;">_</a>

                                        <a href="javascript:void(0)" class="color-btn" data-color="#f39c12"
                                            style="color: #f39c12; background-color: #f39c12;">_</a>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-wrapper">
                                <div class="iframe-isload" style="display: none;">
                                    <div id="iframe-loader" class="loader"></div>
                                </div>
                                <div class="preview--inner" data-toggle="modal" data-target="#cvModal"> 
                                    <iframe src="{{ route('pdf') }}" width="100%" class="template-preview__iframe"
                                        scrolling="no" id="previewCVIframe" data-toggle="modal" data-target="#cvModal">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group form-button">
                <div class="btn-center">
                    <a href="{{ route('payment') }}" class="btn btn-outformbox">
                        <div class="btn_download_left"><i class="fas fa-download"></i></div>
                        {{__('translations.makingcv.button_downloadcv') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal preview CV Big Format -->
    <div class="modal fade cvPreviewFullPage" id="cvModal" tabindex="-1" role="dialog" aria-labelledby="cvModalLabel"
        aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-dialog" role="document">
            <div class="preview-wrapper">
                <div class="preview--inner">
                    <iframe src="{{ route('pdf') }}" class="template-preview__iframe"
                        scrolling="no">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/accordionContentCv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/textareaAutoSize.js') }}"></script>
    <script>
        $(document).ready(function() {
            autosize(document.querySelectorAll('textarea'));
        });
    </script>
    <script type="text/javascript" src="{{ asset('js/contentCv.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/cvAjax.js') }}"></script>
@endsection

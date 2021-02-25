@extends('layouts.app')

@section('Banniere')
@stop

@section('content')
    <div id="loading" class="container-fluid loader-container-fluid">
        <div id="loader" class="loader"></div>
    </div>

    <div id="is-load" class="is-load">
        <div class="makingcv-deco"></div>

        <div class="payment-container__title">
            <h1>{{__('translations.payment.title')}}</h1>
            <p class="payment-container__title--intro">{{__('translations.payment.intro')}}</p>
        </div>

        <div class="container-fluid payment-container-fluid">
            <div class="previewcv--todownload">
                <div class="row">
                    <div class="col-md-6">
                        <div class="explain-download">
                            <h2>{{__('translations.payment.explain-download__title')}}</h2>
                            <p class="explain-download--intro">{{__('translations.payment.explain-download__previewpdf')}}</p>
                            <div class="preview-wrapper preview-wrapper--w-mb">
                                <div class="preview--inner" data-toggle="modal" data-target="#cvModal"> 
                                    <iframe src="{{ route('pdf') }}" width="100%" class="template-preview__iframe"
                                        scrolling="no" id="previewCVIframe" data-toggle="modal" data-target="#cvModal">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-card">
                            <div class="module-payment">
                                <div class="payment-card__title">
                                    <h2>{{__('translations.payment.stripe_title')}}</h2>
                                </div>
                                
                                <div class="payment--card-cb">
                                    <form action="{{ route('handle-payment') }}" id="payment-form" method="post" 
                                    enctype="multipart/form-data">
                                        @csrf
                                       <!-- Stripe Elements Placeholder -->
                                       <div id="card-element"></div>
    
                                       <div id="card-errors" role="alert"></div>
               
                                       <button type="button" id="card-button" class="button-payment">
                                           {{__('translations.payment.process')}}
                                       </button>
                                    </form>
                                </div>

                                <div class="warning-payment">
                                    {{__('translations.payment.warning-payment')}}
                                </div>
                            </div>
                            
                            <div class="error-cv__correct">
                                <p>{{__('translations.payment.explain-download__not-satisfy')}}</p>
                                <a href="{{ route('content-cv') }}" class="explain-download__button--correct">
                                    {{__('translations.payment.explain-download__not-satisfy-link')}}
                                </a>
                            </div>
                        </div>
                    </div>
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
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{ asset('js/paymentHandle.js') }}"></script>
@endsection

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
            <h1>{{__('translations.payment-done.title')}}</h1>
            <p class="payment-container__title--intro">{{__('translations.payment-done.intro')}}</p>
        </div>

        <div class="container-fluid payment-container-fluid">
            <div class="previewcv--todownload">
                <div class="row">
                    <div class="col-md-6">
                        <div class="explain-download">
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
                        <div class="download-card">
                            <div class="download__title">
                                <h2>{{__('translations.payment-done.download__title')}}</h2>
                            </div>
                            <p class="download--intro">{{__('translations.payment-done.download_subtitle')}}</p>
                            <a href="{{ route('download-pdf') }}" class="download__button--correct">
                                {{__('translations.payment-done.download-cv')}}
                            </a>

                            <div class="warning-payment" style="align-items: center;">
                                <div class="icon-warning__payment">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="text-warning__payment">
                                    {{__('translations.payment-done.warning-payment')}}
                                </div>
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

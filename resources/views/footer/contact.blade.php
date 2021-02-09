@extends('layouts.app')

@section('head-title')
    {{__('translations.footer.contact.head-title')}} - 
@endsection

@section('content')
    <div id="loading" class="container-fluid loader-container-fluid">
        <div id="loader" class="loader"></div>
    </div>

    <div id="is-load" class="is-load">
        <div class="formbox-deco"></div>

        <div class="container formbox-container">
            <h1 class="page-title page-title-white">{{__('translations.footer.contact.title')}}</h1>
            <p class="page-intro page-intro-white">{{__('translations.footer.contact.intro')}}</p>
            <div class="formbox-inner">
                <h2 class="forminner-title-contact">{{__('translations.footer.contact.intro_inner')}}</h2>
                <form action="{{ route('footer.contact-post') }}" method="post">
                    @csrf

                    <div class="form-group">

                        <label for="contact_email">{{__('translations.footer.contact.label_email')}}</label>

                        <input type="email" id="contact_email" class="form-control @error('contact_email') is-invalid @enderror" ref="contact_email" name="contact_email" placeholder="{{__('translations.footer.contact.placeholder_email')}}">
                    
                        @error('contact_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <label for="contact_message">{{__('translations.footer.contact.label_message')}}</label>

                        <textarea id="contact_message" class="form-control @error('contact_message') is-invalid @enderror" ref="contact_message" name="contact_message" placeholder="{{__('translations.footer.contact.placeholder_message')}}"></textarea>
                    
                        @error('contact_message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group form-button">
                        <div class="btn-center">
                            <button type="submit" class="btn btn-formbox">
                                {{__('translations.footer.contact.contact_send')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/textareaAutoSize.js') }}"></script>
    <script type="text/javascript">
        autosize(document.querySelectorAll('textarea'));
    </script>
@endsection
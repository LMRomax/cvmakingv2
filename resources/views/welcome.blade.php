@extends('layouts.app')

@section('Banniere')
@stop

@section('content')
    <div id="loading" class="container-fluid loader-container-fluid">
        <div id="loader" class="loader"></div>
    </div>

    <div id="is-load" class="is-load">
        <div class="formhome-deco"></div>

        <div class="container-fluid main-container-fluid">
            <div class="container main-container">
                <h1>
                    {{ __('translations.home.main_title') }}
                    <strong>{{__('translations.home.main_1euros')}}</strong>
                </h1>
                <p>{{ __('translations.home.main_intro') }}</p>
                <a href="{{ route('making-cv') }}" class="main-button">
                    {{ __('translations.home.main_button') }}
                </a>
            </div>
        </div>

        <div class="container-fluid homestep-container-fluid no-padding">
            <div class="container homestep-container">
                <div class="homestep-inner">
                    <div class="row align-items-center">
                        <div class="col-12 text-center mb-3 col-md-auto mb-md-0">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <div class="col">
                            <h2>{{ __('translations.home.firststep_title') }}</h2>
                            <p>
                                {{ __('translations.home.firststep_explain') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="homestep-inner">
                    <div class="row align-items-center">
                        <div class="col-12 text-center mb-3 col-md-auto mb-md-0">
                            <i class="fas fa-print"></i>
                        </div>
                        <div class="col">
                            <h2>{{ __('translations.home.thirdstep_title') }}</h2>
                            <p>
                                {{ __('translations.home.thirdstep_explain') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="homestep-inner">
                    <div class="row align-items-center">
                        <div class="col-12 text-center mb-3 col-md-auto mb-md-0">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="col">
                            <h2>{{ __('translations.home.secondstep_title') }}</h2>
                            <p>
                                {{ __('translations.home.secondstep_explain') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="homestep-inner">
                    <div class="row align-items-center">
                        <div class="col-12 text-center mb-3 col-md-auto mb-md-0">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="col">
                            <h2>{{ __('translations.home.fourthstep_title') }}</h2>
                            <p>
                                {{ __('translations.home.fourthstep_explain') }}
                            </p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('making-cv') }}" class="main-button">{{ __('translations.home.main_button') }}</a>

            </div>
        </div>

        <div class="container-fluid model-list__container-fluid" id="modelCvList">
            <div class="model-list__title-intro">
                <h2>{{ __('translations.home.title_model-list') }}</h2>
                <p>{{ __('translations.home.intro_model-list') }}</p>
            </div>
            <div class="row model-list__wrapper">
                @foreach ($designs as $design)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="model-list__card">
                            <div class="model-list__model-title">
                                {{ $design->name }}
                            </div>
                            <div class="model-list__model-img" data-id="{{ $design->id }}" data-toggle="modal"
                                data-target="#cvModalHome{{ $design->name }}">
                                <img src="{{ asset($design->img_link) }}" alt="{{ $design->name }}">
                            </div>
                        </div>
                    </div>

                    <!-- Modal preview CV Big Format Home-->
                    <div class="modal fade cv-modal-home" id="cvModalHome{{ $design->name }}" tabindex="-1" role="dialog"
                        aria-labelledby="cvModalHome{{ $design->name }}Label" aria-hidden="true">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <img src="{{ asset($design->img_link) }}" alt="{{ $design->name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container-fluid faq__container-fluid">
            <div class="faq__title-intro">
                <h2>{{ __('translations.home.title_faq') }}</h2>
                <p>{{ __('translations.home.intro_faq') }}</p>
            </div>
            <div class="container faq__container">
                <div class="faq__wrapper">
                    <div class="faq__card">
                        <button class="accordion">
                            {{__('translations.faq.money_question')}}
                        </button>
                        <div class="panel">
                            <p>{{__('translations.faq.money_answer')}}</p>
                        </div>
                    </div>


                    <div class="faq__card">
                        <button class="accordion">
                            {{__('translations.faq.first_question')}}
                        </button>
                        <div class="panel">
                            <p>{{__('translations.faq.first_answer')}}</p>
                        </div>
                    </div>

                    <div class="faq__card">
                        <button class="accordion">{{__('translations.faq.second_question')}}</button>
                        <div class="panel">
                            <p>{{__('translations.faq.second_answer')}}</p>
                        </div>
                    </div>

                    <div class="faq__card">
                        <button class="accordion">{{__('translations.faq.third_question')}}</button>
                        <div class="panel">
                            <p>{{__('translations.faq.third_answer')}}</p>
                        </div>
                    </div>

                    <div class="faq__card">
                        <button class="accordion">{{__('translations.faq.fourth_question')}}</button>
                        <div class="panel">
                            <p>{{__('translations.faq.fourth_answer')}}</p>
                        </div>
                    </div>

                    <div class="faq__card">
                        <button class="accordion">{{__('translations.faq.fifth_question')}}</button>
                        <div class="panel">
                            <p>{{__('translations.faq.fifth_answer')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container users-opinions__container">
            <div class="users-opinions__title-intro">
                <h2>{{ __('translations.home.title_user-opinions') }}</h2>
            </div>
            <div class="users-opinions__wrapper">
                <div class="row users-opinions__lists">
                    <div class="col-lg-4 col-md-6">
                        <div class="users_opinions__card">
                            <div class="users-identity__users-opinions">
                                <div>
                                    <img src="{{ asset('images/luis.jpg') }}" alt="users pictures">
                                </div>
                                <div class="name__opinions">
                                    <p class="name">
                                        Luis
                                    </p>
                                    <p class="note">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="users-opinions--opinions__text">
                                {{__('translations.home.first-opinion')}}
                            </div>
                            <div class="users-opinions--fontion">
                                <strong>{{__('translations.home.user-opinion-fonction')}}</strong>
                                {{__('translations.home.user-opinion_first-fonction')}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="users_opinions__card">
                            <div class="users-identity__users-opinions">
                                <div>
                                    <img src="{{ asset('images/catherine.jpg') }}" alt="users pictures">
                                </div>
                                <div class="name__opinions">
                                    <p class="name">
                                        Catherine
                                    </p>
                                    <p class="note">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="users-opinions--opinions__text">
                                {{__('translations.home.second-opinion')}}
                            </div>
                            <div class="users-opinions--fontion">
                                <strong>{{__('translations.home.user-opinion-fonction')}}</strong>
                                {{__('translations.home.user-opinion_second-fonction')}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="users_opinions__card">
                            <div class="users-identity__users-opinions">
                                <div>
                                    <img src="{{ asset('images/anthony.jpg') }}" alt="users pictures">
                                </div>
                                <div class="name__opinions">
                                    <p class="name">
                                        Anthony
                                    </p>
                                    <p class="note">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="users-opinions--opinions__text">
                                {{__('translations.home.third-opinion')}}
                            </div>
                            <div class="users-opinions--fontion">
                                <strong>{{__('translations.home.user-opinion-fonction')}}</strong>
                                {{__('translations.home.user-opinion_third-fonction')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset ('js/accordionFaq.js') }}"></script>
@endsection

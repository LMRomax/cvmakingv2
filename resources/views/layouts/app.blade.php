<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MyCVMaking - {{__('translations.metatag.title')}}</title>
    <meta name="description" content="MyCVMaking est un service de création de CV au prix de 1€."/>
    <meta name="google-site-verification" content="2F89kue3ad7vGWHtQzL_htLv_IZxq3h1JtP8G6J8krQ" />

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,600,700|Open+Sans:300,400,600,700&display=swap" rel="stylesheet" type="text/css" defer>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" defer>
    <link rel="icon" href="{{ asset('favicon.png')}}" />

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaqueries.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote-lite.css') }}" rel="stylesheet">

    <!-- Google AdSense -->
    <script data-ad-client="ca-pub-8791970078485740" async 
    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body>
    <div class="topnav">

        <div class="logo">
            <a href="{{ route('index') }}">
                <span class="sp-logo">
                    MyCV
                </span>
                Making
            </a>
        </div>

        <div class="space-menu"></div>

        <nav class="navigation-menu">
            <a href="{{ route('index') }}">
                <span>{{__('translations.menu.home')}}</span>
            </a>

            <a href="{{ route('making-cv') }}">
                <span>{{__('translations.menu.write_cv')}}</span>
            </a>

            @if(\Route::current()->getName() == 'index')
                <a id="modelCvButton" href="#modelCvList">
                    <span>{{__('translations.menu.model_cv')}}</span>
                </a>

                <a id="faqButton" href="#faq">
                    <span>{{__('translations.menu.faq')}}</span>
                </a>
            @endif
        </nav>
        <a href="javascript:void(0);" class="icon-responsive" onclick="openMenu()" title="open_menu_responsive">
            <i class="fas fa-bars" size="lg"></i>
        </a>
    </div>  

    <div class="responsive-mobile-nav responsive-mobile-drawer responsive-mobile-drawer--west ">
        <div class="responsive-mobile-container">
            <a href="javascript:void(0);" class="responsive-mobile-close" onclick="closeMenu()" title="close_menu_responsive">
                <i class="fas fa-times"></i>
            </a>

            <div class="responsive-logo">
                <a href="{{ route('index') }}">
                    <span class="sp-logo">
                        MyCV
                    </span>
                    Making
                </a>
            </div>

            <nav class="responsive-mobile-menu">
                <a href="{{ route('index') }}">
                    <span>{{__('translations.menu.home')}}</span>
                </a>

                <a href="{{ route('making-cv') }}">
                    <span>{{__('translations.menu.write_cv')}}</span>
                </a>

                @if(\Route::current()->getName() == 'index')
                    <a id="modelCvButtonMobile" href="#modelCvList">
                        <span>{{__('translations.menu.model_cv')}}</span>
                    </a>

                    <a id="faqButtonMobile" href="#faq">
                        <span>{{__('translations.menu.faq')}}</span>
                    </a>
                @endif
            </nav>                           
        </div>
    </div> 

    <main class="py-4">
        @yield('content')
    </main>

    @if(Session::has('success'))
        <div class="alert-modal alert-modal-success">
            <div id="close-alert-modal" class="close-alert-modal">&times;</div>
            {{ session()->get('success') }} 
        </div>
    @elseif (Session::has('error'))
        <div class="alert-modal alert-modal-danger">
            <div id="close-alert-modal" class="close-alert-modal">&times;</div>
            {{ session()->get('error') }} 
        </div>
    @endif

    <div id="json-error" class="alert-modal alert-modal-danger json-alert-danger">
        <div id="close-alert-modal" class="close-alert-modal">&times;</div>
        <div id="json-error-message"></div>
    </div>

</body>
    <div class="responsive-overlay" onclick="closeMenu()"></div>
    <script type="text/javascript" src="{{ asset ('js/loading.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/responsivemenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset ('js/alertmodal.js') }}"></script>
    @yield('javascript')

    @if(\Route::current()->getName() != 'footer.contact')
        @section('pre-footer')
            <div class="footer-go-cv">
                <div class="container go-cv-container">
                    <h1>{{__('translations.footer.gocv_title')}}</h1>
                    <p>{{__('translations.footer.gocv_explain')}}</p>
                    <a href="{{ route('footer.contact') }}">{{__('translations.footer.gocv_button')}}</a>
                </div>
            </div>
        @show
    @endif

    @section('footer')
        <footer>
            <div class="row justify-content-center">
                <div class="footer-first-block col-lg-3 col-md-6">
                    <p class="footer-title-menu">{{__('translations.footer.advice-links')}}</p>
                    <ul>
                        <li>
                            <a href="{{ route('index') }}">{{__('translations.footer.faq-link')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('footer.contact') }}">{{__('translations.footer.contact-link')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-second-block col-lg-3 col-md-6">
                    <p class="footer-title-menu">{{__('translations.footer.menu-links')}}</p>
                    <ul>
                        <li>
                            <a href="{{ route('index') }}">{{__('translations.footer.home-link')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-third-block col-lg-3 col-md-6">
                    <div>
                        <p class="footer-title-menu">{{__('translations.footer.legal-links')}}</p>
                        <ul>
                            <li>
                                <a href="{{ route('footer.cgu') }}">{{__('translations.footer.cgu-link')}}</a>
                            </li>
                            <li>
                                <a href="{{ route('footer.polconfident') }}">{{__('translations.footer.pol-link')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-fourth-block col-lg-3 col-md-6">
                    <i class="fas fa-globe"></i>
                    <div id="displayLangs" class="select-langs">
                        @if(app()->getLocale() == "fr")
                            Français
                        @elseif(app()->getLocale() == "en")
                            English
                        @elseif(app()->getLocale() == "es")
                            Español
                        @endif
                        <div class="arrow--select_lang">
                            <i class="fas fa-sort-down"></i>
                        </div>
                    </div>

                    <div class="box--choose__lang">
                        <ul>
                            <li @if(app()->getLocale() == "fr") class="lang--chosen" @endif>
                                <a href="{{ LaravelLocalization::getLocalizedURL('fr') }}">
                                    {{__('translations.langs.french')}}
                                </a>
                            </li>
                            <li @if(app()->getLocale() == "en") class="lang--chosen" @endif>
                                <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                                    {{__('translations.langs.english')}}
                                </a>
                            </li>
                            <li @if(app()->getLocale() == "es") class="lang--chosen" @endif>
                                <a href="{{ LaravelLocalization::getLocalizedURL('es') }}">
                                    {{__('translations.langs.spanish')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    @show
    <script type="text/javascript" src="{{ asset ('js/boxLangs.js') }}"></script>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('head-title')MyCVMaking</title>
    <meta name="description" content="MyCVMaking est un service de création de CV."/>
    <meta name="google-site-verification" content="2F89kue3ad7vGWHtQzL_htLv_IZxq3h1JtP8G6J8krQ" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//img01.bt.co.uk/s/assets/sport/js/libs/jquery/1.10.2/jquery-1.10.2.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,600,700|Open+Sans:300,400,600,700&display=swap" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('favicon.png')}}" />

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mediaqueries.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote-lite.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136305819-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-136305819-1');
    </script>

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
                <a href="#modelCvList">
                    <span>{{__('translations.menu.model_cv')}}</span>
                </a>

                <a href="#faq">
                    <span>{{__('translations.menu.faq')}}</span>
                </a>
            @endif
        </nav>
        <a href="javascript:void(0);" class="icon-responsive" onclick="openMenu()">
            <i class="fas fa-bars" size="lg"></i>
        </a>
    </div>  

    <div class="responsive-mobile-nav responsive-mobile-drawer responsive-mobile-drawer--west ">
        <div class="responsive-mobile-container">
            <a href="javascript:void(0);" class="responsive-mobile-close" onclick="closeMenu()">
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
                    <a href="#modelCvList">
                        <span>{{__('translations.menu.model_cv')}}</span>
                    </a>

                    <a href="#faq">
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
    <script type="text/javascript" src="{{ asset ('js/bootstrap.js') }}"></script>
    @yield('javascript')

    @section('pre-footer')
        <div class="footer-go-cv">
            <div class="container go-cv-container">
                <h1>{{__('translations.footer.gocv_title')}}</h1>
                <p>{{__('translations.footer.gocv_explain')}}</p>
                <a href="#">{{__('translations.footer.gocv_button')}}</a>
            </div>
        </div>
    @show

    @section('footer')
        <footer>
            <div class="row justify-content-center">
                <div class="footer-first-block col-md-4 col-sm-4">
                    <h3 class="footer-title-menu">{{__('translations.footer.advice-links')}}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('index') }}">{{__('translations.footer.faq-link')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('footer.contact') }}">{{__('translations.footer.contact-link')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-second-block col-md-4 col-sm-4">
                    <h3 class="footer-title-menu">{{__('translations.footer.menu-links')}}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('index') }}">{{__('translations.footer.home-link')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-third-block col-md-4 col-sm-4">
                    <div>
                        <h3 class="footer-title-menu">{{__('translations.footer.legal-links')}}</h3>
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
            </div>
        </footer>
    @show
</html>

@php
    if (isset($cv_color) && $cv_color != null) {
        $color = [
            'primary' => $cv_color,
        ];
    } else {
        $color = [
            'primary' => '#424954',
        ];
    }

    setlocale(LC_ALL, app()->getLocale().'_'.strtoupper(app()->getLocale()));
@endphp

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <title>CV</title>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=PT+Sans');

        body {
            width:26cm;
            height:38.35cm;
            font-size: 16px;
        }

        .table .table {
            background: transparent;
        }
        
        .table { 
            display: table; 
            width: 100%; 
            height: 100%;
            border-collapse: unset; 
            margin-bottom: 0;
        }

        .table-row { 
            display: table-row; 
        }

        .table-cell { 
            display: table-cell;
            vertical-align: top;
        }

        .top {
            position: relative;
        }

        .table-cell.personal-data {
            width: 40%;
            color: #fff;
            height: 275px;
            padding: 16px 48px 16px 16px; 
        }

        .table-cell.description {
            width: 60%;
            height: 275px;
            background: #F5F5F5;
            padding: 16px 16px 16px 96px;
        }

        .top .bandeau {
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .top .description .bandeau {
            color: #424954;
        }

        .lists-infos-perso .infos-perso__card {
            margin-bottom: 8px;
        }

        .lists-infos-perso .infos-perso__card strong {
            margin-right: 8px;
        }

        .avatar{
            position: absolute;
            top: 72px;
            left: 326px;
            width: 128px;
            height: 128px;
            border-radius: 50%;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: auto;
        }

        .table-cell.alternate-content {
            width: 40%;
            padding: 32px 16px;
            height: 100%;
            background: #F5F5F5;
        }

        .alternate-content .section__wrapper {
            margin-bottom: 32px;
        }

        .alternate-content .bandeau {
            margin-bottom: 32px;
        }
       
        .alternate-content .bandeau span {
            display: inline-block;
            vertical-align: middle;
        }

        .alternate-content .bandeau .circle {
            width: 24px;
            height: 24px;
            border-radius: 50%;
        }
        
        .alternate-content .bandeau .bandeau--title {
            font-size: 20px;
            color: #444444;
            margin-left: 16px;
        }

        .table-cell.data__title, .table-cell.td-strong {
            font-weight: 600;
        }

        .table-cell.data--point .little--circle {
            display: inline-block;
            background: #ddd;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .list-comps, .list-langs, .list-hobbies,.list-refs {
            padding-left: 46px;
        }
    </style>
</head>

<body>
    <div class="top">
        <div class="avatar">
            @if ($cv->cvphoto !== null)
                <img src="{{ asset('cvphoto/'.$cv->cvphoto) }}" alt="Avatar">
            @endif 
        </div>
        <div class="table">
            <div class="table-row">
                <div class="table-cell personal-data" style="background: {{ $color['primary'] }};">
                    <div class="bandeau">
                        {{ __('translations.pdf.barkley.personal-data') }}
                    </div>
                    <div class="lists-infos-perso">
                        <div class="infos-perso__card">
                            <span>
                                <strong>
                                    {{ __('translations.pdf.barkley.name') }}
                                </strong>
                            </span>
                            <span>
                                {{ $cv_basics->makingcv_name }}
                            </span>
                        </div>
                        <div class="infos-perso__card">
                            <span>
                                <strong>
                                    {{ __('translations.pdf.barkley.address') }}
                                </strong>
                            </span>
                            <span>
                                {{ $cv_basics->makingcv_address }}
                                {{ $cv_basics->makingcv_zipcode }}
                                {{ $cv_basics->makingcv_city }}
                            </span>
                        </div>
                        <div class="infos-perso__card">
                            <span>
                                <strong>
                                    {{ __('translations.pdf.barkley.tel_number') }}
                                </strong>
                            </span>
                            <span>
                                {{ $cv_basics->makingcv_phone }}
                            </span>
                        </div>
                        <div class="infos-perso__card">
                            <span>
                                <strong>
                                    {{ __('translations.pdf.barkley.email') }}
                                </strong>
                            </span>
                            <span>
                                {{ $cv_basics->makingcv_email }}
                            </span>
                        </div>
                        @if (isset($cv_basics->makingcv_birthdate))
                            <div class="infos-perso__card">
                                <span>
                                    <strong>
                                        {{ __('translations.pdf.barkley.birthdate') }}
                                    </strong>
                                </span>
                                <span>
                                    @if (app()->getLocale() == 'fr')
                                        {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                    @elseif(app()->getLocale() == "en")
                                        {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                    @elseif(app()->getLocale() == "es")
                                        {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                    @endif
                                </span>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_birthplace))
                            <div class="infos-perso__card">
                                <span>
                                    <strong>
                                        {{ __('translations.pdf.barkley.birthplace') }}
                                    </strong>
                                </span>
                                <span>
                                    {{ $cv_basics->makingcv_birthplace }}
                                </span>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_gender))
                            <div class="infos-perso__card">
                                <span>
                                    <strong>
                                        {{ __('translations.pdf.barkley.gender') }}
                                    </strong>
                                </span>
                                <span>
                                    {{ $cv_basics->makingcv_gender }}
                                </span>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_drivinglicenses))
                            <div class="infos-perso__card">
                                <span>
                                    <strong>
                                        {{ __('translations.pdf.barkley.permis') }}
                                    </strong>
                                </span>
                                <span>
                                    {{ $cv_basics->makingcv_drivinglicenses }}
                                </span>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_linkedin))
                            <div class="infos-perso__card">
                                <span>
                                    <strong>
                                        {{ __('translations.pdf.barkley.linkedin') }}
                                    </strong>
                                </span>
                                <span>
                                    {{ $cv_basics->makingcv_linkedin }}
                                </span>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_website))
                            <div class="infos-perso__card">
                                <span>
                                    <strong>
                                        {{ __('translations.pdf.barkley.website') }}
                                    </strong>
                                </span>
                                <span>
                                    {{ $cv_basics->makingcv_website }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="table-cell description">
                    <div class="bandeau">
                        {{ __('translations.pdf.bandeau.description') }}
                    </div>
                    {{ $cv->description }}
                </div>
            </div>
        </div>
    </div>  
    <div class="table">
        <div class="table-row">
            <div class="table-cell alternate-content" style="border-right: 2px solid {{ $color['primary'] }};">
                @if ($cv_comps != null)
                    <section class="comp section__wrapper">
                        <div class="bandeau">
                            <span class="circle" style="background: {{ $color['primary'] }};"></span>
                            <span class="bandeau--title">
                                {{ __('translations.pdf.bandeau.comp') }}
                            </span>
                        </div>
                        <div class="list-comps">
                            <div class="table-data">
                                <div class="table">
                                    @foreach ($cv_comps as $key => $cv_comp)
                                        <div class="table-row label-educ">
                                            <div class="table-cell data__title">{{ $cv_comp->contentcv_comp_name }}</div>
                                            <div class="table-cell data--point">
                                                @if ($cv_comp->contentcv_comp_level == 0)
                                                    <span class="little--circle" style="background: {{ $color['primary'] }}"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                @elseif ($cv_comp->contentcv_comp_level == 25)
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                @elseif($cv_comp->contentcv_comp_level == 50)
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                @elseif($cv_comp->contentcv_comp_level == 75)
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle"></span>
                                                @elseif($cv_comp->contentcv_comp_level == 100)
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="little--circle" style="background: {{ $color['primary'] }};"></span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                @if ($cv_langs != null)
                    <div class="langs section__wrapper">
                        <div class="bandeau">
                            <span class="circle" style="background: {{ $color['primary'] }};"></span>
                            <span class="bandeau--title">
                                {{ __('translations.pdf.bandeau.langs') }}
                            </span>
                        </div>
                        <div class="list-langs">
                            <div class="table-data">
                                <div class="table">
                                    @foreach ($cv_langs as $key => $cv_lang)
                                        <div class="table-row">
                                            <div class="table-cell td-strong">
                                                {{ $cv_lang->contentcv_lang_name }}
                                            </div>
                                            <div class="table-cell data">
                                                @if ($cv_lang->contentcv_lang_level == '100')
                                                    {{ __('translations.contentcv.maternal_lang') }}
                                                @elseif($cv_lang->contentcv_lang_level == "75")
                                                    {{ __('translations.contentcv.current_lang') }}
                                                @elseif($cv_lang->contentcv_lang_level == "50")
                                                    {{ __('translations.contentcv.ok_lang') }}
                                                @elseif($cv_lang->contentcv_lang_level == "25")
                                                    {{ __('translations.contentcv.middle_lang') }}
                                                @elseif($cv_lang->contentcv_lang_level == "15")
                                                    {{ __('translations.contentcv.elementary_lang') }}
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($cv_refs != null)
                    <section class="refs section__wrapper">
                        <div class="bandeau">
                            <span class="circle" style="background: {{ $color['primary'] }};"></span>
                            <span class="bandeau--title">
                                {{ __('translations.pdf.bandeau.refs') }}
                            </span>
                        </div>
                        <div class="list-refs">
                            <div class="table-data">
                                <div class="table">
                                    @foreach ($cv_refs as $key => $cv_ref)
                                        <div class="table-row">
                                            <div class="table-cell td-strong">
                                                {{ $cv_ref->contentcv_ref_name }}
                                            </div>
                                            <div class="table-cell data">
                                                {{ $cv_ref->contentcv_ref_contact }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                @if ($cv_hobbies != null)
                    <div class="hobbies section__wrapper">
                        <div class="bandeau" style="margin-bottom: 16px;">
                            <span class="circle" style="background: {{ $color['primary'] }};"></span>
                            <span class="bandeau--title">
                                {{ __('translations.pdf.bandeau.hobbies') }}
                            </span>
                        </div>
                        <div class="list-hobbies">
                            <div class="table-data">
                                <div class="table">
                                    @foreach ($cv_hobbies as $key => $cv_hobby)
                                        <div class="table-row">
                                            @if ($loop->first) 
                                                <div class="table-cell">
                                                    {{ $cv_hobby->contentcv_hobbies_hobby }}
                                                </div>
                                            @else 
                                                <div class="table-cell" >
                                                    {{ $cv_hobby->contentcv_hobbies_hobby }}
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="table-cell main-content"></div>
        </div>
    </div>
</body>
</html>

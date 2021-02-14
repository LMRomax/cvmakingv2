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
            width:26.25cm;
            height:38.35cm;
            font-size: 14px;
            color: #424954;
        }

        strong {
            font-weight: 600;
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
            height: 100px;
            color: #fff;
            padding: 24px;
            font-size: 32px;
            font-weight: 600;
        }

        .table-cell.data__title, .table-cell.td-strong {
            font-weight: 600;
            padding-bottom: 8px;
        }

        .table-cell.data--point .little--circle {
            display: inline-block;
            background: #ddd;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .table-cell.alternate-content {
            width: 33.3333%;
            height: 100%;
            padding: 24px 32px 24px 24px;
        }

        .table-cell.main-content {
            width: 66.6666%;
            height: 100%;
            padding: 24px 24px 24px 24px;
        }

        .alternate-content .bandeau {
            font-size: 18px;
            margin-bottom: 16px;
            font-weight: 600;
        }
        
        .table-cell.data--point .little--circle {
            display: inline-block;
            background: #ddd;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .infos-perso__card {
            margin-bottom: 8px;
        }

        .alternate-content .section__wrapper {
            margin-bottom: 24px;
        }

        .main-content .description {
            padding: 0px 0 24px;
        }

        .main-content .bandeau {
            position: relative;
            color: #424954;
            font-size: 20px;
            font-weight: 600;
        }

        .main-content .bandeau span {
            background-color: white;
            padding-right: 10px;
        }

        .main-content .bandeau:after {
            content:"";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 0.5em;
            border-top: 1px solid #424954;
            z-index: -1;
        }

        .main-content .little--point {
            width: 8px;
            border: 1px solid #424954;
        }
    </style>
</head>

<body>
    <div class="top" style="background: {{ $color['primary'] }}">
        <div class="cv--supertitle">
            @if(app()->getLocale() == "es")
                Currículum vitae
            @else
                Curriculum vitae
            @endif
        </div>
    </div>
    <div class="table">
        <div class="table-row">
            <div class="table-cell alternate-content">
                <section class="personal-data section__wrapper">
                    <div class="bandeau">
                        {{ __('translations.pdf.barkley.personal-data') }}
                    </div>
                    <div class="lists-infos-perso">
                        <div class="infos-perso__card">
                            <strong>
                                    <div style="color: {{ $color['primary'] }};">
                                    {{ __('translations.pdf.barkley.name') }}
                                </strong>
                            </div>
                            <div>
                                {{ $cv_basics->makingcv_name }}
                            </div>
                        </div>
                        <div class="infos-perso__card">
                            <strong>
                                    <div style="color: {{ $color['primary'] }};">
                                    {{ __('translations.pdf.barkley.address') }}
                                </strong>
                            </div>
                            <div>
                                {{ $cv_basics->makingcv_address }}
                                {{ $cv_basics->makingcv_zipcode }}
                                {{ $cv_basics->makingcv_city }}
                            </div>
                        </div>
                        <div class="infos-perso__card">
                            <strong>
                                    <div style="color: {{ $color['primary'] }};">
                                    {{ __('translations.pdf.barkley.tel_number') }}
                                </strong>
                            </div>
                            <div>
                                {{ $cv_basics->makingcv_phone }}
                            </div>
                        </div>
                        <div class="infos-perso__card">
                            <strong>
                                    <div style="color: {{ $color['primary'] }};">
                                    {{ __('translations.pdf.barkley.email') }}
                                </strong>
                            </div>
                            <div>
                                {{ $cv_basics->makingcv_email }}
                            </div>
                        </div>
                        @if (isset($cv_basics->makingcv_birthdate))
                            <div class="infos-perso__card">
                                <strong>
                                        <div style="color: {{ $color['primary'] }};">
                                        {{ __('translations.pdf.barkley.birthdate') }}
                                    </strong>
                                </div>
                                <div>
                                    @if (app()->getLocale() == 'fr')
                                        {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                    @elseif(app()->getLocale() == "en")
                                        {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                    @elseif(app()->getLocale() == "es")
                                        {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_birthplace))
                            <div class="infos-perso__card">
                                <strong>
                                        <div style="color: {{ $color['primary'] }};">
                                        {{ __('translations.pdf.barkley.birthplace') }}
                                    </strong>
                                </div>
                                <div>
                                    {{ $cv_basics->makingcv_birthplace }}
                                </div>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_gender))
                            <div class="infos-perso__card">
                                <strong>
                                        <div style="color: {{ $color['primary'] }};">
                                        {{ __('translations.pdf.barkley.gender') }}
                                    </strong>
                                </div>
                                <div>
                                    {{ $cv_basics->makingcv_gender }}
                                </div>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_drivinglicenses))
                            <div class="infos-perso__card">
                                <strong>
                                        <div style="color: {{ $color['primary'] }};">
                                        {{ __('translations.pdf.barkley.permis') }}
                                    </strong>
                                </div>
                                <div>
                                    {{ $cv_basics->makingcv_drivinglicenses }}
                                </div>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_linkedin))
                            <div class="infos-perso__card">
                                <strong>
                                        <div style="color: {{ $color['primary'] }};">
                                        {{ __('translations.pdf.barkley.linkedin') }}
                                    </strong>
                                </div>
                                <div>
                                    {{ $cv_basics->makingcv_linkedin }}
                                </div>
                            </div>
                        @endif
                        @if (isset($cv_basics->makingcv_website))
                            <div class="infos-perso__card">
                                <strong>
                                        <div style="color: {{ $color['primary'] }};">
                                        {{ __('translations.pdf.barkley.website') }}
                                    </strong>
                                </div>
                                <div>
                                    {{ $cv_basics->makingcv_website }}
                                </div>
                            </div>
                        @endif
                    </div>
                </section>

                @if ($cv_comps != null)
                    <section class="comp section__wrapper">
                        <div class="bandeau" style="color: {{ $color['primary'] }};">
                            {{ __('translations.pdf.bandeau.comp') }}
                        </div>
                        <div class="list-comps">
                            <div class="table-data">
                                <div class="table">
                                    @foreach ($cv_comps as $key => $cv_comp)
                                        <div class="table-row label-educ">
                                            <div class="table-cell data__title">{{ $cv_comp->contentcv_comp_name }}</div>
                                            <div class="table-cell data--point">
                                                @if ($cv_comp->contentcv_comp_level == 0)
                                                    <span class="little--circle" style="background: #424954"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                @elseif ($cv_comp->contentcv_comp_level == 25)
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                @elseif($cv_comp->contentcv_comp_level == 50)
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                @elseif($cv_comp->contentcv_comp_level == 75)
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle"></span>
                                                @elseif($cv_comp->contentcv_comp_level == 100)
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
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
                                            <div class="table-cell data--point">
                                                @if ($cv_lang->contentcv_lang_level == '100')
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                @elseif($cv_lang->contentcv_lang_level == "75")
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle"></span>
                                                @elseif($cv_lang->contentcv_lang_level == "50")
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                @elseif($cv_lang->contentcv_lang_level == "25")
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                @elseif($cv_lang->contentcv_lang_level == "15")
                                                    <span class="little--circle" style="background: #424954;"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                    <span class="little--circle"></span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($cv_hobbies != null)
                    <div class="hobbies section__wrapper">
                        <div class="bandeau" style="margin-bottom: 16px;">
                            {{ __('translations.pdf.bandeau.hobbies') }}
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
            <div class="table-cell main-content">
                <div class="description">
                    {{ $cv->description }}
                </div>

                @if ($cv_xps != null)
                    <section class="xp section__wrapper">
                        <div class="bandeau">
                            <span>
                                {{ __('translations.pdf.bandeau.xp') }}
                            </span>
                        </div>
                        <div class="lists-xps">
                            <div class="table-data">
                                <div class="table">
                                    @foreach ($cv_xps as $key => $cv_xp)
                                        <div class="table-row">
                                            <div class="table-cell">
                                                <span class="little--point" style="background: {{ $color['primary'] }};"></span>
                                                <span class="formation--title__date">
                                                    @if ($cv_xp->xp_start_month == '01')
                                                        {{ __('translations.contentcv.jan') }}
                                                    @elseif($cv_xp->xp_start_month == "02")
                                                        {{ __('translations.contentcv.feb') }}
                                                    @elseif($cv_xp->xp_start_month == "03")
                                                        {{ __('translations.contentcv.mar') }}
                                                    @elseif($cv_xp->xp_start_month == "04")
                                                        {{ __('translations.contentcv.avr') }}
                                                    @elseif($cv_xp->xp_start_month == "05")
                                                        {{ __('translations.contentcv.mai') }}
                                                    @elseif($cv_xp->xp_start_month == "06")
                                                        {{ __('translations.contentcv.juin') }}
                                                    @elseif($cv_xp->xp_start_month == "07")
                                                        {{ __('translations.contentcv.jui') }}
                                                    @elseif($cv_xp->xp_start_month == "08")
                                                        {{ __('translations.contentcv.aout') }}
                                                    @elseif($cv_xp->xp_start_month == "09")
                                                        {{ __('translations.contentcv.sept') }}
                                                    @elseif($cv_xp->xp_start_month == "10")
                                                        {{ __('translations.contentcv.oct') }}
                                                    @elseif($cv_xp->xp_start_month == "11")
                                                        {{ __('translations.contentcv.nov') }}
                                                    @elseif($cv_xp->xp_start_month == "12")
                                                        {{ __('translations.contentcv.dec') }}
                                                    @endif
                                                    {{ $cv_xp->xp_start_year }}
                                                    -
                                                    @if ($cv_xp->xp_end_month == '01')
                                                        {{ __('translations.contentcv.jan') }}
                                                    @elseif($cv_xp->xp_end_month == "02")
                                                        {{ __('translations.contentcv.feb') }}
                                                    @elseif($cv_xp->xp_end_month == "03")
                                                        {{ __('translations.contentcv.mar') }}
                                                    @elseif($cv_xp->xp_end_month == "04")
                                                        {{ __('translations.contentcv.avr') }}
                                                    @elseif($cv_xp->xp_end_month == "05")
                                                        {{ __('translations.contentcv.mai') }}
                                                    @elseif($cv_xp->xp_end_month == "06")
                                                        {{ __('translations.contentcv.juin') }}
                                                    @elseif($cv_xp->xp_end_month == "07")
                                                        {{ __('translations.contentcv.jui') }}
                                                    @elseif($cv_xp->xp_end_month == "08")
                                                        {{ __('translations.contentcv.aout') }}
                                                    @elseif($cv_xp->xp_end_month == "09")
                                                        {{ __('translations.contentcv.sept') }}
                                                    @elseif($cv_xp->xp_end_month == "10")
                                                        {{ __('translations.contentcv.oct') }}
                                                    @elseif($cv_xp->xp_end_month == "11")
                                                        {{ __('translations.contentcv.nov') }}
                                                    @elseif($cv_xp->xp_end_month == "12")
                                                        {{ __('translations.contentcv.dec') }}
                                                    @endif
                                                    {{ $cv_xp->xp_end_year }}
                                                </span>
                                            </div>
                                            <div class="table-cell">
                                                <span class="formation--title__title">
                                                    {{ $cv_xp->contentcv_xp_poste }}
                                                </span>
                                                <p class="italic-small">
                                                    {{ $cv_xp->contentcv_xp_employer }},
                                                    {{ $cv_xp->contentcv_xp_city }}
                                                </p>
                                                <div class="educ-description"> {!!
                                                    nl2br($cv_xp->contentcv_xp_description) !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>
</body>
</html>

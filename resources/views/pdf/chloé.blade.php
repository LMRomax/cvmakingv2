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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>CV</title>

    <noscript>
        <style>
            .page {
                display: none;
            }
        </style>
        <p>Please enable javascript to continue</p>
    </noscript>

    <script type="text/javascript" src="{{ asset('js/previewPDFAccess.js') }}"></script>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=PT+Sans');

        body {
            width:26.25cm;
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
            padding: 16px 54px 16px 16px; 
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
            margin-bottom: 16px;
        }

        .top .description .bandeau {
            color: #424954;
        }

        .lists-infos-perso {
            font-size: 14px;
        }

        .lists-infos-perso .infos-perso__card {
            margin-bottom: 8px;
        }

        .lists-infos-perso .infos-perso__card strong {
            margin-right: 8px;
        }

        .avatar{
            position: absolute;
            top: 64px;
            left: 334px;
            width: 128px;
            height: 128px;
        }

        .avatar img {
            width: 100%;
            height: auto;
            border-radius: 50%;
        }

        .table-cell.alternate-content {
            width: 40%;
            padding: 32px 24px;
            height: 100%;
            background: #F5F5F5;
        }

        .table-cell.main-content {
            width: 60%;
            background: #fff;
            padding: 32px 24px;
            height: 100%;
        }

        .alternate-content .section__wrapper {
            margin-bottom: 32px;
        }

        .alternate-content .bandeau, .main-content .bandeau {
            margin-bottom: 32px;
        }
       
        .alternate-content .bandeau span, .main-content .bandeau span {
            display: inline-block;
            vertical-align: middle;
        }

        .alternate-content .bandeau .circle, .main-content .bandeau .circle {
            width: 24px;
            height: 24px;
            border-radius: 50%;
        }
        
        .alternate-content .bandeau .bandeau--title, .main-content .bandeau .bandeau--title {
            font-size: 20px;
            color: #444444;
            margin-left: 16px;
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

        .list-comps, .list-langs, .list-hobbies,.list-refs {
            padding-left: 46px;
        }

        .details--main-content {
            display: block;
        }

        .main-content .label-educ {
            padding-left: 24px;
            padding-bottom: 24px;
        }

        .main-content .italic-small {
            font-weight: 600;
            padding-left: 30px;
        }

        .main-content .section__wrapper {
            margin-bottom: 16px;
        }

        .main-content .medium--circle {
            display: inline-block;
            margin-right: 8px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            vertical-align: middle;
        }

        .main-content .formation--title__title {
            display: inline-block;
            vertical-align: middle;
            width: 35%;
        }

        .main-content .formation--title__date {
            display: inline-block;
            vertical-align: middle;
            width: 56%;
            text-align: right;
            font-style: italic;
            font-size: 14px;
        }

        .main-content .educ-description {
            padding-left: 30px;
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
                <div class="table-cell personal-data" style="background: {{ $color['primary'] }}; border-right: 1px solid {{ $color['primary'] }}">
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
            <div class="table-cell alternate-content" style="border-right: 1px solid {{ $color['primary'] }};">
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
            <div class="table-cell main-content">
                @if ($cv_xps != null)
                    <section class="xp section__wrapper">
                        <div class="bandeau">
                            <span class="circle" style="background: {{ $color['primary'] }};"></span>
                            <span class="bandeau--title">
                                {{ __('translations.pdf.bandeau.xp') }}
                            </span>
                        </div>
                        <div class="lists-xps">
                            <div class="table-data">
                                <div class="table">
                                    @foreach ($cv_xps as $key => $cv_xp)
                                        <div class="table-row">
                                            <div class="table-cell label-educ">
                                                <div class="details--main-content">
                                                    <span class="medium--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="formation--title__title">
                                                        {{ $cv_xp->contentcv_xp_poste }}
                                                    </span>
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

                @if ($cv_educs != null)
                    <section class="formations section__wrapper">
                        <div class="bandeau">
                            <span class="circle" style="background: {{ $color['primary'] }};"></span>
                            <span class="bandeau--title">
                                {{ __('translations.pdf.bandeau.formation') }}
                            </span>
                        </div>
                        <div class="lists-formations">
                            <div class="table-data">
                                <div class="table">
                                    @foreach ($cv_educs as $key => $cv_educ)
                                        <div class="table-row">
                                            <div class="table-cell label-educ">
                                                <div class="details--main-content">
                                                    <span class="medium--circle" style="background: {{ $color['primary'] }};"></span>
                                                    <span class="formation--title__title">
                                                        {{ $cv_educ->contentcv_educ_formation }}
                                                    </span>
                                                    <span class="formation--title__date">
                                                        @if ($cv_educ->educ_start_month == '01')
                                                            {{ __('translations.contentcv.jan') }}
                                                        @elseif($cv_educ->educ_start_month == "02")
                                                            {{ __('translations.contentcv.feb') }}
                                                        @elseif($cv_educ->educ_start_month == "03")
                                                            {{ __('translations.contentcv.mar') }}
                                                        @elseif($cv_educ->educ_start_month == "04")
                                                            {{ __('translations.contentcv.avr') }}
                                                        @elseif($cv_educ->educ_start_month == "05")
                                                            {{ __('translations.contentcv.mai') }}
                                                        @elseif($cv_educ->educ_start_month == "06")
                                                            {{ __('translations.contentcv.juin') }}
                                                        @elseif($cv_educ->educ_start_month == "07")
                                                            {{ __('translations.contentcv.jui') }}
                                                        @elseif($cv_educ->educ_start_month == "08")
                                                            {{ __('translations.contentcv.aout') }}
                                                        @elseif($cv_educ->educ_start_month == "09")
                                                            {{ __('translations.contentcv.sept') }}
                                                        @elseif($cv_educ->educ_start_month == "10")
                                                            {{ __('translations.contentcv.oct') }}
                                                        @elseif($cv_educ->educ_start_month == "11")
                                                            {{ __('translations.contentcv.nov') }}
                                                        @elseif($cv_educ->educ_start_month == "12")
                                                            {{ __('translations.contentcv.dec') }}
                                                        @endif
                                                        {{ $cv_educ->educ_start_year }}
                                                        -
                                                        @if ($cv_educ->educ_end_month == '01')
                                                            {{ __('translations.contentcv.jan') }}
                                                        @elseif($cv_educ->educ_end_month == "02")
                                                            {{ __('translations.contentcv.feb') }}
                                                        @elseif($cv_educ->educ_end_month == "03")
                                                            {{ __('translations.contentcv.mar') }}
                                                        @elseif($cv_educ->educ_end_month == "04")
                                                            {{ __('translations.contentcv.avr') }}
                                                        @elseif($cv_educ->educ_end_month == "05")
                                                            {{ __('translations.contentcv.mai') }}
                                                        @elseif($cv_educ->educ_end_month == "06")
                                                            {{ __('translations.contentcv.juin') }}
                                                        @elseif($cv_educ->educ_end_month == "07")
                                                            {{ __('translations.contentcv.jui') }}
                                                        @elseif($cv_educ->educ_end_month == "08")
                                                            {{ __('translations.contentcv.aout') }}
                                                        @elseif($cv_educ->educ_end_month == "09")
                                                            {{ __('translations.contentcv.sept') }}
                                                        @elseif($cv_educ->educ_end_month == "10")
                                                            {{ __('translations.contentcv.oct') }}
                                                        @elseif($cv_educ->educ_end_month == "11")
                                                            {{ __('translations.contentcv.nov') }}
                                                        @elseif($cv_educ->educ_end_month == "12")
                                                            {{ __('translations.contentcv.dec') }}
                                                        @endif
                                                        {{ $cv_educ->educ_end_year }}
                                                    </span>
                                                </div>
                                                <p class="italic-small">
                                                    {{ $cv_educ->contentcv_educ_city }} -
                                                    {{ $cv_educ->contentcv_educ_institution }}
                                                </p>
                                                <div class="educ-description">
                                                    {!! nl2br($cv_educ->contentcv_educ_description) !!}
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

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

        :root {
            --blue: rgb(64, 102, 146);
            --green: rgb(72, 99, 76);
            --mauve: rgb(123, 53, 95);
            --red: rgb(171, 61, 73);
            --black: rgb(51, 51, 53);
        }

        body {
            width:26.25cm;
            height:38.35cm;
            font-size: 14px;
        }

        .page {
            background: white;
            height: 100%;
        }

        .table .table {
            background: transparent;
        }
        
        .table { 
            display: table; 
            width: 100%; 
            height: 100%;
            border-collapse: unset; 
        }

        .table-row { 
            display: table-row; 
        }

        .table-cell { 
            display: table-cell;
            vertical-align: top;
        }

        .top {
            width: 100%;
            background: #424954;
            height: 200px;
            overflow: hidden;
            padding: 24px;
        }

        .top .top--wrapper {
            height: 100%;
        }

        .top .avatar {
            text-align: center;
        }

        .top .avatar img {
            width: 108px;
            border-radius: 50%;
        }

        .top .avatar .name {
            font-weight: 600;
            font-size: 28px;
            color: #fff;
        }

        .top .description {
            width: 75%;
            color: #fff;
            padding: 16px 24px;
            border-radius: 6px;
            text-align: justify;
            vertical-align: middle;
        }

        .content {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
        }

        .main__content--cell {
            width: 70%;
            height: 100%;
        }

        .main__content {
            background: #fff;
            height: 100%;
            padding: 24px;
        }

        .secondary__content {
            background: #e9e9e9;
            height: 100%;
            padding: 24px;
        }

        .secondary__content td {
            padding-left: 0 !important;
        }

        .secondary__content--cell {
            width: 30%;
            height: 100%;
        }

        .secondary__content .bandeau {
            background: #424954;
            color: #fff;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 2px;
            margin-bottom: 32px;
        }

        .lists-infos-perso {
            margin-bottom: 32px;
        }

        .lists-infos-perso .infos-perso__card p:first-child {
            margin-bottom: 0;
        }

        .lists-infos-perso .infos-perso__card:last-child p:last-child {
            margin-bottom: 0;
        }

        .secondary__content .section__wrapper {
            margin-bottom: 16px;
        }

        .secondary__content .comp .data__title {
            display: block;
            font-weight: 600;
        }

        .secondary__content .td-strong {
            display: block;
            font-weight: 600;
            padding-bottom: 16px;
        }

        .secondary__content .table-cell.data {
            padding-bottom: 16px;
        }

        .my__progress {
            width: 100%;
            background-color: #ddd;
            height: 5px;
            border-radius: 25px;
        }

        .my__bar {
            height: 5px;
            background-color: #424954;
            border-radius: 25px;
        }

        .data.progress__bar {
            width: 200px;
            vertical-align: middle;
        }

        .main__content .bandeau {
            font-weight: 600;
            color: #424954;
            font-size: 24px;
            margin-bottom: 24px;
        }

        .main__content .bandeau .big--square {
            width:32px;
            height:32px;
            background:#424954;
        }
        
        .main__content table tr {
            display: block;
            padding-left: 32px;
            margin-bottom: 24px;
        }

        .main__content table tr:last-child {
            margin-bottom: 0;
        }

        .table-cell.label-educ {
            padding-bottom: 24px;
            padding-left: 32px;
        }

        .main__content .label-educ .little--square{
            display: inline-block;
            vertical-align: middle;
            width:16px;
            height:16px;
            background:#424954;
            margin-right: 24px;
        }

        .main__content .formation--title {
            width: 100%;
        }

        .main__content .formation--title__title {
            display: inline-block;
            vertical-align: middle;
            width: 35%;
        }

        .main__content .formation--title__date {
            display: inline-block;
            vertical-align: middle;
            font-size: 14px;
            width: 56%;
            text-align: right;
        }

        .main__content .italic-small {
            padding-left: 44px;
            font-weight: 600;
            font-style: italic;
        }

        .main__content .educ-description {
            padding-left: 44px;
            text-align: justify;
        }

        .main__content .section__wrapper {
            margin-bottom: 30px;
        }

        .main__content table tr.no-padding {
            padding-left: 0;
        }

        .hobbie--td--first {
            padding-top: 12px !important;
            padding-bottom: 4px !important;
        }

        .hobbie--td {
            padding-bottom: 4px !important;
            padding-top: 0px !important;
        }

        .table-cell.big--square--cell {
            width: 56px;
        }

        .list-comps .table-row.label-educ .table-cell {
            padding-bottom: 16px;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="top" style="background: {{ $color['primary'] }}">
            <div class="container-fluid top--wrapper">
                <div class="avatar">
                    <div class="table">
                        <div class="table-row">
                            <div class="table-cell">
                                @if ($cv->cvphoto !== null)
                                    <img src="{{ asset('cvphoto/'.$cv->cvphoto) }}" alt="Avatar">
                                @endif 
                                <div class="name">
                                    {{ $cv_basics->makingcv_name }}
                                </div> 
                            </div>
                            <div class="table-cell description">
                                {{ $cv->description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table">
            <div class="table-row">
                <div class="table-cell main__content--cell">
                    <div class="main__content">
                        @if ($cv_xps != null)
                            <section class="xp section__wrapper">
                                <div class="bandeau">
                                    <div class="table">
                                        <div class="table-row">
                                            <div class="table-cell big--square--cell">
                                                <div class="big--square" style="background: {{ $color['primary'] }};"></div>
                                            </div>
                                            <div class="table-cell">
                                                {{ __('translations.pdf.bandeau.xp') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lists-xps">
                                    <div class="table-data">
                                        <div class="table">
                                            @foreach ($cv_xps as $key => $cv_xp)
                                                <div class="table-row">
                                                    <div class="table-cell label-educ">
                                                        <div class="wsquare--main-content">
                                                            <span class="little--square" style="background: {{ $color['primary'] }};"></span>
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
                                    <div class="table">
                                        <div class="table-row">
                                            <div class="table-cell big--square--cell">
                                                <div class="big--square" style="background: {{ $color['primary'] }};"></div>
                                            </div>
                                            <div class="table-cell">
                                                {{ __('translations.pdf.bandeau.formation') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lists-formations">
                                    <div class="table-data">
                                        <div class="table">
                                            @foreach ($cv_educs as $key => $cv_educ)
                                                <div class="table-row">
                                                    <div class="table-cell label-educ">
                                                        <div class="wsquare--main-content">
                                                            <span class="little--square" style="background: {{ $color['primary'] }};"></span>
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
                <div class="table-cell secondary__content--cell">
                    <div class="secondary__content">
                        <div class="personal-data section__wrapper">
                            <div class="bandeau" style="background: {{ $color['primary'] }};">
                                {{ __('translations.pdf.barkley.personal-data') }}
                            </div>
                            <div class="lists-infos-perso">
                                <div class="infos-perso__card">
                                    <p>
                                        <strong>
                                            {{ __('translations.pdf.barkley.name') }}
                                        </strong>
                                    </p>
                                    <p>
                                        {{ $cv_basics->makingcv_name }}
                                    </p>
                                </div>
                                <div class="infos-perso__card">
                                    <p>
                                        <strong>
                                            {{ __('translations.pdf.barkley.address') }}
                                        </strong>
                                    </p>
                                    <p>
                                        {{ $cv_basics->makingcv_address }}
                                        <br>
                                        {{ $cv_basics->makingcv_zipcode }}
                                        {{ $cv_basics->makingcv_city }}
                                    </p>
                                </div>
                                <div class="infos-perso__card">
                                    <p>
                                        <strong>
                                            {{ __('translations.pdf.barkley.tel_number') }}
                                        </strong>
                                    </p>
                                    <p>
                                        {{ $cv_basics->makingcv_phone }}
                                    </p>
                                </div>
                                <div class="infos-perso__card">
                                    <p>
                                        <strong>
                                            {{ __('translations.pdf.barkley.email') }}
                                        </strong>
                                    </p>
                                    <p>
                                        {{ $cv_basics->makingcv_email }}
                                    </p>
                                </div>
                                @if (isset($cv_basics->makingcv_birthdate))
                                    <div class="infos-perso__card">
                                        <p>
                                            <strong>
                                                {{ __('translations.pdf.barkley.birthdate') }}
                                            </strong>
                                        </p>
                                        <p>
                                            @if (app()->getLocale() == 'fr')
                                                {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                            @elseif(app()->getLocale() == "en")
                                                {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                            @elseif(app()->getLocale() == "es")
                                                {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                            @endif
                                        </p>
                                    </div>
                                @endif
                                @if (isset($cv_basics->makingcv_birthplace))
                                    <div class="infos-perso__card">
                                        <p>
                                            <strong>
                                                {{ __('translations.pdf.barkley.birthplace') }}
                                            </strong>
                                        </p>
                                        <p>
                                            {{ $cv_basics->makingcv_birthplace }}
                                        </p>
                                    </div>
                                @endif
                                @if (isset($cv_basics->makingcv_gender))
                                    <div class="infos-perso__card">
                                        <p>
                                            <strong>
                                                {{ __('translations.pdf.barkley.gender') }}
                                            </strong>
                                        </p>
                                        <p>
                                            {{ $cv_basics->makingcv_gender }}
                                        </p>
                                    </div>
                                @endif
                                @if (isset($cv_basics->makingcv_drivinglicenses))
                                    <div class="infos-perso__card">
                                        <p>
                                            <strong>
                                                {{ __('translations.pdf.barkley.permis') }}
                                            </strong>
                                        </p>
                                        <p>
                                            {{ $cv_basics->makingcv_drivinglicenses }}
                                        </p>
                                    </div>
                                @endif
                                @if (isset($cv_basics->makingcv_linkedin))
                                    <div class="infos-perso__card">
                                        <p>
                                            <strong>
                                                {{ __('translations.pdf.barkley.linkedin') }}
                                            </strong>
                                        </p>
                                        <p>
                                            {{ $cv_basics->makingcv_linkedin }}
                                        </p>
                                    </div>
                                @endif
                                @if (isset($cv_basics->makingcv_website))
                                    <div class="infos-perso__card">
                                        <p>
                                            <strong>
                                                {{ __('translations.pdf.barkley.website') }}
                                            </strong>
                                        </p>
                                        <p>
                                            {{ $cv_basics->makingcv_website }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
        
                        @if ($cv_comps != null)
                            <section class="comp section__wrapper">
                                <div class="bandeau" style="background: {{ $color['primary'] }};">
                                    {{ __('translations.pdf.bandeau.comp') }}
                                </div>
                                <div class="list-comps">
                                    <div class="table-data">
                                        <div class="table">
                                            @foreach ($cv_comps as $key => $cv_comp)
                                                <div class="table-row label-educ">
                                                    <div class="table-cell data__title">{{ $cv_comp->contentcv_comp_name }}</div>
                                                    <div class="table-cell data progress__bar">
                                                        <div class="my__progress">
                                                            <div class="my__bar"
                                                            @if ($cv_comp->contentcv_comp_level == 25)
                                                                style="width: 25%; background: {{ $color['primary'] }};"
                                                            @elseif($cv_comp->contentcv_comp_level == 50)
                                                                style="width: 50%; background: {{ $color['primary'] }};"
                                                            @elseif($cv_comp->contentcv_comp_level == 75)
                                                                style="width: 75%; background: {{ $color['primary'] }}; "
                                                            @elseif($cv_comp->contentcv_comp_level == 100)
                                                                style="width: 100%; background: {{ $color['primary'] }};"
                                                            @endif
                                                            ></div>
                                                        </div>
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
                                <div class="bandeau" style="background: {{ $color['primary'] }};">
                                    {{ __('translations.pdf.bandeau.langs') }}
                                </div>
                                <div class="list-langs">
                                    <div class="table-data">
                                        <div class="table">
                                            @foreach ($cv_langs as $key => $cv_lang)
                                                <div class="table-row">
                                                    <div class="table-cell td-align-right td-strong">
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
                                <div class="bandeau" style="background: {{ $color['primary'] }};">
                                    {{ __('translations.pdf.bandeau.refs') }}
                                </div>
                                <div class="list-refs">
                                    <div class="table-data">
                                        <div class="table">
                                            @foreach ($cv_refs as $key => $cv_ref)
                                                <div class="table-row">
                                                    <div class="table-cell td-align-right td-strong">
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
                                <div class="bandeau" style="background: {{ $color['primary'] }}; margin-bottom: 16px;">
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>

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

    <style media="all" type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');
        * {
            margin:0;
            padding:0
        }
        
        body {
            width:26.25cm;
            height:38.5cm;
            font-size: 14px;
        }
        p {
            margin-bottom: 0;
        }
        .page {
            height: 100%;
            background: white;
        }
        .table .table {
            background: transparent;
        }
        .table { 
            display: table; 
            width: 100%; 
            height: 100%;
            border-collapse: collapse; 
            margin-bottom: 0;
        }
        .table-row { 
            display: table-row; 
        }

        .table-cell { 
            display: table-cell;
        }
        .presentation-perso__stanford--cell {
            width: 33.3333%;
            height: 100%;
            vertical-align: top;
        }
        .presentation-content__stanford--cell {
            width: 66.6666%;
            vertical-align: top;
        }
        .presentation-perso__stanford {
            background-color: #424954;
            height: 100%;
            padding: 24px;
            color: #fff;
        }
        .presentation-perso__stanford .table{
            color: #fff;
        }
        .presentation-perso__stanford .avatar {
            width: 75%;
            margin: auto;
            margin-bottom: 24px;
        }
        .presentation-perso__stanford .avatar img {
            width: 100%;
            height: auto;
            border-radius: 50%;
        }
        .presentation-perso__stanford .bandeau {
            position: relative;
            margin-bottom: 24px;
            font-size: 18px;
            font-weight: 600;
            height: 40px;
        }
        .presentation-perso__stanford .bandeau:after {
            content: "";
            display: block;
            height: 1px;
            background: #fff;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .presentation-perso__stanford {
            font-size: 14px;
        }
        .infos-perso__card {
            margin-bottom: 16px;
        }
        .infos-perso__card:last-child {
            margin-bottom: 0;
        }
        .list-hobbies .table-data tr {
            display: block;
            margin-bottom: 8px;
        }
        .presentation-perso__stanford .section__wrapper {
            margin-bottom: 48px;
        }
        .presentation-content__stanford .section__wrapper {
            margin-bottom: 24px;
        }
        .td-align-right {
            text-align: right;
        }
        .td-strong {
            font-weight: 600;
        }
        .presentation-perso__stanford .data {
            width: 100%;
            text-align: right;
        }
        .list-langs .table-data table {
            width: 100%;
        }
        .list-langs .table-data tr {
            display: block;
            width: 100%;
            margin-bottom: 8px;
        }
        .presentation-content__stanford {
            color: #424954;
            padding: 16px 24px;
        }
        .presentation-content__stanford .user-name {
            font-weight: 600;
            font-size: 28px;
            padding-bottom: 16px;
            border-bottom: 1px solid #ddd;
        }
        .presentation-content__stanford .description {
            padding: 16px 0 24px;
        }
        .presentation-content__stanford .bandeau {
            padding-bottom: 8px;
            margin-bottom: 16px;
            border-bottom: 1px solid #ddd;
            font-size: 20px;
            font-weight: 600;
        }
        .formation--title {
            display: block;
        }
        .formation--title .formation--title__title {
            display: inline-block;
            width: 33%;
            font-weight: 600;
            color: #424954;
            font-size: 16px;
        }
        .formation--title .formation--title__date {
            display: inline-block;
            width: 66%;
            color: #424954;
            text-align: right;
        }
        .italic-small {
            font-style: italic;
            margin-bottom: 4px;
        }
        .label-educ {
            display: block;
            margin-bottom: 16px;
        }
        .data {
            padding-left: 48px;
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
            width: 300px;
        }
        .data__title {
            font-weight: 600;
        }
        .list-comps .label-educ:last-child {
            margin-bottom: 24px;
        }
        .comp--title {
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="table">
            <div class="table-row">
                <div class="table-cell presentation-perso__stanford--cell">
                    <div class="presentation-perso__stanford" style="background-color: {{ $color['primary'] }};">
                        <div class="avatar">
                            @if ($cv->cvphoto !== null)
                                <img src="{{ asset('cvphoto/'.$cv->cvphoto) }}" alt="Avatar">
                            @endif 
                        </div>
        
                        <div class="personal-data section__wrapper">
                            <div class="bandeau">
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
        
                        @if ($cv_hobbies != null)
                            <div class="hobbies section__wrapper">
                                <div class="bandeau">
                                    {{ __('translations.pdf.bandeau.hobbies') }}
                                </div>
                                <div class="list-hobbies">
                                    <div class="table-data">
                                        <div class="table">
                                            @foreach ($cv_hobbies as $key => $cv_hobby)
                                                <div class="table-row">
                                                    <div class="table-cell">
                                                        {{ $cv_hobby->contentcv_hobbies_hobby }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
        
                        @if ($cv_langs != null)
                            <div class="langs section__wrapper">
                                <div class="bandeau">
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
                                <div class="bandeau">
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
                    </div>
                </div>
                <div class="table-cell presentation-content__stanford--cell">
                    <div class="presentation-content__stanford">
                        <div class="user-name" style="color: {{ $color['primary'] }};">
                            {{ $cv_basics->makingcv_name }}
                        </div>
        
                        <div class="description">
                            {{ $cv->description }}
                        </div>
        
                        <div class="formations">
                            @if ($cv_educs != null)
                                <section class="formations section__wrapper">
                                    <div class="bandeau" style="color: {{ $color['primary'] }};">
                                        {{ __('translations.pdf.bandeau.formation') }}
                                    </div>
                                    <div class="lists-formations">
                                        <div class="table-data table-data-content">
                                            <div class="table">
                                                @foreach ($cv_educs as $key => $cv_educ)
                                                    <div>
                                                        <div class="label-educ">
                                                            <div class="formation--title">
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
        
                        <div class="xp">
                            @if ($cv_xps != null)
                                <section class="xp section__wrapper">
                                    <div class="bandeau" style="color: {{ $color['primary'] }};">
                                        {{ __('translations.pdf.bandeau.xp') }}
                                    </div>
                                    <div class="lists-xps">
                                        <div class="table-data">
                                            <div class="table">
                                                @foreach ($cv_xps as $key => $cv_xp)
                                                    <div>
                                                        <div class="label-educ">
                                                            <div class="formation--title">
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
                                                            <div class="educ-description"> 
                                                                {!! nl2br($cv_xp->contentcv_xp_description) !!}
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
        
                        <div class="comp">
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
                                                        <div class="table-cell data__title comp--title">{{ $cv_comp->contentcv_comp_name }}</div>
                                                        <div class="table-cell data progress__bar">
                                                            <div class="my__progress">
                                                                <div class="my__bar"
                                                                @if ($cv_comp->contentcv_comp_level == 25)
                                                                    style="width: 25%;"
                                                                @elseif($cv_comp->contentcv_comp_level == 50)
                                                                    style="width: 50%;"
                                                                @elseif($cv_comp->contentcv_comp_level == 75)
                                                                    style="width: 75%;"
                                                                @elseif($cv_comp->contentcv_comp_level == 100)
                                                                    style="width: 100%;"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


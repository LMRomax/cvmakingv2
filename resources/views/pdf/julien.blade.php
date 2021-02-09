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

        .page {
            background: white;
        }

        .top {
            background: #424954;
            height: 200px;
            overflow: hidden;
            padding: 24px;
        }

        .top .top--wrapper {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            height: 100%;
        }

        .top .avatar {
            width: 25%;
            text-align: center;
            margin-right: 24px;
        }

        .top .avatar img {
            width: 120px;
            border-radius: 50%;
            margin-bottom: 8px;
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
        }

        .content {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
        }

        .main__content {
            width: 66.6666%;
            background: #fff;
            height: 100vh;
            padding: 24px;
        }

        .secondary__content {
            width: 33.3333%;
            background: #e9e9e9;
            height: 100vh;
            padding: 24px;
        }

        .secondary__content .bandeau {
            background: #424954;
            color: #fff;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 2px;
            margin-bottom: 16px;
        }

        .lists-infos-perso {
            margin-bottom: 24px;
        }

        .lists-infos-perso .infos-perso__card p:first-child {
            margin-bottom: 0;
        }

        .lists-infos-perso .infos-perso__card:last-child p:last-child {
            margin-bottom: 0;
        }

        .secondary__content .section__wrapper {
            margin-bottom: 32px;
        }

        .secondary__content .comp .data__title {
            display: block;
            font-weight: 600;
            margin-right: 24px;
            width: 72px;
        }

        .secondary__content .td-strong {
            display: block;
            font-weight: 600;
            margin-right: 24px;
            width: 72px;
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
        }

        .main__content .bandeau {
            font-weight: 600;
            color: #424954;
            display: flex;
            flex-direction: row;
            align-items: center;
            font-size: 24px;
            margin-bottom: 24px;
        }

        .main__content .bandeau .big--square {
            width:32px;
            height:32px;
            background:#424954;
            margin-right: 24px;
        }
        
        .main__content table tr {
            display: block;
            padding-left: 32px;
            margin-bottom: 24px;
        }

        .main__content table tr:last-child {
            margin-bottom: 0;
        }

        .main__content .label-educ .little--square{
            width:16px;
            height:16px;
            background:#424954;
            margin-right: 24px;
        }

        .main__content .formation--title {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .main__content .wsquare--main-content {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .main__content .formation--title__date {
            font-size: 14px;
        }

        .main__content .italic-small {
            padding-left: 40px;
            font-weight: 600;
            font-style: italic;
        }

        .main__content .educ-description {
            padding-left: 40px;
            text-align: justify;
        }

        .main__content .section__wrapper {
            margin-bottom: 48px;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="top" style="background: {{ $color['primary'] }}">
            <div class="container-fluid top--wrapper">
                <div class="avatar">
                    @if ($cv->cvphoto !== null)
                        <img src="{{ asset('cvphoto/'.$cv->cvphoto) }}" alt="Avatar">
                    @endif
                    <div class="name">
                        {{ $cv_basics->makingcv_name }}
                    </div>
                </div>

                <div class="description">
                    {{ $cv->description }}
                </div>
            </div>
        </div>
        <div class="content">
            <div class="main__content">
                @if ($cv_xps != null)
                    <section class="xp section__wrapper">
                        <div class="bandeau">
                            <div class="big--square" style="background: {{ $color['primary'] }};"></div> {{ __('translations.pdf.bandeau.xp') }}
                        </div>
                        <div class="lists-xps">
                            <div class="table-data">
                                <table>
                                    @foreach ($cv_xps as $key => $cv_xp)
                                        <tr>
                                            <td class="label-educ">
                                                <div class="wsquare--main-content">
                                                    <div class="little--square" style="background: {{ $color['primary'] }};"></div>

                                                    <div class="formation--title">
                                                        <div class="formation--title__title">
                                                            {{ $cv_xp->contentcv_xp_poste }}
                                                        </div>
                                                        <div class="formation--title__date">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <p class="italic-small">
                                                    {{ $cv_xp->contentcv_xp_employer }},
                                                    {{ $cv_xp->contentcv_xp_city }}
                                                </p>
                                                <div class="educ-description"> {!!
                                                    nl2br($cv_xp->contentcv_xp_description) !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </section>
                @endif

                @if ($cv_educs != null)
                    <section class="formations section__wrapper">
                        <div class="bandeau">
                            <div class="big--square" style="background: {{ $color['primary'] }};"></div> 
                            {{ __('translations.pdf.bandeau.formation') }}
                        </div>
                        <div class="lists-formations">
                            <div class="table-data table-data-content">
                                <table>
                                    @foreach ($cv_educs as $key => $cv_educ)
                                        <tr>
                                            <td class="label-educ">
                                                <div class="wsquare--main-content">
                                                    <div class="little--square" style="background: {{ $color['primary'] }};"></div>
                                                    <div class="formation--title">
                                                        <div class="formation--title__title">
                                                            {{ $cv_educ->contentcv_educ_formation }}
                                                        </div>
                                                        <div class="formation--title__date">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="italic-small">
                                                    {{ $cv_educ->contentcv_educ_city }} -
                                                    {{ $cv_educ->contentcv_educ_institution }}
                                                </p>
                                                <div class="educ-description">
                                                    {!! nl2br($cv_educ->contentcv_educ_description) !!}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </section>
                @endif
            </div>
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
                                <table>
                                    @foreach ($cv_comps as $key => $cv_comp)
                                        <tr class="label-educ">
                                            <td class="data__title">{{ $cv_comp->contentcv_comp_name }}</td>
                                            <td class="data progress__bar">
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
                                <table>
                                    @foreach ($cv_langs as $key => $cv_lang)
                                        <tr>
                                            <td class="td-align-right td-strong">
                                                {{ $cv_lang->contentcv_lang_name }}
                                            </td>
                                            <td class="data">
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
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($cv_hobbies != null)
                    <div class="hobbies section__wrapper">
                        <div class="bandeau" style="background: {{ $color['primary'] }};">
                            {{ __('translations.pdf.bandeau.hobbies') }}
                        </div>
                        <div class="list-hobbies">
                            <div class="table-data">
                                <table>
                                    @foreach ($cv_hobbies as $key => $cv_hobby)
                                        <tr>
                                            <td>{{ $cv_hobby->contentcv_hobbies_hobby }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="bottom">

        </div>
    </div>
</body>
<html>

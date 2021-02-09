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

setlocale(LC_ALL, app()->getLocale() . '_' . strtoupper(app()->getLocale()));
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
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');

        :root {
            --blue: rgb(64, 102, 146);
            --green: rgb(72, 99, 76);
            --mauve: rgb(123, 53, 95);
            --red: rgb(171, 61, 73);
            --black: rgb(51, 51, 53);
        }

        p {
            margin-bottom: 0;
        }

        .page {
            background: white;
            padding: 48px 72px;
        }

        .avatar-name {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 24px;
            color: #424954;
        }

        .avatar-name img {
            width: 128px;
            height: 128px;
            border-radius: 50%;
            margin-right: 16px;
        }

        .name {
            font-size: 32px;
            font-weight: 600;
        }

        .description {
            padding: 24px 0px;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        .section__wrapper {
            padding-top: 24px;
            padding-bottom: 24px;
            border-bottom: 1px solid #ddd;
        }

        .section__wrapper:last-child {
            border-bottom: none;
        }

        .bandeau {
            background: transparent;
            text-transform: uppercase;
            margin-bottom: 24px;
            font-size: 24px;
            font-weight: 600;
            color: #424954;
        }

        .data {
            font-weight: 600;
        }

        .personal-data .table-data td {
            padding-bottom: 16px;
        }

        .td-align-right {
            text-align: right;
            padding-right: 32px;
            width: 275px;
            vertical-align: top;
        }

        .educ-wrapper {
            margin-bottom: 32px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .italic-small {
            font-style: 16px;
            font-style: italic;
            margin-bottom: 8px;
        }

        .table-data-content tr {
            display: block;
            margin-bottom: 24px;
        }

        @media screen and (max-width: 576px) {
            .page {
                transform: scale(.5);
            }
        }

    </style>
</head>

<body>
    <div class="page">
        <div class="avatar-name" style="color: {{ $color['primary'] }}">
            @if ($cv->cvphoto !== null)
                <img src="{{ asset('cvphoto/' . $cv->cvphoto) }}" alt="Avatar">
            @endif
            <div class="name">
                {{ $cv_basics->makingcv_name }}
            </div>
        </div>
        <div class="description">
            {{ $cv->description }}
        </div>

        <section class="personal-data section__wrapper">
            <div class="bandeau" style="color: {{ $color['primary'] }}">
                {{ __('translations.pdf.barkley.personal-data') }}
            </div>
            <div class="lists-infos-perso">
                <div class="table-data">
                    <table>
                        <tr>
                            <td class="td-align-right">{{ __('translations.pdf.barkley.name') }}</td>
                            <td class="data">{{ $cv_basics->makingcv_name }}</td>
                        </tr>
                        <tr>
                            <td class="td-align-right">{{ __('translations.pdf.barkley.address') }}</td>
                            <td class="data">
                                {{ $cv_basics->makingcv_address }}
                                <br>
                                {{ $cv_basics->makingcv_zipcode }}
                                {{ $cv_basics->makingcv_city }}
                            </td>
                        </tr>
                        <tr>
                            <td class="td-align-right">{{ __('translations.pdf.barkley.tel_number') }}</td>
                            <td class="data">{{ $cv_basics->makingcv_phone }}</td>
                        </tr>
                        <tr>
                            <td class="td-align-right">{{ __('translations.pdf.barkley.email') }}</td>
                            <td class="data">{{ $cv_basics->makingcv_email }}</td>
                        </tr>
                        @if (isset($cv_basics->makingcv_birthdate))
                            <tr>
                                <td class="td-align-right">{{ __('translations.pdf.barkley.birthdate') }}</td>
                                <td class="data">
                                    @if (app()->getLocale() == 'fr')
                                        {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                    @elseif(app()->getLocale() == "en")
                                        {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                    @elseif(app()->getLocale() == "es")
                                        {{ date('d/m/Y', strtotime($cv_basics->makingcv_birthdate)) }}
                                    @endif
                                </td>
                            </tr>
                        @endif
                        @if (isset($cv_basics->makingcv_birthplace))
                            <tr>
                                <td class="td-align-right">{{ __('translations.pdf.barkley.birthplace') }}</td>
                                <td class="data">{{ $cv_basics->makingcv_birthplace }}</td>
                            </tr>
                        @endif
                        @if (isset($cv_basics->makingcv_gender))
                            <tr>
                                <td class="td-align-right">{{ __('translations.pdf.barkley.gender') }}</td>
                                <td class="data">{{ $cv_basics->makingcv_gender }}</td>
                            </tr>
                        @endif
                        @if (isset($cv_basics->makingcv_drivinglicenses))
                            <tr>
                                <td class="td-align-right">{{ __('translations.pdf.barkley.permis') }}</td>
                                <td class="data">{{ $cv_basics->makingcv_drivinglicenses }}</td>
                            </tr>
                        @endif
                        @if (isset($cv_basics->makingcv_linkedin))
                            <tr>
                                <td class="td-align-right">{{ __('translations.pdf.barkley.linkedin') }}</td>
                                <td class="data">{{ $cv_basics->makingcv_linkedin }}</td>
                            </tr>
                        @endif
                        @if (isset($cv_basics->makingcv_website))
                            <tr>
                                <td class="td-align-right">{{ __('translations.pdf.barkley.website') }}</td>
                                <td class="data">{{ $cv_basics->makingcv_website }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </section>

        @if ($cv_educs != null)
            <section class="formations section__wrapper">
                <div class="bandeau" style="color: {{ $color['primary'] }}">
                    {{ __('translations.pdf.bandeau.formation') }}
                </div>
                <div class="lists-formations">
                    <div class="table-data table-data-content">
                        <table>
                            @foreach ($cv_educs as $key => $cv_educ)
                                <tr>
                                    <td class="td-align-right date-educ">
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
                                    </td>
                                    <td class="label-educ">
                                        <p><strong>{{ $cv_educ->contentcv_educ_formation }}</strong></p>
                                        <p class="italic-small">{{ $cv_educ->contentcv_educ_city }} -
                                            {{ $cv_educ->contentcv_educ_institution }}
                                        </p>
                                        <div class="educ-description">{!! nl2br($cv_educ->contentcv_educ_description)
                                            !!}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>
        @endif

        @if ($cv_xps != null)
            <section class="xp section__wrapper">
                <div class="bandeau" style="color: {{ $color['primary'] }}">
                    {{ __('translations.pdf.bandeau.xp') }}
                </div>
                <div class="lists-xps">
                    <div class="table-data table-data-content">
                        <table>
                            @foreach ($cv_xps as $key => $cv_xp)
                                <tr>
                                    <td class="td-align-right date-educ">
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
                                    </td>
                                    <td>
                                        <p><strong>{{ $cv_xp->contentcv_xp_poste }}</strong></p>
                                        <p class="italic-small">
                                            {{ $cv_xp->contentcv_xp_employer }},
                                            {{ $cv_xp->contentcv_xp_city }}
                                        </p>
                                        <div class="educ-description"> {!! nl2br($cv_xp->contentcv_xp_description) !!}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>
        @endif

        @if ($cv_comps != null)
            <section class="comp section__wrapper">
                <div class="bandeau" style="color: {{ $color['primary'] }}">
                    {{ __('translations.pdf.bandeau.comp') }}
                </div>
                <div class="list-comps">
                    <div class="table-data">
                        <table>
                            @foreach ($cv_comps as $key => $cv_comp)
                                <tr>
                                    <td class="td-align-right date-educ">{{ $cv_comp->contentcv_comp_name }}</td>
                                    <td class="data">
                                        @if ($cv_comp->contentcv_comp_level == 25)
                                            {{ __('translations.contentcv.elementary') }}
                                        @elseif($cv_comp->contentcv_comp_level == 50)
                                            {{ __('translations.contentcv.middle') }}
                                        @elseif($cv_comp->contentcv_comp_level == 75)
                                            {{ __('translations.contentcv.good') }}
                                        @elseif($cv_comp->contentcv_comp_level == 100)
                                            {{ __('translations.contentcv.very_good') }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>
        @endif

        @if ($cv_langs != null)
            <section class="langs section__wrapper">
                <div class="bandeau" style="color: {{ $color['primary'] }}">
                    {{ __('translations.pdf.bandeau.langs') }}
                </div>
                <div class="list-langs">
                    <div class="table-data">
                        <table>
                            @foreach ($cv_langs as $key => $cv_lang)
                                <tr>
                                    <td class="td-align-right date-educ">
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
            </section>
        @endif

        @if ($cv_refs != null)
            <section class="refs section__wrapper">
                <div class="bandeau" style="color: {{ $color['primary'] }}">
                    {{ __('translations.pdf.bandeau.refs') }}
                </div>
                <div class="list-refs">
                    <div class="table-data">
                        <table>
                            @foreach ($cv_refs as $key => $cv_ref)
                                <tr>
                                    <td class="td-align-right date-educ">{{ $cv_ref->contentcv_ref_name }}</td>
                                    <td class="data">
                                        {{ $cv_ref->contentcv_ref_contact }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>
        @endif

        @if ($cv_hobbies != null)
            <section class="hobbies section__wrapper">
                <div class="bandeau" style="color: {{ $color['primary'] }}">
                    {{ __('translations.pdf.bandeau.hobbies') }}
                </div>
                <div class="list-hobbies">
                    <div class="table-data">
                        <table>
                            @foreach ($cv_hobbies as $key => $cv_hobby)
                                <tr>
                                    <td>{{ $cv_hobby->contentcv_hobbies_hobby }},</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </section>
        @endif
    </div>
</body>

</html>

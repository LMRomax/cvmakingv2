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

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <title>CV</title>

    <style>
        @import url('https://fonts.googleapis.com/css?family=PT+Sans');
        
        * {
            margin:0;
            padding:0
        }

        body {
            width: 210mm;
            height: 297mm;
            padding: 16px;
            font-size: 14px;
        }

        .page {
            width: 100%;
            background: white;
        }

        .table { 
            display: table; 
            width: 100%; 
            border-collapse: collapse; 
        }

        .table-row { 
            display: table-row; 
        }

        .table-cell { 
            display: table-cell;
            vertical-align: middle;
        }

        .table-cell.w-64 {
            width: 64px;
        }

        .table-cell.w-185 {
            width: 185px;
        }

        .avatar-name {
            margin-bottom: 32px;
            color: #424954;
        }

        .avatar-name img {
            width: 64px;
            height: 64px;
            border-radius: 50%;
        }

        .avatar-name .name {
            font-size: 32px;
            font-weight: 600;
            margin-left: 16px;
            color: #424954;
            margin-bottom: 0;
        }

        .description {
            font-size: 18px;
            width: 75%;
            margin-bottom: 32px;
        }

        .bandeau {
            background: #EDECEC;
            padding: 8px 16px;
            font-weight: 600;
            color: #424954;
            margin-bottom: 24px;
        }

        .bandeau i {
            margin-right: 8px;
        }

        .personal-data {
            margin-bottom: 16px;
        }

        .personal-data-row {
            margin-bottom: 16px;
        }

        .data {
            font-weight: 600;
            color: #3C3C3C;
            padding-bottom: 16px;
        }

        .data--present {
            width: 185px;
            padding-bottom: 16px;
            vertical-align: middle;
        }
    
        .table-data table td {
            min-width: 225px;
        }

        .educ-wrapper {
            display: block;
            margin-bottom: 24px;
        }

        .table-cell.formation--name {
            width: 66.6666%;
        }

        .table-cell.formation--name p {
            margin-bottom: 0;
        }

        .table-cell.formation--date {
            width: 33.3333%;
            text-align: right;
        }

        .table-cell.formation--location {
            margin-bottom: 8px;
        }

        .table-cell.formation--location p {
            margin-bottom: 8px;
            font-style: italic;
        }

        .table-cell.formation--description {
            text-align: justify;
        }

        .label-xp {
            width: 75%;
        }

        .label-xp p {
            margin-bottom: 0;
        }

        .xp-description {
            margin-top: 8px;
        }

        .date-xp {
            font-size: 14px;
        }

        .comp {
            margin-bottom: 24px;
        }

        .hobbies {
            margin-bottom: 24px;
        }

        .langs {
            margin-bottom: 24px;
        }

        .personal-data .table-data tr {
            display: block;
            margin-bottom: 8px;
        }

    </style>
</head>

<body>
    <div class="page">
        <div class="avatar-name">
            <div class="table">
                <div class="table-row">
                    <div class="table-cell w-64">
                        @if ($cv->cvphoto !== null)
                            <img src="{{ asset('cvphoto/' . $cv->cvphoto) }}" alt="Avatar">
                        @endif
                    </div>
                    <div class="table-cell">
                        <p class="name" style="color: {{ $color['primary'] }};">
                            {{ $cv_basics->makingcv_name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="description">
            {{ $cv->description }}
        </div>

        <section class="personal-data">
            <div class="bandeau" style="color: {{ $color['primary'] }};">
                <i class="fas fa-user-friends"></i> {{ __('translations.pdf.barkley.personal-data') }}
            </div>
            <div class="table-data">
                <div class="table">
                    <div class="table-row personal-data-row">
                        <div class="table-cell data--present">
                            {{__('translations.pdf.barkley.name') }}
                        </div>
                        <div class="table-cell data">
                            {{ $cv_basics->makingcv_name }}
                        </div>
                    </div>
                    <div class="table-row personal-data-row">
                        <div class="table-cell data--present">
                            {{__('translations.pdf.barkley.address') }}
                        </div>
                        <div class="table-cell data">
                            {{ $cv_basics->makingcv_address }}
                            <br />
                            {{ $cv_basics->makingcv_zipcode }}
                            {{ $cv_basics->makingcv_city }}
                        </div>
                    </div>
                    <div class="table-row personal-data-row">
                        <div class="table-cell data--present">
                            {{__('translations.pdf.barkley.tel_number') }}
                        </div>
                        <div class="table-cell data">
                            {{ $cv_basics->makingcv_phone }}
                        </div>
                    </div>
                    <div class="table-row personal-data-row">
                        <div class="table-cell data--present">
                            {{__('translations.pdf.barkley.email') }}
                        </div>
                        <div class="table-cell data">
                            {{ $cv_basics->makingcv_email }}
                        </div>
                    </div>
                    @if (isset($cv_basics->makingcv_birthdate))
                        <div class="table-row personal-data-row">
                            <div class="table-cell data--present">
                                {{__('translations.pdf.barkley.birthdate') }}
                            </div>
                            <div class="table-cell data-row">
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
                        <div class="table-row personal-data-row">
                            <div class="table-cell data--present">
                                {{__('translations.pdf.barkley.birthplace') }}
                            </div>
                            <div class="table-cell data">
                                {{ $cv_basics->makingcv_birthplace }}
                            </div>
                        </div>
                    @endif
                    @if (isset($cv_basics->makingcv_gender))
                        <div class="table-row personal-data-row">
                            <div class="table-cell data--present">
                                {{__('translations.pdf.barkley.gender') }}
                            </div>
                            <div class="table-cell data">
                                {{ $cv_basics->makingcv_gender }}
                            </div>
                        </div>
                    @endif
                    @if (isset($cv_basics->makingcv_drivinglicenses))
                        <div class="table-row personal-data-row">
                            <div class="table-cell data--present">
                                {{__('translations.pdf.barkley.permis') }}
                            </div>
                            <div class="table-cell data">
                                {{ $cv_basics->makingcv_drivinglicenses }}
                            </div>
                        </div>
                    @endif
                    @if (isset($cv_basics->makingcv_linkedin))
                        <div class="table-row personal-data-row">
                            <div class="table-cell data--present">
                                {{__('translations.pdf.barkley.linkedin') }}
                            </div>
                            <div class="table-cell data">
                                {{ $cv_basics->makingcv_linkedin }}
                            </div>
                        </div>
                    @endif
                    @if (isset($cv_basics->makingcv_website))
                        <div class="table-row personal-data-row">
                            <div class="table-cell data--present">
                                {{__('translations.pdf.barkley.website') }}
                            </div>
                            <div class="table-cell data"></div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        @if ($cv_educs != null)
            <section class="formations">
                <div class="bandeau" style="color: {{ $color['primary'] }};">
                    <i class="fas fa-graduation-cap"></i> {{ __('translations.pdf.bandeau.formation') }}
                </div>
                <div class="lists-formations">
                    <div class="table">
                        @foreach ($cv_educs as $key => $cv_educ)
                            <div class="educ-wrapper">
                                <div class="table-row">
                                    <div class="table-cell formation--name">
                                        <p>
                                            <strong>
                                                {{ $cv_educ->contentcv_educ_formation }}
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="table-cell formation--date">
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
                                <div class="table-row">
                                    <div class="table-cell formation--location">
                                        <p class="italic-small">{{ $cv_educ->contentcv_educ_city }} -
                                            {{ $cv_educ->contentcv_educ_institution }}
                                        </p>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="table-cell formation--description">
                                        <div class="educ-description">{!! nl2br($cv_educ->contentcv_educ_description)
                                            !!}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if ($cv_xps != null)
            <section class="xp">
                <div class="bandeau" style="color: {{ $color['primary'] }};">
                    <i class="fas fa-briefcase"></i> {{ __('translations.pdf.bandeau.xp') }}
                </div>

                <div class="lists-formations">
                    <div class="table">
                        @foreach ($cv_xps as $key => $cv_xp)
                            <div class="educ-wrapper">
                                <div class="table-row">
                                    <div class="table-cell formation--name">
                                        <p>
                                            <strong>
                                                {{ $cv_xp->contentcv_xp_employer }}
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="table-cell formation--date">
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
                                <div class="table-row">
                                    <div class="table-cell formation--location">
                                        <p class="italic-small">
                                            {{ $cv_xp->contentcv_xp_employer }} - {{ $cv_xp->contentcv_xp_city }}
                                        </p>
                                    </div>
                                </div>
                                <div class="table-row">
                                    <div class="table-cell formation--description">
                                        <div class="educ-description">
                                            {!! nl2br($cv_xp->contentcv_xp_description) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                     </div>
                </div>
            </section>
        @endif

        @if ($cv_comps != null)
            <section class="comp">
                <div class="bandeau" style="color: {{ $color['primary'] }};">
                    <i class="fas fa-star"></i> {{ __('translations.pdf.bandeau.comp') }}
                </div>
                <div class="list-comps">
                    <div class="table-data">
                        <div class="table">
                            <div>
                                @foreach ($cv_comps as $key => $cv_comp)
                                    <div class="table-row">
                                        <div class="table-cell w-185">{{ $cv_comp->contentcv_comp_name }}</div>
                                        <div class="table-cell data">
                                            @if ($cv_comp->contentcv_comp_level == 25)
                                                {{ __('translations.contentcv.elementary') }}
                                            @elseif($cv_comp->contentcv_comp_level == 50)
                                                {{ __('translations.contentcv.middle') }}
                                            @elseif($cv_comp->contentcv_comp_level == 75)
                                                {{ __('translations.contentcv.good') }}
                                            @elseif($cv_comp->contentcv_comp_level == 100)
                                                {{ __('translations.contentcv.very_good') }}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                         </div>
                    </div>
                </div>
            </section>
        @endif

        @if ($cv_hobbies != null)
            <section class="hobbies">
                <div class="bandeau" style="color: {{ $color['primary'] }};">
                    <i class="far fa-futbol"></i> {{ __('translations.pdf.bandeau.hobbies') }}
                </div>
                <div class="list-hobbies">
                    <div class="table-data">
                        <div class="table">
                            <div>
                                @foreach ($cv_hobbies as $key => $cv_hobby)
                                    <div class="table-row">
                                        <div class="table-cell">{{ $cv_hobby->contentcv_hobbies_hobby }}</div>
                                    </div>
                                @endforeach
                            </div>
                         </div>
                    </div>
                </div>
            </section>
        @endif

        @if ($cv_langs != null)
            <section class="langs">
                <div class="bandeau" style="color: {{ $color['primary'] }};">
                    <i class="fas fa-flag"></i> {{ __('translations.pdf.bandeau.langs') }}
                </div>
                <div class="list-langs">
                    <div class="table-data">
                        <div class="table">
                            <div>
                                @foreach ($cv_langs as $key => $cv_lang)
                                    <div class="table-row">
                                        <div class="table-cell w-185">
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
            </section>
        @endif

        @if ($cv_refs != null)
            <section class="refs">
                <div class="bandeau" style="color: {{ $color['primary'] }};">
                    <i class="fas fa-asterisk"></i> {{ __('translations.pdf.bandeau.refs') }}
                </div>
                <div class="list-refs">
                    <div class="table-data">
                        <div class="table">
                            <div>
                                @foreach ($cv_refs as $key => $cv_ref)
                                    <div class="table-row">
                                        <div class="table-cell w-185">{{ $cv_ref->contentcv_ref_name }}</div>
                                        <div class="table-cell data">
                                            {{ $cv_ref->contentcv_ref_contact }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                         </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
</body>

</html>

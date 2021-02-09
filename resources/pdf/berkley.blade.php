@php
    if ($layout['color'] ?? null != null) {
        $colors = [
            'primary' => $layout['color'],
            'secondary' => '#eee',
        ];
    } else {
        $colors = [
            'primary' => '#ab3d49',
            'secondary' => '#eee',
        ];
    }

    $font = $layout['font'] ?? 'PT Sans';
@endphp

<!doctype html>
<html lang="fr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CV</title>

    <style>

        @import url('https://fonts.googleapis.com/css?family={{ $font }}');

        body {
            font-family: '{{ $font }}', serif;
            font-size: .8em;
            padding: 50px;
        }

        .badge {
            position: absolute;
            top: 0px;
            right: 50px;
            text-align: center;
            font-size: 2.5em;
            padding: 20px;

            color: {{ $colors['primary'] }};
            background: {{ $colors['secondary'] }};
        }

        h1, h2, h3, h4, .h1, .h2, .h3, .h4, .block .header {
            color: {{ $colors['primary'] }};
        }

        h4, .h4 {
            font-size: 1.2em;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px 20px;
            background: {{ $colors['secondary'] }};
        }

        #avatar {
            height: 80px;
            width: 80px;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 50%;
        }

        .block .header {
            font-size: 1.2rem;
            font-weight: 700;
            padding: 0;
        }

        .block .body {
            padding: 0px;
            margin-bottom: 10px;
        }

        .block .highlight {
            text-align: left;
            font-size: 0.8em;
            padding: 3px;
            width: 170px;
            border-right: 1px solid #ccc;
        }

        .box {
            padding-bottom: 10px;
            text-align: justify;
        }
    </style>
  </head>

<body>

<div class="row no-gutters" id="main">
    <div class="col">
        <div class="row align-items-center mb-2">
            @isset($resume->contents['basics']['picture'])
                @php
                    try {
                        $storage = Storage::get($resume->contents['basics']['picture']);
                    } catch (\Exception $e) {
                        $storage = File::get(public_path('/img/avatar-placehold.png'));
                    }
                @endphp

                <div class="col-auto">
                    <div id="avatar" style="background-image: url(data:image/jpeg;base64,{!! base64_encode($storage) !!})"></div>
                </div>
            @endisset
            <div class="col">
                <h2>
                    {!! $resume->contents['basics']['name'] ?? '' !!}
                </h2>
            </div>
        </div>

        @isset($resume->contents['summary'])
            <p>
                {!! nl2br($resume->contents['summary']) ?? '' !!}
            </p>
        @endisset

        <h4><i class="fas fa-users"></i> @lang('app.creator.labels.profile.section_title')</h4>

        <table>
            <tr><td style="padding-right: 30px;">Nom</td><td><strong>{!! $resume->contents['basics']['name'] ?? '' !!}</strong></td></tr>
            <tr><td style="padding-right: 30px;">Adresse</td><td><strong>{!! $resume->contents['basics']['location']['address'] ?? '' !!}, {!! $resume->contents['basics']['location']['postalCode'] ?? '' !!} {!! $resume->contents['basics']['location']['city'] ?? '' !!}</strong></td></tr>
            <tr><td style="padding-right: 30px;">Téléphone</td><td><strong>{!! $resume->contents['basics']['phone'] ?? '' !!}</strong></td></tr>
            <tr><td style="padding-right: 30px;">Adresse e-mail</td><td><strong>{!! $resume->contents['basics']['email'] ?? '' !!}</strong></td></tr>
            @isset($resume->contents['basics']['dateOfBirth'])
                <tr><td style="padding-right: 30px;">Date de naissance</td><td><strong>{!! \Carbon\Carbon::parse($resume->contents['basics']['dateOfBirth'])->format('d/m/Y') !!}</strong></td></tr>
            @endisset
            @isset($resume->contents['basics']['drivingLicenses'])
                <tr><td style="padding-right: 30px;">Permis</td><td>
                    @php
                        $driving_licenses = $resume->contents['basics']['drivingLicenses'];
                        if (!is_array($resume->contents['basics']['drivingLicenses'])) $driving_licenses = [$resume->contents['basics']['drivingLicenses']];
                    @endphp
                    @foreach ($driving_licenses as $driving_licence)
                        {{ __('sources.driving_licences')[$driving_licence] }}<br>
                    @endforeach
                </td></tr>
            @endisset
        </table>

        <!-- TODO: Infos supplémentaires -->

        @if (count($resume->contents['works'] ?? []))
            <h4><i class="fas fa-briefcase"></i> @lang('app.creator.labels.works.section_title')</h4>

            <table style="width: 100%">
                @foreach($resume->contents['works'] ?? [] as $work)
                <tr>
                    <td>
                        <strong>{{ $work['position'] }}</strong><br>
                        {{ $work['company'] }} @if ($work['city'] ?? '' != '') ({!! $work['city'] ?? '' !!}) @endif

                        @isset($work['summary'])
                            <p class="mt-1 text-secondary">{!! nl2br($work['summary']) !!}</p>
                        @endisset
                    </td>

                    <td class="text-right" style="width: 200px;">
                        @php
                            $months = __('sources.months');

                            $start_date = explode('-', $work['startDate']);
                            $start = $months[$start_date[1]] . ' ' . $start_date[0];
                        @endphp

                        -

                        @if ($work['endDate'] == 'actual')
                            @lang('app.creator.labels.works.from_to_actual', [
                                'start' => $start
                            ])
                        @else
                            @php
                                $end_date = explode('-', $work['endDate']);
                                $end = $months[$end_date[1]] . ' ' . $end_date[0];
                            @endphp
                            @lang('app.creator.labels.works.from_to', [
                                'start' => $start,
                                'end' => $end
                            ])
                        @endif
                    </td>
                </tr>
            @endforeach
            </table>

        @endif

        @if (count($resume->contents['education'] ?? []))
        <h4><i class="fas fa-briefcase"></i> @lang('app.creator.labels.education.section_title')}</h4>

            <table style="width: 100%">
                @foreach($resume->contents['education'] ?? [] as $education)
                <tr>
                    <td>
                        <strong>{{ $education['area'] }}</strong><br>
                        {{ $education['institution'] }} @if ($education['city'] ?? '' != '') ({!! $education['city'] ?? '' !!}) @endif

                        @isset($education['summary'])
                            <p class="mt-1 text-secondary">{!! nl2br($education['summary']) !!}</p>
                        @endisset
                    </td>

                    <td class="text-right" style="width: 200px;">
                        @php
                            $months = __('sources.months');

                            $start_date = explode('-', $education['startDate']);
                            $start = $months[$start_date[1]] . ' ' . $start_date[0];
                        @endphp

                        -

                        @if ($education['endDate'] == 'actual')
                            @lang('app.creator.labels.education.from_to_actual', [
                                'start' => $start,
                            ])
                        @else
                            @php
                                $end_date = explode('-', $education['endDate']);
                                $end = $months[$end_date[1]] . ' ' . $end_date[0];
                            @endphp
                            @lang('app.creator.labels.education.from_to', [
                                'start' => $start,
                                'end' => $end
                            ])
                        @endif
                    </td>
                </tr>
            @endforeach
            </table>

        @endif

        <div class="row">

            @if (count($resume->contents['skills'] ?? []))
                <div class="col">
                    <h2 class="h4 text-uppercase">@lang('app.creator.labels.skills.section_title')</h2>
                    <table>
                        @foreach ($resume->contents['skills'] as $skill)
                            <tr>
                                <td style="padding-right: 70px;">
                                    <strong>{{ $skill['name'] }}</strong>
                                </td>
                                <td>
                                    @lang('sources.levels.' . $skill['level'])
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif

            @if (count($resume->contents['languages'] ?? []))
                <div class="col">
                    <h2 class="h4 text-uppercase">@lang('app.creator.labels.languages.section_title')</h2>
                    <table>
                        @foreach ($resume->contents['languages'] as $language)
                            <tr>
                                <td style="padding-right: 70px;">
                                    <strong>{{ $language['name'] }}</strong>
                                </td>
                                <td>
                                @lang('sources.language_levels.' . $language['level'])
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif

            @if (count($resume->contents['references'] ?? []))
                <div class="col">
                    <h2 class="h4 text-uppercase">@lang('app.creator.labels.references.section_title')</h2>
                    <table>
                        @foreach ($resume->contents['references'] as $reference)
                            <tr>
                                <td style="padding-right: 70px;">
                                    <strong>{{ $reference['name'] }}</strong>
                                </td>
                                <td>
                                    {{ $reference['reference'] }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif

            @if (count($resume->contents['interests'] ?? []))
                <div class="col">
                    <h2 class="h4 text-uppercase">@lang('app.creator.labels.interests.section_title')</h2>
                    <table>
                        @foreach ($resume->contents['interests'] as $interest)
                            <tr>
                                <td>
                                    <strong>{{ $interest['name'] }}</strong>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>
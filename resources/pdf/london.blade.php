@php
    if ($layout['color'] ?? null != null) {
        $colors = [
            'primary' => $layout['color'],
        ];
    } else {
        $colors = [
            'primary' => '#ffc209',
        ];
    }
@endphp

<!doctype html>
<html lang="fr"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CV</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=KoHo|Montserrat');

        body {
            font-family: 'KoHo', sans-serif;
            font-size: .8em;
        }

        h1, h2, h3, h4, .block .header {
            font-family: 'Montserrat', monospace;
        }

        body, #main {
            height: 1402px;
        }

        #sidebar {
            background: #eee;
            color: #333;
            border-left: 3px solid {{ $colors['primary'] }};
            box-shadow: 2px 2px 20px #d0d0d0;
        }

        #sidebar h1 {
            font-size: 1.5em;
            font-weight: 700;
            text-transform: uppercase;
        }

        #sidebar h2 {
            font-size: 1.2em;
        }

        h1>small, h2>small, h3>small {
            font-size: .8em;
        }

        #sidebar #avatar {
            width: 100%;
            height: 160px;
            display: block;
            margin: 20px auto;
            background: #ccc;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        #sidebar p {
            color: #222;
            text-align: justify;
        }

        #content {

        }

        #content .block {

        }

        .block .header {
            font-size: 1.2rem;
            margin: 15px 0;
            color: #555;
            padding: 5px;
            text-transform: uppercase;
            font-weight: 700;
            text-align: left;
        }

        .block .body {
            padding: 0px;
            margin-bottom: 10px;
        }

        .block .body:last-child {
            border-bottom: 0;
        }

        .block .highlight {
            text-align: left;
            font-size: 0.8em;
            color: #fff;
            padding: 3px;
            background: #343434;
            width: 170px;
            text-align: right;
        }

        .box {
            padding-bottom: 10px;
            text-align: justify;
        }
    </style>
  </head>

<body>

<div class="row no-gutters" id="main">
    <div class="col p-5">
        @if (count($resume->contents['works'] ?? []))
            @include('pdf.__works')
        @endif

        @if (count($resume->contents['education'] ?? []))
            @include('pdf.__education')
        @endif

        <div class="row">
            @if (count($resume->contents['references'] ?? []))
                <div class="col-6">
                    @include('pdf.__references')
                </div>
            @endif

            @if (count($resume->contents['interests'] ?? []))
                <div class="col-6">
                    @include('pdf.__interests')
                </div>
            @endif
        </div>

    </div>
    <div class="col-3 pb-5" id="sidebar">
            <div class="text-center" style="background-color: #363636; color: #fff;">
                <h1 class="pt-5 px-4 pb-4">
                    {!! $resume->contents['basics']['name'] ?? '' !!}<br>
                    <small>{!! $resume->contents['basics']['label'] ?? '' !!}</small>
                </h1>

                @isset($resume->contents['basics']['picture'])
                    @php
                        try {
                            $storage = Storage::get($resume->contents['basics']['picture']);
                        } catch (\Exception $e) {
                            $storage = File::get(public_path('/img/avatar-placehold.png'));
                        }
                    @endphp

                    <div id="avatar" style="background-image: url(data:image/jpeg;base64,{!! base64_encode($storage) !!})"></div>
                @endisset
            </div>

            <div class="px-4">
                @isset($resume->contents['summary'])
                    <h1 class="mt-3">@lang('app.creator.labels.profile.section_title')</h1>
                    <p id="bio">
                        {!! nl2br($resume->contents['summary']) ?? '' !!}
                    </p>
                @endisset

                <h1 class="mt-3">{{ __('Informations') }}</h1>

                @isset($resume->contents['basics']['phone'])
                    <div class="row mb-2">
                        <div class="col-auto pr-0">
                            <i class="fas fa-fw fa-phone"></i>
                        </div>
                        <div class="col">
                            {!! $resume->contents['basics']['phone'] ?? '' !!}
                        </div>
                    </div>
                @endisset

                @isset($resume->contents['basics']['email'])
                    <div class="row mb-2">
                        <div class="col-auto pr-0">
                            <i class="fas fa-fw fa-envelope"></i>
                        </div>
                        <div class="col">
                            {!! $resume->contents['basics']['email'] ?? '' !!}
                        </div>
                    </div>
                @endisset

                @isset($resume->contents['basics']['location']['address'])
                    <div class="row mb-2">
                        <div class="col-auto pr-0">
                            <i class="fas fa-fw fa-home"></i>
                        </div>
                        <div class="col">
                            {!! $resume->contents['basics']['location']['address'] ?? '' !!}<br>
                            {!! $resume->contents['basics']['location']['postalCode'] ?? '' !!} {!! $resume->contents['basics']['location']['city'] ?? '' !!}
                        </div>
                    </div>
                @endisset

                @isset($resume->contents['basics']['dateOfBirth'])
                    <div class="row mb-2">
                        <div class="col-auto pr-0">
                            <i class="fas fa-fw fa-user"></i>
                        </div>
                        <div class="col">
                            {!! \Carbon\Carbon::parse($resume->contents['basics']['dateOfBirth'])->format('d/m/Y') !!}<br>
                        </div>
                    </div>
                @endisset

                @isset($resume->contents['basics']['drivingLicenses'])
                    <div class="row mb-2">
                        <div class="col-auto pr-0">
                            <i class="fas fa-fw fa-car"></i>
                        </div>
                        <div class="col">
                            @php
                                $driving_licenses = $resume->contents['basics']['drivingLicenses'];
                                if (!is_array($resume->contents['basics']['drivingLicenses'])) $driving_licenses = [$resume->contents['basics']['drivingLicenses']];
                            @endphp
                            @foreach ($driving_licenses as $driving_licence)
                                {{ __('sources.driving_licences')[$driving_licence] }}<br>
                            @endforeach
                        </div>
                    </div>
                @endisset

                @if (count($resume->contents['skills'] ?? []))
                    <h1 class="mt-3">@lang('app.creator.labels.skills.section_title')</h1>
                    @foreach ($resume->contents['skills'] as $skill)
                        <div class="mb-2">
                            @if ($skill['level'] == 100)
                                <strong>{{ $skill['name'] }}</strong>
                            @else
                                {{ $skill['name'] }}
                            @endif

                            <div class="mt-2" style="height: 3px; background-color: #aaa; width: 100%">
                                <div style="height: 3px; background-color: {{ $colors['primary'] }}; width: {{ $skill['level'] }}%">&nbsp;</div>
                            </div>

                        </div>
                    @endforeach
                @endif

                @if (count($resume->contents['languages'] ?? []))
                    <h1 class="mt-3">@lang('app.creator.labels.languages.section_title')</h1>
                    @foreach ($resume->contents['languages'] as $language)
                        <div class="mb-2">
                            @if ($language['level'] == 100)
                                <strong>{{ $language['name'] }}</strong>
                            @else
                                {{ $language['name'] }}
                            @endif

                            <div class="mt-2" style="height: 3px; background-color: #aaa; width: 100%">
                                <div style="height: 3px; background-color: {{ $colors['primary'] }}; width: {{ $language['level'] }}%">&nbsp;</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
</div>

</body>
</html>
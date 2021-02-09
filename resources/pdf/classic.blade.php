@php
    if ($layout['color'] ?? null != null) {
        $colors = [
            'primary' => $layout['color'],
        ];
    } else {
        $colors = [
            'primary' => '#000',
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

        @import url('https://fonts.googleapis.com/css?family=Tinos');


        body {
            font-family: 'Tinos', serif;
            font-size: .8em;
            color: {{ $colors['primary'] }};
        }

        body, #main {
            height: 1402px;
        }

        #content {

        }

        #content .block {

        }

        #avatar {
            position: absolute;
            top: 35px;
            right: 46px;
            height: 120px;
            width: 120px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .block .header {
            font-size: 1.2rem;
            margin: 25px auto;
            padding-bottom: 10px;
            text-transform: uppercase;
            text-align: center;
            font-weight: 700;
            border-bottom: 1px solid #ccc;
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
            padding: 3px;
            width: 170px;
            border-right: 1px solid #ccc;
        }

        .box {
            background: #eee;
            padding: 15px;
            padding-bottom: 10px;
            text-align: justify;
        }
    </style>
  </head>

<body>

<div class="row no-gutters" id="main">
    <div class="col p-5">
        <div class="text-center">
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

            <h1>
                {!! $resume->contents['basics']['name'] ?? '' !!}
            </h1>

            {!! $resume->contents['basics']['location']['address'] ?? '' !!}, {!! $resume->contents['basics']['location']['postalCode'] ?? '' !!} {!! $resume->contents['basics']['location']['city'] ?? '' !!} |
            {!! $resume->contents['basics']['phone'] ?? '' !!} |
            {!! $resume->contents['basics']['email'] ?? '' !!}

            @isset($resume->contents['basics']['dateOfBirth'])
                | {!! \Carbon\Carbon::parse($resume->contents['basics']['dateOfBirth'])->format('d/m/Y') !!}
            @endisset

            @isset($resume->contents['basics']['drivingLicenses'])
                @php
                    $driving_licenses = $resume->contents['basics']['drivingLicenses'];
                    if (!is_array($resume->contents['basics']['drivingLicenses'])) $driving_licenses = [$resume->contents['basics']['drivingLicenses']];
                @endphp
                @foreach ($driving_licenses as $driving_licence)
                    | {{ __('sources.driving_licences')[$driving_licence] }}
                @endforeach
            @endisset
        </div>

        @isset($resume->contents['summary'])
            <div class="block">
                <div class="header">@lang('app.creator.labels.profile.section_title')</div>
                <div class="body">
                    <div class="box">
                        {!! nl2br($resume->contents['summary']) ?? '' !!}
                    </div>
                </div>
            </div>
        @endisset

        @if (count($resume->contents['works'] ?? []))
            @include('pdf.__works')
        @endif

        @if (count($resume->contents['education'] ?? []))
            @include('pdf.__education')
        @endif

        <div class="row align-items-center">
            @if (count($resume->contents['references'] ?? []))
                <div class="col">
                    @include('pdf.__references')
                </div>
            @endif

            @if (count($resume->contents['interests'] ?? []))
                <div class="col">
                    @include('pdf.__interests')
                </div>
            @endif

            @if (count($resume->contents['skills'] ?? []))
                <div class="col">
                    @include('pdf.__skills_')
                </div>
            @endif

            @if (count($resume->contents['languages'] ?? []))
                <div class="col">
                    @include('pdf.__languages_')
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>
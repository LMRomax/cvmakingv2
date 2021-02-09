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

        @import url('https://fonts.googleapis.com/css?family=Open Sans');

        body {
            font-family: 'Open Sans', serif;
            font-size: .8em;
        }

        body, #main {
            height: 1402px;
        }

        h1, .block .header {
            color: {{ $colors['primary'] }};
        }

        #content {

        }

        #content .block {

        }

        #avatar {
            height:80px;
            width:80px;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 50%;
        }

        .block .header {
            background: #eee;
            font-size: 1.2rem;
            margin: 25px auto;
            padding-top: 5px;
            padding-bottom: 5px;
            text-transform: uppercase;
            text-align: center;
            font-weight: 700;
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
            padding-bottom: 10px;
            text-align: justify;
        }
    </style>
  </head>

<body>

<div class="row no-gutters" id="main">
    <div class="col p-5">
        <div style="position: absolute; right: 50px; text-align: right; padding-top: 10px; line-height: 20px">
            {!! $resume->contents['basics']['location']['address'] ?? '' !!}, {!! $resume->contents['basics']['location']['postalCode'] ?? '' !!} {!! $resume->contents['basics']['location']['city'] ?? '' !!} <br>
            {!! $resume->contents['basics']['phone'] ?? '' !!} - {!! $resume->contents['basics']['email'] ?? '' !!}<br>

            @isset($resume->contents['basics']['dateOfBirth'])
                {!! \Carbon\Carbon::parse($resume->contents['basics']['dateOfBirth'])->format('d/m/Y') !!}
            @endisset
            @isset($resume->contents['basics']['drivingLicenses'])
                @php
                    $driving_licenses = $resume->contents['basics']['drivingLicenses'];
                    if (!is_array($resume->contents['basics']['drivingLicenses'])) $driving_licenses = [$resume->contents['basics']['drivingLicenses']];
                @endphp
                @foreach ($driving_licenses as $driving_licence)
                    {{ __('sources.driving_licences')[$driving_licence] }}
                @endforeach
            @endisset
        </div>

        <div class="row align-items-center">
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
                <h1>
                    {!! $resume->contents['basics']['name'] ?? '' !!}
                </h1>
            </div>
        </div>

        @isset($resume->contents['summary'])
            <p class="mt-5">
                {!! nl2br($resume->contents['summary']) ?? '' !!}
            </p>
        @endisset

        @if (count($resume->contents['works'] ?? []))
            @include('pdf.__works')
        @endif

        @if (count($resume->contents['education'] ?? []))
            @include('pdf.__education')
        @endif

        <div class="row justify-content-center">
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
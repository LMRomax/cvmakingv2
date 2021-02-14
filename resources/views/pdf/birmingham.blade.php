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

        body {
            width:26.25cm;
            height:38.35cm;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="top">
        <div class="cv--supertitle">
            @if(app()->getLocale() == "es")
                Currículum vitae
            @else
                Curriculum vitae
            @endif
        </div>
    </div>
</body>
</html>

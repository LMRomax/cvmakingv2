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
            padding: 20px;
            font-family: 'Open Sans', serif;
        }
    </style>
  </head>

<body>
    <div class="container">
        {{ Illuminate\Mail\Markdown::parse(nl2br($candidate)) }}
    </div>
</body>

</html>
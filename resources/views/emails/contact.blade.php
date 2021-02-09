<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,600,700|Open+Sans:300,400,600,700&display=swap" rel="stylesheet" type="text/css">
    <style>
      .no-padding {
          padding-left: 0px;
          padding-right: 0px;
      }

      .logo-email {
        text-align: center;
        margin-top: 50px;
        margin-bottom: 50px;
      }

      .logo-email a{
        font-family: 'Muli', sans-serif;
        font-size: 36px;
        font-weight: 400;
        letter-spacing: 0;
        color: #1D1C1E;
        text-decoration: none;
        text-transform: uppercase;
      }

      .logo-email a span{
        color: #28c7fa;
        font-weight: 600;
      }

      .logo-email span {
        width: 480px;
        height: auto;
      }

      .contact-message-email {
        color: #1D1C1E;
        padding: 0px 20px;
      }

      .contact-message-email h1 {
        color: #1D1C1E;
        font-family: 'Muli', sans-serif;
        font-size: 36px;
        font-weight: 600;
        letter-spacing: 0;
        margin-bottom: 30px;
      }

      .contact-message-email p {
        color: #1D1C1E;
        font-size: 18px;
        font-family: 'Open Sans', sans-serif;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid logo-email">
        <a href="{{ route('index') }}">
            <span class="sp-logo">
                MyCV
            </span>
            Making
        </a>
    </div>

    <div class="contact-message-email">
      <h1>Demande de support MyCVMaking</h1>
      <p>
        Expéditeur: <strong>{{ $contact['contact_email'] }}</strong>
      </p>
      <p>
        {!! nl2br(e($contact['contact_message'])) !!}
      </p>
    </div>

  </body>
</html>
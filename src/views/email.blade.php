<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Timezones</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: left;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Log Flare</h1>
            <div class="content">
              <p>
                @if (count($data)>0)
                  We found some errors inside the log file, double check that to prevent problems on the API.<br /><br />
                  <a href="{{$link}}">Access to the logs</a>
                  <br /><br />
                  <strong>Line errors: </strong><br />
                  @foreach ($data as $lines)
                    <p>{{ $lines }}</p>
                  @endforeach
                <br /><br />
                @endif
              </p>
            </div>
            <small>{{date("Y-m-d H:i:s")}}</small>
        </div>
    </body>
</html>

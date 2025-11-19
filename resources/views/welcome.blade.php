<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stage Managers: You will never have to write a performance report again with this handy performance report generator.">

    <!-- Favicon -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="{{ asset("icon/apple-touch-icon.png") }}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="{{ asset("icon/favicon-32x32.png") }}"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="{{ asset("icon/favicon-16x16.png") }}"
    />
    <link rel="manifest" href="{{ asset("icon/site.webmanifest") }}" />

    <!-- Open Graph Tags -->
    <meta property="og:title" content="Performance Report Generator" />
    <meta property="og:image" content="icon/apple-touch-icon.png" />
    <meta property="og:site_name" content="Performance Report Generator" />
    <meta property="og:description" content="Stage Managers: You will never have to write a performance report again with this handy performance report generator." />
    <meta property="og:url" content="http://prg.stagerightlabs.com" />

    <title>Performance Report Generator</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <!-- Seline -->
    <script async src="https://cdn.seline.com/seline.js" data-token="39601abb2630291"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="page-header">
                    <div class='btn-toolbar pull-right'>
                        <a class='btn btn-default btn-lg' href="/">Refresh</a>
                    </div>
                    <h1>Performance Report Generator</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default panel-report">
                    <div class="panel-body">
                        <?php echo $report; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p style="text-align: center">
                    <small>
                        Crafted by Ryan Durham @ <a href="http://stagerightlabs.com" target="_blank">Stage Right Labs</a>.
                    </small>
                </p>
            </div>
        </div>
    </div>
</body>

</html>

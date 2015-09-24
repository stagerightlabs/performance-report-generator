<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stage Managers: You will never have to write a performance report again with this handy performance report generator.">
    <link rel="icon" type="image/png" href="http://stagerightlabs.com/user/themes/stageright/images/favicon.png">
    <!-- Facebook Open Graph Tags -->
    <meta property="og:title" content="Performance Report Generator"/>
    <meta property="og:image" content="http://stagerightlabs.com/user/themes/stageright/images/favicon.png"/>
    <meta property="og:site_name" content="Performance Report Generator"/>
    <meta property="og:description" content="Stage Managers: You will never have to write a performance report again with this handy performance report generator."/>
    <meta property="og:url" content="http://prg.stagerightlabs.com"/>

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Performance Report Generator</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <p style="text-align: center"><small>Crafted by Ryan Durham @ <a href="http://stagerightlabs.com" target="_blank">Stage Right Labs</a></small></p>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//stats.stagerightlabs.com/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', 12]);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
    <noscript><p><img src="//stats.stagerightlabs.com/piwik.php?idsite=12" style="border:0;" alt="" /></p></noscript>
    <!-- End Piwik Code -->
  </body>
</html>
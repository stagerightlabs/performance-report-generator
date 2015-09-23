<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Add Performance Report</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="page-header">
          <h1>Add Performance Report</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <form action="<?php echo route('donation.handle') ?>" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Content</label>
              <textarea name="content" class="form-control" rows="6"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Are you human?</label>
              <div class="g-recaptcha" data-sitekey="6LdfYg0TAAAAAPaopGQHhRc0KfGiLXqm9lO0vMJv"></div>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          </form>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <p style="text-align: center"><small>Made with love by Ryan Durham @ <a href="http://stagerightlabs.com" target="_blank">Stage Right Labs</a></small></p>
        </div>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
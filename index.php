<? include("login.php"); ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Secret Diary!</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Customized CSS -->
    <link href="css/mystyle.css" type="text/css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body data-spy="scroll" data-target=".navbar-collapse">

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

          <a href="" class="navbar-brand">Secret Diary</a>

          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>

          </button>
        </div> <!-- End of .navbar-header -->

        <div class="collapse navbar-collapse">

          <form method="post" class="navbar-form navbar-right">
            <div class="form-group">
              <input type="email" name="logInEmail" placeholder="Email" class="form-control" value="<?php echo addslashes($logInEmail); ?>">
            </div>
            <div class="form-group">
              <input type="password" name="logInPassword" placeholder="Password" class="form-control" value="<?php echo addslashes($logInPassword); ?>">
            </div>
            <input type="submit" name="logInSubmit" value="Log In" class="btn btn-success" />
          </form>

        </div> <!-- End of .collapse navbar-collapse -->

      </div> <!-- End of .container -->
    </div> <!-- End of .navbar navbar-default -->

    <div class="container contentContainer" id="topContainer">

      <div class="row">

        <div class="col-md-6 col-md-offset-3" id="topRow">

          <h1 class="marginTop">Secret Diary!</h1>

          <p class="lead">This is why you should download this fantastic app.</p>

          <?php 

            if($error) {
              echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
            }

            if($message) {
              echo '<div class="alert alert-success">'.addslashes($message).'</div>';
            }

          ?>

          <p class="bold marginTop">Interested? Sign Up now!</p>

          <form method="post" class="marginTop">

            <div class="form-group">
            	<label for="email">Email Address</label>
              <input type="email" name="signUpEmail" placeholder="Your Email" class="form-control" value = "<?php echo addslashes($signUpEmail); ?>" />
              	<label for="password">Password</label>
              <input type="password" name="signUpPassword" placeholder="Your Password" class="form-control" value = "<?php echo addslashes($signUpPassword); ?>" />
            </div> <!-- End of .input-group -->

            <input type="submit" name="signUpSubmit" value="Sign Up" class="btn btn-success btn-lg marginTop" />

          </form>

        </div> <!-- End of .col-md-6 col-md-offset-3 -->

      </div> <!-- End of .row -->

    </div> <!-- End of .container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Customized JS -->
    <script type="text/javascript" src="js/myscript.js"></script>
  </body>
</html>
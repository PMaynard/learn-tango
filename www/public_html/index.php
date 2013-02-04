<?php require_once 'openid.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Learn Tango</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/openid.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="http://port22.co.uk/t/tango/www">Learn Tango</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <h1>Learn Something New! <blink>Now!</blink></h1>

      <?php
      try {
          # Change 'localhost' to your domain name.
          $openid = new LightOpenID('port22.co.uk');
          if(!$openid->mode) {
              if(isset($_POST['openid_identifier'])) {
                  $openid->identity = $_POST['openid_identifier'];
                  header('Location: ' . $openid->authUrl());
              }
      ?>

      <form action="" method="post" id="openid_form">
        <input type="hidden" name="action" value="verify" />
        <fieldset>
          <legend>Sign-in or Create New Account</legend>
          <div id="openid_choice">
            <p>Please click your account provider:</p>
            <div id="openid_btns"></div>
          </div>
          <div id="openid_input_area">
            <input id="openid_identifier" name="openid_identifier" type="text" value="http://" />
            <input id="openid_submit" type="submit" value="Sign-In"/>
          </div>
          <noscript>
            <p>OpenID is service that allows you to log-on to many different websites using a single indentity.
            Find out <a href="http://openid.net/what/">more about OpenID</a> and <a href="http://openid.net/get/">how to get an OpenID enabled account</a>.</p>
          </noscript>
        </fieldset>
      </form>

      <?php
          } elseif($openid->mode == 'cancel') {
              echo 'User has canceled authentication!';
          } else {
              echo 'User ' . ($openid->validate() ? $openid->identity . ' has ' : 'has not ') . 'logged in.';
          }
      } catch(ErrorException $e) {
          echo $e->getMessage();
      }
      ?>
      
    </div> <!-- /container -->
    <script src="assets/js/jquery-1.9.0.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- OpenID Selector -->
    <script src="assets/js/openid-jquery.js"></script>
    <script src="assets/js/openid-en.js"></script>
  </body>
</html>


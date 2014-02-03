<?php
	
	require_once("includes/config.php");

  if (!isset($data)) {
    $data = array();
  }

  //$data['user'] = User::getActiveUser();

  // redirect?
  if ($_SESSION['ref'] && $data['user']) {
    $ref = $_SESSION['ref'];
    $_SESSION['ref'] = "";
    header("Location: ".$ref);
    exit;
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ScheduleSMS</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/pratt.css" rel="stylesheet">
    <link href="/css/pricing.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    
    <script src="/js/jquery.min.js"></script>
    <script src="/js/smoothscroll.js"></script>
    <script src="/js/schedulesms.js"></script>
    

  </head>

  <body data-spy="scroll" data-offset="100" data-target="#navigation">

    <!-- Fixed navbar -->
      <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <? if ($data['hide_menu'] !== true): ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <? endif;?>
            <a class="navbar-brand" href="#home"><b>ScheduleSMS</b></a>
          </div>
          <? if ($data['hide_menu'] !== true): ?>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#home" class="smoothScroll">Home</a></li>
              <li><a href="#how" class="smoothScroll">How it works</a></li>
              <li><a href="#usecase" class="smoothScroll">Use cases</a></li>
              <li><a href="#pricing" class="smoothScroll">Pricing</a></li>
              <li><a href="#signup" class="smoothScroll">Sign-up</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          <? endif;?>
        </div>
      </div>
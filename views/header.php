<?php
	
	require_once("includes/config.php");
  require_once("includes/Customer.php");

  if (!isset($data)) {
    $data = array();
  }

  if (!isset($data['active_customer'])) {
    $data['active_customer'] = Customer::getActiveCustomer();
  }

  if (isset($_GET['r'])) {
    $_SESSION['ref_code'] = $_GET['r'];
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
    <? if ($data['phone_js']): ?>
    <script src="/js/phone.js"></script>
    <? endif; ?>
    <? if ($data['date_js']): ?>
      <script src="/js/zebra_datepicker.js"></script>
      <link href="/date_css/bootstrap.css" rel="stylesheet">
    <? endif; ?>
    
    <script src="/js/schedulesms.js"></script>

    <script>

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-48149446-1', 'schedulesms.com');
      ga('send', 'pageview');

    </script>

    <? if ($config['in_production'] == false): ?>
      <META NAME="robots" CONTENT="noindex">
    <? endif; ?>

  </head>

  <body data-spy="scroll" data-offset="100" data-target="#navigation">

    <!-- Fixed navbar -->
      <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">

            <div class="visible-xs">
            <? if ($data['active_customer']): ?>
              <a href="/sign-out" class="pull-right mr10 btn btn-sm btn-warning mt10"><i class="fa fa-sign-out"></i></a>
              <a href="/dashboard" class="pull-right mr10 btn btn-sm btn-success mt10"><i class="fa fa-user"></i> </a>
            <? else: ?>  
              <a href="/sign-in" class="pull-right mr10 btn btn-sm btn-success mt10"><i class="fa fa-sign-in"></i> Sign-in</a>
            <? endif;?>
            </div>

            <? if ($data['hide_menu'] !== true): ?>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <? endif;?>
            <a class="navbar-brand" href="/"><b>ScheduleSMS</b></a>
          </div>

          <form class="navbar-form navbar-right visible-lg">
            <? if ($data['active_customer']): ?>
              <a href="/dashboard" class="btn btn-success"><i class="fa fa-user"></i>&nbsp;&nbsp;<strong><?=$data['active_customer']['name'];?> Dashboard</strong> &nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-primary"><?=$data['active_customer']['available_tokens'];?> Tokens</span></a>
              <a href="/sign-out" class="btn btn-warning"><i class="fa fa-sign-out"></i> Sign out</a>
            <? else: ?>  
              <a href="/sign-in" class="btn btn-success"><i class="fa fa-sign-in"></i> Sign-in</a>
            <? endif;?>  
            
          </form>

          <form class="navbar-form navbar-right visible-sm">
            <? if ($data['active_customer']): ?>
              <a href="/dashboard" class="btn btn-success"><i class="fa fa-user"></i></a>
              <a href="/sign-out" class="btn btn-warning"><i class="fa fa-sign-out"></i></a>
            <? else: ?>  
              <a href="/sign-in" class="btn btn-success"><i class="fa fa-sign-in"></i> </a>
            <? endif;?>  
            
          </form>

          <form class="navbar-form navbar-right visible-md">
            <? if ($data['active_customer']): ?>
              <a href="/dashboard" class="btn btn-success"><i class="fa fa-user"></i> Dashboard</a>
              <a href="/sign-out" class="btn btn-warning"><i class="fa fa-sign-out"></i> Sign-out</a>
            <? else: ?>  
              <a href="/sign-in" class="btn btn-success"><i class="fa fa-sign-in"></i> Sign-in</a>
            <? endif;?>  
            
          </form>

          
          
          <? if ($data['hide_menu'] !== true): ?>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#home" class="smoothScroll">Home</a></li>
              <li><a href="#how" class="smoothScroll">How it works</a></li>
              <li><a href="#usecase" class="smoothScroll">Use cases</a></li>
              <li><a href="#pricing" class="smoothScroll">Pricing</a></li>
              <? if (!$data['active_customer']): ?>
                <li><a href="#signup" class="smoothScroll">Sign-up</a></li>
              <? endif; ?>
              <li><a href="/affiliates">Affiliates</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          <? endif;?>
        </div>
      </div>
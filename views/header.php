<?php
	
	require_once("includes/config.php");
  require_once("includes/Customer.php");

  if (!isset($data)) {
    $data = array();
  }

  if (!isset($data['active_customer'])) {
    $data['active_customer'] = Customer::getActiveCustomer();
  }

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
    <? if ($data['phone_js']): ?>
    <script src="/js/phone.js"></script>
    <? endif; ?>
    
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
            <a class="navbar-brand" href="/"><b>ScheduleSMS</b></a>
          </div>

          <form class="navbar-form navbar-right hidden-xs">
            <? if ($data['active_customer']): ?>
              <a href="/dashboard" class="btn btn-success mt10"><i class="fa fa-user"></i>&nbsp;&nbsp;<strong><?=$data['active_customer']['name'];?> Dashboard</strong> &nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-primary"><?=$data['active_customer']['available_tokens'];?> Tokens</span></a>
              <a href="/sign-out" class="btn btn-warning mt10"><i class="fa fa-sign-out"></i> Sign out</a>
            <? else: ?>  
              <a href="/sign-in" class="btn btn-success mt10"><i class="fa fa-sign-in"></i> Sign-in</a>
            <? endif;?>  
            
          </form>

          <form class="navbar-form navbar-right visible-xs">
            <? if ($data['active_customer']): ?>
              <a href="/dashboard" class="btn btn-success mt10"><i class="fa fa-user"></i>&nbsp;&nbsp;<strong><?=$data['active_customer']['name'];?> Dashboard</strong></a>
              <a href="/sign-out" class="btn btn-warning mt10"><i class="fa fa-sign-out"></i> Sign out</a>
            <? else: ?>  
              <a href="/sign-in" class="btn btn-success mt10"><i class="fa fa-sign-in"></i> Sign-in</a>
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
            </ul>
          </div><!--/.nav-collapse -->
          <? endif;?>
        </div>
      </div>
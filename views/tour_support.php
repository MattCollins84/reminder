
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <meta name="author" content="">

    <title>ScheduleSMS - SMS marketing for small businesses</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    
          <!-- Custom styles for this template -->
      <link href="/css/pratt.css" rel="stylesheet">
      <link href="/css/pricing.css" rel="stylesheet">
      <link href="/css/custom.css" rel="stylesheet">
      <link href="/date_css/bootstrap.css" rel="stylesheet">
        

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    
    <script src="/js/jquery.min.js"></script>
    <script src="/js/smoothscroll.js"></script>
        
    <script src="/js/schedulesms.js"></script>

    <script>

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-48149446-1', 'schedulesms.com');
      ga('send', 'pageview');

    </script>

          <META NAME="robots" CONTENT="noindex">
    
  </head>

  <body data-spy="scroll" data-offset="100" data-target="#navigation">

    <!-- Fixed navbar -->
      <div id="navigation" class="navbar navbar-default navbar-fixed-top navbar-tour">
        <div class="container">
          <div class="navbar-header">

            <h2 class="hidden-xs">Welcome to the tour, click any link to see the tour for that page...</h2>
            <h4 class="visible-xs">Welcome to the tour, click any link to see the tour for that page...</h4>

          </div>
          
          </div>
      </div>

      <div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Support</h1>
        <h3>Got a problem? Let us know and we'll do our best to help.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Support</h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">
      
      <ul class="list-group dash-nav hidden-xs">
  <li class="list-group-item" id="dashboard-menu-home"><a href='/tour/start'><i class="fa fa-home"></i>&nbsp;&nbsp;Dashboard Home</a></li>
  <li class="list-group-item" id="dashboard-menu-account"><a href='/tour/account'><i class="fa fa-cog"></i>&nbsp;&nbsp;Account Settings</a></li>
  <li class="list-group-item" id="dashboard-menu-tokens"><a href='/tour/tokens'><i class="fa fa-phone"></i>&nbsp;&nbsp;Purchase Tokens</a></li>
  <li class="list-group-item" id="dashboard-menu-contacts"><a href='/tour/contacts'><i class="fa fa-users"></i>&nbsp;&nbsp;Contacts</a></li>
  <li class="list-group-item" id="dashboard-menu-schedule"><a href='/tour/schedule'><i class="fa fa-calendar"></i>&nbsp;&nbsp;Schedule</a></li>
  <li class="list-group-item" id="dashboard-menu-transactions"><a href='/tour/transactions'><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Transactions</a></li>
</ul>

<ul class="list-group dash-nav dash-nav-xs visible-xs overflow">
  <li class="list-group-item pull-left br0" id="dashboard-menu-home-mobile"><a href='/tour/start'><i class="fa fa-home"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-account-mobile"><a href='/tour/account'><i class="fa fa-cog"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-tokens-mobile"><a href='/tour/tokens'><i class="fa fa-phone"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-contacts-mobile"><a href='/tour/contacts'><i class="fa fa-users"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-schedule-mobile"><a href='/tour/schedule'><i class="fa fa-calendar"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-transactions-mobile"><a href='/tour/transactions'><i class="fa fa-briefcase"></i></a></li>
</ul>

<a class="btn btn-danger btn-block btn-lg mb20" id="dashboard-support" href='/tour/support'>Support</a>
    </div>

    <div class="col-lg-9">

      <h1>Get in touch</h1>
      
      <div class="alert alert-success mt20 hidden" id="success-container">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>Your message has been successfully sent. We will be in touch shortly.</h4>
        <span id="errors-signup"></span>
      </div>
      <form role="form" id="support">
        <p>Complete the form below and we will respond to you as soon as possible.</p>
        <div class="form-group">
          <label for="subject">Subject *</label>
          <input type="text" class="form-control" id="subject" name="subject" placeholder="What is your query about?" value="" />
        </div>
        <div class="form-group">
          <label for="email">Email *</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="tour@schedulesms.com" />
        </div>
        <div class="form-group">
          <label for="msg_body">Your message *</label>
          <textarea class="form-control" id="msg_body" name="msg_body" rows="10"></textarea>
        </div>
        <div class="alert alert-danger mt20 hidden" id="error-container">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4>There was a problem when attempting to send your message</h4>
          <span id="errors-support"></span>
        </div>
        <button type="submit" class="btn btn-success mb20"><i class="fa fa-share"></i> Send</button>
      </form>
      
    </div>

  </div>
</div> <!--/ .container -->
  <div id="c">
    <div class="container">
      
      <div class="col-lg-8">
        <p>All content &copy; ScheduleSMS 2014 | <a href='/terms'>terms</a> | <a href='/privacy'>privacy</a></p>
      </div>

      <div class="col-lg-4 right">
        <p>Design by <a href="http://www.blacktie.co">BLACKTIE.CO</a></p>
      </div>
    
    </div>
  </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/bootstrap.min.js"></script>
    <script>
      $('.carousel').carousel({
        interval: 3500
      })
    </script>
    <script src="/js/bootstrap-tour.min.js"></script>
<script src="/js/tour.js"></script>
<script>
var tour;
var steps = new TourSteps($('.visible-xs').is(":visible"));
$(document).ready(function() {

  // Instance the tour
  tour = new Tour();
  tour.addSteps(steps.dashboardSupport)

  // Initialize the tour
  tour.init();

  // Start the tour
  setTimeout(function(){tour.start()}, 500);
})


</script>
  </body>
</html>

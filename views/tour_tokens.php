
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
      <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">

            <div class="visible-xs">
                          <a href="#" class="pull-right mr10 btn btn-sm btn-warning mt10"><i class="fa fa-sign-out"></i></a>
              <a href="/tour/start" class="pull-right mr10 btn btn-sm btn-success mt10"><i class="fa fa-user"></i> </a>
                        </div>

                        <a class="navbar-brand" href="/">...back to <b>ScheduleSMS</b></a>
          </div>

          <form class="navbar-form navbar-right visible-lg">
                          <a href="/tour/start" class="btn btn-success"><i class="fa fa-user"></i>&nbsp;&nbsp;<strong>Tour Co. Dashboard</strong> &nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-primary">500 Tokens</span></a>
              <a href="#" class="btn btn-warning"><i class="fa fa-sign-out"></i> Sign out</a>
              
            
          </form>

          <form class="navbar-form navbar-right visible-sm">
                          <a href="/tour/start" class="btn btn-success"><i class="fa fa-user"></i></a>
              <a href="#" class="btn btn-warning"><i class="fa fa-sign-out"></i></a>
              
            
          </form>

          <form class="navbar-form navbar-right visible-md">
                          <a href="/tour/start" class="btn btn-success"><i class="fa fa-user"></i> Dashboard</a>
              <a href="#" class="btn btn-warning"><i class="fa fa-sign-out"></i> Sign-out</a>
              
            
          </form>

          
          
                  </div>
      </div><div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Tokens</b></h1>
        <h3>Manage your ScheduleSMS tokens.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Tokens</h3>
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Available Tokens</h3>
        </div>
        <div class="panel-body">
          <p><strong>500</strong> Tokens available.</p>
          <p>This is enough for <strong>33</strong> fixed messages, or <strong>8</strong> custom messages.</p>
          <div class="progress">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>          </div>
        </div>
      </div>
    
    </div>
    
    <div class="col-lg-6">
      <h1>Purchasing Tokens</h1>
      <p>We provide you with four different options when purchasing your tokens, each designed to offer the flexibility you require as a business.</p>
      <p>All of our transactions are handled via PayPal to ensure that you have all the security and peace of mind you need when buying online. If you do not have a PayPal account, you can still purchase via PayPal using your credit/debit card.</p>
    </div>

    <div class="col-lg-3" id="dashboard-paypal">
      <!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/uk/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/uk/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/bdg_payments_by_pp_2line.png" border="0" alt="Payments by PayPal" /><br /><img src="/images/paypal_cards.png" alt="Payments by PayPal" class="mt20" /></a><div style="text-align:center"><a href="https://www.paypal.com/uk/webapps/mpp/how-paypal-works" target="_blank"><font size="2" face="Arial" color="#0079CD"><b>How PayPal Works</b></font></a></div></td></tr></table><!-- PayPal Logo -->
    </div>

    <div class="col-lg-9"> 
      <div class="flat mt40">

                
          <div class="col-lg-3 col-md-3 col-xs-6">
            <ul class="plan plan1 ">
              <li class="plan-name">
                  Economy              </li>
              <li class="plan-price">
                  <strong>&pound;5</strong>
              </li>
              <li>
                  <strong>500</strong> ScheduleSMS Tokens
              </li>
              <li>
                  Up to <strong>8</strong> custom messages
              </li>
              <li>
                  Up to <strong>33</strong> fixed messages
              </li>
              <li>
                  <a href="#"><img src="/images/buy.gif" alt="Buy now with PayPal" title="Buy now with PayPal" /></a>
              </li>
            </ul>
          </div>
        
                
          <div class="col-lg-3 col-md-3 col-xs-6">
            <ul class="plan plan2 ">
              <li class="plan-name">
                  Standard              </li>
              <li class="plan-price">
                  <strong>&pound;10</strong>
              </li>
              <li>
                  <strong>1000</strong> ScheduleSMS Tokens
              </li>
              <li>
                  Up to <strong>16</strong> custom messages
              </li>
              <li>
                  Up to <strong>66</strong> fixed messages
              </li>
              <li>
                  <a href="#"><img src="/images/buy.gif" alt="Buy now with PayPal" title="Buy now with PayPal" /></a>
              </li>
            </ul>
          </div>
        
                
          <div class="col-lg-3 col-md-3 col-xs-6">
            <ul class="plan plan3 featured">
              <li class="plan-name">
                  Premium              </li>
              <li class="plan-price">
                  <strong>&pound;20</strong>
              </li>
              <li>
                  <strong>2500</strong> ScheduleSMS Tokens
              </li>
              <li>
                  Up to <strong>41</strong> custom messages
              </li>
              <li>
                  Up to <strong>166</strong> fixed messages
              </li>
              <li>
                  <a id="dashboard-buy" href="#"><img src="/images/buy.gif" alt="Buy now with PayPal" title="Buy now with PayPal" /></a>
              </li>
            </ul>
          </div>
        
                
          <div class="col-lg-3 col-md-3 col-xs-6">
            <ul class="plan plan4 ">
              <li class="plan-name">
                  Bumper              </li>
              <li class="plan-price">
                  <strong>&pound;50</strong>
              </li>
              <li>
                  <strong>8000</strong> ScheduleSMS Tokens
              </li>
              <li>
                  Up to <strong>133</strong> custom messages
              </li>
              <li>
                  Up to <strong>533</strong> fixed messages
              </li>
              <li>
                  <a href="#"><img src="/images/buy.gif" alt="Buy now with PayPal" title="Buy now with PayPal" /></a>
              </li>
            </ul>
          </div>
        
              </div>

    </div>

  </div>
</div> <!--/ .container -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">
      
    </div>

    <div class="col-lg-9">
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
  tour.addSteps(steps.dashboardTokens)

  // Initialize the tour
  tour.init();

  // Start the tour
      tour.restart();
      tour.start();
})


</script>
  </body>
</html>

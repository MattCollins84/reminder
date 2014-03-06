
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
              <script src="/js/zebra_datepicker.js"></script>
    
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
        <h1>Schedule Message</h1>
        <h3>Schedule a message for Dave Johnson.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Schedule Message</h3>
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
  <li class="list-group-item" id="dashboard-menu-tokens"><a href='/tour/tokens'><i class="fa fa-phone"></i>&nbsp;&nbsp;Purchase Messages</a></li>
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
      <a href="/tour/contacts/edit" class="btn btn-success btn-lg btn-block mb20"><i class="fa fa-user"></i> Manage contact</a>

      <div class="panel panel-default hidden-xs">
  <div class="panel-heading">
    <h3 class="panel-title">Find Contact</h3>
  </div>
  <div class="panel-body">
    <form role="form">
      <p>Type a name or a number below.</p>
      <div class="form-group">
        <input type="text" class="form-control" id="contact-search" name="contact-search" data-toggle="tooltip" title="Edit this contact" placeholder="Name or number..." />
      </div>
    </form>
  </div>
</div>

<ul class="list-group">

  <li class="list-group-item contact-panel hidden" data-number="447712356789" data-name="john smith">
    <div>
      <a class="pull-right contact-btn" href="/tour/contacts/edit" data-toggle="tooltip" title="Manage this contact"><i class="fa fa-user"></i></a>
      <a class="pull-right contact-btn mr10" href="/tour/contacts/schedule" data-toggle="tooltip" title="Schedule message for this contact"><i class="fa fa-calendar"></i></a>
      <h3 class="panel-title">John Smith</h3>
    </div>
    <div>
      <p><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;+447712356789</p>
              <p><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;&nbsp;john@example.com</p>
          </div>
  </li>


  <li class="list-group-item contact-panel hidden" data-number="447798765432" data-name="dave jones">
    <div>
      <a class="pull-right contact-btn" href="/tour/contacts/edit" data-toggle="tooltip" title="Manage this contact"><i class="fa fa-user"></i></a>
      <a class="pull-right contact-btn mr10" href="/tour/contacts/schedule" data-toggle="tooltip" title="Schedule message for this contact"><i class="fa fa-calendar"></i></a>
      <h3 class="panel-title">Dave Jones</h3>
    </div>
    <div>
      <p><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;+447798765432</p>
          </div>
  </li>


  <li class="list-group-item contact-panel hidden" data-number="447767854321" data-name="dave johnson">
    <div>
      <a class="pull-right contact-btn" href="/tour/contacts/edit" data-toggle="tooltip" title="Manage this contact"><i class="fa fa-user"></i></a>
      <a class="pull-right contact-btn mr10" href="/tour/contacts/schedule" data-toggle="tooltip" title="Schedule message for this contact"><i class="fa fa-calendar"></i></a>
      <h3 class="panel-title">Dave Johnson</h3>
    </div>
    <div>
      <p><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;+447767854321</p>
          </div>
  </li>

  <li class="list-group-item contact-panel hidden centered" id="contact-search-add">
    <div>
      <a class="btn btn-success" href="/tour/contacts"><i class="fa fa-users"> </i> Create a new contact</a>
    </div>
  </li>
</ul>

<script>
$(document).ready(function() {
  var items = $('.contact-btn');
  items.each(function(i) {
    
    var item = items[i];
    var id = '#'+item.id;
    $(id).tooltip({placement: "right"});

  });
});
</script>    
    </div>
    
    <div class="col-lg-9">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Schedule a message for Dave Johnson</h3>
        </div>
        <div class="panel-body">
            
          <div class="alert alert-success mt20 hidden" id="success-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>Message scheduled successfully.</h4>
          </div>

                    <p>Set up a message for this contact.</p>
          
          <ul class="nav nav-tabs" id="schedule-tabs">
            <li><a id="tab-fix" href="#schedule-fixed" data-toggle="tab"><strong><i class="fa fa-bookmark"> </i> Fixed Messages</strong></a></li>
            <li><a id="tab-custom" href="#schedule-custom" data-toggle="tab"><strong><i class="fa fa-bookmark-o"> </i> Custom Messages</strong></a></li>
            <li><a id="tab-template" href="#schedule-templates" data-toggle="tab"><strong><i class="fa fa-archive"> </i> Template Messages</strong></a></li>
          </ul>

          <div class="tab-content pt20 pb20">
          
            <div class="tab-pane" id="schedule-fixed">
              
              <form role="form">
                
                <p>Use our simple mesage wizard to quickly create appointment reminders or confirmations.</p>
                
                                <div class="form-group fixed-section">
                  <h4 id='fixedstep1'><strong>Step One</strong> Is this a reminder, or a confirmation?</h4>
                  <p>
                    <a class="btn btn-default fixed-btn" data-value="reminder" data-target="#fixed-type">Reminder</a> 
                    <a class="btn btn-default fixed-btn" data-value="confirmation" data-target="#fixed-type">Confirmation</a>
                  </p>
                  <input type="hidden" name="fixed-type" id="fixed-type" value="" />
                </div>

                <div class="form-group fixed-section hidden">
                  <h4 id='fixedstep2'><strong>Step Two</strong> Is this a meeting, or an appointment?</h4>
                  <p>
                    <a class="btn btn-default fixed-btn" data-value="meeting" data-target="#fixed-variation">Meeting</a>
                    <a class="btn btn-default fixed-btn" data-value="appointment" data-target="#fixed-variation">Appointment</a>
                  </p>
                  <input type="hidden" name="fixed-type" id="fixed-variation" value="" />
                </div>

                <div class="form-group fixed-section hidden">
                  <h4 id='fixedstep3'><strong>Step Three</strong> When is the <span id="variation-placeholder"></span>?</h4>
                  <p>
                    <input type="text" class="datepicker form-control input-small" id="fixed-variation-date" />
                  </p>
                  <span class="help-inline">Optionally enter a time e.g. 2pm, 14:00 or 2 o'clock</span>
                  <p>
                    <input type="text" class="form-control input-small" maxlength="10" id="fixed-variation-time" />
                  </p>
                </div>

                <div class="form-group fixed-section hidden">
                  <h4 id='fixedstep4'><strong>Step Four</strong> When should the reminder be sent?</h4>
                  <p>
                    <input type="text" class="datepicker form-control input-small"  id="fixed-message-date"/>
                  </p>
                </div>

                <div class="hidden fixed-section">

                  <div class="alert alert-info">
                    <p><strong>Preview of your message</strong></p>
                    <p id="fixed-preview"></p>
                  </div>

                  <div class="alert alert-danger mt20 hidden" id="fixed-failure">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>There was a problem when trying to schedule this message.</h4>
                    <p id="fixed-error"></p>
                  </div>

                  <input type="hidden" name="contact_id" id="contact_id" value="c7c24a0152ddfeb1eb7d0fdfcae81e50" />
                  <input type="hidden" name="company_name" id="company_name" value="Tour Co." />
                  <input type="hidden" name="company_contact" id="company_contact" value="077313 12345" />
                  <input type="hidden" name="country" id="country" value="gb" />
                  <button type="button" class="btn btn-success"><i class="fa fa-calendar-o"></i> Schedule Message</button>
                </div>

                              </form>

            </div>

            <div class="tab-pane" id="schedule-custom">
              <form role="form">
                
                <p>Custom messages can be tailored to this specific customer, often containing a targetted &amp; promotional message. These messages can be saved and re-used with other customers at a later date.</p>
                <p>Each custom message is charged at 1 message credit per 160 characters.<br /><em class="slight">A required unsubscribe instruction will be included, using 26 characters.</em></p>

                
                <div class="form-group">

                  <label  id='customcompose' for="custom-message">Compose message (<span id="message-count">0</span> characters - <span id="message-tokens">1</span> messages)</label>
                  <textarea class="form-control mb10" id="custom-message" name="custom-message" rows="3"></textarea>

                </div>

                <div class="form-group">
                  <label for="custom-message-date">When should we send this message?</label>
                  <input type="text" class="datepicker form-control input-small" id="custom-message-date" />
                </div>

                <div class="form-group">
                  <label>Do you want to save this message as a template?</label>
                  <p>Saving this message as a template will allow you to easily send this same message to a different contact.</p>
                  <p>
                    <a class="btn btn-default custom-save"  id="custom-save-yes" data-value="yes" data-target="#custom-save"><i class="fa fa-check"> </i> Yes</a>
                    <a class="btn btn-default custom-save" data-value="no" data-target="#custom-save"><i class="fa fa-times"> </i> No</a>
                    <input type="hidden" name="custom-save" id="custom-save" />
                  </p>
                </div>

                <div class="form-group hidden" id="template-details">
                  <label for="custom-template-name">Provide a template name</label>
                  <input type="text" name="custom-template-name" id="custom-template-name" class="form-control" /><br />
                  <input type="checkbox" name="custom-template-date" id="custom-template-date" value="1" /> Also save the date with this template?
                </div>

                <div class="form-group">

                  <div class="alert alert-danger mb10 hidden" id="custom-failure">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>There was a problem when trying to schedule this message.</h4>
                    <p id="custom-error"></p>
                  </div>

                  <input type="hidden" name="contact_id" id="contact_id" value="c7c24a0152ddfeb1eb7d0fdfcae81e50" />
                  <input type="hidden" name="company_name" id="company_name" value="Tour Co." />
                  <input type="hidden" name="company_contact" id="company_contact" value="077313 12345" />
                  <input type="hidden" name="country" id="country" value="gb" />
                  <input type="hidden" name="custom_cost" id="custom_cost" value="60" />
                  <button type="button" class="btn btn-success" id="custom-btn"><i class="fa fa-calendar-o"></i> Schedule Message</button>
                </div>

                              </form>
            </div>



            <div class="tab-pane" id="schedule-templates">
              
              <p>This is a list of your existing templates, simply click the <strong>Use Template</strong> button to quickly setup your message.</p>

                              <h2>You currently do not have any templates</h2>
              
            </div>

          </div>
                        
        </div>

        <script>
          $('input.datepicker').Zebra_DatePicker({
            format: 'd/m/Y',
            direction: true,
            onSelect: function(v, e) {
              $(this).change();
            }
          });
        </script>

      </div>

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
  tour.addSteps(steps.dashboardContactsSchedule)

  // Initialize the tour
  tour.init();

  // Start the tour
  setTimeout(function(){tour.start()}, 500);

  $('a#tab-fix').click(function(e) {
    setTimeout(function() {
      tour.goTo(1);
    }, 500);
  });
  $('a#tab-custom').click(function(e) {
    setTimeout(function() {
      tour.goTo(6);
    }, 500);
  });
  $('a#tab-template').click(function(e) {
    setTimeout(function() {
      tour.goTo(10);
    }, 500);
  });

})


</script>
  </body>
</html>

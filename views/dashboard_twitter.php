<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Tweets for Messages</h1>
        <h3>You can earn free messages, simply by tweeting about ScheduleSMS!</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Tweets for Messages</h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">
      
      <? require_once("views/dashboard_menu.php"); ?>
    
    </div>

    <div class="col-lg-9">

      
      
      <? if (!$data['active_customer']['twitter_auth']): ?>
        
        <h1>How does this work?</h1>
        
        <p>First we need you to connect with the ScheduleSMS Twitter application. The reason we need to do this is to verify that you have a valid Twitter account and to allow us to tweet on your behalf.</p>
        <p>We will never tweet on your behalf without your knowledge, we will also always let you approve the message before doing so. Once a message has been tweeted, you will receive <strong><?=$data['tokens']['complimentary'];?> free messages</strong>!</p>
        <p>To connect with us, click the button below.</p>

        <p><button type="button" class="btn btn-success" id="twitter-auth"><i class="fa fa-twitter"> </i> Connect</button></p>
        <div class="alert alert-danger hidden" id="fail">
          <h4>There was a problem connecting to Twitter. Please try again</h4>
        </div>

      <? else: ?>
        
        <h1>OK, what now?</h1>

        <p>Now that you have connected with us, simply choose the message you want to send from the message below and hit the send button. This will automatically tweet this message and follow @schedulesms on twitter - you will then get <strong><?=$data['tokens']['complimentary'];?> free messages</strong> to use however you wish!</p>
        
        <div class="alert alert-success">
          <p>Check out schedulesms.com to unlock the potential of your customer base, start with a free trial! @schedulesms #smallbusiness</p>
          <p><a class="btn btn-success btn-tweet" data-msg="Check out schedulesms.com to unlock the potential of your customer base, start with a free trial! @schedulesms #smallbusiness"><i class="fa fa-twitter"></i> Tweet this message</a></p>
        </div>

        <div class="alert alert-success">
          <p>SMS Marketing for small business. Reconnect with your customers with our free trial schedulesms.com @schedulesms #smallbusiness</p>
          <p><a class="btn btn-success btn-tweet" data-msg="SMS Marketing for small business. Reconnect with your customers with our free trial schedulesms.com @schedulesms #smallbusiness"><i class="fa fa-twitter"></i> Tweet this message</a></p>
        </div>

        <div class="alert alert-success">
          <p>Why not start your free trial with schedulesms.com? PAYG SMS service designed to unlock your potential @schedulesms #smallbusiness</p>
          <p><a class="btn btn-success btn-tweet" data-msg="Why not start your free trial with schedulesms.com? PAYG SMS service designed to unlock your potential @schedulesms #smallbusiness"><i class="fa fa-twitter"></i> Tweet this message</a></p>
        </div>
      
      <? endif; ?>
      
    </div>

  </div>
</div> <!--/ .container -->
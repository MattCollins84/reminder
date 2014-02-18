<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 hidden-xs">
        <h1>Thank You</h1>
        <h3>Your transaction is complete, your tokens will be added to your balance.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3>Thank You</h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">

      <? require_once("views/dashboard_menu.php"); ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Available Tokens</h3>
        </div>
        <div class="panel-body">
          <p><strong><?=$data['active_customer']['available_tokens'];?></strong> Tokens available.</p>
          <p>This is enough for <strong><?=$data['token_fixed'];?></strong> fixed messages, or <strong><?=$data['token_custom'];?></strong> custom messages.</p>
          <div class="progress">
            <div class="progress-bar <?=$data['token_class'];?>" role="progressbar" aria-valuenow="<?=$data['token_bar'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$data['token_bar'];?>%;"></div>          </div>
        </div>
      </div>
    
    </div>
    
    <div class="col-lg-9">
      <h1>Thank you for your purchase</h1>
      <p>Your transaction is complete and your tokens should be added to your balance within the next few minutes.</p>
      <p>You will receive an email from PayPal shortly containing confirmation and receipt of your purchase.</p>
      
      <h3>Transaction details</h3>
      <p>Your PayPal reference is: <strong><?=$data['paypal_ref'];?></strong>.</p>
      <p>Your ScheduleSMS reference is: <strong><?=$data['trans']['id'];?></strong>.</p>

      <p>All of your transactions can be accessed from the <a href="/dashboard/transactions">Transactions</a> page in your dashboard.</p>
      
    </div>

  </div>
</div> <!--/ .container -->
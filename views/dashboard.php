<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60">
        <h1>Welcome back, <?=$data['active_customer']['name'];?>!</b></h1>
        <h3>This is your personalised dashboard, with everything you need to manage your account.</h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">
      <? require_once("views/dashboard_menu.php"); ?>
    </div> 

    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Account ID</h3>
        </div>
        <div class="panel-body">
          <?=$data['active_customer']['_id'];?>
        </div>
      </div>
    </div> 

    <div class="col-lg-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Available Tokens</h3>
        </div>
        <div class="panel-body">
          <p><strong><?=$data['active_customer']['available_tokens'];?></strong></p>
          <p>This is enough for <strong><?=$data['token_fixed'];?></strong> fixed messages, or <strong><?=$data['token_custom'];?></strong> custom messages.</p>
          <div class="progress">
            <div class="progress-bar <?=$data['token_class'];?>" role="progressbar" aria-valuenow="<?=$data['token_bar'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$data['token_bar'];?>%;"></div>          </div>
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
      <? //print_r($data['messages_today']); ?>
    </div> 

  </div>
</div> <!--/ .container -->
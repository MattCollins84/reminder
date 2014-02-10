<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 hidden-xs">
        <h1>Welcome back, <?=$data['active_customer']['name'];?>!</h1>
        <h3>This is your personalised dashboard, with everything you need to manage your account.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="mt40">Welcome back, <?=$data['active_customer']['name'];?>!</h3>
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
          <p><span class="label label-info"><?=$data['active_customer']['_id'];?></span></p>
          <p>This ID is your unique ID, do not share this with anyone.</p>
        </div>
      </div>
    </div> 

    <div class="col-lg-5">
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

  </div>
</div> <!--/ .container -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">
      <? if (count($data['contacts']) == 0): ?>
        <div class="alert alert-info">
          <p><i class="fa fa-info-circle"> </i> You have no contacts.</p>
          <p><a class="btn btn-success" href='/dashboard/contacts'>Create a contact</a></p>
        </div>
      <? endif; ?>
    </div>

    <div class="col-lg-9">
      <? require_once("views/dashboard_contact_search_large.php") ?>
    </div> 

  </div>
</div> <!--/ .container -->
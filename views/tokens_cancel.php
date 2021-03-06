<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Transaction Failed</h1>
        <h3>Your transaction either failed, or was cancelled.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3>Transaction Failed</h3>
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
          <h3 class="panel-title">Messages Remaining</h3>
        </div>
        <div class="panel-body">
          <p><strong><?=$data['active_customer']['available_tokens'];?></strong> messages remaining.</p>
          <div class="progress">
            <div class="progress-bar <?=$data['token_class'];?>" role="progressbar" aria-valuenow="<?=$data['token_bar'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$data['token_bar'];?>%;"></div>          </div>
        </div>
      </div>
    
    </div>
    
    <div class="col-lg-9">
      <h1>Purchasing additional messages</h1>
      <p>You either cancelled your transaction or there was a problem with your PayPal transaction.</p>
      <p>You have not been billed by ScheduleSMS for any message credits.</p>
      
      <h3>Retry your purchase</h3>
      <p>If you wish to retry your purchase, review the selected plan below and click the <strong>Buy Now</strong> button.</p>
      <div class="flat mt40">

        <div class="col-lg-3 col-md-3 col-xs-6">
          <ul class="plan plan1 <?=($data['plan']['selected']?"featured":"");?>">
            <li class="plan-name">
                <?=$data['plan']['name'];?>
            </li>
            <li class="plan-price">
                <strong><?=$data['currency'];?><?=$data['plan']['price'];?></strong>
            </li>
            <li>
                <strong><?=$data['plan']['tokens'];?></strong> Messages
            </li>
            <li>
                <a href="/dashboard/tokens/<?=$data['active_customer']['country'];?>/<?=$data['item_key'];?>"><img src="/images/buy.gif" alt="Buy now with PayPal" title="Buy now with PayPal" /></a>
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
      <? //print_r($data['messages_today']); ?>
    </div> 

  </div>
</div> <!--/ .container -->
<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60">
        <h1>Tokens</b></h1>
        <h3>Manage your ScheduleSMS tokens.</h3>
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
      <h1>Purchasing Tokens</h1>
      <p>We provide you with four different options when purchasing your tokens, each designed to offer the flexibility you require as a business.</p>
      <p>All of our transactions are handled via PayPal to ensure that you have all the security and peace of mind you need when buying online. If you do not have a PayPal account, you can still purchase via PayPal using your credit/debit card.</p>
      
      <div class="flat mt40">

        <? foreach ($data['plans'] as $key => $plan): ?>
        
          <div class="col-lg-3 col-md-3 col-xs-6">
            <ul class="plan plan<?=($key+1);?> <?=($plan['selected']?"featured":"");?>">
              <li class="plan-name">
                  <?=$plan['name'];?>
              </li>
              <li class="plan-price">
                  <strong><?=$data['currency'];?><?=$plan['price'];?></strong>
              </li>
              <li>
                  <strong><?=$plan['tokens'];?></strong> ScheduleSMS Tokens
              </li>
              <li>
                  Up to <strong><?=floor($plan['tokens'] / $data['tokens']['custom']);?></strong> custom messages
              </li>
              <li>
                  Up to <strong><?=floor($plan['tokens'] / $data['tokens']['fixed']);?></strong> fixed messages
              </li>
              <li>
                  <? include("views/paypal_button.php"); ?>
              </li>
            </ul>
          </div>
        
        <? endforeach; ?>
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
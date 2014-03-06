<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Purchase Messages</b></h1>
        <h3>Manage your ScheduleSMS messages.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Purchase Messages</h3>
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
    
    <div class="col-lg-6">
      <h1>Purchasing Messages</h1>
      <p>We provide you with four different options when purchasing messages, each designed to offer the flexibility you require as a business.</p>
      <p>All of our transactions are handled via PayPal to ensure that you have all the security and peace of mind you need when buying online. If you do not have a PayPal account, you can still purchase via PayPal using your credit/debit card.</p>
    </div>

    <div class="col-lg-3" id="dashboard-paypal">
      <!-- PayPal Logo --><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/uk/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/uk/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/bdg_payments_by_pp_2line.png" border="0" alt="Payments by PayPal" /><br /><img src="/images/paypal_cards.png" alt="Payments by PayPal" class="mt20" /></a><div style="text-align:center"><a href="https://www.paypal.com/uk/webapps/mpp/how-paypal-works" target="_blank"><font size="2" face="Arial" color="#0079CD"><b>How PayPal Works</b></font></a></div></td></tr></table><!-- PayPal Logo -->
    </div>

    <div class="col-lg-9"> 
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
                  <strong><?=$plan['tokens'];?></strong> Messages
              </li>
              <li>
                  <a href="/dashboard/tokens/<?=$data['active_customer']['country'];?>/<?=$key;?>"><img src="/images/buy.gif" alt="Buy now with PayPal" title="Buy now with PayPal" /></a>
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
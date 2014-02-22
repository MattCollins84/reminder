<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Your Transactions</h1>
        <h3>Here you can see all of your previous transactions.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Your Transactions</h3>
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

      <h1>Transactions</h1>
      <p>This is a summary of all of your previous transactions.</p>

      <table class="table table-striped">
        <tr>
          <th>Date</th>
          <th>Amount</th>
          <th>Tokens</th>
          <th>PayPal Ref#</th>
          <th>ScheduleSMS Ref#</th>
        </tr>
      <? foreach ($data['transactions'] as $trans): ?>
        
        <tr>
          <td><?=$trans['date'];?></td>
          <td>
            <?=$trans['plan']['currency'].$trans['plan']['price'];?>
          </td>
          <td><?=$trans['plan']['tokens'];?></td>
          <td><?=$trans['ref'];?></td>
          <td><?=$trans['_id'];?></td>
        </tr>

      <? endforeach; ?>
      </table>
    </div>

  </div>
</div> <!--/ .container -->
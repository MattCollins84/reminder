<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 hidden-xs">
        <h1>Your Schedule</h1>
        <h3>View your upcoming shedule and make any changes you need</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="mt40">Your Schedule</h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">
      
      <? require_once("views/dashboard_menu.php"); ?>
      
      <? require_once("views/dashboard_contact_search.php"); ?>
    
    </div>

    <div class="col-lg-9">

      <h1>Scheduled messages</h1>
      <p>This is a summary of all of your future scheduled messages.</p>
      <form role="form">
        <p>Type in the box below to filter by name or number</p>
        <div class="form-group">
          <input type="text" class="form-control" id="schedule-search" name="schedule-search" data-toggle="tooltip" placeholder="Name or number..." />
        </div>
      </form>

      <table class="table table-striped">
        <tr>
          <th>Date</th>
          <th>To</th>
          <th colspan="2">Message</th>
        </tr>
      <? foreach ($data['messages'] as $msg): ?>
        
        <? if ($msg['month']): ?>
        <tr class="warning">
          <td colspan="4"><b><?=$msg['month'];?></b></td>
        </tr>
        <? endif; ?>

        <tr class="schedule-panel" data-number="<?=preg_replace('/[^0-9]/', '', $msg['number']);?>" data-name="<?=strtolower($msg['contact_name']);?>">
          <td><?=$msg['date'];?></td>
          <td>
            <a href="/dashboard/contacts/<?=$msg['contact_id'];?>"><?=$msg['contact_name'];?></a><br />
            <?=$msg['number'];?>
          </td>
          <td><?=$msg['message'];?></td>
          <td><a data-id="<?=$msg['_id'];?>" class="btn btn-warning btn-unschedule">Unschedule</a></td>
        </tr>

      <? endforeach; ?>
      </table>
    </div>

  </div>
</div> <!--/ .container -->
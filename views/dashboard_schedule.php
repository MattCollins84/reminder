<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60">
        <h1>Edit <?=$data['contact']['name'];?></b></h1>
        <h3>Make any changes you require to this contact.</h3>
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
          <th>Message</th>
        </tr>
      <? foreach ($data['messages'] as $msg): ?>
        
        <? if ($msg['month']): ?>
        <tr class="warning">
          <td colspan="3"><b><?=$msg['month'];?></b></td>
        </tr>
        <? endif; ?>

        <tr class="schedule-panel" data-number="<?=preg_replace('/[^0-9]/', '', $msg['number']);?>" data-name="<?=strtolower($msg['contact_name']);?>">
          <td><?=$msg['date'];?></td>
          <td>
            <a href="/dashboard/contacts/<?=$msg['contact_id'];?>"><?=$msg['contact_name'];?></a><br />
            <?=$msg['number'];?>
          </td>
          <td><?=$msg['message'];?></td>
        </tr>

      <? endforeach; ?>
      </table>
    </div>

  </div>
</div> <!--/ .container -->
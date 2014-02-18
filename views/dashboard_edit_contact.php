<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 hidden-xs">
        <h1>Edit <?=$data['contact']['name'];?></h1>
        <h3>Make any changes you require to this contact.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="mt40">Edit <?=$data['contact']['name'];?></h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">
      
      <? require_once("views/dashboard_menu.php"); ?>
      
      <a href="/dashboard/schedule/<?=$data['contact']['_id'];?>" class="btn btn-success btn-lg btn-block mb20"><i class="fa fa-calendar-o"></i> Schedule a message</a>

      <? require_once("views/dashboard_contact_search.php"); ?>
    
    </div>

    <div class="col-lg-9">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Edit <?=$data['contact']['name'];?></h3>
        </div>
        <div class="panel-body">
          <form role="form" id="edit-contact">
            <div class="alert alert-success mt20 <?=($data['show_success']?"":"hidden");?>" id="success-container">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Contact edited successfully.</h4>
            </div>

            <p>Make changes to this contact below. We still require at least a valid name and mobile phone number.</p>
            <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?=$data['contact']['name'];?>" />
            </div>
            <div class="form-group">
              <label for="mobile_phone">Mobile Phone *</label>
              <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="Enter a contact phone number" value="<?=$data['contact']['mobile_phone'];?>" />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="<?=$data['contact']['email'];?>" />
            </div>
            <div class="form-group">
              <label for="notes">Notes</label>
              <textarea class="form-control" id="notes" name="notes" rows="3"><?=$data['contact']['notes'];?></textarea>
            </div>
            <div class="alert alert-danger mt20 hidden" id="error-container">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>There was a problem when attempting to add a contact</h4>
              <span id="errors-newcontact"></span>
            </div>
            <input type="hidden" name="contact_id" id="contact_id" value="<?=$data['contact']['_id'];?>" />
            <input type="hidden" name="country" id="country" value="<?=$data['active_customer']['country'];?>" />
            <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit Contact</button>
          </form>
        </div>
      </div>

    </div>
    
    <div class=".col-md-offset-3 col-lg-9">

      <h1>Scheduled messages</h1>
      <table class="table table-striped">
        <tr>
          <th>Date</th>
          <th colspan="2">Message</th>
        </tr>
      <? foreach ($data['messages'] as $msg): ?>
        
        <? if ($msg['month']): ?>
        <tr class="warning">
          <td colspan="3"><b><?=$msg['month'];?></b></td>
        </tr>
        <? endif; ?>

        <tr>
          <td><?=$msg['date'];?></td>
          <td><?=$msg['message'];?></td>
          <td><a data-id="<?=$msg['_id'];?>" class="btn btn-warning btn-unschedule">Unschedule</a></td>
        </tr>

      <? endforeach; ?>
      </table>
    </div> 

  </div>
</div> <!--/ .container -->
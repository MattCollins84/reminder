<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60">
        <h1>Schedule Message</b></h1>
        <h3>Schedule a message for <?=$data['contact']['name'];?>.</h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">
      <? require_once("views/dashboard_menu.php"); ?>

      <? require_once("views/dashboard_contact_search.php"); ?>

    <div class="col-lg-9">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Schedule a message for <?=$data['contact']['name'];?></h3>
        </div>
        <div class="panel-body">
          <form role="form" id="schedule-contact">
            <div class="alert alert-success mt20 <?=($data['show_success']?"":"hidden");?>" id="success-container">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>Message scheduled successfully.</h4>
            </div>

            <p>Set up a message for this contact.</p>
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
            <button type="submit" class="btn btn-success"><i class="fa fa-calendar-o"></i> Schedule Message</button>
          </form>
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
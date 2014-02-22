<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Account Settings</b></h1>
        <h3>Change your account contact details here.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Account Settings</h3>
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <? if ($data['active_customer']['verified']): ?>
            <span class="label label-success pull-right">Verified</span>
          <? else: ?>
            <span class="label label-danger pull-right">Not Verified</span>
          <? endif; ?>
          <h3 class="panel-title">Account Settings</h3>
        </div>
        <div class="panel-body">
          <div class="alert alert-success mt20 <?=($data['show_success']?"":"hidden");?>" id="success-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>Account Settings successfully updated.</h4>
          </div>
          <form role="form" id="acount-settings">
            <h3>Update your settings.</h3>
            <p>You can change your account settings here, make sure you provide us with at least a name and a <strong>valid</strong> email address.</p>
            <p><strong>Account ID</strong><br /><span id="dashboard-account-id" class="label label-info"><?=$data['active_customer']['_id'];?></span></p>
            <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="<?=$data['active_customer']['name'];?>" />
            </div>
            <div class="form-group">
              <label for="email">Email *</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="<?=$data['active_customer']['email'];?>" />
            </div>
            <div class="form-group">
              <label for="contact_name">Contact Name</label>
              <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Enter a contact name" value="<?=$data['active_customer']['contact_name'];?>" />
            </div>
            <div class="form-group">
              <label for="contact_phone">Contact Phone</label>
              <input type="text" class="form-control" id="contact_phone" name="contact_phone" placeholder="Enter a contact phone number" value="<?=$data['active_customer']['contact_phone'];?>" />
            </div>
            <hr />
            <h3>Do you want to change your password?</h3>
            <p>If you want to change your password, enter and confirm your new password below, otherwise leave these fields blank.</p>
            <div class="form-group">
              <label for="password">New Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Only complete if you wish to change your password" />
            </div>
            <div class="form-group">
              <label for="password2">Confirm New Password</label>
              <input type="password" class="form-control" id="password2" name="password2" />
            </div>
            <hr />
            <div class="alert alert-danger mt20 hidden" id="error-container">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>There was a problem when updating your details</h4>
              <span id="errors-signup"></span>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Update</button>
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
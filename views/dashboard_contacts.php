 <div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Contacts</b></h1>
        <h3>Manage all of your contacts here.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Contacts</h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">
      <? require_once("views/dashboard_menu.php"); ?>

      <? //require_once("views/dashboard_contact_search.php"); ?>
    
    </div>
    
    <div class="col-lg-9">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Add Contact</h3>
        </div>
        <div class="panel-body">
          <h3>Create a new contact.</h3>
          <p id="show-text" class="hidden-xs">Click the button below to start creating a new contact, or use the search box on the left to find an existing contact.</p>
          <p id="show-text-xs" class="visible-xs">Click the button below to start creating a new contact.</p>
          <button type="button" class="btn btn-success" id="show-contact-form"><i class="fa fa-asterisk"></i> Create Contact</button>
          <form role="form" class="hidden" id="new-contact">
            
            
            <p>Complete the form below to create a new contact. We require at least a name and a mobile phone number.</p>
            <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter contacts name" />
            </div>
            <div class="form-group">
              <label for="mobile_phone">Mobile Phone *</label>
              <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" placeholder="Enter your contacts phone number" />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter contacts email address" />
            </div>
            <div class="form-group">
              <label for="notes">Notes about contact</label>
              <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
            </div>
            <div class="alert alert-danger mt20 hidden" id="error-container">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4>There was a problem when attempting to add a contact</h4>
              <span id="errors-newcontact"></span>
            </div>
            <input type="hidden" name="customer_id" id="customer_id" value="<?=$data['active_customer']['_id'];?>" />
            <input type="hidden" name="country" id="country" value="<?=$data['active_customer']['country'];?>" />
            <button type="submit" class="btn btn-success" id="contact-btn"><i class="fa fa-asterisk"></i> Create Contact</button>
          </form>
        </div>
  
      </div>
      
      <? require_once("views/dashboard_contact_search_large.php"); ?>

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
<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Support</h1>
        <h3>Got a problem? Let us know and we'll do our best to help.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Support</h3>
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

      <h1>Get in touch</h1>
      
      <div class="alert alert-success mt20 hidden" id="success-container">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>Your message has been successfully sent. We will be in touch shortly.</h4>
        <span id="errors-signup"></span>
      </div>
      <form role="form" id="support">
        <p>Complete the form below and we will respond to you as soon as possible.</p>
        <div class="form-group">
          <label for="subject">Subject *</label>
          <input type="text" class="form-control" id="subject" name="subject" placeholder="What is your query about?" value="" />
        </div>
        <div class="form-group">
          <label for="email">Email *</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="<?=$data['active_customer']['email'];?>" />
        </div>
        <div class="form-group">
          <label for="msg_body">Your message *</label>
          <textarea class="form-control" id="msg_body" name="msg_body" rows="10"></textarea>
        </div>
        <div class="alert alert-danger mt20 hidden" id="error-container">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4>There was a problem when attempting to send your message</h4>
          <span id="errors-support"></span>
        </div>
        <button type="submit" class="btn btn-success mb20" id="support-btn"><i class="fa fa-share"></i> Send</button>
      </form>
      
    </div>

  </div>
</div> <!--/ .container -->
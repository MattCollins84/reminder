<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mt60 hidden-xs">
        <h1>Forgotten your password?</h1>
        <h3>Enter your email address below, and we'll send you a new password.</h3>
        <br>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Forgotten your password?</h3>
      </div>

      <div class="col-lg-2">
      </div>

      <div class="col-lg-8">
        <form role="form" class="mb20" id="forgot-form" enctype="plain"> 
          <div class="form-group">
            <input type="email" name="email" class="form-control input-lg" id="email" placeholder="Your email address" />
          </div>
          <button type="submit" id='forgot-btn' class="btn btn-lg btn-success">Get password</button>
          <div class="alert alert-danger mt20 hidden" id="error-container">
            <button type="submit" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>There was a retrieving your details</h4>
            <span id="errors-forgot"></span>
          </div>
        </form>
        <div class="alert alert-success mt20 hidden" id="success-container">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4>Thank you</h4>
          We have sent an email to <strong><span id="success-email"></span></strong> with your new password
        </div>
      </div>

      <div class="col-lg-2">
      </div>  

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->
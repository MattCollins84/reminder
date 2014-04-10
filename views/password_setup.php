<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mt60 hidden-xs">
        <h1>Enter a password</h1>
        <h3>Enter &amp; confirm your password below</h3>
        <br>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Enter a password</h3>
        <h4 class="white">Enter &amp; confirm your password below</h4>
      </div>

      <div class="col-lg-2">
      </div>

      <div class="col-lg-8 mb20">
        <form role="form" id="setup-form" enctype="plain"> 
          <div class="form-group">
            <input type="password" name="setup_password" class="form-control input-lg" id="setup_password" placeholder="Your password" />
          </div>
          <div class="form-group">
            <input type="password" name="confirm_password" class="form-control input-lg" id="confirm_password" placeholder="Confirm password" />
          </div>
          <button type="submit" id='setup-btn' class="btn btn-lg btn-success"><i class="fa fa-user"> </i>&nbsp;&nbsp;Set Password</button>
          
          <input type="hidden" name="customer_id" id="customer_id" value="<?=$data['customer_id'];?>" />
          
          <div class="alert alert-danger mt20 hidden" id="error-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>There was a problem setting your password</h4>
            <span id="errors-setup"></span>
          </div>

        </form>
      </div>

      <div class="col-lg-2">
      </div>  

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->
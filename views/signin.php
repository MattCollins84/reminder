<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mt60 hidden-xs">
        <h1>Sign in below</h1>
        <h3>Enter your email address &amp; password to sign-in.</h3>
        <br>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Sign in below</h3>
      </div>

      <div class="col-lg-2">
      </div>

      <div class="col-lg-8">
        <form role="form" id="signin-form" enctype="plain"> 
          <div class="form-group">
            <input type="email" name="signin-email" class="form-control input-lg" id="signin-email" placeholder="Your email address" />
          </div>
          <div class="form-group">
            <input type="password" name="signin-password" class="form-control input-lg" id="signin-password" placeholder="Your password" />
          </div>
          <button type="button" id='signin-btn' class="btn btn-lg btn-success">Sign-in</button>
          <div class="alert alert-danger mt20 hidden" id="error-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>There was a problem signing you in</h4>
            <span id="errors-signin"></span>
          </div>
          <h3>Not a member?</h3>
          <h4 class="strapline"><a href='/#signup'>Start your free trial now!</a></h4>
          <h4 class="strapline white">...or <a href='/forgot-password'>retrieve your password</a> if you have forgotten your details...</h4>
        </form>
      </div>

      <div class="col-lg-2">
      </div>  

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->
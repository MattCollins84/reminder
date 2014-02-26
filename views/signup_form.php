<form role="form" id="form-signup"> 
  <div class="form-group">
    <label for="name">Country *</label>
    <div class="row">
      <div class="col-lg-6 col-md-6 mb10">
        <select id="country" name="country" class="form-control" >
          <option value="">- Select Country -</option>
          <option value="us">United States</option>
          <option value="gb">United Kingdom</option>
        </select>
      </div>
      <div class="col-lg-6 col-md-6 mb10">
        <select id="timezone" name="timezone" class="form-control hidden" >
          <option value="">- Select Timezone -</option>
          <option value="Los_Angeles">Pacific (PST)</option>
          <option value="Denver">Mountain (MST)</option>
          <option value="Chicago">Central (CST)</option>
          <option value="New_York">Eastern (EST)</option>
        </select>
      </div>
    </div>   
  </div>
  <div class="form-group">              
    <div class="row">
      <div class="col-lg-6 col-md-6 mb10">
        <label for="name">Company Name *</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Your company name" />
      </div>
      <div class="col-lg-6 col-md-6 mb10">
        <label for="contact_name">Company Phone</label>
        <input type="text" name="contact_phone" class="form-control" id="contact_phone" placeholder="A contact number" />
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-lg-6 col-md-6 mb10">
        <label for="email">Email address *</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Your email address" />
      </div>
      <div class="col-lg-6 col-md-6 mb10">
        <label for="email">Contact name</label>
        <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="A contact name" />
      </div>
    </div>
    <span class="help-block">We may include your contact number when you send SMS to customers. We will never share your contact name.</span>
  </div>
  <div class="form-group">
    <div class="row">
      <div class="col-lg-6 col-md-6 mb10">
        <label for="password">Your password *</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Your password" />
      </div>
      <div class="col-lg-6 col-md-6 mb10">
        <label for="password">Confirm password *</label>
        <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm password" />
      </div>
    </div>
    <span class="help-block">Password should be at least 8 characters long.</span>
  </div>
  <div class="alert alert-danger mt20 hidden" id="error-container">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4>There was a problem when submitting the form</h4>
    <span id="errors-signup"></span>
  </div>
  <button type="submit" id="btn-signup" class="btn btn-large btn-success hidden-xs">Start Free Trial!</button>
  <button type="submit" id="btn-signup2" class="btn btn-large btn-success btn-block visible-xs">Start Free Trial!</button>
</form>
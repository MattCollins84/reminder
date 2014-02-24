  <section id="home"></section>
  <div id="headerwrap">
    <div class="container">
      <div class="row centered">
        
        <div class="col-lg-12">
          <h1 class="hidden-xs">Welcome To <b>ScheduleSMS</b></h1>
          <h1 class="h1-sm visible-xs">ScheduleSMS</h1>
          <h3>Turn knowledge of your customers into targetted mobile leads, appointment reminders &amp; much more...</h3>
          <br>
        </div>

        <? if (!$data['active_customer']): ?>
        <div class="visible-lg">
          <div class="col-lg-2">
            <h5 class="mt40">Amazing Results</h5>
            <p>Drive repeat business and minimise no-shows with ScheduleSMS.</p>
            <img class="hidden-xs hidden-sm hidden-md" src="/img/arrow1.png" alt="Arrow" />
          </div>

          <div class="col-lg-8">
            <form role="form" class="home-form"> 
              <div class="form-group">
                <input type="email" name="start-email2" class="form-control input-lg" id="start-email2" placeholder="Your email address" />
              </div>
              <button type="button" id='start-btn2' class="btn btn-lg btn-success">Start Free Trial!</button>
              <br>
              <h3>No monthly fee or hidden costs, pay as you go!</h3>
              <h4 class="strapline">Schedule appointment reminders or custom messages for your customers at pre-defined times to help drive repeat business and minimise no-shows.<br />We know your time is important, so let us look after some of the little things that make can a big difference.</h4>
            </form>
          </div>

          <div class="col-lg-2">
            <br>
            <img class="hidden-xs hidden-sm hidden-md" src="/img/arrow2.png" alt="Arrow" />
            <h5>Get <?=$data['tokens']['complimentary'];?> free tokens!</h5>
            <p>Enter your email address to get <?=$data['tokens']['complimentary'];?> complimentary tokens!</p>
          </div>
        </div>
        <div class="hidden-lg">
          
          <div class="col-sm-12">
            <h5 class="">Amazing Results</h5>
            <p>Drive repeat business and minimise no-shows with ScheduleSMS.</p>
            <h5>Get <?=$data['tokens']['complimentary'];?> free tokens!</h5>
            <p>Enter your email address to get <?=$data['tokens']['complimentary'];?> complimentary tokens!</p>
          </div>

          <div class="col-sm-12">
            <form role="form" class="home-form"> 
              <div class="form-group">
                <input type="email" name="start-email" class="form-control input-lg" id="start-email" placeholder="Your email address" />
              </div>
              <button type="button" id='start-btn' class="btn btn-lg btn-success">Start Free Trial!</button>
              <br>
              <h3>No monthly fee or hidden costs, pay as you go!</h3>
              <h4 class="strapline">Schedule appointment reminders or custom messages for your customers at pre-defined times to help drive repeat business and minimise no-shows.<br />We know your time is important, so let us look after some of the little things that make can a big difference.</h4>
            </form>
          </div>

          
        </div>
          <? else: ?>
            <div class="col-lg-12 hidden-xs">
              <a href="/dashboard" class="btn btn-lg btn-success mb40"><i class="fa fa-user"></i>&nbsp;&nbsp;Go to your personalised dashboard</a>
            </div>
            <div class="col-lg-12 visible-xs">
              <a href="/dashboard" class="btn btn-success mb40"><i class="fa fa-user"></i>&nbsp;&nbsp;Go to your personalised dashboard</a>
            </div>
          </div>
        <? endif; ?>

      </div>
    </div> <!--/ .container -->
  </div><!--/ #headerwrap -->


  <section id="how"></section>
  <!-- INTRO WRAP -->
  <div id="intro">
    <div class="container">
      <div class="row centered">
        <h1>How it works</h1>
        <br>
        <br>
        <div class="col-lg-4">
          <i class="fa fa-8x fa-comment icon-blue"></i>
          <h3>Business Intelligence</h3>
          <p>We believe that no-one knows your customers better than you.&nbsp;&nbsp;We want to help you turn this relationship into <strong>high quality leads</strong> that will benefit both you &amp; your customers.</p>
        </div>
        <div class="col-lg-4">
          <i class="fa fa-8x fa-calendar icon-red"></i>
          <h3>Targetted Messaging</h3>
          <p>We will send SMS messages direct to your customers on <strong>key dates</strong> identified by you. Whether this is an appointment confirmation, call to action, or promotional material - we will get your message there.</p>
        </div>
        <div class="col-lg-4">
          <i class="fa fa-8x fa-check-circle icon-green"></i>
          <h3>Getting Results</h3>
          <p>Targetting customers with relevant services at identified key times is proven to drive <strong>repeat business</strong> &amp; customer loyalty; while appointment reminders help you to maximise your productivity &amp; <strong>prevent avoidable no-shows.</strong></p>
        </div>
      </div>
    </div> <!--/ .container -->
  </div><!--/ #introwrap -->
  
  <section id="usecase"></section>
  <div id="showcase">
    <div class="container">
      <div class="row">
        <h1 class="centered">How Others Use ScheduleSMS</h1>
        <br>
        <div class="col-lg-8 col-lg-offset-2">
          <div id="carousel-example-generic" class="carousel slide">
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <h1>Mechanics</h1>
                <ul class="carousel-list">
                  <li><i class="fa fa-calendar mr20"></i> Scheduled messages targetting yearly services</li>
                  <li><i class="fa fa-calendar mr20"></i> Scheduled messages targetting M.O.T</li>
                  <li><i class="fa fa-calendar mr20"></i> Scheduled messages targetting identified future work</li>
                  <li><i class="fa fa-calendar-o mr20"></i> Appointment reminders to prevent un-expected downtime</li>
                  <li><i class="fa fa-bullhorn mr20"></i> Special offers &amp; promotions</li>
                </ul>
              </div>
              <div class="item">
                <h1>Florists</h1>
                <ul class="carousel-list">
                  <li><i class="fa fa-calendar mr20"></i> Scheduled messages targetting yearly events such as Valentines day</li>
                  <li><i class="fa fa-calendar mr20"></i> Scheduled messages targetting personal events (Anniversaries, Birthdays, etc...)</li>
                  <li><i class="fa fa-bullhorn mr20"></i> Special offers &amp; promotions</li>
                </ul>
              </div>
              <div class="item">
                <h1>Salons</h1>
                <ul class="carousel-list">
                  <li><i class="fa fa-calendar-o mr20"></i> Appointment reminders to minimise empty seats</li>
                  <li><i class="fa fa-calendar mr20"></i> Scheduled messages targetting yearly events such as New Year</li>
                  <li><i class="fa fa-calendar mr20"></i> Scheduled messages targetting personal events (Anniversaries, Birthdays, etc...)</li>
                  <li><i class="fa fa-bullhorn mr20"></i> Special offers &amp; promotions</li>
                </ul>
              </div>
              <div class="item">
                <h1>Schools</h1>
                <ul class="carousel-list">
                  <li><i class="fa fa-calendar-o mr20"></i> Appointment reminders for parents &amp; students</li>
                  <li><i class="fa fa-calendar-o mr20"></i> Sending important notifications direct to parents</li>
                  <li><i class="fa fa-calendar-o mr20"></i> Sending report cards direct to parents</li>
                  <li><i class="fa fa-bullhorn mr20"></i> Special event promotion </li>
                </ul>
              </div>
            </div>

            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

          </div>
        </div>
      </div>
      <br>
      <br>
      <br>  
    </div><!-- /container -->
  </div>

  <section id="pricing" ></section>
  <!-- PRICING WRAP -->
  <div id="pricing-wrap">
    <div class="container">
      <div class="row">
        <h1 class="centered mt20">Pricing &amp; Tokens</h1>

        <div class="col-lg-12">
          
          <h3>No monthly fees, just pay for what you use!</h3>
          <p>With ScheduleSMS you will always know just how much you are spending, there are no sign-up fees &amp; no hidden costs!</p>
          <p>Simply sign-up for your <strong>free, no obligation</strong> account &amp; use your complimentary ScheduleSMS tokens to get started instantly. Simply purchase more tokens as &amp; when you need them - it's that easy!</p>          
          <p>Each SMS costs ScheduleSMS tokens to send, with tokens being purchased via your personalised dashboard - don't worry, we will give you some <strong>free tokens</strong> to get the hang of it!</p>
        
        </div>

        <div class="col-lg-12 mb20">
          
          <h3>How to buy tokens</h3>
          <p>Tokens can be bought in one of four bundles, simply sign in to your personalised dashboard &amp; select the bundle you require. All transactions are handled through PayPal to provide you with peace of mind - ScheduleSMS will NEVER ask for your personal details.</p>
          <p>Once bought, a token will remain in your account until used - there are <strong>no expiry dates!</strong></p>
          <p>ScheduleSMS provides you with two ways to contact your customers, designed to offer you the flexibility you &amp; your business require.</p>

        </div>

        <div class="row flat">
          
          <ul class="nav nav-tabs" id="price-tabs">
            <li class="active"><a href="#pricing-us" data-toggle="tab">US Pricing</a></li>
            <li><a href="#pricing-uk" data-toggle="tab">UK Pricing</a></li>
          </ul>
          
          <div class="tab-content pt20 pb20">
            
            <div class="tab-pane active" id="pricing-us">
              <? foreach ($data['plans']['us'] as $key => $plan): ?>
              
                <div class="col-lg-3 col-md-3 col-xs-6">
                  <ul class="plan plan<?=($key+1);?> <?=($plan['selected']?"featured":"");?>">
                    <li class="plan-name">
                        <?=$plan['name'];?>
                    </li>
                    <li class="plan-price">
                        <strong>&dollar;<?=$plan['price'];?></strong>
                    </li>
                    <li>
                        <strong><?=$plan['tokens'];?></strong> ScheduleSMS Tokens
                    </li>
                    <li>
                        Up to <strong><?=floor($plan['tokens'] / $data['tokens']['custom']);?></strong> custom messages
                    </li>
                    <li>
                        Up to <strong><?=floor($plan['tokens'] / $data['tokens']['fixed']);?></strong> fixed messages
                    </li>
                  </ul>
                </div>
              
              <? endforeach; ?>
            </div>

            <div class="tab-pane" id="pricing-uk">
              <? foreach ($data['plans']['gb'] as $key => $plan): ?>
              
                <div class="col-lg-3 col-md-3 col-xs-6">
                  <ul class="plan plan<?=($key+1);?> <?=($plan['selected']?"featured":"");?>">
                    <li class="plan-name">
                        <?=$plan['name'];?>
                    </li>
                    <li class="plan-price">
                        <strong>&pound;<?=$plan['price'];?></strong>
                    </li>
                    <li>
                        <strong><?=$plan['tokens'];?></strong> ScheduleSMS Tokens
                    </li>
                    <li>
                        Up to <strong><?=floor($plan['tokens'] / $data['tokens']['custom']);?></strong> custom messages
                    </li>
                    <li>
                        Up to <strong><?=floor($plan['tokens'] / $data['tokens']['fixed']);?></strong> fixed messages
                    </li>
                  </ul>
                </div>
              
              <? endforeach; ?>
            </div>

          </div>
           
        </div>

        <script>

          $('#price-tabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
          })

        </script>

        <div class="col-lg-6">
          
          <h3>Fixed messages</h3>
          <p>Fixed messages are designed to be sent as <strong>appointment reminders</strong>. They include the company name, appointment date &amp; a contact number. These messages are fixed text, with slight customisations available to suit the circumstances.</p>
          <p>A fixed message is priced at <?=$data['tokens']['fixed'];?> ScheduleSMS tokens.</p>
            
          <p><strong>How can fixed messages help me?</strong></p>
          <p>Enter the average value of a booking <strong>&dollar;</strong> <input class="form-control input-xsmall input-inline" maxlength="4" id="booking_value" size="4" /></p>
          <p>Enter the average number of bookings in a day <input class="form-control input-xsmall input-inline" maxlength="4" id="booking_amount" size="4" /></p>
          <p class="hidden" id="fixed-result"></p>
          <p><button class="btn btn-success" id="calc_fixed_btn">Calculate</button>
          <input type="hidden" id="avg_cost" value="<?=$data['avg_cost'];?>" />


        </div>

        <div class="col-lg-6">
          
          <h3>Custom messages</h3>
          <p>Custom messages can take any form you wish up to the length of 160 characters, &amp; are often used to offer services that are specific to this customer at this time of year.</p>
          <p>A custom message is priced at <?=$data['tokens']['custom'];?> ScheduleSMS tokens.</p>

          <p><strong>How can custom messages help me?</strong></p>
          <p>SMS Marketing is not a new concept, however targetting your customers with relevant &amp; personal messages at key dates that are important to them will help you in many ways: </p>
          <ul class="list-unstyled">
            <li><i class="fa fa-star"> </i>&nbsp;&nbsp;&nbsp;Reduce your marketting costs by sending promotional messages only at key times</li>
            <li><i class="fa fa-star"> </i>&nbsp;&nbsp;&nbsp;Improve your conversion rate by only sending relevant and personal messages</li>
            <li><i class="fa fa-star"> </i>&nbsp;&nbsp;&nbsp;Drive repeat business and customer loyalty</li>
          </ul>

        </div>
      </div>
    </div><!--/ .container -->
  </div><!--/ #features -->

  <? if (!$data['active_customer']): ?>
  <section id="signup"></section>
  <div id="footerwrap">
    <div class="container">

      <div class="col-lg-7">
        <h3>Start your free trial now!</h3>
        <br>
        <form role="form" id="form-signup"> 
          <div class="form-group">
            <label for="name">Country *</label>
            <select id="country" name="country" class="form-control" >
              <option value="">- Select Country -</option>
              <option value="us">United States</option>
              <option value="gb">United Kingdom</option>
            </select>
          </div>
          <div class="form-group hidden" id="timezone-group">
            <label for="timezone">Timezone *</label>
            <select id="timezone" name="timezone" class="form-control" >
              <option value="">- Select Timezone -</option>
              <option value="Los_Angeles">Pacific (PST)</option>
              <option value="Denver">Mountain (MST)</option>
              <option value="Chicago">Central (CST)</option>
              <option value="New_York">Eastern (EST)</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Company Name *</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Your company name" />
          </div>
          <div class="form-group">
            <label for="email">Email address *</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Your email address" />
            <span class="help-block">We will send a confirmation email to this address.</span>
          </div>
          <div class="form-group">
            <label for="contact_name">Contact name</label>
            <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="A contact name" />
          </div>
          <div class="form-group">
            <label for="contact_phone">Contact number</label>
            <input type="text" name="contact_phone" class="form-control" id="contact_phone" placeholder="A contact number" />
          </div>
          <div class="form-group">
            <label for="password">Your password *</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="" />
            <span class="help-block">Password should be at least 8 characters long.</span>
          </div>
          <div class="form-group">
            <label for="password2">Confirm password *</label>
            <input type="password" name="password2" class="form-control" id="password2" placeholder="" />
          </div>
          <div class="alert alert-danger mt20 hidden" id="error-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>There was a problem when submitting the form</h4>
            <span id="errors-signup"></span>
          </div>
          <br>
          <button type="button" id="btn-signup" class="btn btn-large btn-success">Start Free Trial!</button>
        </form>
      </div>

      <div class="col-lg-5">

        <h3>Free tokens!</h3>
        <p>When you sign-up with ScheduleSMS we will give you <?=$data['tokens']['complimentary'];?> free tokens to get you started.</p>
        <p>There are no recurring costs and no sign-up fee, so what have you got to lose?</p>

        <h3>Contact details</h3>
        <p>ScheduleSMS will never use your contact details for anything other than resolving account issues, we know you have better things to do with your time.</p>

      </div>

    </div>
  </div>
  <? endif; ?>
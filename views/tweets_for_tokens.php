<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Tweets for Tokens</h1>
        <h3>You can earn free tokens, simply by tweeting about ScheduleSMS!</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Tweets for Tokens</h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-12">
      
      <h1>How does this work?</h1>
      
      <p>Once you are signed up with us, you will have access to your personalised dashboard. From here you can access the &quot;Tweets for Tokens&quot; promotion.</p>
      <p>What this means is that you can receive <b><?=$data['tokens']['complimentary'];?> free tokens</b> for simply tweeting a message on our behalf - it couldn't be easier!</p>
      <p>Start your free trial by completing the form below and get an aditional <b><?=$data['tokens']['complimentary'];?> free tokens</b> as part of your free trial period with ScheduleSMS!</p>
    </div>

  </div>

  <div class="row">
    
    <div class="col-lg-12 centered">
      
      <i class="fa fa-8x fa-twitter twitblue"> </i>

    </div>

  </div>
</div> <!--/ .container -->

<div id="footerwrap">
  <div class="container" itemscope itemtype="http://schema.org/Product">

    <div class="col-lg-6">
      <a itemprop="url" href="http://schedulesms.com/tweets-for-tokens">
        <div itemprop="name">
          <h3>Tweets for Tokens, sign up now!</h3>
        </div>
      </a>
      <br>
      <? require_once("views/signup_form.php"); ?>
    </div>

    <div class="col-lg-6">

      <h3>Free tokens!</h3>
      <div itemprop="description">
        <p>When you sign-up with ScheduleSMS we will give you <?=$data['tokens']['complimentary'];?> free tokens to get you started.</p>
      </div>
      <p>There are no recurring costs and no sign-up fee, so what have you got to lose?</p>

      <h3>Contact details</h3>
      <p>ScheduleSMS will never use your contact details for anything other than resolving account issues, we know you have better things to do with your time.</p>

    </div>

  </div>
</div>
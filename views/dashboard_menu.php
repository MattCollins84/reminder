<ul class="list-group dash-nav hidden-xs">
  <li class="list-group-item" id="dashboard-menu-home"><a href='/dashboard'><i class="fa fa-home"></i>&nbsp;&nbsp;Dashboard Home</a></li>
  <li class="list-group-item" id="dashboard-menu-account"><a href='/dashboard/account'><i class="fa fa-cog"></i>&nbsp;&nbsp;Account Settings</a></li>
  <li class="list-group-item" id="dashboard-menu-tokens"><a href='/dashboard/tokens'><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Purchase Tokens</a></li>
  <li class="list-group-item" id="dashboard-menu-contacts"><a href='/dashboard/contacts'><i class="fa fa-users"></i>&nbsp;&nbsp;Contacts</a></li>
  <li class="list-group-item" id="dashboard-menu-schedule"><a href='/dashboard/schedule'><i class="fa fa-calendar"></i>&nbsp;&nbsp;Schedule</a></li>
  <li class="list-group-item" id="dashboard-menu-transactions"><a href='/dashboard/transactions'><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Transactions</a></li>
</ul>

<ul class="list-group dash-nav dash-nav-xs visible-xs overflow">
  <li class="list-group-item pull-left br0" id="dashboard-menu-home-mobile"><a href='/dashboard'><i class="fa fa-home"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-account-mobile"><a href='/dashboard/account'><i class="fa fa-cog"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-tokens-mobile"><a href='/dashboard/tokens'><i class="fa fa-shopping-cart"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-contacts-mobile"><a href='/dashboard/contacts'><i class="fa fa-users"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-schedule-mobile"><a href='/dashboard/schedule'><i class="fa fa-calendar"></i></a></li>
  <li class="list-group-item pull-left br0" id="dashboard-menu-transactions-mobile"><a href='/dashboard/transactions'><i class="fa fa-briefcase"></i></a></li>
</ul>

<a class="btn btn-danger btn-block btn-lg mb20 hidden-xs" id="dashboard-support" href='/dashboard/support'>Support</a>

<? if (!$data['active_customer']['twitter_claim']): ?>
  <div class="alert alert-info hidden-xs">
    <h4 class="mt0"><i class="fa fa-twitter"></i> <b>Tweets for Tokens</b></h4>
    <p>If you have a twitter account you can get free ScheduleSMS tokens!</p>
    <p><a href='/dashboard/twitter' class="btn btn-success btn-block">Find out more</a></p>
  </div>

  <div class="row visible-xs">
    <div class="col-xs-6">
      <p><a class="btn btn-danger btn-block btn-block" id="dashboard-support" href='/dashboard/support'>Support</a></p>
    </div>
    <div class="col-xs-6">
      <p><a href='/dashboard/twitter' class="btn btn-success btn-block"><i class="fa fa-twitter"> </i> Tweets For Tokens</a></p>
    </div>
  </div>
<? else: ?>
  <a class="btn btn-danger btn-block btn-lg mb20 visible-xs" id="dashboard-support" href='/dashboard/support'>Support</a>
<? endif; ?>
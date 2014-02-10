<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Find Contact</h3>
  </div>
  <div class="panel-body">
    <form role="form">
      <p>Type a name or a number below to find existing contacts so you can start scheduling messages.</p>
      <div class="form-group">
        <input type="text" class="form-control" id="contact-search" name="contact-search" data-toggle="tooltip" title="Edit this contact" placeholder="Name or number..." />
      </div>
    </form>
  </div>
</div>

<ul class="list-group">
<? foreach($data['contacts'] as $contact): ?>

  <li class="list-group-item contact-panel hidden" data-number="<?=preg_replace('/[^0-9]/', '', $contact['mobile_phone']);?>" data-name="<?=strtolower($contact['name']);?>">
    <div class="hidden-xs">
      <a class="pull-right btn btn-success contact-btn" id="edit<?=$contact['_id'];?>" href="/dashboard/contacts/<?=$contact['_id'];?>" data-toggle="tooltip" title="Manage this contact"><i class="fa fa-user"> </i> Manage this user</a>
      <a class="pull-right btn btn-success contact-btn mr10" id="schedule<?=$contact['_id'];?>" href="/dashboard/schedule/<?=$contact['_id'];?>" data-toggle="tooltip" title="Schedule message for this contact"><i class="fa fa-calendar"> </i> Schedule a message</a>
      <h3 class="panel-title"><?=$contact['name'];?></h3>
    </div>
    <div class="visible-xs">
      <a class="pull-right btn btn-success contact-btn" id="edit<?=$contact['_id'];?>" href="/dashboard/contacts/<?=$contact['_id'];?>" data-toggle="tooltip" title="Manage this contact"><i class="fa fa-user"> </i></a>
      <a class="pull-right btn btn-success contact-btn mr10" id="schedule<?=$contact['_id'];?>" href="/dashboard/schedule/<?=$contact['_id'];?>" data-toggle="tooltip" title="Schedule message for this contact"><i class="fa fa-calendar"> </i></a>
      <h3 class="panel-title"><?=$contact['name'];?></h3>
    </div>
    <div>
      <p><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;<?=$contact['mobile_phone'];?></p>
      <? if ($contact['email']): ?>
        <p><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;&nbsp;<?=$contact['email'];?></p>
      <? endif; ?>
    </div>
  </li>

<? endforeach; ?>
  <li class="list-group-item contact-panel hidden" id="contact-search-add">
    <div>
      <p>Not found what you are looking for?</p>
      <a class="btn btn-success" href="/dashboard/contacts"><i class="fa fa-users"> </i> Create a new contact</a>
    </div>
  </li>
</ul>

</div>

<script>
$(document).ready(function() {
  var items = $('.contact-btn');
  items.each(function(i) {
    
    var item = items[i];
    var id = '#'+item.id;
    $(id).tooltip({placement: "right"});

  });
});
</script>
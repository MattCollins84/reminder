<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Find Contact</h3>
  </div>
  <div class="panel-body">
    <form role="form">
      <p>Type a name or a number below.</p>
      <div class="form-group">
        <input type="text" class="form-control" id="contact-search" name="contact-search" data-toggle="tooltip" title="Edit this contact" placeholder="Name or number..." />
      </div>
    </form>
  </div>
</div>

<ul class="list-group">
<? foreach($data['contacts'] as $contact): ?>

  <li class="list-group-item contact-panel hidden" data-number="<?=preg_replace('/[^0-9]/', '', $contact['mobile_phone']);?>" data-name="<?=strtolower($contact['name']);?>">
    <div>
      <a class="pull-right contact-btn" id="edit<?=$contact['_id'];?>" href="/dashboard/contacts/<?=$contact['_id'];?>" data-toggle="tooltip" title="Edit this contact"><i class="fa fa-edit"></i></a>
      <a class="pull-right contact-btn mr10" id="schedule<?=$contact['_id'];?>" href="/dashboard/schedule/<?=$contact['_id'];?>" data-toggle="tooltip" title="Schedule message for this contact"><i class="fa fa-calendar"></i></a>
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
      <a class="pull-right contact-btn" id="edit<?=$contact['_id'];?>" href="/dashboard/contacts/<?=$contact['_id'];?>" data-toggle="tooltip" title="Edit this contact"><i class="fa fa-edit"></i></a>
      <a class="pull-right contact-btn mr10" id="schedule<?=$contact['_id'];?>" href="/dashboard/schedule/<?=$contact['_id'];?>" data-toggle="tooltip" title="Schedule message for this contact"><i class="fa fa-calendar"></i></a>
      <h3 class="panel-title"><?=$contact['name'];?></h3>
    </div>
    <div>
      <p><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;<?=$contact['mobile_phone'];?></p>
      <? if ($contact['email']): ?>
        <p><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;&nbsp;<?=$contact['email'];?></p>
      <? endif; ?>
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
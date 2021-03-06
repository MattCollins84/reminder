<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 mt60 hidden-xs">
        <h1>Schedule Message</h1>
        <h3>Schedule a message for <?=$data['contact']['name'];?>.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="">Schedule Message</h3>
      </div>

    </div>
  </div> <!--/ .container -->
</div><!--/ #headerwrap -->

<div class="container mt20">
  <div class="row">
    
    <div class="col-lg-3">

      <? require_once("views/dashboard_menu.php"); ?>

      <a href="/dashboard/contacts/<?=$data['contact']['_id'];?>" class="btn btn-success btn-lg btn-block mb20"><i class="fa fa-user"></i> Manage contact</a>

      <? require_once("views/dashboard_contact_search.php"); ?>
    
    </div>
    
    <div class="col-lg-9">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Schedule a message for <?=$data['contact']['name'];?></h3>
        </div>
        <div class="panel-body">
            
          <div class="alert alert-success mt20 <?=($data['show_success']?"":"hidden");?>" id="success-container">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>Message scheduled successfully.</h4>
          </div>

          <? if ($data['contact']['stop']): ?>
            <div class="alert alert-danger">
              <h2>This customer has opted out</h2>
              <p>This customer has opted out of receiving messages from you via ScheduleSMS.</p>
            </div>
          <? elseif (!$data['can_created_fixed'] || !$data['can_created_custom']): ?>
            <div class="alert alert-danger mt20" >
              <h4><strong>You do not have enough credit to schedule a message.</strong></h4>
              <p><a href="/dashboard/tokens" class="btn btn-success"><i class="fa fa-shopping-cart"> </i> Purchase more messages</a></p>
            </div>
          <? else: ?>
          <p>Set up a message for this contact.</p>
          
          <ul class="nav nav-tabs" id="schedule-tabs">
            <li class="active"><a id="tab-fix" href="#schedule-fixed" data-toggle="tab"><strong><i class="fa fa-bookmark"> </i> Message Wizard</strong></a></li>
            <li><a id="tab-custom" href="#schedule-custom" data-toggle="tab"><strong><i class="fa fa-bookmark-o"> </i> Custom Message</strong></a></li>
            <li><a id="tab-template" href="#schedule-templates" data-toggle="tab"><strong><i class="fa fa-archive"> </i> Templates</strong></a></li>
          </ul>

          <div class="tab-content pt20 pb20">
          
            <div class="tab-pane active" id="schedule-fixed">
              
              <form role="form" id="fixed-form">
                
                <p>Use our simple mesage wizard to quickly create appointment reminders or confirmations.</p>
                
                <div class="form-group fixed-section">
                  <h4 id='fixedstep1'><strong>Step One</strong> Is this a reminder, or a confirmation?</h4>
                  <p>
                    <a class="btn btn-default fixed-btn" data-value="reminder" data-target="#fixed-type">Reminder</a> 
                    <a class="btn btn-default fixed-btn" data-value="confirmation" data-target="#fixed-type">Confirmation</a>
                  </p>
                  <input type="hidden" name="fixed-type" id="fixed-type" value="" />
                </div>

                <div class="form-group fixed-section hidden">
                  <h4 id='fixedstep2'><strong>Step Two</strong> Is this a meeting, or an appointment?</h4>
                  <p>
                    <a class="btn btn-default fixed-btn" data-value="meeting" data-target="#fixed-variation">Meeting</a>
                    <a class="btn btn-default fixed-btn" data-value="appointment" data-target="#fixed-variation">Appointment</a>
                  </p>
                  <input type="hidden" name="fixed-type" id="fixed-variation" value="" />
                </div>

                <div class="form-group fixed-section hidden">
                  <h4 id='fixedstep3'><strong>Step Three</strong> When is the <span id="variation-placeholder"></span>?</h4>
                  <p>
                    <input type="text" class="datepicker form-control input-small" id="fixed-variation-date" />
                  </p>
                  <span class="help-inline">Enter a time e.g. 2pm, 14:00 or 2 o'clock (optional)</span>
                  <p>
                    <input type="text" class="form-control input-small" maxlength="10" id="fixed-variation-time" />
                  </p>
                </div>

                <div class="form-group fixed-section hidden">
                  <h4 id='fixedstep4'><strong>Step Four</strong> When should the reminder be sent?</h4>
                  <p>
                    <input type="text" class="datepicker form-control input-small"  id="fixed-message-date"/><br />
                    <strong>Select a time</strong>
                    <select id="fixed-time" name="fixed-time" class="form-control input-small">
                      <option value="100">01:00</option>
                      <option value="200">02:00</option>
                      <option value="300">03:00</option>
                      <option value="400">04:00</option>
                      <option value="500">05:00</option>
                      <option value="600">06:00</option>
                      <option value="700">07:00</option>
                      <option value="800">08:00</option>
                      <option value="900" selected="selected">09:00</option>
                      <option value="1000">10:00</option>
                      <option value="1100">11:00</option>
                      <option value="1200">12:00</option>
                      <option value="1300">13:00</option>
                      <option value="1400">14:00</option>
                      <option value="1500">15:00</option>
                      <option value="1600">16:00</option>
                      <option value="1700">17:00</option>
                      <option value="1800">18:00</option>
                      <option value="1900">19:00</option>
                      <option value="2000">20:00</option>
                      <option value="2100">21:00</option>
                      <option value="2200">22:00</option>
                      <option value="2300">23:00</option>
                    </select>
                  </p>
                  <p id="fixed-unsociable" class="text-danger hidden">The time you have selected may be considered unsociable hours. Please double check that this is the time you wish to use.</p>
                  <p>Please note that we will never send your message earlier than you say, however there may be a delay in times of high demand.</p>
                </div>

                <div class="hidden fixed-section">

                  <div class="alert alert-info">
                    <p><strong>Preview of your message</strong></p>
                    <p id="fixed-preview"></p>
                  </div>

                  <div class="alert alert-danger mt20 hidden" id="fixed-failure">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>There was a problem when trying to schedule this message.</h4>
                    <p id="fixed-error"></p>
                  </div>

                  <input type="hidden" name="contact_id" id="contact_id" value="<?=$data['contact']['_id'];?>" />
                  <input type="hidden" name="company_name" id="company_name" value="<?=$data['active_customer']['name'];?>" />
                  <input type="hidden" name="company_contact" id="company_contact" value="<?=$data['active_customer']['contact_phone'];?>" />
                  <input type="hidden" name="country" id="country" value="<?=$data['active_customer']['country'];?>" />
                  <button type="submit" class="btn btn-success" id="fixed-btn"><i class="fa fa-calendar-o"></i> Schedule Message</button>
                </div>
              </form>

            </div>

            <div class="tab-pane" id="schedule-custom">
              <form role="form" id="custom-form">
                
                <p>Custom messages can be tailored to this specific customer, often containing a targeted &amp; promotional message. These messages can be saved and re-used with other customers at a later date.</p>
                <p>Each custom message is charged at <?=$data['tokens']['cost'];?> message credit per 160 characters.<br /><em class="slight">A required unsubscribe instruction will be included, using 26 characters.</em></p>

                <div class="form-group">

                  <label  id='customcompose' for="custom-message">Compose message (<span id="message-count">0</span> characters - <span id="message-tokens"><?=$data['tokens']['cost'];?></span> messages)</label>
                  <p><em>Remember to include your company name and contact details!</em></p>
                  <textarea class="form-control mb10" id="custom-message" name="custom-message" rows="3"></textarea>

                </div>

                <div class="form-group">
                  <label for="custom-message-date">When should we send this message?</label>
                  <input type="text" class="datepicker form-control input-small" id="custom-message-date" /><br />
                  <strong>Select a time</strong>
                  <select id="custom-time" name="custom-time" class="form-control input-small">
                    <option value="100">01:00</option>
                    <option value="200">02:00</option>
                    <option value="300">03:00</option>
                    <option value="400">04:00</option>
                    <option value="500">05:00</option>
                    <option value="600">06:00</option>
                    <option value="700">07:00</option>
                    <option value="800">08:00</option>
                    <option value="900" selected="selected">09:00</option>
                    <option value="1000">10:00</option>
                    <option value="1100">11:00</option>
                    <option value="1200">12:00</option>
                    <option value="1300">13:00</option>
                    <option value="1400">14:00</option>
                    <option value="1500">15:00</option>
                    <option value="1600">16:00</option>
                    <option value="1700">17:00</option>
                    <option value="1800">18:00</option>
                    <option value="1900">19:00</option>
                    <option value="2000">20:00</option>
                    <option value="2100">21:00</option>
                    <option value="2200">22:00</option>
                    <option value="2300">23:00</option>
                  </select>
                  <p id="custom-unsociable" class="text-danger hidden">The time you have selected may be considered unsociable hours. Please double check that this is the time you wish to use.</p>
                  <p>Please note that we will never send your message earlier than you say, however there may be a delay in times of high demand.</p>
                </div>

                <div class="form-group">
                  <label>Do you want to save this message as a template?</label>
                  <p>Saving this message as a template will allow you to easily send this same message to a different contact.</p>
                  <p>
                    <a class="btn btn-default custom-save" data-value="yes" data-target="#custom-save"><i class="fa fa-check"> </i> Yes</a>
                    <a class="btn btn-default custom-save" data-value="no" data-target="#custom-save"><i class="fa fa-times"> </i> No</a>
                    <input type="hidden" name="custom-save" id="custom-save" />
                  </p>
                </div>

                <div class="form-group hidden" id="template-details">
                  <label for="custom-template-name">Provide a template name</label>
                  <input type="text" name="custom-template-name" id="custom-template-name" class="form-control" /><br />
                  <input type="checkbox" name="custom-template-date" id="custom-template-date" value="1" /> Also save the date with this template?
                </div>

                <div class="form-group">
                  <label>Send this message to multiple contacts</label>
                  <p>Send the same message to multiple contacts for your conveinience. Please note that each additional contact will deduct a message token from your account.</p>
                  <p><button type="button" class="btn btn-success" id="toggle-multiple"><i class="fa fa-users"> </i> Show additional contacts</button></p>
                  
                  <div class="row hidden" id="mut-list">
                    <? foreach ($data['contacts'] as $contact): ?>

                      <? if ($contact['_id'] == $data['contact']['_id']) { continue; } ?>

                      <div class="col-sm-4 mb10">
                        
                        <div class="multiple-user-tile" id="mut-<?=$contact['_id'];?>">
                          <h4><?=$contact['name'];?></h4>
                          <p><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;<?=$contact['mobile_phone'];?></p>
                          <? if ($contact['email']): ?>
                            <p><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;&nbsp;<?=$contact['email'];?></p>
                          <? endif; ?>
                          <button type="button" class="btn btn-success btn-mut" id="add-<?=$contact['_id'];?>" data-add-multiple="<?=$contact['_id'];?>"><i class="fa fa-plus"></i> Add Contact</button>
                          <button type="button" class="btn btn-danger btn-mut hidden" id="remove-<?=$contact['_id'];?>" data-remove-multiple="<?=$contact['_id'];?>"><i class="fa fa-minus"></i> Remove Contact</button>
                        </div>

                      </div>

                    <? endforeach; ?>
                  </div>
                </div>

                <div class="form-group">
                  
                  <div class="alert alert-danger mb10 hidden" id="custom-failure">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>There was a problem when trying to schedule this message.</h4>
                    <p id="custom-error"></p>
                  </div>
                  
                  <hr />

                  <input type="hidden" name="contact_id" id="contact_id" value="<?=$data['contact']['_id'];?>" />
                  <input type="hidden" name="company_name" id="company_name" value="<?=$data['active_customer']['name'];?>" />
                  <input type="hidden" name="company_contact" id="company_contact" value="<?=$data['active_customer']['contact_phone'];?>" />
                  <input type="hidden" name="country" id="country" value="<?=$data['active_customer']['country'];?>" />
                  <input type="hidden" name="custom_cost" id="custom_cost" value="<?=$data['tokens']['cost'];?>" />
                  <button type="submit" class="btn btn-success" id="custom-btn"><i class="fa fa-calendar-o"></i> Schedule Message</button>
                </div>
              </form>
            </div>

            <div class="tab-pane" id="schedule-templates">
              
              <p>This is a list of your existing templates, simply click the <strong>Use Template</strong> button to quickly setup your message.</p>

              <? if (count($data['templates']) == 0): ?>
                <h2>You currently do not have any templates</h2>
              <? else: ?>
                <? foreach ($data['templates'] as $template): ?>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title"><?=$template['name'];?> <?=($template['date']?"(".$template['date'].")":"");?></h3>
                    </div>
                    <div class="panel-body">
                      <p><?=$template['message'];?></p>
                      <p><a class="btn btn-success btn-template" date-name="<?=$template['name'];?>" data-message="<?=$template['message'];?>" data-date="<?=($template['date']?$template['date']:"");?>"><i class="fa fa-check"> </i> Use Template</a></p>
                    </div>
                  </div>
                <? endforeach; ?>
              <? endif; ?>

            </div>

          </div>
        <? endif; ?>
                
        </div>

        <script>

          var multiple_contacts = [];

          $('.btn-mut').click(function(e) {

            var add = $(this).attr("data-add-multiple");
            var remove = $(this).attr("data-remove-multiple");

            if (add) {

              // how many tokens is this equal to. additional contacts, plus original contact, plus proposed new additional contacts
              var x = multiple_contacts.length + 2;
              if (x > <? echo (int) $data['active_customer']['available_tokens']; ?> ) {
                alert("You do not have enough available credits to add this contact");
                return;
              }

              multiple_contacts.push(add);
              multiple_contacts = arrayUnique(multiple_contacts);

              $('#add-'+add).addClass("hidden");
              $('#remove-'+add).removeClass("hidden");

              $('#mut-'+add).addClass("bg-success");

            }

            else if (remove) {

              var index = multiple_contacts.indexOf(remove);
              multiple_contacts.splice(index, 1);

              $('#add-'+remove).removeClass("hidden");
              $('#remove-'+remove).addClass("hidden");

              $('#mut-'+remove).removeClass("bg-success");

            }

          });

          $('#toggle-multiple').click(function(e) {

            $('#mut-list').toggleClass("hidden");

          });

          var direction = (<?=date('H');?>>=16?1:true);

          $('input.datepicker').Zebra_DatePicker({
            format: '<?=$data['date_format'];?>',
            direction: true,
            onSelect: function(v, e) {
              $(this).change();
            }
          });
        </script>

      </div>

    </div>

  </div>
</div> <!--/ .container -->
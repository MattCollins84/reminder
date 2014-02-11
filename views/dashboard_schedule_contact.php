<div id="headerwrap">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-12 centered mb60 hidden-xs">
        <h1>Schedule Message</h1>
        <h3>Schedule a message for <?=$data['contact']['name'];?>.</h3>
      </div>

      <div class="col-lg-12 centered mt20 visible-xs">
        <h3 class="mt40">Schedule Message</h3>
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

          <p>Set up a message for this contact.</p>
          
          <ul class="nav nav-tabs" id="schedule-tabs">
            <li class="active"><a href="#schedule-fixed" data-toggle="tab"><strong><i class="fa fa-bookmark"> </i> Fixed Messages</strong></a></li>
            <li><a href="#schedule-custom" data-toggle="tab"><strong><i class="fa fa-bookmark-o"> </i> Custom Messages</strong></a></li>
            <li><a href="#schedule-templates" data-toggle="tab"><strong><i class="fa fa-archive"> </i> Template Messages</strong></a></li>
          </ul>

          <div class="tab-content pt20 pb20">
          
            <div class="tab-pane active" id="schedule-fixed">
              
              <form role="form" id="fixed-form">
                
                <p>Fixed messages are used for confirmations or reminders for appointments or meetings, and cost <strong><?=$data['tokens']['fixed'];?></strong> tokens.</p>
                
                <? if (!$data['can_created_fixed']): ?>
                  <div class="alert alert-danger mt20" >
                    <h4><strong>You do not have enough tokens to schedule a message of this type.</strong></h4>
                    <p><a href="/dashboard/tokens" class="btn btn-success"><i class="fa fa-shopping-cart"> </i> Purchase tokens</a></p>
                  </div>
                <? else: ?>
                <div class="form-group fixed-section">
                  <h4><strong>Step One</strong> Is this a reminder, or a confirmation?</h4>
                  <p>
                    <a class="btn btn-default fixed-btn" data-value="reminder" data-target="#fixed-type">Reminder</a> 
                    <a class="btn btn-default fixed-btn" data-value="confirmation" data-target="#fixed-type">Confirmation</a>
                  </p>
                  <input type="hidden" name="fixed-type" id="fixed-type" value="" />
                </div>

                <div class="form-group fixed-section hidden">
                  <h4><strong>Step Two</strong> Is this a meeting, or an appointment?</h4>
                  <p>
                    <a class="btn btn-default fixed-btn" data-value="meeting" data-target="#fixed-variation">Meeting</a>
                    <a class="btn btn-default fixed-btn" data-value="appointment" data-target="#fixed-variation">Appointment</a>
                  </p>
                  <input type="hidden" name="fixed-type" id="fixed-variation" value="" />
                </div>

                <div class="form-group fixed-section hidden">
                  <h4><strong>Step Three</strong> When is the <span id="variation-placeholder"></span>?</h4>
                  <p>
                    <input type="text" class="datepicker form-control input-small" id="fixed-variation-date" />
                  </p>
                  <span class="help-inline">Optionally enter a time e.g. 2pm, 14:00 or 2 o'clock</span>
                  <p>
                    <input type="text" class="form-control input-small" maxlength="10" id="fixed-variation-time" />
                  </p>
                </div>

                <div class="form-group fixed-section hidden">
                  <h4><strong>Step Four</strong> When should the reminder be sent?</h4>
                  <p>
                    <input type="text" class="datepicker form-control input-small"  id="fixed-message-date"/>
                  </p>
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
                  <button type="submit" class="btn btn-success"><i class="fa fa-calendar-o"></i> Schedule Message</button>
                </div>

                <? endif; ?>
              </form>

            </div>

            <div class="tab-pane" id="schedule-custom">
              <form role="form" id="custom-form">
                
                <p>Custom messages can be tailored to this specific customer, often containing a targetted &amp; promotional message. These messages can be saved and re-used with other customers at a later date.</p>
                <p>Custom messages cost <strong><?=$data['tokens']['custom'];?></strong> tokens.</p>
                
                <? if (!$data['can_created_custom']): ?>
                  <div class="alert alert-danger mt20" >
                    <h4><strong>You do not have enough tokens to schedule a message of this type.</strong></h4>
                    <p><a href="/dashboard/tokens" class="btn btn-success"><i class="fa fa-shopping-cart"> </i> Purchase tokens</a></p>
                  </div>
                <? else: ?>

                <div class="form-group">

                  <label for="custom-message">Compose message (<span id="message-count">160</span> characters left)</label>
                  <textarea class="form-control mb10" id="custom-message" name="custom-message" rows="3"></textarea>

                </div>

                <div class="form-group">
                  <label for="custom-message-date">When should we send this message?</label>
                  <input type="text" class="datepicker form-control input-small" id="custom-message-date" />
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

                  <div class="alert alert-danger mb10 hidden" id="custom-failure">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4>There was a problem when trying to schedule this message.</h4>
                    <p id="custom-error"></p>
                  </div>

                  <input type="hidden" name="contact_id" id="contact_id" value="<?=$data['contact']['_id'];?>" />
                  <input type="hidden" name="company_name" id="company_name" value="<?=$data['active_customer']['name'];?>" />
                  <input type="hidden" name="company_contact" id="company_contact" value="<?=$data['active_customer']['contact_phone'];?>" />
                  <input type="hidden" name="country" id="country" value="<?=$data['active_customer']['country'];?>" />
                  <button type="submit" class="btn btn-success" id="custom-btn"><i class="fa fa-calendar-o"></i> Schedule Message</button>
                </div>

                <? endif; ?>
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
                
        </div>

        <script>
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
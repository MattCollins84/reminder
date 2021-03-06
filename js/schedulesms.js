var stripHTML = function(html) {
  var tmp = document.createElement("DIV");
  tmp.innerHTML = html;
  return tmp.textContent || tmp.innerText || "";
}

var arrayUnique = function(a) {
  return a.reduce(function(p, c) {
    if (p.indexOf(c) < 0) p.push(c);
    return p;
  }, []);
};

$(document).ready(function() {

  $('#country').change(function(e) {

    if ($(this).val() == "us") {
      $('#timezone').removeClass("hidden");
    } else {
      $('#timezone').addClass("hidden");
    }

  });

  // sign up button
  $("#form-signup").submit(function(e) {

    e.preventDefault();

    $('#btn-signup, #btn-signup').attr("disabled", "disabled").text("Please wait...");

    $.post("/customer/create", $("#form-signup").serialize()).done(function(data) {
      
      $("#error-container").addClass("hidden");

      try {
        data = JSON.parse(data);
      } catch(e) {
        alert("There was a problem submitting the form, please try again later");
      }

      if (data.success === false) {
        $("#errors-signup").html(data.error+"<br />Please correct these errors and try again.");
        $("#error-container").removeClass("hidden");
        $('#btn-signup, #btn-signup').attr("disabled", false).text("Start Free Trial!");
      }

      else {
        document.location.href = "/thank-you"
      }

    });

  });

  // sign up button
  $("#forgot-form").submit(function(e) {

    e.preventDefault();

    $('#forgot-btn').attr("disabled", "disabled").text("Please wait...");

    $.get("/customer/forgot-password", $("#forgot-form").serialize()).done(function(data) {
      
      $("#error-container").addClass("hidden");

      try {
        data = JSON.parse(data);
      } catch(e) {
        alert("There was a problem submitting the form, please try again later");
      }

      if (data.success === false) {
        $("#errors-forgot").html(data.error);
        $("#error-container").removeClass("hidden");
        $('#forgot-btn').attr("disabled", false).text("Get password");
      }

      else {
        $("#forgot-form").addClass("hidden");
        $("#success-container").removeClass("hidden");
        $("#success-email").text($('#email').val());
      }

    });

  });

  // free trial button (mobile)
  $("#start-btn").click(function() {

    $('#email').val($("#start-email").val());

    document.location.href = "/#signup";

  });

  // free trial button (desktop)
  $("#start-btn2").click(function() {

    $('#email').val($("#start-email2").val());

    document.location.href = "/#signup";

  });

  // sign in
  $("#signin-form").submit(function(e) {

    e.preventDefault();

    var data = {
      email : $("#signin-email").val(),
      password: $("#signin-password").val()
    }

    $('#signin-btn').attr("disabled", "disabled").text("Please wait...");

    $.ajax({
      type: "POST",
      url: "/customer/auth",
      data: data
    }).done (function(res) {

      res = JSON.parse(res);

      if (res.success) {
        document.location.href = "/dashboard";
      } else {
        $('#errors-signin').html(res.error);
        $("#error-container").removeClass("hidden");
        $('#signin-btn').attr("disabled", false).text("Sign-in");
      }

    });

  });

  // account settings
  $('#account-settings').submit(function(e) {
    
    e.preventDefault();

    $('#account-btn').attr("disabled", "disabled").text("Please wait...");

    $.post("/customer/update", $(this).serialize()).done(function(data) {
      
      $("#error-container").addClass("hidden");

      try {
        data = JSON.parse(data);
      } catch(e) {
        alert("There was a problem submitting the form, please try again later");
      }

      if (data.success === false) {
        $("#errors-signup").html(data.error+"<br />Please correct these errors and try again.");
        $("#error-container").removeClass("hidden");
        $('#account-btn').attr("disabled", false).html('<i class="fa fa-edit"></i> Update');
      }

      else {
        document.location.href="/dashboard/account";
      }

    });

  });

  // create contact
  $("#show-contact-form").click(function(e) {
    $(this).addClass("hidden");
    $('#show-text').addClass("hidden");
    $('#show-text-xs').addClass("hidden");
    $('#new-contact').removeClass("hidden")
  });

  $('#new-contact').submit(function(e) {
    
    e.preventDefault();

    $('#contact-btn').attr("disabled", "disabled").text("Please wait...");

    $("#error-container").addClass("hidden");

    // check mobile number
    if (getNumberType($("#mobile_phone").val(), $("#country").val()) !== 1 && getNumberType($("#mobile_phone").val(), $("#country").val()) !== 2) {
      $("#errors-newcontact").html("You have entered an invalid mobile number.<br />Please correct these errors and try again.");
      $("#error-container").removeClass("hidden");
      $('#contact-btn').attr("disabled", false).html('<i class="fa fa-asterisk"></i> Create Contact</button>');
      return;
    }

    $("#mobile_phone").val(formatE164($("#country").val(), $("#mobile_phone").val()));

    $.post("/contact/create", $(this).serialize()).done(function(data) {

      try {
        data = JSON.parse(data);
      } catch(e) {
        alert("There was a problem submitting the form, please try again later");
      }

      if (data.success === false) {
        $("#errors-newcontact").html(data.error+"<br />Please correct these errors and try again.");
        $("#error-container").removeClass("hidden");
        $('#contact-btn').attr("disabled", false).html('<i class="fa fa-asterisk"></i> Create Contact</button>');
      }

      else {
        document.location.href="/dashboard/contacts/"+data.id;
      }

    });

  });

  // contact search
  $("#contact-search").keyup(function(e) {
    
    // hide all panels
    $(".contact-panel").addClass("hidden");
    
    // find matches on number
    var items = $('.contact-panel[data-number*="'+this.value+'"], .contact-panel[data-altnumber*="'+this.value+'"], .contact-panel[data-name*="'+this.value.toLowerCase()+'"]');
    items.each(function(i) {
      $(items[i]).removeClass("hidden");
    });

    $('#contact-search-add').removeClass("hidden");

  });

  // schedule search
  $("#schedule-search").keyup(function(e) {
    
    if (this.value == "") {
      $(".schedule-panel").removeClass("hidden");
      return
    }

    // hide all panels
    $(".schedule-panel").addClass("hidden");

    // find matches on number
    var items = $('.schedule-panel[data-number*="'+this.value+'"], .schedule-panel[data-name*="'+this.value.toLowerCase()+'"]');
    items.each(function(i) {
      $(items[i]).removeClass("hidden");
    });

  });

  // edit contact
  $('#edit-contact').submit(function(e) {
    
    e.preventDefault();

    $("#error-container").addClass("hidden");

    $('#edit-btn').attr("disabled", "disabled").text("Please wait...");

    // check mobile number
    if (getNumberType($("#mobile_phone").val(), $("#country").val()) !== 1) {
      $("#errors-newcontact").html("You have entered an invalid mobile number.<br />Please correct these errors and try again.");
      $("#error-container").removeClass("hidden");
      $('#edit-btn').attr("disabled", false).html('<i class="fa fa-edit"></i> Edit Contact');
      return;
    }

    $("#mobile_phone").val(formatE164($("#country").val(), $("#mobile_phone").val()));

    $.post("/contact/update", $(this).serialize()).done(function(data) {

      try {
        data = JSON.parse(data);
      } catch(e) {
        alert("There was a problem submitting the form, please try again later");
      }

      if (data.success === false) {
        $("#errors-newcontact").html(data.error+"<br />Please correct these errors and try again.");
        $("#error-container").removeClass("hidden");
        $('#edit-btn').attr("disabled", false).html('<i class="fa fa-edit"></i> Edit Contact');
      }

      else {
        document.location.href="/dashboard/contacts/"+$('#contact_id').val();
      }

    });

  });

  // fixed message setup
  $('a.fixed-btn').click(function(e) {

    $(this).addClass("btn-success");
    $(this).siblings().removeClass("btn-success");

    var target = $(this).attr("data-target");
    var target = $(target);
    var value = $(this).attr("data-value");

    
    target.val(value);
    target.change();
    target.parent(".fixed-section").next().removeClass("hidden");

    generateFixedPreview();

  });

  $('#fixed-variation').change(function(e) {
    $('#variation-placeholder').text(this.value);
  });

  $('#fixed-variation-time').keyup(function(e) {
    generateFixedPreview();
  });

  $('#fixed-time').change(function(e) {

    var time = parseInt(this.value);

    $('#fixed-unsociable').addClass('hidden');
    if (time < 900 || time > 1800) {
      $('#fixed-unsociable').removeClass('hidden');
    }

  });

  $('.datepicker').change(function(e) {
    generateFixedPreview();
    $(this).parent().parent().parent().next().removeClass("hidden");
  });

  var generateFixedPreview = function() {

    var time = ($('#fixed-variation-time').val()?" @ "+$('#fixed-variation-time').val():"");
    var contact = ($('#company_contact').val()?" Contact:"+$('#company_contact').val():"");

    var preview = "This is a "+$('#fixed-type').val()+" of your "+$('#fixed-variation').val()+" with "+$('#company_name').val()+" on "+$('#fixed-variation-date').val()+time+"."+contact;
    $('#fixed-preview').text(preview);

    return preview;

  }

  // create fixed message
  $('#fixed-form').submit(function(e) {

    e.preventDefault();

    $('#fixed-btn').attr("disabled", "disabled").text("Please wait...");

    var date = $("#fixed-message-date").val().split("/");

    switch ($('#country').val()) {

      case "gb":
      case "ie":
        date = date[2]+"-"+date[1]+"-"+date[0];
        break;

      case "us":
        date = date[2]+"-"+date[0]+"-"+date[1];
        break;

    }

    var data = {
      contact_id: $('#contact_id').val(),
      message: generateFixedPreview(),
      date: date,
      time: parseInt($('#fixed-time').val()),
      country: $('#country').val(),
      type: "fixed"
    }

    $.ajax({
      type: "POST",
      url: "/message/create",
      data: data
    }).done (function(res) {

      res = JSON.parse(res);

      if (res.success) {
        document.location.href = "/dashboard/schedule/"+data.contact_id;
      } else {
        $('#fixed-error').html(res.error);
        $("#fixed-failure").removeClass("hidden");
        $('#fixed-btn').attr("disabled", false).html('<i class="fa fa-calendar-o"></i> Schedule Message');
      }

    });

  });

  // custom message
  $('#custom-message').keyup(function(e) {

    var len = this.value.length;

    var optout = " reply STOP to unsubscribe";

    $('#message-count').text(len);

    var max_len = (len + optout.length);

    var total = (Math.ceil(max_len / 160) * parseInt($('#custom_cost').val(), 10));

    $('#message-tokens').text(total);

  });

  $('#custom-time').change(function(e) {

    var time = parseInt(this.value);

    $('#custom-unsociable').addClass('hidden');
    if (time < 900 || time > 1800) {
      $('#custom-unsociable').removeClass('hidden');
    }

  });

  $('#custom-form').submit(function(e) {

    e.preventDefault();

    $('#custom-btn').attr("disabled", "disabled").text('Please wait...');

    var date = $("#custom-message-date").val().split("/");

    switch ($('#country').val()) {

      case "gb":
      case "ie":
        date = date[2]+"-"+date[1]+"-"+date[0];
        break;

      case "us":
        date = date[2]+"-"+date[0]+"-"+date[1];
        break;

    }

    var optout = " reply STOP to unsubscribe";

    if ($("#custom-message-date").val().split("/").length != 3) {
      date = "";
    }

    var data = {
      contact_id: $('#contact_id').val(),
      message: $('#custom-message').val()+optout,
      date: date,
      time: parseInt($('#custom-time').val()),
      country: $('#country').val(),
      type: "custom",
      template: ($('#custom-save').val()=="yes"?true:false),
      template_name: $('#custom-template-name').val(),
      template_date: ($('#custom-template-date').is(":checked")?$("#custom-message-date").val():false),
      additional_contacts: multiple_contacts
    }

    $.ajax({
      type: "POST",
      url: "/message/create",
      data: data
    }).done (function(res) {

      res = JSON.parse(res);

      if (res.success) {
        document.location.href = "/dashboard/schedule/"+data.contact_id;
      } else {
        $('#custom-error').html(res.error);
        $("#custom-failure").removeClass("hidden");
        $('#custom-btn').attr("disabled", false).html('<i class="fa fa-calendar-o"></i> Schedule Message');
      }

    });

  });

  // save as template?
  $('a.custom-save').click(function(e) {

    $(this).addClass("btn-info");
    $(this).siblings().removeClass("btn-info");

    var target = $(this).attr("data-target");
    var target = $(target);
    var value = $(this).attr("data-value");

    
    target.val(value);
    target.change();

    if (target.val() == "yes") {
      $('#template-details').removeClass("hidden");
    }

    else {
      $('#template-details').addClass("hidden");
    }

  });

  // restore template
  $('.btn-template').click(function(e) {

    var message = $(this).attr("data-message");
    var date = $(this).attr("data-date");

    $('#custom-message').val(message);
    $("#custom-message-date").val(date);

    $('#schedule-tabs a[href="#schedule-custom"]').tab('show');

    $('#custom-message').keyup();

  });

  // unschedule button
  $('.btn-unschedule').click(function(e) {

    var id = $(this).attr("data-id");

    $.ajax({
      type: "POST",
      url: "/message/"+id+"/unschedule"
    }).done (function(res) {

      res = JSON.parse(res);

      if (res.success) {
        document.location.href = document.location.href;
      } else {
        alert("There was a problem unscheduling this message");
        console.log(res);
      }

    });

  });

  // send support email
  $('#support').submit(function(e) {

    e.preventDefault();

    $('#support-btn').attr("disabled", "disabled").text('Please wait...');

    var data = {
      subject: $('#subject').val(),
      email: $('#email').val(),
      message: $('#msg_body').val()
    }

    $.ajax({
      type: "POST",
      url: "/email/support",
      data: data
    }).done (function(res) {

      res = JSON.parse(res);

      if (res.success) {
        $('#support').addClass("hidden");
        $("#success-container").removeClass("hidden");
      } else {
        $('#errors-support').html(res.error);
        $("#error-container").removeClass("hidden");
        $('#support-btn').attr("disabled", false).html('<i class="fa fa-share"></i> Send');
      }

    });

  });

  // affiliate signup
  $('#affiliate').submit(function(e) {

    e.preventDefault();

    $.post("/affiliate/create", $(this).serialize()).done(function(data) {
      
      $("#error-container").addClass("hidden");

      try {
        data = JSON.parse(data);
      } catch(e) {
        alert("There was a problem submitting the form, please try again later");
      }

      if (data.success === false) {
        $("#errors-signup").html(data.error+"<br />Please correct these errors and try again.");
        $("#error-container").removeClass("hidden");
      }

      else {
        document.location.href = "/affiliate/welcome"
      }

    });

  });

  // calculate fixed benefit
  $('#calc_fixed_btn').click(function() {

    var money = parseInt($('#booking_value').val(), 10);
    var frequency = parseInt($('#booking_amount').val(), 10);
    var sms_cost = parseFloat($('#avg_cost').val(), 10);

    if (isNaN(money) || isNaN(frequency) || isNaN(sms_cost)) {
      return alert("Please enter numbers only");
    }

    var total_cost = ((frequency * sms_cost) / 100).toFixed(2);
    var num = 1;
    var saved = (money - total_cost).toFixed(2);
    var done = false;

    while (!done) {

      if (saved > 0) {
        done = true;
      }

      else {
        num++;
        saved = ((money * num) - total_cost).toFixed(2);
      }

    }

    if (num == 1) {
      num += " no show";
    } else {
      num += " no shows";
    }

    var str = "ScheduleSMS would cost you just <strong>"+total_cost+"</strong> per day*, meaning that preventing just "+num+" would save you <strong>"+saved+"!</strong><br /><em>* prices calculated assuming messages bought with the premium package";

    $('#fixed-result').html(str);
    $('#fixed-result').removeClass("hidden");

  });

  //twitter auth
  $('#twitter-auth').click(function(e) {

    $('#twitter-auth').attr("disabled", "disabled").text("Connecting to Twitter...");
    $('#fail').addClass('hidden');

    $.get('/dashboard/twitter/auth', {}, function(data) {

      data = JSON.parse(data);

      // redirect
      if (data.redirect_url) {
        document.location.href=data.redirect_url;
      }

      else {
        $('#twitter-auth').attr("disabled", false).html('<i class="fa fa-twitter"> </i> Connect');
        $('#fail').removeClass('hidden');
      }

    });

  });

  // tweet
  $('.btn-tweet').click(function(e) {

    $(this).attr("disabled", "disabled").text("Connecting to Twitter...");

    var msg = $(this).attr("data-msg");

    $.get('/dashboard/twitter/tweet', {msg: msg}, function(data) {

      document.location.href="/dashboard";

    });

  })

  $('#setup-form').submit(function(e) {

    e.preventDefault();

    $('#setup-btn').attr("disabled", "disabled").text("Setting password...");

    $('#error-container').addClass('hidden');

    $.post("/customer/setPassword", $('#setup-form').serialize()).done(function(data) {

      try {
        data = JSON.parse(data);
      } catch(e) {
        alert("There was a problem submitting the form, please try again later");
      }

      if (data.success === false) {
        $("#errors-setup").html(data.error+"<br />Please correct these errors and try again.");
        $("#error-container").removeClass("hidden");
        $('#setup-btn').attr("disabled", false).html('<i class="fa fa-user"> </i>&nbsp;&nbsp;Set Password');
      }

      else {
        document.location.href = "/sign-in"
      }

    });

  })

});
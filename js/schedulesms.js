$(document).ready(function() {

  // sign up button
  $("#btn-signup").click(function() {

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
      }

      else {
        document.location.href = "/thank-you"
      }

    });

  });

  // free trial button
  $("#start-btn").click(function() {

    $('#email').val($("#start-email").val());

    document.location.href = "/#signup";

  });

  // sign in
  $('#signin-form input').keyup(function(e) {
    if (e.keyCode == 13) {
      $("#signin-btn").click();
    }
  });

  $("#signin-btn").click(function() {

    var data = {
      email : $("#signin-email").val(),
      password: $("#signin-password").val()
    }

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
      }

    });

  });

  // account settings
  $('#acount-settings').submit(function(e) {
    
    e.preventDefault();

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

    $("#error-container").addClass("hidden");

    // check mobile number
    if (getNumberType($("#mobile_phone").val(), $("#country").val()) !== 1 && getNumberType($("#mobile_phone").val(), $("#country").val()) !== 2) {
      $("#errors-newcontact").html("You have entered an invalid mobile number.<br />Please correct these errors and try again.");
      $("#error-container").removeClass("hidden");
    }

    $.post("/contact/create", $(this).serialize()).done(function(data) {

      try {
        data = JSON.parse(data);
      } catch(e) {
        alert("There was a problem submitting the form, please try again later");
      }

      if (data.success === false) {
        $("#errors-newcontact").html(data.error+"<br />Please correct these errors and try again.");
        $("#error-container").removeClass("hidden");
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
    var items = $('.contact-panel[data-number*="'+this.value+'"], .contact-panel[data-name*="'+this.value.toLowerCase()+'"]');
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

    // check mobile number
    if (getNumberType($("#mobile_phone").val(), $("#country").val()) !== 1) {
      $("#errors-newcontact").html("You have entered an invalid mobile number.<br />Please correct these errors and try again.");
      $("#error-container").removeClass("hidden");
      return;
    }

    $.post("/contact/update", $(this).serialize()).done(function(data) {

      try {
        data = JSON.parse(data);
      } catch(e) {
        alert("There was a problem submitting the form, please try again later");
      }

      if (data.success === false) {
        $("#errors-newcontact").html(data.error+"<br />Please correct these errors and try again.");
        $("#error-container").removeClass("hidden");
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

  $('.datepicker').change(function(e) {
    generateFixedPreview();
    $(this).parent().parent().parent().next().removeClass("hidden");
  });

  var generateFixedPreview = function() {

    var time = ($('#fixed-variation-time').val()?" @ "+$('#fixed-variation-time').val():"");

    var preview = "This is a "+$('#fixed-type').val()+" of your "+$('#fixed-variation').val()+" with "+$('#company_name').val()+" on "+$('#fixed-variation-date').val()+time+". Phone: "+$('#company_contact').val();
    $('#fixed-preview').text(preview);

    return preview;

  }

  // create fixed message
  $('#fixed-form').submit(function(e) {

    e.preventDefault();

    var date = $("#fixed-message-date").val().split("/");

    switch ($('#country').val()) {

      case "gb":
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
      }

    });

  });

  // custom message
  $('#custom-message').keyup(function(e) {

    var max = 160;

    var remaining = max - this.value.length;

    $('#message-count').text(remaining);

    if (remaining < 0) {
      $('#message-count').css("color", "red");
      $('#custom-btn').attr("disabled", true);
    } else {
      $('#message-count').css("color", "black");
      $('#custom-btn').attr("disabled", false);
    }

  });

  $('#custom-form').submit(function(e) {

    e.preventDefault();

    var date = $("#custom-message-date").val().split("/");

    switch ($('#country').val()) {

      case "gb":
        date = date[2]+"-"+date[1]+"-"+date[0];
        break;

      case "us":
        date = date[2]+"-"+date[0]+"-"+date[1];
        break;

    }

    if ($("#custom-message-date").val().split("/").length != 3) {
      date = "";
    }

    var data = {
      contact_id: $('#contact_id').val(),
      message: $('#custom-message').val(),
      date: date,
      country: $('#country').val(),
      type: "custom",
      template: ($('#custom-save').val()=="yes"?true:false),
      template_name: $('#custom-template-name').val(),
      template_date: ($('#custom-template-date').is(":checked")?$("#custom-message-date").val():false)
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

    $('#schedule-tabs a[href="#schedule-custom"]').tab('show')

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

});
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
        document.location.href = "/";
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
    $('#new-contact').removeClass("hidden")
  });

  $('#new-contact').submit(function(e) {
    
    e.preventDefault();

    $("#error-container").addClass("hidden");

    // check mobile number
    if (getNumberType($("#mobile_phone").val(), $("#country").val()) !== 1) {
      $("#errors-newcontact").html("You have entered an invalid mobile number.<br />Please correct these errors and try again.");
      $("#error-container").removeClass("hidden");
      return;
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
        document.location.href="/dashboard/contacts";
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


});
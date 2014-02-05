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

});
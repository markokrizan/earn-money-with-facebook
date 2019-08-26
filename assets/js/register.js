$("#register-sucess").hide();

$('#register-form').submit('click', function(e) {
  //Prepare button styling
  $('#register_submit').prop('disabled', true);
  $('#register_submit').html("<img height='20' src='assets/img/green-loading.gif'/>"); 

  //Send request
  $.post("mail.php", $("#register-form").serialize(), function(data) {
    $("#register-form").hide();
    $("#register-sucess").show();
  });

  e.preventDefault();
});


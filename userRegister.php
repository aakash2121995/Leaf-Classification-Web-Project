<html>
<head><title>Leaf Classification </title>
<link href="Content/bootstrap.min.css" rel="stylesheet" />
<script src="Scripts/jquery-1.9.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
<script >
  // Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      first_name: "required",
      last_name: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 1
      },
      password_confirmation: {
        required:true,
        equalTo:'#password'
      }
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 1 characters long"
      },
      password_confirmation: {
        required: "Please confirm the password",
        equalTo: "It does not matches to your password"
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
          // $('#register').click(function(){       
    // alert("clicked") 
    $.post("process.php", $("#registration").serialize(), function(data) {
        // alert(data);
        if(data=="1")
          {alert("You have been registered !!")
        window.location="index.html"
      }

        else
          alert("Email is already in use !!")
    });

    // })

    }
  });
});


</script>
</head>
<body style="background-image: url('https://s-media-cache-ak0.pinimg.com/originals/59/0c/6d/590c6d712ea0d083e4f10c108dd98b78.jpg');background-size:;
 background-repeat: no-repeat;">
<br><br><br>
<div class="container" >
        <div class="row centered-form" >
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
          <div class="panel panel-default">
            <div class="panel-heading" >
              <h2 class="panel-title" >Please sign up for Leaf Classification <small>It's free!</small></h2>
            </div>
            <div class="panel-body" >
              <form  name="registration" id="registration" >
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                </div>

                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                    </div>
                  </div>
                </div>
                
                <input type="submit" value="Register" class="btn btn-info btn-block">
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<body>

</html>
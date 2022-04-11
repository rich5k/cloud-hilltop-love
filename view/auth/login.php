<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/style_login.css">

</head>
<body>
    <!-- multistep form -->
    <div class="program_container" style="display:flex;">

      <div class="form_side" style="width:65%">
        <form name="registration" id="msform" action="" method='post' style="" style="margin-left:auto margin-right:auto">
          <!-- progressbar -->
          <fieldset>
            <h2 class="fs-title" style="color:">Sign In</h2>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email" required />
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required />
            <h5 id="passcheck" style="color: red;">
              **Please Fill the password
            </h5>
            
            <span>
              <input type="button" name="next" class="next action-button" value="Login">
              <p class='text'>Dont have an Account? <a href="./register.php">Sign Up here</a></p>
            </span>
            
          </fieldset>



          <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"> </script>
        <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        </form>

      </div>
      <div class="picture side" style="width:50% ">
        <img src="../../images/forall_pic.jpg" alt="hill top love" style="width: 714px;
height: 730px">

      </div>

    </div>


</body>
</html>
